<?php

namespace App\Bazar\ConnectDBBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * BSaleOrderProps
 *
 * @ORM\Table(name="b_sale_order_props", indexes={@ORM\Index(name="IXS_ORDER_PROPS_PERSON_TYPE_ID", columns={"PERSON_TYPE_ID"}), @ORM\Index(name="IXS_CODE_OPP", columns={"CODE"})})
 * @ORM\Entity
 */
class BSaleOrderProps
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
     * @var string
     *
     * @ORM\Column(name="TYPE", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="REQUIRED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $required = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEFAULT_VALUE", type="string", length=500, nullable=true)
     */
    private $defaultValue;

    /**
     * @var int
     *
     * @ORM\Column(name="SORT", type="integer", nullable=false, options={"default"="100"})
     */
    private $sort = '100';

    /**
     * @var string
     *
     * @ORM\Column(name="USER_PROPS", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $userProps = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_LOCATION", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isLocation = 'N';

    /**
     * @var int
     *
     * @ORM\Column(name="PROPS_GROUP_ID", type="integer", nullable=false)
     */
    private $propsGroupId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_EMAIL", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isEmail = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_PROFILE_NAME", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isProfileName = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_PAYER", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isPayer = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_LOCATION4TAX", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isLocation4tax = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_FILTERED", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isFiltered = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=50, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_ZIP", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isZip = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_PHONE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isPhone = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="ACTIVE", type="string", length=1, nullable=false, options={"default"="Y"})
     */
    private $active = 'Y';

    /**
     * @var string
     *
     * @ORM\Column(name="UTIL", type="string", length=1, nullable=false, options={"default"="N"})
     */
    private $util = 'N';

    /**
     * @var int
     *
     * @ORM\Column(name="INPUT_FIELD_LOCATION", type="integer", nullable=false)
     */
    private $inputFieldLocation = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="MULTIPLE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $multiple = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_ADDRESS", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isAddress = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SETTINGS", type="string", length=500, nullable=true)
     */
    private $settings;


}
