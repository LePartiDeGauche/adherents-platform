<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * The responsabilities
 *
 * @ORM\Table(name="responsability")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Responsability
{
    /**
     * Responsability id.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Responsability name.
     *
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     * @Groups({"responsability_read", "responsability_write"})
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PersonResponsability", mappedBy="responsability")
     * @Groups({"responsability_read", "responsability_write"})
     */
    private $personResponsabilities;

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
    public function getPersonResponsabilities()
    {
        return $this->personResponsabilities;
    }

    /**
     * @param ArrayCollection $personResponsabilities
     */
    public function setPersonResponsabilities($personResponsabilities)
    {
        $this->personResponsabilities = $personResponsabilities;
    }
}
