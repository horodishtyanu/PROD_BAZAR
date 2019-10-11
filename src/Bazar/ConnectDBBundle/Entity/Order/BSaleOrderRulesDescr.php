<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderRulesDescr
 *
 * @ORM\Table(name="b_sale_order_rules_descr", indexes={@ORM\Index(name="IX_SALE_ORDER_RULES_DS_ORD", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderRulesDescr
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
     * @ORM\Column(name="RULE_ID", type="integer", nullable=false)
     */
    private $ruleId;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCR", type="text", length=65535, nullable=false)
     */
    private $descr;


}
