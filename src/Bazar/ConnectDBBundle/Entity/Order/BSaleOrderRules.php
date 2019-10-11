<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderRules
 *
 * @ORM\Table(name="b_sale_order_rules", indexes={@ORM\Index(name="IX_SALE_ORDER_RULES_ORD", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderRules
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
     * @var string
     *
     * @ORM\Column(name="MODULE_ID", type="string", length=50, nullable=false)
     */
    private $moduleId;

    /**
     * @var int
     *
     * @ORM\Column(name="ORDER_DISCOUNT_ID", type="integer", nullable=false)
     */
    private $orderDiscountId;

    /**
     * @var int
     *
     * @ORM\Column(name="ORDER_ID", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var int
     *
     * @ORM\Column(name="ENTITY_TYPE", type="integer", nullable=false)
     */
    private $entityType;

    /**
     * @var int
     *
     * @ORM\Column(name="ENTITY_ID", type="integer", nullable=false)
     */
    private $entityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ENTITY_VALUE", type="string", length=255, nullable=true)
     */
    private $entityValue;

    /**
     * @var int
     *
     * @ORM\Column(name="COUPON_ID", type="integer", nullable=false)
     */
    private $couponId;

    /**
     * @var string
     *
     * @ORM\Column(name="APPLY", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $apply;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTION_BLOCK_LIST", type="text", length=65535, nullable=true)
     */
    private $actionBlockList;

    /**
     * @var int
     *
     * @ORM\Column(name="APPLY_BLOCK_COUNTER", type="integer", nullable=false)
     */
    private $applyBlockCounter = '0';


}
