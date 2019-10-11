<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderChange
 *
 * @ORM\Table(name="b_sale_order_change", indexes={@ORM\Index(name="IXS_ORDER_ID_CHANGE", columns={"ORDER_ID"}), @ORM\Index(name="IXS_TYPE_CHANGE", columns={"TYPE"})})
 * @ORM\Entity
 */
class BSaleOrderChange
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
     * @var string
     *
     * @ORM\Column(name="TYPE", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATA", type="string", length=512, nullable=true)
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_CREATE", type="datetime", nullable=false)
     */
    private $dateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_MODIFY", type="datetime", nullable=false)
     */
    private $dateModify;

    /**
     * @var int
     *
     * @ORM\Column(name="USER_ID", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ENTITY", type="string", length=50, nullable=true)
     */
    private $entity;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ENTITY_ID", type="integer", nullable=true)
     */
    private $entityId;


}
