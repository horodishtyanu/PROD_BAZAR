<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderTax
 *
 * @ORM\Table(name="b_sale_order_tax", indexes={@ORM\Index(name="ixs_sot_order_id", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderTax
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
     * @var string
     *
     * @ORM\Column(name="TAX_NAME", type="string", length=255, nullable=false)
     */
    private $taxName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALUE", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="VALUE_MONEY", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $valueMoney;

    /**
     * @var int
     *
     * @ORM\Column(name="APPLY_ORDER", type="integer", nullable=false)
     */
    private $applyOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=50, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_PERCENT", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $isPercent = 'Y';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_IN_PRICE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isInPrice = 'N';


}
