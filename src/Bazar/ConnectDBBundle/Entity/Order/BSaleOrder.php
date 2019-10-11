<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use App\Bazar\ConnectDBBundle\Entity\Basket\BSaleBasket;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

/**
 * BSaleOrder
 *
 * @property BSaleBasket|object basket
 * @ORM\Table(name="b_sale_order", uniqueConstraints={@ORM\UniqueConstraint(name="IXS_ACCOUNT_NUMBER", columns={"ACCOUNT_NUMBER"})}, indexes={@ORM\Index(name="IX_BSO_DATE_PAY_BEFORE", columns={"DATE_PAY_BEFORE"}), @ORM\Index(name="IX_BSO_DATE_PAYED", columns={"DATE_PAYED"}), @ORM\Index(name="IX_BSO_DATE_CANCELED", columns={"DATE_CANCELED"}), @ORM\Index(name="IX_BSO_DATE_ALLOW_DELIVERY", columns={"DATE_ALLOW_DELIVERY"}), @ORM\Index(name="IXS_XML_ID", columns={"XML_ID"}), @ORM\Index(name="IXS_ORDER_UPDATED_1C", columns={"UPDATED_1C"}), @ORM\Index(name="IXS_ORDER_REC_ID", columns={"RECURRING_ID"}), @ORM\Index(name="IXS_ORDER_PERSON_TYPE_ID", columns={"PERSON_TYPE_ID"}), @ORM\Index(name="IX_BSO_DATE_INSERT", columns={"DATE_INSERT"}), @ORM\Index(name="IX_BSO_CANCELED", columns={"CANCELED"}), @ORM\Index(name="IX_BSO_ALLOW_DELIVERY", columns={"ALLOW_DELIVERY"}), @ORM\Index(name="IXS_ID_1C", columns={"ID_1C"}), @ORM\Index(name="IXS_DATE_UPDATE", columns={"DATE_UPDATE"}), @ORM\Index(name="IXS_SALE_COUNT", columns={"USER_ID", "LID", "PAYED", "CANCELED"}), @ORM\Index(name="IX_SOO_AFFILIATE_ID", columns={"AFFILIATE_ID"}), @ORM\Index(name="IXS_ORDER_STATUS_ID", columns={"STATUS_ID"}), @ORM\Index(name="IXS_ORDER_USER_ID", columns={"USER_ID"})})
 * @ORM\Entity
 */
