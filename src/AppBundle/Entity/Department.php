<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A city.
 *
 * @ORM\Table(name="department")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Department
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
     * @var Region
     *
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="departments")
     * @Groups({"department_read", "department_write"})
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"department_read", "department_write"})
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"department_read", "department_write"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"department_read", "department_write"})
     */
    private $nom_uppercase;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"department_read", "department_write"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"department_read", "department_write"})
     */
    private $nom_soundex;

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
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getNomUppercase()
    {
        return $this->nom_uppercase;
    }

    /**
     * @param string $nom_uppercase
     */
    public function setNomUppercase($nom_uppercase)
    {
        $this->nom_uppercase = $nom_uppercase;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getNomSoundex()
    {
        return $this->nom_soundex;
    }

    /**
     * @param string $nom_soundex
     */
    public function setNomSoundex($nom_soundex)
    {
        $this->nom_soundex = $nom_soundex;
    }
}
