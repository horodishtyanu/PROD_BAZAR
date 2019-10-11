<?php

namespace App\Bazar\ConnectDBBundle\Entity;

use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrder;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * QKey
 *
 * @ORM\Table(name="q_key")
 * @ORM\Entity
 */
class QKey
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="distributor", type="string", length=50, nullable=false)
     */
    private $distributor;

    /**
     * @var string
     *
     * @ORM\Column(name="product", type="string", length=50, nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=255, nullable=false)
     */
    private $key;

    /**
     * @var string|null
     *
     * @ORM\Column(name="download", type="string", length=100, nullable=true)
     */
    private $download;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_create", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $dateCreate = '0000-00-00 00:00:00';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_update", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $dateUpdate = '0000-00-00 00:00:00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @var int|null
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_key_id", type="string", length=200, nullable=true)
     */
    private $dKeyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="receipt", type="text", length=65535, nullable=true)
     */
    private $receipt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="retailer", type="string", length=255, nullable=true)
     */
    private $retailer;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

    /**
     * QKey constructor.
     * @param int $id
     * @param string $distributor
     * @param string $product
     * @param string $type
     * @param string $key
     * @param string|null $download
     * @param int|null $status
     * @param DateTime $dateCreate
     * @param DateTime $dateUpdate
     * @param string|null $source
     * @param int|null $orderId
     * @param string|null $dKeyId
     * @param string|null $receipt
     * @param string|null $retailer
     * @param DateTime $updatedAt
     */
    public function __construct(int $id, string $distributor, string $product, string $type, string $key, ?string $download, ?int $status, DateTime $dateCreate, DateTime $dateUpdate, ?string $source, ?int $orderId, ?string $dKeyId, ?string $receipt, ?string $retailer, DateTime $updatedAt)
    {
        $this->id = $id;
        $this->distributor = $distributor;
        $this->product = $product;
        $this->type = $type;
        $this->key = $key;
        $this->download = $download;
        $this->status = $status;
        $this->dateCreate = $dateCreate;
        $this->dateUpdate = $dateUpdate;
        $this->source = $source;
        $this->orderId = $orderId;
        $this->dKeyId = $dKeyId;
        $this->receipt = $receipt;
        $this->retailer = $retailer;
        $this->updatedAt = $updatedAt;
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
    public function getDistributor(): string
    {
        return $this->distributor;
    }

    /**
     * @param string $distributor
     */
    public function setDistributor(string $distributor): void
    {
        $this->distributor = $distributor;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @param string $product
     */
    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string|null
     */
    public function getDownload(): ?string
    {
        return $this->download;
    }

    /**
     * @param string|null $download
     */
    public function setDownload(?string $download): void
    {
        $this->download = $download;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return DateTime
     */
    public function getDateCreate(): DateTime
    {
        return $this->dateCreate;
    }

    /**
     * @param DateTime $dateCreate
     */
    public function setDateCreate(DateTime $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdate(): DateTime
    {
        return $this->dateUpdate;
    }

    /**
     * @param DateTime $dateUpdate
     */
    public function setDateUpdate(DateTime $dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }

    /**
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
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
     * @return string|null
     */
    public function getDKeyId(): ?string
    {
        return $this->dKeyId;
    }

    /**
     * @param string|null $dKeyId
     */
    public function setDKeyId(?string $dKeyId): void
    {
        $this->dKeyId = $dKeyId;
    }

    /**
     * @return string|null
     */
    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    /**
     * @param string|null $receipt
     */
    public function setReceipt(?string $receipt): void
    {
        $this->receipt = $receipt;
    }

    /**
     * @return string|null
     */
    public function getRetailer(): ?string
    {
        return $this->retailer;
    }

    /**
     * @param string|null $retailer
     */
    public function setRetailer(?string $retailer): void
    {
        $this->retailer = $retailer;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
