<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An organ type
 *
 * @ORM\Table(name="organType")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class OrganType
{
    /**
     * @var int Organ type id.
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string Organ type name.
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     * @Groups({"organ_type_read", "organ_type_write"})
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Organ", mappedBy="organType")
     * @Groups({"organ_type_read", "organ_type_write"})
     */
    private $organs;
    
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
     * @return ArrayCollection
     */
    public function getOrgans()
    {
        return $this->organs;
    }

    /**
     * @param ArrayCollection $organs
     */
    public function setOrgans($organs)
    {
        $this->organs = $organs;
    }
}
