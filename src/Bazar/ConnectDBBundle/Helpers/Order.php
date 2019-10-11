<?php


namespace App\Bazar\ConnectDBBundle\Helpers;


use App\Bazar\ConnectDBBundle\Entity\Basket\BSaleBasket;
use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrder;
use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrderPropsValue;
use App\Bazar\ConnectDBBundle\Entity\QKey;
use App\Bazar\ConnectDBBundle\Repository\Order\BSaleOrderPropsValueRepository;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
    private $Order;

    /**
     * @var QKey
     */
    private $keys;
    private $products;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

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
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->basketRepo = $this->em->getRepository(BSaleBasket::class);
        $this->propertyRepo = $this->em->getRepository(BSaleOrderPropsValue::class);
        $this->orderRepo = $this->em->getRepository(BSaleOrder::class);
        $this->keysRepo = $this->em->getRepository(QKey::class);
    }



    public function getByProp($prop):BSaleOrder
    {
        dd($prop);
        $orderId = $this->propertyRepo->findBy($prop, [], 1);
        dd($orderId);
        $this->Order = $this->orderRepo->find($orderId);
        $this->craftOrder();
        return $this->Order;
    }

    public function getById($id):BSaleOrder
    {
        $this->Order = $this->orderRepo->find($id);
        $this->craftOrder();
        return $this->Order;
    }
    
    private function craftOrder()
    {
        $this->addProps();
        $this->addBasket();

    }

    private function addProps()
    {
        $props = $this->propertyRepo->findBy(['orderId' => $this->Order->getId()]);
        $this->Order->setOrderProps($props);
    }

    private function addBasket()
    {
        $basket = $this->basketRepo->findBy(['orderId' => $this->Order->getId()]);
        $this->Order->basket = $basket;
    }


}