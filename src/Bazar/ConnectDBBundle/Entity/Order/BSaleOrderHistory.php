<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderHistory
 *
 * @ORM\Table(name="b_sale_order_history", indexes={@ORM\Index(name="ixH_ORDER_ID", columns={"H_ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="H_USER_ID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="H_DATE_INSERT", type="datetime", nullable=false)
     */
    private $hDateInsert;

    /**
     * @var int
     *
     * @ORM\Column(name="H_ORDER_ID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hOrderId;

    /**
     * @var string
     *
     * @ORM\Column(name="H_CURRENCY", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $hCurrency;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PERSON_TYPE_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $personTypeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAYED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $payed;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_PAYED", type="datetime", nullable=true)
     */
    private $datePayed;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_PAYED_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $empPayedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CANCELED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $canceled;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_CANCELED", type="datetime", nullable=true)
     */
    private $dateCanceled;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REASON_CANCELED", type="string", length=255, nullable=true)
     */
    private $reasonCanceled;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS_ID", type="string", length=2, nullable=false)
     */
    private $statusId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_STATUS", type="datetime", nullable=true)
     */
    private $dateStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE_DELIVERY", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $priceDelivery;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ALLOW_DELIVERY", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $allowDelivery;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ALLOW_DELIVERY", type="datetime", nullable=true)
     */
    private $dateAllowDelivery;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEDUCTED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $deducted;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_DEDUCTED", type="datetime", nullable=true)
     */
    private $dateDeducted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REASON_UNDO_DEDUCTED", type="string", length=255, nullable=true)
     */
    private $reasonUndoDeducted;

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
     * @var string|null
     *
     * @ORM\Column(name="REASON_MARKED", type="string", length=255, nullable=true)
     */
    private $reasonMarked;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CURRENCY", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $currency;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISCOUNT_VALUE", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $discountValue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="USER_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $userId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PAY_SYSTEM_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $paySystemId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_ID", type="string", length=50, nullable=true)
     */
    private $deliveryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $psStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS_CODE", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $psStatusCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS_DESCRIPTION", type="string", length=250, nullable=true)
     */
    private $psStatusDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS_MESSAGE", type="string", length=250, nullable=true)
     */
    private $psStatusMessage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_SUM", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $psSum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_CURRENCY", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $psCurrency;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PS_RESPONSE_DATE", type="datetime", nullable=true)
     */
    private $psResponseDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TAX_VALUE", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $taxValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STAT_GID", type="string", length=255, nullable=true)
     */
    private $statGid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUM_PAID", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $sumPaid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAY_VOUCHER_NUM", type="string", length=20, nullable=true)
     */
    private $payVoucherNum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PAY_VOUCHER_DATE", type="date", nullable=true)
     */
    private $payVoucherDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="AFFILIATE_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $affiliateId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_DOC_NUM", type="string", length=20, nullable=true)
     */
    private $deliveryDocNum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DELIVERY_DOC_DATE", type="date", nullable=true)
     */
    private $deliveryDocDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RESERVED", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $reserved;


}