class BSaleOrder
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
     * @ORM\Column(name="LID", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $lid;

    /**
     * @var int
     *
     * @ORM\Column(name="PERSON_TYPE_ID", type="integer", nullable=false)
     */
    private $personTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="PAYED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $payed = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_PAYED", type="datetime", nullable=true)
     */
    private $datePayed;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_PAYED_ID", type="integer", nullable=true)
     */
    private $empPayedId;

    /**
     * @var string
     *
     * @ORM\Column(name="CANCELED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
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
    private $reasonCanceled;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS_ID", type="string", length=2, nullable=false)
     */
    private $statusId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_STATUS", type="datetime", nullable=false)
     */
    private $dateStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_STATUS_ID", type="integer", nullable=true)
     */
    private $empStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="PRICE_DELIVERY", type="decimal", precision=18, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $priceDelivery = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="ALLOW_DELIVERY", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
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
     * @var string
     *
     * @ORM\Column(name="DEDUCTED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
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
     * @var string
     *
     * @ORM\Column(name="MARKED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $marked = 'N';

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
     * @var string
     *
     * @ORM\Column(name="RESERVED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $reserved = 'N';

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
     * @var string
     *
     * @ORM\Column(name="DISCOUNT_VALUE", type="decimal", precision=18, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $discountValue = '0.0000';

    /**
     * @var int
     *
     * @ORM\Column(name="USER_ID", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PAY_SYSTEM_ID", type="integer", nullable=true)
     */
    private $paySystemId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_ID", type="string", length=50, nullable=true)
     */
    private $deliveryId;

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
     * @var string|null
     *
     * @ORM\Column(name="USER_DESCRIPTION", type="string", length=2000, nullable=true)
     */
    private $userDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADDITIONAL_INFO", type="string", length=255, nullable=true)
     */
    private $additionalInfo;

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
     * @ORM\Column(name="COMMENTS", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="TAX_VALUE", type="decimal", precision=18, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $taxValue = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="STAT_GID", type="string", length=255, nullable=true)
     */
    private $statGid;

    /**
     * @var string
     *
     * @ORM\Column(name="SUM_PAID", type="decimal", precision=18, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $sumPaid = '0.00';

    /**
     * @var int|null
     *
     * @ORM\Column(name="RECURRING_ID", type="integer", nullable=true)
     */
    private $recurringId;

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
     * @ORM\Column(name="LOCKED_BY", type="integer", nullable=true)
     */
    private $lockedBy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_LOCK", type="datetime", nullable=true)
     */
    private $dateLock;

    /**
     * @var string
     *
     * @ORM\Column(name="RECOUNT_FLAG", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $recountFlag = 'Y';

    /**
     * @var int|null
     *
     * @ORM\Column(name="AFFILIATE_ID", type="integer", nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="UPDATED_1C", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $updated1c = 'N';

    /**
     * @var int|null
     *
     * @ORM\Column(name="STORE_ID", type="integer", nullable=true)
     */
    private $storeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORDER_TOPIC", type="string", length=255, nullable=true)
     */
    private $orderTopic;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $responsibleId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_PAY_BEFORE", type="datetime", nullable=true)
     */
    private $datePayBefore;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCOUNT_NUMBER", type="string", length=100, nullable=true)
     */
    private $accountNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_BILL", type="datetime", nullable=true)
     */
    private $dateBill;

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
     * @var int
     *
     * @ORM\Column(name="VERSION", type="integer", nullable=false)
     */
    private $version = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="EXTERNAL_ORDER", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $externalOrder = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="BX_USER_ID", type="string", length=32, nullable=true)
     */
    private $bxUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="PRICE_PAYMENT", type="decimal", precision=18, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $pricePayment = '0.0000';

    /**
     * @var int|null
     *
     * @ORM\Column(name="CREATED_BY", type="integer", nullable=true)
     */
    private $createdBy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMPANY_ID", type="integer", nullable=true)
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_RECURRING", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isRecurring = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="RUNNING", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $running = 'N';


    /**
     * @var array|object[]
     */
    public $orderProps;

    /**
     * @return array|object[]
     */
    public function getOrderProps()
    {
        return $this->orderProps;
    }

    /**
     * @param array|object[] $orderProps
     */
    public function setOrderProps($orderProps): void
    {
        $this->orderProps = $orderProps;
    }



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
     * @return int
     */
    public function getPersonTypeId(): int
    {
        return $this->personTypeId;
    }

    /**
     * @param int $personTypeId
     */
    public function setPersonTypeId(int $personTypeId): void
    {
        $this->personTypeId = $personTypeId;
    }

    /**
     * @return string
     */
    public function getPayed(): string
    {
        return $this->payed;
    }

    /**
     * @param string $payed
     */
    public function setPayed(string $payed): void
    {
        $this->payed = $payed;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatePayed(): ?\DateTime
    {
        return $this->datePayed;
    }

    /**
     * @param \DateTime|null $datePayed
     */
    public function setDatePayed(?\DateTime $datePayed): void
    {
        $this->datePayed = $datePayed;
    }

    /**
     * @return int|null
     */
    public function getEmpPayedId(): ?int
    {
        return $this->empPayedId;
    }

    /**
     * @param int|null $empPayedId
     */
    public function setEmpPayedId(?int $empPayedId): void
    {
        $this->empPayedId = $empPayedId;
    }

    /**
     * @return string
     */
    public function getCanceled(): string
    {
        return $this->canceled;
    }

    /**
     * @param string $canceled
     */
    public function setCanceled(string $canceled): void
    {
        $this->canceled = $canceled;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateCanceled(): ?\DateTime
    {
        return $this->dateCanceled;
    }

    /**
     * @param \DateTime|null $dateCanceled
     */
    public function setDateCanceled(?\DateTime $dateCanceled): void
    {
        $this->dateCanceled = $dateCanceled;
    }

    /**
     * @return int|null
     */
    public function getEmpCanceledId(): ?int
    {
        return $this->empCanceledId;
    }

    /**
     * @param int|null $empCanceledId
     */
    public function setEmpCanceledId(?int $empCanceledId): void
    {
        $this->empCanceledId = $empCanceledId;
    }

    /**
     * @return string|null
     */
    public function getReasonCanceled(): ?string
    {
        return $this->reasonCanceled;
    }

    /**
     * @param string|null $reasonCanceled
     */
    public function setReasonCanceled(?string $reasonCanceled): void
    {
        $this->reasonCanceled = $reasonCanceled;
    }

    /**
     * @return string
     */
    public function getStatusId(): string
    {
        return $this->statusId;
    }

    /**
     * @param string $statusId
     */
    public function setStatusId(string $statusId): void
    {
        $this->statusId = $statusId;
    }

    /**
     * @return \DateTime
     */
    public function getDateStatus(): \DateTime
    {
        return $this->dateStatus;
    }

    /**
     * @param \DateTime $dateStatus
     */
    public function setDateStatus(\DateTime $dateStatus): void
    {
        $this->dateStatus = $dateStatus;
    }

    /**
     * @return int|null
     */
    public function getEmpStatusId(): ?int
    {
        return $this->empStatusId;
    }

    /**
     * @param int|null $empStatusId
     */
    public function setEmpStatusId(?int $empStatusId): void
    {
        $this->empStatusId = $empStatusId;
    }

    /**
     * @return string
     */
    public function getPriceDelivery(): string
    {
        return $this->priceDelivery;
    }

    /**
     * @param string $priceDelivery
     */
    public function setPriceDelivery(string $priceDelivery): void
    {
        $this->priceDelivery = $priceDelivery;
    }

    /**
     * @return string
     */
    public function getAllowDelivery(): string
    {
        return $this->allowDelivery;
    }

    /**
     * @param string $allowDelivery
     */
    public function setAllowDelivery(string $allowDelivery): void
    {
        $this->allowDelivery = $allowDelivery;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateAllowDelivery(): ?\DateTime
    {
        return $this->dateAllowDelivery;
    }

    /**
     * @param \DateTime|null $dateAllowDelivery
     */
    public function setDateAllowDelivery(?\DateTime $dateAllowDelivery): void
    {
        $this->dateAllowDelivery = $dateAllowDelivery;
    }

    /**
     * @return int|null
     */
    public function getEmpAllowDeliveryId(): ?int
    {
        return $this->empAllowDeliveryId;
    }

    /**
     * @param int|null $empAllowDeliveryId
     */
    public function setEmpAllowDeliveryId(?int $empAllowDeliveryId): void
    {
        $this->empAllowDeliveryId = $empAllowDeliveryId;
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
     * @return \DateTime|null
     */
    public function getDateDeducted(): ?\DateTime
    {
        return $this->dateDeducted;
    }

    /**
     * @param \DateTime|null $dateDeducted
     */
    public function setDateDeducted(?\DateTime $dateDeducted): void
    {
        $this->dateDeducted = $dateDeducted;
    }

    /**
     * @return int|null
     */
    public function getEmpDeductedId(): ?int
    {
        return $this->empDeductedId;
    }

    /**
     * @param int|null $empDeductedId
     */
    public function setEmpDeductedId(?int $empDeductedId): void
    {
        $this->empDeductedId = $empDeductedId;
    }

    /**
     * @return string|null
     */
    public function getReasonUndoDeducted(): ?string
    {
        return $this->reasonUndoDeducted;
    }

    /**
     * @param string|null $reasonUndoDeducted
     */
    public function setReasonUndoDeducted(?string $reasonUndoDeducted): void
    {
        $this->reasonUndoDeducted = $reasonUndoDeducted;
    }

    /**
     * @return string
     */
    public function getMarked(): string
    {
        return $this->marked;
    }

    /**
     * @param string $marked
     */
    public function setMarked(string $marked): void
    {
        $this->marked = $marked;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateMarked(): ?\DateTime
    {
        return $this->dateMarked;
    }

    /**
     * @param \DateTime|null $dateMarked
     */
    public function setDateMarked(?\DateTime $dateMarked): void
    {
        $this->dateMarked = $dateMarked;
    }

    /**
     * @return int|null
     */
    public function getEmpMarkedId(): ?int
    {
        return $this->empMarkedId;
    }

    /**
     * @param int|null $empMarkedId
     */
    public function setEmpMarkedId(?int $empMarkedId): void
    {
        $this->empMarkedId = $empMarkedId;
    }

    /**
     * @return string|null
     */
    public function getReasonMarked(): ?string
    {
        return $this->reasonMarked;
    }

    /**
     * @param string|null $reasonMarked
     */
    public function setReasonMarked(?string $reasonMarked): void
    {
        $this->reasonMarked = $reasonMarked;
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
     * @return string
     */
    public function getDiscountValue(): string
    {
        return $this->discountValue;
    }

    /**
     * @param string $discountValue
     */
    public function setDiscountValue(string $discountValue): void
    {
        $this->discountValue = $discountValue;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int|null
     */
    public function getPaySystemId(): ?int
    {
        return $this->paySystemId;
    }

    /**
     * @param int|null $paySystemId
     */
    public function setPaySystemId(?int $paySystemId): void
    {
        $this->paySystemId = $paySystemId;
    }

    /**
     * @return string|null
     */
    public function getDeliveryId(): ?string
    {
        return $this->deliveryId;
    }

    /**
     * @param string|null $deliveryId
     */
    public function setDeliveryId(?string $deliveryId): void
    {
        $this->deliveryId = $deliveryId;
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
     * @return string|null
     */
    public function getUserDescription(): ?string
    {
        return $this->userDescription;
    }

    /**
     * @param string|null $userDescription
     */
    public function setUserDescription(?string $userDescription): void
    {
        $this->userDescription = $userDescription;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    /**
     * @param string|null $additionalInfo
     */
    public function setAdditionalInfo(?string $additionalInfo): void
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return string|null
     */
    public function getPsStatus(): ?string
    {
        return $this->psStatus;
    }

    /**
     * @param string|null $psStatus
     */
    public function setPsStatus(?string $psStatus): void
    {
        $this->psStatus = $psStatus;
    }

    /**
     * @return string|null
     */
    public function getPsStatusCode(): ?string
    {
        return $this->psStatusCode;
    }

    /**
     * @param string|null $psStatusCode
     */
    public function setPsStatusCode(?string $psStatusCode): void
    {
        $this->psStatusCode = $psStatusCode;
    }

    /**
     * @return string|null
     */
    public function getPsStatusDescription(): ?string
    {
        return $this->psStatusDescription;
    }

    /**
     * @param string|null $psStatusDescription
     */
    public function setPsStatusDescription(?string $psStatusDescription): void
    {
        $this->psStatusDescription = $psStatusDescription;
    }

    /**
     * @return string|null
     */
    public function getPsStatusMessage(): ?string
    {
        return $this->psStatusMessage;
    }

    /**
     * @param string|null $psStatusMessage
     */
    public function setPsStatusMessage(?string $psStatusMessage): void
    {
        $this->psStatusMessage = $psStatusMessage;
    }

    /**
     * @return string|null
     */
    public function getPsSum(): ?string
    {
        return $this->psSum;
    }

    /**
     * @param string|null $psSum
     */
    public function setPsSum(?string $psSum): void
    {
        $this->psSum = $psSum;
    }

    /**
     * @return string|null
     */
    public function getPsCurrency(): ?string
    {
        return $this->psCurrency;
    }

    /**
     * @param string|null $psCurrency
     */
    public function setPsCurrency(?string $psCurrency): void
    {
        $this->psCurrency = $psCurrency;
    }

    /**
     * @return \DateTime|null
     */
    public function getPsResponseDate(): ?\DateTime
    {
        return $this->psResponseDate;
    }

    /**
     * @param \DateTime|null $psResponseDate
     */
    public function setPsResponseDate(?\DateTime $psResponseDate): void
    {
        $this->psResponseDate = $psResponseDate;
    }

    /**
     * @return string|null
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string|null $comments
     */
    public function setComments(?string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getTaxValue(): string
    {
        return $this->taxValue;
    }

    /**
     * @param string $taxValue
     */
    public function setTaxValue(string $taxValue): void
    {
        $this->taxValue = $taxValue;
    }

    /**
     * @return string|null
     */
    public function getStatGid(): ?string
    {
        return $this->statGid;
    }

    /**
     * @param string|null $statGid
     */
    public function setStatGid(?string $statGid): void
    {
        $this->statGid = $statGid;
    }

    /**
     * @return string
     */
    public function getSumPaid(): string
    {
        return $this->sumPaid;
    }

    /**
     * @param string $sumPaid
     */
    public function setSumPaid(string $sumPaid): void
    {
        $this->sumPaid = $sumPaid;
    }

    /**
     * @return int|null
     */
    public function getRecurringId(): ?int
    {
        return $this->recurringId;
    }

    /**
     * @param int|null $recurringId
     */
    public function setRecurringId(?int $recurringId): void
    {
        $this->recurringId = $recurringId;
    }

    /**
     * @return string|null
     */
    public function getPayVoucherNum(): ?string
    {
        return $this->payVoucherNum;
    }

    /**
     * @param string|null $payVoucherNum
     */
    public function setPayVoucherNum(?string $payVoucherNum): void
    {
        $this->payVoucherNum = $payVoucherNum;
    }

    /**
     * @return \DateTime|null
     */
    public function getPayVoucherDate(): ?\DateTime
    {
        return $this->payVoucherDate;
    }

    /**
     * @param \DateTime|null $payVoucherDate
     */
    public function setPayVoucherDate(?\DateTime $payVoucherDate): void
    {
        $this->payVoucherDate = $payVoucherDate;
    }

    /**
     * @return int|null
     */
    public function getLockedBy(): ?int
    {
        return $this->lockedBy;
    }

    /**
     * @param int|null $lockedBy
     */
    public function setLockedBy(?int $lockedBy): void
    {
        $this->lockedBy = $lockedBy;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateLock(): ?\DateTime
    {
        return $this->dateLock;
    }

    /**
     * @param \DateTime|null $dateLock
     */
    public function setDateLock(?\DateTime $dateLock): void
    {
        $this->dateLock = $dateLock;
    }

    /**
     * @return string
     */
    public function getRecountFlag(): string
    {
        return $this->recountFlag;
    }

    /**
     * @param string $recountFlag
     */
    public function setRecountFlag(string $recountFlag): void
    {
        $this->recountFlag = $recountFlag;
    }

    /**
     * @return int|null
     */
    public function getAffiliateId(): ?int
    {
        return $this->affiliateId;
    }

    /**
     * @param int|null $affiliateId
     */
    public function setAffiliateId(?int $affiliateId): void
    {
        $this->affiliateId = $affiliateId;
    }

    /**
     * @return string|null
     */
    public function getDeliveryDocNum(): ?string
    {
        return $this->deliveryDocNum;
    }

    /**
     * @param string|null $deliveryDocNum
     */
    public function setDeliveryDocNum(?string $deliveryDocNum): void
    {
        $this->deliveryDocNum = $deliveryDocNum;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeliveryDocDate(): ?\DateTime
    {
        return $this->deliveryDocDate;
    }

    /**
     * @param \DateTime|null $deliveryDocDate
     */
    public function setDeliveryDocDate(?\DateTime $deliveryDocDate): void
    {
        $this->deliveryDocDate = $deliveryDocDate;
    }

    /**
     * @return string
     */
    public function getUpdated1c(): string
    {
        return $this->updated1c;
    }

    /**
     * @param string $updated1c
     */
    public function setUpdated1c(string $updated1c): void
    {
        $this->updated1c = $updated1c;
    }

    /**
     * @return int|null
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * @param int|null $storeId
     */
    public function setStoreId(?int $storeId): void
    {
        $this->storeId = $storeId;
    }

    /**
     * @return string|null
     */
    public function getOrderTopic(): ?string
    {
        return $this->orderTopic;
    }

    /**
     * @param string|null $orderTopic
     */
    public function setOrderTopic(?string $orderTopic): void
    {
        $this->orderTopic = $orderTopic;
    }

    /**
     * @return int|null
     */
    public function getResponsibleId(): ?int
    {
        return $this->responsibleId;
    }

    /**
     * @param int|null $responsibleId
     */
    public function setResponsibleId(?int $responsibleId): void
    {
        $this->responsibleId = $responsibleId;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatePayBefore(): ?\DateTime
    {
        return $this->datePayBefore;
    }

    /**
     * @param \DateTime|null $datePayBefore
     */
    public function setDatePayBefore(?\DateTime $datePayBefore): void
    {
        $this->datePayBefore = $datePayBefore;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @param string|null $accountNumber
     */
    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateBill(): ?\DateTime
    {
        return $this->dateBill;
    }

    /**
     * @param \DateTime|null $dateBill
     */
    public function setDateBill(?\DateTime $dateBill): void
    {
        $this->dateBill = $dateBill;
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @param string|null $trackingNumber
     */
    public function setTrackingNumber(?string $trackingNumber): void
    {
        $this->trackingNumber = $trackingNumber;
    }

    /**
     * @return string|null
     */
    public function getXmlId(): ?string
    {
        return $this->xmlId;
    }

    /**
     * @param string|null $xmlId
     */
    public function setXmlId(?string $xmlId): void
    {
        $this->xmlId = $xmlId;
    }

    /**
     * @return string|null
     */
    public function getId1c(): ?string
    {
        return $this->id1c;
    }

    /**
     * @param string|null $id1c
     */
    public function setId1c(?string $id1c): void
    {
        $this->id1c = $id1c;
    }

    /**
     * @return string|null
     */
    public function getVersion1c(): ?string
    {
        return $this->version1c;
    }

    /**
     * @param string|null $version1c
     */
    public function setVersion1c(?string $version1c): void
    {
        $this->version1c = $version1c;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getExternalOrder(): string
    {
        return $this->externalOrder;
    }

    /**
     * @param string $externalOrder
     */
    public function setExternalOrder(string $externalOrder): void
    {
        $this->externalOrder = $externalOrder;
    }

    /**
     * @return string|null
     */
    public function getBxUserId(): ?string
    {
        return $this->bxUserId;
    }

    /**
     * @param string|null $bxUserId
     */
    public function setBxUserId(?string $bxUserId): void
    {
        $this->bxUserId = $bxUserId;
    }

    /**
     * @return string
     */
    public function getPricePayment(): string
    {
        return $this->pricePayment;
    }

    /**
     * @param string $pricePayment
     */
    public function setPricePayment(string $pricePayment): void
    {
        $this->pricePayment = $pricePayment;
    }

    /**
     * @return int|null
     */
    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    /**
     * @param int|null $createdBy
     */
    public function setCreatedBy(?int $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return int|null
     */
    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    /**
     * @param int|null $companyId
     */
    public function setCompanyId(?int $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getIsRecurring(): string
    {
        return $this->isRecurring;
    }

    /**
     * @param string $isRecurring
     */
    public function setIsRecurring(string $isRecurring): void
    {
        $this->isRecurring = $isRecurring;
    }

    /**
     * @return string
     */
    public function getRunning(): string
    {
        return $this->running;
    }

    /**
     * @param string $running
     */
    public function setRunning(string $running): void
    {
        $this->running = $running;
    }



}
