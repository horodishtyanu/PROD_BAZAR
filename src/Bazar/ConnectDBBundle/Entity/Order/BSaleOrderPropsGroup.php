<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderPropsGroup
 *
 * @ORM\Table(name="b_sale_order_props_group", indexes={@ORM\Index(name="IXS_ORDER_PROPS_GROUP_PERSON_TYPE_ID", columns={"PERSON_TYPE_ID"})})
 * @ORM\Entity
 */
class BSaleOrderPropsGroup
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
     * @ORM\Column(name="PERSON_TYPE_ID", type="integer", nullable=false)
     */
    private $personTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false, options={"default"="100"})
     */
    private $sort = '100';


}
