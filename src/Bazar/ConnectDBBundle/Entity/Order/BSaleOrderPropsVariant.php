<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPropsVariant
 *
 * @ORM\Table(name="b_sale_order_props_variant", indexes={@ORM\Index(name="IXS_ORDER_PROPS_VARIANT_ORDER_PROPS_ID", columns={"ORDER_PROPS_ID"})})
 * @ORM\Entity
 */
class BSaleOrderPropsVariant
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
     * @ORM\Column(name="ORDER_PROPS_ID", type="integer", nullable=false)
     */
    private $orderPropsId;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALUE", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false, options={"default"="100"})
     */
    private $sort = '100';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=255, nullable=true)
     */
    private $description;


}
