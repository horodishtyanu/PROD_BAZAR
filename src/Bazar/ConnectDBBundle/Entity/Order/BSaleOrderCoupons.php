<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderCoupons
 *
 * @ORM\Table(name="b_sale_order_coupons", indexes={@ORM\Index(name="IX_SALE_ORDER_CPN_ORDER", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderCoupons
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
     * @ORM\Column(name="ORDER_ID", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var int
     *
     * @ORM\Column(name="ORDER_DISCOUNT_ID", type="integer", nullable=false)
     */
    private $orderDiscountId;

    /**
     * @var string
     *
     * @ORM\Column(name="COUPON", type="string", length=32, nullable=false)
     */
    private $coupon;

    /**
     * @var int
     *
     * @ORM\Column(name="COUPON_ID", type="integer", nullable=false)
     */
    private $couponId;

    /**
     * @var int
     *
     * @ORM\Column(name="TYPE", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATA", type="text", length=65535, nullable=true)
     */
    private $data;


}
