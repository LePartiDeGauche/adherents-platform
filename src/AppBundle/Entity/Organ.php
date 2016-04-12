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
     * @var OrganType
     *
     * @ORM\ManyToOne(targetEntity="OrganType", inversedBy="organs")
     * @Groups({"organ_read", "organ_write"})
     */
    private $organType;
    
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
}
