<?php

namespace App\Bazar\ConnectDBBundle\Entity\Basket;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleBasketArchive
 *
 * @ORM\Table(name="b_sale_basket_archive", indexes={@ORM\Index(name="IXS_PRODUCT_ID", columns={"PRODUCT_ID"}), @ORM\Index(name="IXS_ARCHIVE_ID", columns={"ARCHIVE_ID"})})
 * @ORM\Entity
 */
class BSaleBasketArchive
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
     * @ORM\Column(name="ARCHIVE_ID", type="integer", nullable=false)
     */
    private $archiveId;

    /**
     * @var int
     *
     * @ORM\Column(name="PRODUCT_ID", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PRODUCT_PRICE_ID", type="integer", nullable=true)
     */
    private $productPriceId;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CURRENCY", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $currency;

    /**
     * @var float|null
     *
     * @ORM\Column(name="QUANTITY", type="float", precision=18, scale=4, nullable=true)
     */
    private $quantity;

    /**
     * @var float|null
     *
     * @ORM\Column(name="WEIGHT", type="float", precision=18, scale=4, nullable=true)
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSERT", type="datetime", nullable=false)
     */
    private $dateInsert;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MODULE", type="string", length=100, nullable=true)
     */
    private $module;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_XML_ID", type="string", length=100, nullable=true)
     */
    private $productXmlId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TYPE", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SET_PARENT_ID", type="integer", nullable=true)
     */
    private $setParentId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="MEASURE_CODE", type="integer", nullable=true)
     */
    private $measureCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MEASURE_NAME", type="string", length=50, nullable=true)
     */
    private $measureName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BASKET_DATA", type="text", length=16777215, nullable=true)
     */
    private $basketData;


}
