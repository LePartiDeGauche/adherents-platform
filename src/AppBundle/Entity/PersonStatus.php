<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Person's status.
 *
 * @ORM\Table(name="personStatus")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class PersonStatus
{
    /**
     * Person status id.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Person.
     *
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"person_status_read", "person_status_write"})
     */
    private $person;

    /**
     * Status.
     *
     * @var Status
     *
     * @ORM\ManyToOne(targetEntity="Status", cascade={"remove", "persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"person_status_read", "person_status_write"})
     */
    private $status;

    /**
     * Status's creation date.
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateCreated")
     * @Groups({"person_status_read", "person_status_write"})
     */
    private $beginDate;

    /**
     * Status's ending date.
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Iri("https://schema.org/endDate")
     * @Groups({"person_status_read", "person_status_write"})
     */
    private $endDate;

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
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param \DateTime $beginDate
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
}
