<?php


namespace App\Utils\Rostelekom;


use Exception;
use QSOFT\BackOffice\Export\Order\OrderException;
use QSOFT\Distributor\Distributor;
use QSOFT\Distributor\Order;
use QSOFT\Payment\Payment;
use QSOFT\Payment\PaymentException;
use QSOFT\Tools\Product;

class RostelePaymentService
{
    /**
     * @var string $guid
     */
    private $guid;
    /**
     * @var string $phone
     */
    private $phone;

    /**
     * @var string
     */
    protected $retailerId = '7840306212',
        $paySystemId = 37,
        $secondPaySystemId = 38;
    /**
     * @var bool
     */
    private $orderId;
    /**
     * @var bool|string
     */
    private $error;
    private $userId;


    /**
     * RostelePaymentService constructor.
     * @param $guid
     * @param $phone
     * @param $userId
     */
    public function __construct($guid, $phone, $userId)
    {
        $this->guid = $guid;
        $this->phone = $phone;
        $this->userId = $userId;
        $this->error = false;
    }

    /**
     * @return mixed
     */
    public function makeOrder(): array
    {
        $orderId = $this->createOrder();
        if (!$orderId || $this->error) {
            return $this->responseError();
        }
        if ($this->payOrder() !== true) {
            return $this->responseError();
        }

        $chequeText = $this->keysOrder();

        $key = $this->getProductKey();

        $resp = [];
        $resp['attributes'] = [
            "inphone" => $this->phone,
            "key"     => $key,
            "orderid" => $this->orderId
        ];
        $resp['chequeText'] = str_replace("¶", PHP_EOL, $chequeText);
        $resp['status'] = 0;
        $resp['cost'] = $this->getPrice();

        return $resp;
    }

    private function getPrice()
    {
        $price = false;
        try {
            $order = new Order($this->orderId);
            $price = (int)$order->getPrice() * 100;
        } catch (OrderException $e) {
            dd($e->getMessage());
        }
        return $price;
    }

    /**
     * @return bool|int
     */
    private function createOrder()
    {
        $_POST = $this->buildPostData([$this->guid], $this->userId, $this->phone);
        $rosteleSale = RosteleSaleHelper::class;
        $orderId = false;
        try {
            $rosteleSale = new RosteleSaleHelper((new PaymentHelper($this->retailerId, $this->paySystemId))->loadPayment($this->retailerId, $this->paySystemId));
        } catch (PaymentException $e) {
            dd($e->getMessage());
        }
        $_POST['Price'] = $rosteleSale->getTotalPrice($_POST['Items']);

        $_POST['Hash'] = $rosteleSale->generateHash([
            'Function'  => $_POST['Function'],
            'Items'     => $_POST['Items'],
            'Price'     => $_POST['Price'],
            'PointCode' => $_POST['PointCode'],
            'Person'    => $_POST['Person'],
        ]);

        try {
            $obPayment = new Payment($this->retailerId, $this->paySystemId);
            $orderId = $obPayment->handlePayRequest();

        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }

        return $this->orderId = is_int($orderId) ? $orderId : false;
    }


    /**
     * @return mixed|string
     */
    private function payOrder()
    {
        try {
            return $this->makeHandleRequest('Pay');
        } catch (Exception $e) {
            return $this->error = "Ошибка при оплате заказа";
        }
    }

    /**
     * @return mixed|string
     */
    private function checkOrder()
    {
        try {
            return $this->makeHandleRequest('Check');
        } catch (Exception $e) {
            return $this->error = "Ошибка при проверке заказа";
        }
    }


    /**
     * @return mixed
     */
    private function keysOrder()
    {
        try {
            return $this->makeHandleRequest('Keys');
        } catch (Exception $e) {
            return $this->error = "Ошибка при получении ключей по заказу";
        }
    }

    /**
     *
     * @param $func
     * @return mixed
     * @throws Exception
     */
    public function makeHandleRequest($func)
    {
        if (!$this->orderId) {
            return $this->responseError();
        }

        try {
            $order = new Order($this->orderId);
        } catch (OrderException $e) {
            throw new Exception($e->getMessage());
        }

        $amountFrom = $amountTo = number_format($order->getPrice(), 2, '.', '');

        $_GET['Function'] = $func;
        $_GET['OrderId'] = $this->orderId;
        $_GET['AmountFrom'] = $amountFrom;
        $_GET['AmountTo'] = $amountTo;
        try {
            $obPayment = new Payment($this->retailerId, $this->secondPaySystemId);
            $result = $obPayment->handlePayRequest();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return $result;
    }


    /**
     * @param array $items
     * @param $userId
     * @param string $phone
     * @return array
     */
    protected function buildPostData(array $items, $userId, $phone = '')
    {
        $products = array_map(function ($item) {

            list($guid, $count) = explode(',', $item);
            $count = (int)$count;

            return ['GUID' => $guid, 'COUNT' => $count ?: 1];

        }, $items);

        return [
            'Function'  => 'create',
            'Items'     => $products,
            'PointCode' => $userId,
            'Person'    => [
                'Phone' => $phone,
            ],
        ];
    }


    /**
     *
     **/
    private function responseError(): array
    {
        $resp = [];
        $resp['attributes'] = [
            "error" => $this->error
        ];
        $resp['status'] = 1;

        return $resp;
    }

    private function getProductKey()
    {
        $dbKey = Distributor::getKeys(array('order_id' => $this->orderId), array(), true)->Fetch();
        return $dbKey['key'];
    }


}