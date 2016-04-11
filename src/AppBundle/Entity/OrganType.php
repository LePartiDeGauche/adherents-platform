<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @Groups({"organ_type_read", "organ_type_write"})
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Organ", mappedBy="type")
     * @Groups({"organ_type_read", "organ_type_write"})
     */
    private $organs;

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