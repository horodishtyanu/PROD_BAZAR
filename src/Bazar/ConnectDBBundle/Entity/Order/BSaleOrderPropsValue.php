<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPropsValue
 *
 * @ORM\Table(name="b_sale_order_props_value", uniqueConstraints={@ORM\UniqueConstraint(name="IX_SOPV_ORD_PROP_UNI", columns={"ORDER_ID", "ORDER_PROPS_ID"})})
 * @ORM\Entity(repositoryClass="App\Bazar\ConnectDBBundle\Repository\Order\BSaleOrderPropsValueRepository")
 */
class BSaleOrderPropsValue
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
     * @ORM\Column(name="ORDER_ID",type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ORDER_PROPS_ID", type="integer", nullable=true)
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
     * @ORM\Column(name="VALUE", type="string", length=500, nullable=true)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=50, nullable=true)
     */
    private $code;

     /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return int|null
     */
    public function getOrderPropsId(): ?int
    {
        return $this->orderPropsId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }



}
