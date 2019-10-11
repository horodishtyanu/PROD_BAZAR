<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderFlags2group
 *
 * @ORM\Table(name="b_sale_order_flags2group", uniqueConstraints={@ORM\UniqueConstraint(name="ix_sale_ordfla2group", columns={"GROUP_ID", "ORDER_FLAG"})})
 * @ORM\Entity
 */
class BSaleOrderFlags2group
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
     * @ORM\Column(name="GROUP_ID", type="integer", nullable=false)
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="ORDER_FLAG", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $orderFlag;


}
