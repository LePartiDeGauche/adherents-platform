<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An organ.
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
     * @Groups({"organ_read", "organ_write", "person_read"})
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Assert\Type(type="boolean")
     * @Iri("https://schema.org/name")
     * @Groups({"organ_read", "organ_write", "person_read"})
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
     * @Groups({"organ_read", "organ_write", "person_read"})
     */
    private $organType;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="City")
     * @ORM\JoinTable(name="organ_city",
     *      joinColumns={@ORM\JoinColumn(name="organ_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="city_id", referencedColumnName="id", unique=false)}
     *      )
     * @Groups({"organ_read", "organ_write"})
     */
    private $cities;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Department")
     * @ORM\JoinTable(name="organ_departments",
     *      joinColumns={@ORM\JoinColumn(name="organ_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="department_id", referencedColumnName="id", unique=false)}
     *      )
     * @Groups({"organ_read", "organ_write"})
     */
    private $departments;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Region")
     * @ORM\JoinTable(name="organ_regions",
     *      joinColumns={@ORM\JoinColumn(name="organ_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="region_id", referencedColumnName="id", unique=false)}
     *      )
     * @Groups({"organ_read", "organ_write"})
     */
    private $regions;



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
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * @param Region $region
     *
     * @return Organ
     */
    public function addRegion(Region $region)
    {
        $this->regions->add($region);

        return $this;
    }

    /***
     * @param Region $region
     */
    public function removeRegion(Region $region)
    {
        $this->regions->removeElement($region);
    }

    /**
     * @return ArrayCollection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param City $city
     *
     * @return Organ
     */
    public function addCity(City $city)
    {
        $this->cities->add($city);

        return $this;
    }

    /***
     * @param City $city
     */
    public function removeCity(City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * @return ArrayCollection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * @param Department $department
     *
     * @return Organ
     */
    public function addDepartment(Department $department)
    {
        $this->departments->add($department);

        return $this;
    }

    /***
     * @param Department $department
     */
    public function removeDepartment(Department $department)
    {
        $this->departments->removeElement($department);
    }
}
