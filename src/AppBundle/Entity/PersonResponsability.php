<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * The responsability of a person
 *
 * @ORM\Table(name="personResponsability")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class PersonResponsability
{
    /**
     * Person's responsability id.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * Person
     *
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="personResponsabilities")
     * @Groups({"person_responsability_read", "person_responsability_write"})
     */
    private $person;

    /**
     *
     * Responsability
     *
     * @var Responsability
     *
     * @ORM\ManyToOne(targetEntity="Responsability", inversedBy="personResponsabilities")
     * @Groups({"person_responsability_read", "person_responsability_write"})
     */
    private $responsability;

    /**
     *
     * Organ
     *
     * @var Organ
     *
     * @ORM\ManyToOne(targetEntity="Organ", inversedBy="personResponsabilities")
     * @Groups({"person_responsability_read", "person_responsability_write"})
     */
    private $organ;

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
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return Responsability
     */
    public function getResponsability()
    {
        return $this->responsability;
    }

    /**
     * @param Responsability $responsability
     */
    public function setResponsability(Responsability $responsability)
    {
        $this->responsability = $responsability;
    }

    /**
     * @return Organ
     */
    public function getOrgan()
    {
        return $this->organ;
    }

    /**
     * @param Organ $organ
     */
    public function setOrgan(Organ $organ)
    {
        $this->organ = $organ;
    }
}
