<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDlvBasket
 *
 * @ORM\Table(name="b_sale_order_dlv_basket", indexes={@ORM\Index(name="IX_BSODB_ORDER_DELIVERY_ID", columns={"ORDER_DELIVERY_ID"}), @ORM\Index(name="IX_S_O_DB_BASKET_ID", columns={"BASKET_ID"})})
 * @ORM\Entity
 */
class BSaleOrderDlvBasket
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ORDER_DELIVERY_ID", type="integer", nullable=false)
     */
    private $orderDeliveryId;

    /**
     * @var int
     *
     * @ORM\Column(name="BASKET_ID", type="integer", nullable=false)
     */
    private $basketId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSERT", type="datetime", nullable=false)
     */
    private $dateInsert;

    /**
     * @var string
     *
     * @ORM\Column(name="QUANTITY", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="RESERVED_QUANTITY", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $reservedQuantity;


}
