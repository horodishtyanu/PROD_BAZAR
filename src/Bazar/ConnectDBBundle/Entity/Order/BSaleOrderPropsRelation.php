<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPropsRelation
 *
 * @ORM\Table(name="b_sale_order_props_relation", indexes={@ORM\Index(name="IX_PROPERTY", columns={"PROPERTY_ID"}), @ORM\Index(name="IX_ENTITY_ID", columns={"ENTITY_ID"})})
 * @ORM\Entity
 */
class BSaleOrderPropsRelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="PROPERTY_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $propertyId;

    /**
     * @var string
     *
     * @ORM\Column(name="ENTITY_ID", type="string", length=35, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entityId;

    /**
     * @var string
     *
     * @ORM\Column(name="ENTITY_TYPE", type="string", length=1, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entityType;


}
