<?php


namespace App\Bazar\ProductTokenBundle\Utils;


use App\Bazar\ConnectDBBundle\Entity\Basket\BSaleBasket;
use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrder;
use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrderPropsValue;
use App\Bazar\ConnectDBBundle\Entity\QKey;
use App\Bazar\ConnectDBBundle\Repository\Order\BSaleOrderPropsValueRepository;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use QSOFT\Bitrix\DB\KeyTable;


/**
 * Class FullOrder
 * @package App\Bazar\ConnectDBBundle\Helpers
 */
class Order
{

    /**
     * @var string
     */
    private $orderToken,
            $phone;

    /**
     * @var BSaleOrder
     */
    public $saleOrder;

    /**
     * @var QKey
     */
    private $keys;
    private $products;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var BSaleOrderPropsValueRepository|ObjectRepository
     */
    private $propertyRepo;
    private $basketRepo;
    /**
     * @var ObjectRepository
     */
    private $orderRepo;
    /**
     * @var ObjectRepository
     */
    private $keysRepo;


    /**
     * FullOrder constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->basketRepo = $this->em->getRepository(BSaleBasket::class);
        $this->propertyRepo = $this->em->getRepository(BSaleOrderPropsValue::class);
        $this->orderRepo = $this->em->getRepository(BSaleOrder::class);
        $this->keysRepo = $this->em->getRepository(QKey::class);
    }



    public function getByProp($prop)
    {
        $orderId = $this->propertyRepo->findBy($prop);

        if (empty($orderId)){
            return false;
        }
        $this->saleOrder = $this->orderRepo->find($orderId[0]->getOrderId());
        $this->craftOrder();

        return $this->saleOrder;
    }

    public function getById($id):BSaleOrder
    {
        $this->saleOrder = $this->orderRepo->find($id);
        $this->craftOrder();
        return $this->saleOrder;
    }

    private function craftOrder()
    {
        $this->addProps();
        $this->addBasket();

    }

    private function addProps()
    {
        $props = $this->propertyRepo->findBy(['orderId' => $this->saleOrder->getId()]);
        $this->saleOrder->setOrderProps($props);
    }

    private function addBasket()
    {
        $basket = $this->basketRepo->findBy(['orderId' => $this->saleOrder->getId()]);
        $this->saleOrder->basket = $basket;
    }

    public function checkAuthToken($token, $phone)
    {
        $order = false;

        $props = $this->propertyRepo->findBy(['code' => 'UNIQUE_KEYS_CODE', 'value' => $token]);
        foreach ($props as $prop){
            $order = $this->getByProp(['code' => 'PHONE', 'value' => $phone, 'orderId' => $prop->getOrderId()]) ?: $this->getByProp(['code' => 'PHONE', 'value' => $phone, 'orderId' => $prop->getOrderId()]);
        }
        return (bool)$order;
    }
    public function checkStatusChoice($orderId)
    {
        $keys = $this->keysRepo->findBy(['orderId' => $orderId]);

        return (bool)$keys;
    }
    /**
     * @return BSaleOrder
     */
    public function getSaleOrder(): BSaleOrder
    {
        return $this->saleOrder;
    }


}