<?php

namespace App\Bazar\ConnectDBBundle\Entity\Basket;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleBasket
 *
 * @ORM\Table(name="b_sale_basket", indexes={@ORM\Index(name="IXS_BASKET_SET_PARENT_ID", columns={"SET_PARENT_ID"}), @ORM\Index(name="IXS_BASKET_PRODUCT_PRICE_ID", columns={"PRODUCT_PRICE_ID"}), @ORM\Index(name="IXS_BASKET_ORDER_ID", columns={"ORDER_ID"}), @ORM\Index(name="IXS_BASKET_LID", columns={"LID"}), @ORM\Index(name="IXS_BASKET_DATE_INSERT", columns={"DATE_INSERT"}), @ORM\Index(name="IXS_SBAS_XML_ID", columns={"PRODUCT_XML_ID", "CATALOG_XML_ID"}), @ORM\Index(name="IXS_BASKET_PRODUCT_ID", columns={"PRODUCT_ID"}), @ORM\Index(name="IXS_BASKET_USER_ID", columns={"FUSER_ID"})})
 * @ORM\Entity
 */
class BSaleBasket
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
     * @ORM\Column(name="FUSER_ID", type="integer", nullable=false)
     */
    private $fuserId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ORDER_ID", type="integer", nullable=true)
     */
    private $orderId;

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
     * @ORM\Column(name="PRICE", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="CURRENCY", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $currency;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSERT", type="datetime", nullable=false)
     */
    private $dateInsert;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_UPDATE", type="datetime", nullable=false)
     */
    private $dateUpdate;

    /**
     * @var float|null
     *
     * @ORM\Column(name="WEIGHT", type="float", precision=18, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @var float
     *
     * @ORM\Column(name="QUANTITY", type="float", precision=18, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $quantity = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="LID", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $lid;

    /**
     * @var string
     *
     * @ORM\Column(name="DELAY", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $delay = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="CAN_BUY", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $canBuy = 'Y';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MODULE", type="string", length=100, nullable=true)
     */
    private $module;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CALLBACK_FUNC", type="string", length=100, nullable=true)
     */
    private $callbackFunc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTES", type="string", length=250, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORDER_CALLBACK_FUNC", type="string", length=100, nullable=true)
     */
    private $orderCallbackFunc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DETAIL_PAGE_URL", type="string", length=250, nullable=true)
     */
    private $detailPageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="DISCOUNT_PRICE", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $discountPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CANCEL_CALLBACK_FUNC", type="string", length=100, nullable=true)
     */
    private $cancelCallbackFunc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAY_CALLBACK_FUNC", type="string", length=100, nullable=true)
     */
    private $payCallbackFunc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_PROVIDER_CLASS", type="string", length=100, nullable=true)
     */
    private $productProviderClass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CATALOG_XML_ID", type="string", length=100, nullable=true)
     */
    private $catalogXmlId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_XML_ID", type="string", length=100, nullable=true)
     */
    private $productXmlId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISCOUNT_NAME", type="string", length=255, nullable=true)
     */
    private $discountName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISCOUNT_VALUE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $discountValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISCOUNT_COUPON", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $discountCoupon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VAT_RATE", type="decimal", precision=18, scale=4, nullable=true, options={"default"="0.0000"})
     */
    private $vatRate = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="SUBSCRIBE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $subscribe = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="DEDUCTED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $deducted = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="RESERVED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $reserved = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="BARCODE_MULTI", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $barcodeMulti = 'N';

    /**
     * @var float|null
     *
     * @ORM\Column(name="RESERVE_QUANTITY", type="float", precision=10, scale=0, nullable=true)
     */
    private $reserveQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="CUSTOM_PRICE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $customPrice = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DIMENSIONS", type="string", length=255, nullable=true)
     */
    private $dimensions;

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
     * @var string|null
     *
     * @ORM\Column(name="MEASURE_NAME", type="string", length=50, nullable=true)
     */
    private $measureName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="MEASURE_CODE", type="integer", nullable=true)
     */
    private $measureCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RECOMMENDATION", type="string", length=40, nullable=true)
     */
    private $recommendation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BASE_PRICE", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $basePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="VAT_INCLUDED", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $vatIncluded = 'Y';

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false, options={"default"="100"})
     */
    private $sort = '100';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getFuserId(): int
    {
        return $this->fuserId;
    }

    /**
     * @param int $fuserId
     */
    public function setFuserId(int $fuserId): void
    {
        $this->fuserId = $fuserId;
    }

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int|null $orderId
     */
    public function setOrderId(?int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int|null
     */
    public function getProductPriceId(): ?int
    {
        return $this->productPriceId;
    }

    /**
     * @param int|null $productPriceId
     */
    public function setProductPriceId(?int $productPriceId): void
    {
        $this->productPriceId = $productPriceId;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return \DateTime
     */
    public function getDateInsert(): \DateTime
    {
        return $this->dateInsert;
    }

    /**
     * @param \DateTime $dateInsert
     */
    public function setDateInsert(\DateTime $dateInsert): void
    {
        $this->dateInsert = $dateInsert;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdate(): \DateTime
    {
        return $this->dateUpdate;
    }

    /**
     * @param \DateTime $dateUpdate
     */
    public function setDateUpdate(\DateTime $dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getLid(): string
    {
        return $this->lid;
    }

    /**
     * @param string $lid
     */
    public function setLid(string $lid): void
    {
        $this->lid = $lid;
    }

    /**
     * @return string
     */
    public function getDelay(): string
    {
        return $this->delay;
    }

    /**
     * @param string $delay
     */
    public function setDelay(string $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCanBuy(): string
    {
        return $this->canBuy;
    }

    /**
     * @param string $canBuy
     */
    public function setCanBuy(string $canBuy): void
    {
        $this->canBuy = $canBuy;
    }

    /**
     * @return string|null
     */
    public function getModule(): ?string
    {
        return $this->module;
    }

    /**
     * @param string|null $module
     */
    public function setModule(?string $module): void
    {
        $this->module = $module;
    }

    /**
     * @return string|null
     */
    public function getCallbackFunc(): ?string
    {
        return $this->callbackFunc;
    }

    /**
     * @param string|null $callbackFunc
     */
    public function setCallbackFunc(?string $callbackFunc): void
    {
        $this->callbackFunc = $callbackFunc;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return string|null
     */
    public function getOrderCallbackFunc(): ?string
    {
        return $this->orderCallbackFunc;
    }

    /**
     * @param string|null $orderCallbackFunc
     */
    public function setOrderCallbackFunc(?string $orderCallbackFunc): void
    {
        $this->orderCallbackFunc = $orderCallbackFunc;
    }

    /**
     * @return string|null
     */
    public function getDetailPageUrl(): ?string
    {
        return $this->detailPageUrl;
    }

    /**
     * @param string|null $detailPageUrl
     */
    public function setDetailPageUrl(?string $detailPageUrl): void
    {
        $this->detailPageUrl = $detailPageUrl;
    }

    /**
     * @return string
     */
    public function getDiscountPrice(): string
    {
        return $this->discountPrice;
    }

    /**
     * @param string $discountPrice
     */
    public function setDiscountPrice(string $discountPrice): void
    {
        $this->discountPrice = $discountPrice;
    }

    /**
     * @return string|null
     */
    public function getCancelCallbackFunc(): ?string
    {
        return $this->cancelCallbackFunc;
    }

    /**
     * @param string|null $cancelCallbackFunc
     */
    public function setCancelCallbackFunc(?string $cancelCallbackFunc): void
    {
        $this->cancelCallbackFunc = $cancelCallbackFunc;
    }

    /**
     * @return string|null
     */
    public function getPayCallbackFunc(): ?string
    {
        return $this->payCallbackFunc;
    }

    /**
     * @param string|null $payCallbackFunc
     */
    public function setPayCallbackFunc(?string $payCallbackFunc): void
    {
        $this->payCallbackFunc = $payCallbackFunc;
    }

    /**
     * @return string|null
     */
    public function getProductProviderClass(): ?string
    {
        return $this->productProviderClass;
    }

    /**
     * @param string|null $productProviderClass
     */
    public function setProductProviderClass(?string $productProviderClass): void
    {
        $this->productProviderClass = $productProviderClass;
    }

    /**
     * @return string|null
     */
    public function getCatalogXmlId(): ?string
    {
        return $this->catalogXmlId;
    }

    /**
     * @param string|null $catalogXmlId
     */
    public function setCatalogXmlId(?string $catalogXmlId): void
    {
        $this->catalogXmlId = $catalogXmlId;
    }

    /**
     * @return string|null
     */
    public function getProductXmlId(): ?string
    {
        return $this->productXmlId;
    }

    /**
     * @param string|null $productXmlId
     */
    public function setProductXmlId(?string $productXmlId): void
    {
        $this->productXmlId = $productXmlId;
    }

    /**
     * @return string|null
     */
    public function getDiscountName(): ?string
    {
        return $this->discountName;
    }

    /**
     * @param string|null $discountName
     */
    public function setDiscountName(?string $discountName): void
    {
        $this->discountName = $discountName;
    }

    /**
     * @return string|null
     */
    public function getDiscountValue(): ?string
    {
        return $this->discountValue;
    }

    /**
     * @param string|null $discountValue
     */
    public function setDiscountValue(?string $discountValue): void
    {
        $this->discountValue = $discountValue;
    }

    /**
     * @return string|null
     */
    public function getDiscountCoupon(): ?string
    {
        return $this->discountCoupon;
    }

    /**
     * @param string|null $discountCoupon
     */
    public function setDiscountCoupon(?string $discountCoupon): void
    {
        $this->discountCoupon = $discountCoupon;
    }

    /**
     * @return string|null
     */
    public function getVatRate(): ?string
    {
        return $this->vatRate;
    }

    /**
     * @param string|null $vatRate
     */
    public function setVatRate(?string $vatRate): void
    {
        $this->vatRate = $vatRate;
    }

    /**
     * @return string
     */
    public function getSubscribe(): string
    {
        return $this->subscribe;
    }

    /**
     * @param string $subscribe
     */
    public function setSubscribe(string $subscribe): void
    {
        $this->subscribe = $subscribe;
    }

    /**
     * @return string
     */
    public function getDeducted(): string
    {
        return $this->deducted;
    }

    /**
     * @param string $deducted
     */
    public function setDeducted(string $deducted): void
    {
        $this->deducted = $deducted;
    }

    /**
     * @return string
     */
    public function getReserved(): string
    {
        return $this->reserved;
    }

    /**
     * @param string $reserved
     */
    public function setReserved(string $reserved): void
    {
        $this->reserved = $reserved;
    }

    /**
     * @return string
     */
    public function getBarcodeMulti(): string
    {
        return $this->barcodeMulti;
    }

    /**
     * @param string $barcodeMulti
     */
    public function setBarcodeMulti(string $barcodeMulti): void
    {
        $this->barcodeMulti = $barcodeMulti;
    }

    /**
     * @return float|null
     */
    public function getReserveQuantity(): ?float
    {
        return $this->reserveQuantity;
    }

    /**
     * @param float|null $reserveQuantity
     */
    public function setReserveQuantity(?float $reserveQuantity): void
    {
        $this->reserveQuantity = $reserveQuantity;
    }

    /**
     * @return string
     */
    public function getCustomPrice(): string
    {
        return $this->customPrice;
    }

    /**
     * @param string $customPrice
     */
    public function setCustomPrice(string $customPrice): void
    {
        $this->customPrice = $customPrice;
    }

    /**
     * @return string|null
     */
    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    /**
     * @param string|null $dimensions
     */
    public function setDimensions(?string $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     */
    public function setType(?int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getSetParentId(): ?int
    {
        return $this->setParentId;
    }

    /**
     * @param int|null $setParentId
     */
    public function setSetParentId(?int $setParentId): void
    {
        $this->setParentId = $setParentId;
    }

    /**
     * @return string|null
     */
    public function getMeasureName(): ?string
    {
        return $this->measureName;
    }

    /**
     * @param string|null $measureName
     */
    public function setMeasureName(?string $measureName): void
    {
        $this->measureName = $measureName;
    }

    /**
     * @return int|null
     */
    public function getMeasureCode(): ?int
    {
        return $this->measureCode;
    }

    /**
     * @param int|null $measureCode
     */
    public function setMeasureCode(?int $measureCode): void
    {
        $this->measureCode = $measureCode;
    }

    /**
     * @return string|null
     */
    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }

    /**
     * @param string|null $recommendation
     */
    public function setRecommendation(?string $recommendation): void
    {
        $this->recommendation = $recommendation;
    }

    /**
     * @return string|null
     */
    public function getBasePrice(): ?string
    {
        return $this->basePrice;
    }

    /**
     * @param string|null $basePrice
     */
    public function setBasePrice(?string $basePrice): void
    {
        $this->basePrice = $basePrice;
    }

    /**
     * @return string
     */
    public function getVatIncluded(): string
    {
        return $this->vatIncluded;
    }

    /**
     * @param string $vatIncluded
     */
    public function setVatIncluded(string $vatIncluded): void
    {
        $this->vatIncluded = $vatIncluded;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     */
    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }



}
