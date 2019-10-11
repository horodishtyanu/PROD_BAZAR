<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDelivery
 *
 * @ORM\Table(name="b_sale_order_delivery", uniqueConstraints={@ORM\UniqueConstraint(name="IXS_DLV_ACCOUNT_NUMBER", columns={"ACCOUNT_NUMBER"})}, indexes={@ORM\Index(name="IX_BSOD_DATE_CANCELED", columns={"DATE_CANCELED"}), @ORM\Index(name="IX_BSOD_DATE_ALLOW_DELIVERY", columns={"DATE_ALLOW_DELIVERY"}), @ORM\Index(name="IX_BSOD_CANCELED", columns={"CANCELED"}), @ORM\Index(name="IX_BSOD_ALLOW_DELIVERY", columns={"ALLOW_DELIVERY"}), @ORM\Index(name="IX_BSOD_ORDER_ID", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderDelivery
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
     * @var string|null
     *
     * @ORM\Column(name="ACCOUNT_NUMBER", type="string", length=100, nullable=true)
     */
    private $accountNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSERT", type="datetime", nullable=false)
     */
    private $dateInsert;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_REQUEST", type="datetime", nullable=true)
     */
    private $dateRequest;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_UPDATE", type="datetime", nullable=true)
     */
    private $dateUpdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_LOCATION", type="string", length=50, nullable=true)
     */
    private $deliveryLocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PARAMS", type="text", length=65535, nullable=true)
     */
    private $params;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS_ID", type="string", length=2, nullable=false)
     */
    private $statusId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE_DELIVERY", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $priceDelivery;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_PRICE_DELIVERY", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $customPriceDelivery;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BASE_PRICE_DELIVERY", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $basePriceDelivery;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ALLOW_DELIVERY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $allowDelivery = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ALLOW_DELIVERY", type="datetime", nullable=true)
     */
    private $dateAllowDelivery;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_ALLOW_DELIVERY_ID", type="integer", nullable=true)
     */
    private $empAllowDeliveryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEDUCTED", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $deducted = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_DEDUCTED", type="datetime", nullable=true)
     */
    private $dateDeducted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_DEDUCTED_ID", type="integer", nullable=true)
     */
    private $empDeductedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REASON_UNDO_DEDUCTED", type="string", length=255, nullable=true)
     */
    private $reasonUndoDeducted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RESERVED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $reserved;

    /**
     * @var int
     *
     * @ORM\Column(name="DELIVERY_ID", type="integer", nullable=false)
     */
    private $deliveryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_DOC_NUM", type="string", length=20, nullable=true)
     */
    private $deliveryDocNum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DELIVERY_DOC_DATE", type="datetime", nullable=true)
     */
    private $deliveryDocDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRACKING_NUMBER", type="string", length=255, nullable=true)
     */
    private $trackingNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="XML_ID", type="string", length=255, nullable=true)
     */
    private $xmlId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_NAME", type="string", length=128, nullable=true)
     */
    private $deliveryName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CANCELED", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $canceled = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_CANCELED", type="datetime", nullable=true)
     */
    private $dateCanceled;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_CANCELED_ID", type="integer", nullable=true)
     */
    private $empCanceledId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REASON_CANCELED", type="string", length=255, nullable=true)
     */
    private $reasonCanceled = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MARKED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $marked;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_MARKED", type="datetime", nullable=true)
     */
    private $dateMarked;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_MARKED_ID", type="integer", nullable=true)
     */
    private $empMarkedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REASON_MARKED", type="string", length=255, nullable=true)
     */
    private $reasonMarked;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CURRENCY", type="string", length=3, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="SYSTEM", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $system = 'N';

    /**
     * @var int|null
     *
     * @ORM\Column(name="RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $responsibleId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $empResponsibleId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_RESPONSIBLE_ID", type="datetime", nullable=true)
     */
    private $dateResponsibleId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMMENTS", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISCOUNT_PRICE", type="decimal", precision=18, scale=4, nullable=true)
     */
    private $discountPrice;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMPANY_ID", type="integer", nullable=true)
     */
    private $companyId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TRACKING_STATUS", type="integer", nullable=true)
     */
    private $trackingStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRACKING_DESCRIPTION", type="string", length=255, nullable=true)
     */
    private $trackingDescription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRACKING_LAST_CHECK", type="datetime", nullable=true)
     */
    private $trackingLastCheck;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRACKING_LAST_CHANGE", type="datetime", nullable=true)
     */
    private $trackingLastChange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ID_1C", type="string", length=36, nullable=true)
     */
    private $id1c;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VERSION_1C", type="string", length=15, nullable=true)
     */
    private $version1c;

    /**
     * @var string
     *
     * @ORM\Column(name="EXTERNAL_DELIVERY", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $externalDelivery = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="UPDATED_1C", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $updated1c = 'N';


}
