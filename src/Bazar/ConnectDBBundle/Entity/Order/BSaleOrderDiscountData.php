<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDiscountData
 *
 * @ORM\Table(name="b_sale_order_discount_data", indexes={@ORM\Index(name="IX_SALE_DSC_DATA_CMX", columns={"ORDER_ID", "ENTITY_TYPE"})})
 * @ORM\Entity
 */
class BSaleOrderDiscountData
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
     * @var int
     *
     * @ORM\Column(name="ENTITY_TYPE", type="integer", nullable=false)
     */
    private $entityType;

    /**
     * @var int
     *
     * @ORM\Column(name="ENTITY_ID", type="integer", nullable=false)
     */
    private $entityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ENTITY_VALUE", type="string", length=255, nullable=true)
     */
    private $entityValue;

    /**
     * @var string
     *
     * @ORM\Column(name="ENTITY_DATA", type="text", length=16777215, nullable=false)
     */
    private $entityData;


}
