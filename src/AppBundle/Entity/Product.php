<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An encasement type.
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Product
{
    const TYPE_MILITANT = 'militant_subscription';
    const TYPE_ELECTED = 'elected_subscription';
    const TYPE_DONATION = 'donation';

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"product_read", "product_write", "encasement_write"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     * @Groups({"product_read", "product_write"})
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     * @Groups({"product_read", "product_write"})
     */
    private $paybackRate;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Groups({"product_read", "product_write"})
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Assert\Type(type="boolean")
     * @Iri("https://schema.org/name")
     * @Groups({"product_read", "product_write"})
     */
    private $enabled;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     * @Groups({"product_read", "product_write"})
     */
    private $price;

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPaybackRate()
    {
        return $this->paybackRate;
    }

    /**
     * @param float $paybackRate
     */
    public function setPaybackRate($paybackRate)
    {
        $this->paybackRate = $paybackRate;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        if (!in_array($type, array(self::TYPE_MILITANT, self::TYPE_ELECTED, self::TYPE_DONATION))) {
            throw new \InvalidArgumentException('Invalid type');
        }
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
