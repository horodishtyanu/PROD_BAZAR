<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderArchive
 *
 * @ORM\Table(name="b_sale_order_archive", indexes={@ORM\Index(name="IXS_ORDER_ID", columns={"ORDER_ID"}), @ORM\Index(name="IXS_RESPONSIBLE_ID", columns={"RESPONSIBLE_ID"}), @ORM\Index(name="IXS_XML_ID", columns={"XML_ID"}), @ORM\Index(name="IXS_DATE_INSERT", columns={"DATE_INSERT"}), @ORM\Index(name="IXS_USER_ID", columns={"USER_ID"}), @ORM\Index(name="IXS_ACCOUNT_NUMBER", columns={"ACCOUNT_NUMBER"}), @ORM\Index(name="IXS_COMPANY_ID", columns={"COMPANY_ID"}), @ORM\Index(name="IXS_ID_1C", columns={"ID_1C"}), @ORM\Index(name="IXS_DATE_ARCHIVED", columns={"DATE_ARCHIVED"}), @ORM\Index(name="IXS_STATUS_ID", columns={"STATUS_ID"})})
 * @ORM\Entity
 */
class BSaleOrderArchive
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
     * @ORM\Column(name="ORDER_ID", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="ACCOUNT_NUMBER", type="string", length=100, nullable=false)
     */
    private $accountNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSERT", type="datetime", nullable=false)
     */
    private $dateInsert;

    /**
     * @var int
     *
     * @ORM\Column(name="PERSON_TYPE_ID", type="integer", nullable=false)
     */
    private $personTypeId;

    /**
     * @var int
     *
     * @ORM\Column(name="USER_ID", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS_ID", type="string", length=2, nullable=false)
     */
    private $statusId;

    /**
     * @var string
     *
     * @ORM\Column(name="PAYED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $payed = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="DEDUCTED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $deducted = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="CANCELED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $canceled = 'N';

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
     * @ORM\Column(name="ORDER_DATA", type="text", length=16777215, nullable=true)
     */
    private $orderData;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RESPONSIBLE_ID", type="integer", nullable=true)
     */
    private $responsibleId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMPANY_ID", type="integer", nullable=true)
     */
    private $companyId;

    /**
     * @var int
     *
     * @ORM\Column(name="VERSION", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_ARCHIVED", type="datetime", nullable=false)
     */
    private $dateArchived;


}
