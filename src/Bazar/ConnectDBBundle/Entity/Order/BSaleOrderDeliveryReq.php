<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDeliveryReq
 *
 * @ORM\Table(name="b_sale_order_delivery_req", indexes={@ORM\Index(name="IX_ORDER_ID", columns={"ORDER_ID"}), @ORM\Index(name="IX_SHIPMENT_ID", columns={"SHIPMENT_ID"})})
 * @ORM\Entity
 */
class BSaleOrderDeliveryReq
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_REQUEST", type="datetime", nullable=true)
     */
    private $dateRequest;

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
     * @var int|null
     *
     * @ORM\Column(name="SHIPMENT_ID", type="integer", nullable=true)
     */
    private $shipmentId;


}
