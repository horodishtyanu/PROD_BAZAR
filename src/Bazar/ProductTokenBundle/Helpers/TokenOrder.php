<?php


namespace App\Bazar\ProductTokenBundle\Helpers;


use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrder;
use App\Bazar\ConnectDBBundle\Helpers\Order;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class TokenOrder
 * @package App\Bazar\ProductTokenBundle\Helpers
 */
class TokenOrder extends Order
{
    /**
     * @var BSaleOrder
     */
    private $order;

    /**
     * TokenOrder constructor.
     * @param EntityManagerInterface $em
     * @param int $orderId
     */
    public function __construct(EntityManagerInterface $em, $orderId)
    {
        parent::__construct($em);
        $this->order = parent::getById($orderId);
        if ($this->order->getPayed() == 'Y'){

        }
    }
}