<?php

namespace App\Bazar\ConnectDBBundle\Entity\Basket;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleBasketProps
 *
 * @ORM\Table(name="b_sale_basket_props", indexes={@ORM\Index(name="IXS_BASKET_PROPS_BASKET", columns={"BASKET_ID"}), @ORM\Index(name="IXS_BASKET_PROPS_CODE", columns={"CODE"})})
 * @ORM\Entity
 */
class BSaleBasketProps
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
     * @ORM\Column(name="BASKET_ID", type="integer", nullable=false)
     */
    private $basketId;

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
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false, options={"default"="100"})
     */
    private $sort = '100';


}
