<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An organ type
 *
 * @ORM\Table(name="organ")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Organ
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/name")
     * @Groups({"organ_read", "organ_write"})
     */
    private $name;
    
    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Assert\Type(type="boolean")
     * @Iri("https://schema.org/name")
     * @Groups({"organ_read", "organ_write"})
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateCreated")
     * @Groups({"organ_read", "organ_write"})
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateModified")
     * @Groups({"organ_read", "organ_write"})
     */
    private $updateDate;

    /**
     * @var OrganType
     *
     * @ORM\ManyToOne(targetEntity="OrganType", inversedBy="organs")
     * @Groups({"organ_read", "organ_write"})
     */
    private $organType;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="organ")
     * @Groups({"organ_read", "organ_write"})
     */
    private $persons;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PersonResponsability", mappedBy="organ")
     * @Groups({"organ_read", "organ_write"})
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
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param \DateTime $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return OrganType
     */
    public function getOrganType()
    {
        return $this->organType;
    }

    /**
     * @param OrganType $organType
     */
    public function setOrganType(OrganType $organType)
    {
        $this->organType = $organType;
    }

    /**
     * @return ArrayCollection
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param ArrayCollection $persons
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
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
