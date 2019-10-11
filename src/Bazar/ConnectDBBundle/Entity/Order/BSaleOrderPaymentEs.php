<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPaymentEs
 *
 * @ORM\Table(name="b_sale_order_payment_es", indexes={@ORM\Index(name="IX_BSOP_ES_PAYMENT_ID", columns={"PAYMENT_ID"}), @ORM\Index(name="IX_BSOP_ES_EXTRA_SERVICE_ID", columns={"EXTRA_SERVICE_ID"})})
 * @ORM\Entity
 */
class BSaleOrderPaymentEs
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
     * @ORM\Column(name="PAYMENT_ID", type="integer", nullable=false)
     */
    private $paymentId;

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
