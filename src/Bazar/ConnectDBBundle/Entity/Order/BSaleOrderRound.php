<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderRound
 *
 * @ORM\Table(name="b_sale_order_round", indexes={@ORM\Index(name="IX_SALE_ORDER_ROUND_ORD", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderRound
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
     * @ORM\Column(name="APPLY_BLOCK_COUNTER", type="integer", nullable=false)
     */
    private $applyBlockCounter = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ORDER_ROUND", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $orderRound;

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
     * @var string
     *
     * @ORM\Column(name="APPLY", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $apply;

    /**
     * @var string
     *
     * @ORM\Column(name="ROUND_RULE", type="text", length=16777215, nullable=false)
     */
    private $roundRule;


}
