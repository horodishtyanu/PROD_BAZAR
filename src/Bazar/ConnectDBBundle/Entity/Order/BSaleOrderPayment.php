<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPayment
 *
 * @ORM\Table(name="b_sale_order_payment", uniqueConstraints={@ORM\UniqueConstraint(name="IXS_PAY_ACCOUNT_NUMBER", columns={"ACCOUNT_NUMBER"})}, indexes={@ORM\Index(name="IX_BSOP_DATE_PAID", columns={"DATE_PAID"}), @ORM\Index(name="IX_BSOP_PAID", columns={"PAID"}), @ORM\Index(name="IX_BSOP_ORDER_ID", columns={"ORDER_ID"})})
 * @ORM\Entity
 */
class BSaleOrderPayment
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
     * @var string
     *
     * @ORM\Column(name="PAID", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $paid = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_PAID", type="datetime", nullable=true)
     */
    private $datePaid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_PAID_ID", type="integer", nullable=true)
     */
    private $empPaidId;

    /**
     * @var int
     *
     * @ORM\Column(name="PAY_SYSTEM_ID", type="integer", nullable=false)
     */
    private $paySystemId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $psStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS_CODE", type="string", length=255, nullable=true)
     */
    private $psStatusCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_STATUS_DESCRIPTION", type="string", length=512, nullable=true)
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
     * @ORM\Column(name="PS_SUM", type="decimal", precision=18, scale=4, nullable=true)
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_PAY_BEFORE", type="datetime", nullable=true)
     */
    private $datePayBefore;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_BILL", type="datetime", nullable=true)
     */
    private $dateBill;

    /**
     * @var string|null
     *
     * @ORM\Column(name="XML_ID", type="string", length=255, nullable=true)
     */
    private $xmlId;

    /**
     * @var string
     *
     * @ORM\Column(name="SUM", type="decimal", precision=18, scale=4, nullable=false)
     */
    private $sum;

    /**
     * @var string
     *
     * @ORM\Column(name="CURRENCY", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="PAY_SYSTEM_NAME", type="string", length=128, nullable=false)
     */
    private $paySystemName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $responsibleId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_RESPONSIBLE_ID", type="datetime", nullable=true)
     */
    private $dateResponsibleId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $empResponsibleId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMMENTS", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMPANY_ID", type="integer", nullable=true)
     */
    private $companyId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PAY_RETURN_DATE", type="date", nullable=true)
     */
    private $payReturnDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EMP_RETURN_ID", type="integer", nullable=true)
     */
    private $empReturnId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAY_RETURN_NUM", type="string", length=20, nullable=true)
     */
    private $payReturnNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAY_RETURN_COMMENT", type="text", length=65535, nullable=true)
     */
    private $payReturnComment;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_RETURN", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isReturn = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PS_INVOICE_ID", type="string", length=250, nullable=true)
     */
    private $psInvoiceId;

    /**
     * @var string
     *
     * @ORM\Column(name="PRICE_COD", type="decimal", precision=18, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $priceCod = '0.0000';

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
     * @ORM\Column(name="EXTERNAL_PAYMENT", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $externalPayment = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="UPDATED_1C", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $updated1c = 'N';

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


}
