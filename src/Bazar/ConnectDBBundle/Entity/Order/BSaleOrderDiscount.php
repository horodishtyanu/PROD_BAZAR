<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDiscount
 *
 * @ORM\Table(name="b_sale_order_discount", indexes={@ORM\Index(name="IX_SALE_ORDER_DSC_HASH", columns={"DISCOUNT_HASH"})})
 * @ORM\Entity
 */
class BSaleOrderDiscount
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
     * @ORM\Column(name="DISCOUNT_ID", type="integer", nullable=false)
     */
    private $discountId;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="DISCOUNT_HASH", type="string", length=32, nullable=false)
     */
    private $discountHash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONDITIONS", type="text", length=16777215, nullable=true)
     */
    private $conditions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UNPACK", type="text", length=16777215, nullable=true)
     */
    private $unpack;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTIONS", type="text", length=16777215, nullable=true)
     */
    private $actions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APPLICATION", type="text", length=16777215, nullable=true)
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="USE_COUPONS", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $useCoupons;

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var int
     *
     * @ORM\Column(name="PRIORITY", type="integer", nullable=false)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="LAST_DISCOUNT", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $lastDiscount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTIONS_DESCR", type="text", length=16777215, nullable=true)
     */
    private $actionsDescr;


}
