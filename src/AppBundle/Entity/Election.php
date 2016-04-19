<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An election.
 *
 * @ORM\Entity
 */
class Election
{
    const STATUS_WAIT = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_END = 3;
    const STATUS_CANCEL = 4;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The actual body of the article.
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type(type="string")
     * @Groups({"election_read", "election_write"})
     */
    private $name;

    /**
     * @var Organ.
     *
     * @ORM\ManyToOne(targetEntity="Organ", cascade={"persist"})
     * @Groups({"election_read", "election_write"})
     */
    private $organ;

    /**
     * @var \DateTime.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"election_read", "election_write"})
     */
    private $startDate;

    /**
     * @var \DateTime.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"election_read", "election_write"})
     */
    private $endDate;

    /**
     * @var Person.
     *
     * @ORM\ManyToOne(targetEntity="Person", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"election_read", "election_write"})
     */
    private $responsable;

    /**
     * Person candidates.
     *
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(name="person_candidates",
     *      joinColumns={@ORM\JoinColumn(name="election_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", unique=false, nullable=true)}
     *      )
     *
     * @Groups({"election_read", "election_write"})
     */
    private $candidates;

    /**
     * Person elected.
     *
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(name="person_elected",
     *      joinColumns={@ORM\JoinColumn(name="election_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", unique=false, nullable=true)}
     *      )
     *
     * @Groups({"election_read", "election_write"})
     */
    private $elected;

    /**
     * @var string
     *
     * @ORM\Column(nullable=false)
     * @Groups({"election_read", "election_write"})
     */
    private $status;

    /**
     * Returns the article status list.
     *
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_WAIT => 1,
            self::STATUS_ACTIVE => 2,
            self::STATUS_END => 3,
            self::STATUS_CANCEL => 4
        );
    }

    /**
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
     * @return Organ
     */
    public function getOrgan()
    {
        return $this->organ;
    }

    /**
     * @param Organ $organ
     */
    public function setOrgan($organ)
    {
        $this->organ = $organ;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
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

    /**
     * @return Person
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param Person $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return ArrayCollection
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * Add a candidate.
     *
     * @param Person $candidates
     *
     * @return Person
     */
    public function addCandidate(Person $candidates)
    {
        $this->candidates[] = $candidates;

        return $this;
    }

    /**
     * Remove a candidates.
     *
     * @param Person $candidates
     */
    public function removeCandidate(Person $candidates)
    {
        $this->candidates->removeElement($candidates);
    }

    /**
     * @return ArrayCollection
     */
    public function getElected()
    {
        return $this->elected;
    }

    /**
     * Add an elected.
     *
     * @param Person $elected
     *
     * @return Person
     */
    public function addElected(Person $elected)
    {
        $this->elected[] = $elected;

        return $this;
    }

    /**
     * Remove an elected.
     *
     * @param Person $elected
     */
    public function removeElected(Person $elected)
    {
        $this->elected->removeElement($elected);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
