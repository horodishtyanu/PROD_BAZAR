<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderModules
 *
 * @ORM\Table(name="b_sale_order_modules", indexes={@ORM\Index(name="IX_SALE_ORDER_MDL_DSC", columns={"ORDER_DISCOUNT_ID"})})
 * @ORM\Entity
 */
class BSaleOrderModules
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
     * @ORM\Column(name="ORDER_DISCOUNT_ID", type="integer", nullable=false)
     */
    private $orderDiscountId;

    /**
     * @var string
     *
     * @ORM\Column(name="MODULE_ID", type="string", length=50, nullable=false)
     */
    private $moduleId;


}
