<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderDeliveryEs
 *
 * @ORM\Table(name="b_sale_order_delivery_es", indexes={@ORM\Index(name="IX_BSOD_ES_SHIPMENT_ID", columns={"SHIPMENT_ID"}), @ORM\Index(name="IX_BSOD_ES_EXTRA_SERVICE_ID", columns={"EXTRA_SERVICE_ID"})})
 * @ORM\Entity
 */
class BSaleOrderDeliveryEs
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
     * @ORM\Column(name="SHIPMENT_ID", type="integer", nullable=false)
     */
    private $shipmentId;

    /**
     * @var int
     *
     * @ORM\Column(name="EXTRA_SERVICE_ID", type="integer", nullable=false)
     */
    private $extraServiceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALUE", type="string", length=255, nullable=true)
     */
    private $value;


}
