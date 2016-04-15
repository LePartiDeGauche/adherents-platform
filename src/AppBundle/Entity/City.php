<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A city.
 *
 * @ORM\Table(name="city")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class City
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
     * @var Department
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="cities")
     * @Groups({"city_read", "city_write"})
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $nom_simple;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $nom_reel;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $nom_soundex;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $nom_metaphone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $code_postal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $commune;

    /**
     * 
     * Code INSEE
     * 
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $code_commune;
    
    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $arrondissement;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $canton;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $amdi;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $population_2010;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $population_1999;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $population_2012;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $densite_2010;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"city_read", "city_write"})
     */
    private $surface;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"city_read", "city_write"})
     */
    private $longitude_deg;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"city_read", "city_write"})
     */
    private $latitude_deg;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $longitude_grd;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $latitude_grd;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $longitude_dms;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"city_read", "city_write"})
     */
    private $latitude_dms;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $zmin;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"city_read", "city_write"})
     */
    private $zmax;

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
     * @return Department
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param Department $departement
     */
    public function setDepartement(Department $departement)
    {
        $this->departement = $departement;
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
    public function getNomSimple()
    {
        return $this->nom_simple;
    }

    /**
     * @param string $nom_simple
     */
    public function setNomSimple($nom_simple)
    {
        $this->nom_simple = $nom_simple;
    }

    /**
     * @return string
     */
    public function getNomReel()
    {
        return $this->nom_reel;
    }

    /**
     * @param string $nom_reel
     */
    public function setNomReel($nom_reel)
    {
        $this->nom_reel = $nom_reel;
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

    /**
     * @return string
     */
    public function getNomMetaphone()
    {
        return $this->nom_metaphone;
    }

    /**
     * @param string $nom_metaphone
     */
    public function setNomMetaphone($nom_metaphone)
    {
        $this->nom_metaphone = $nom_metaphone;
    }

    /**
     * @return string
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param string $code_postal
     */
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * @param string $commune
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;
    }

    /**
     * @return string
     */
    public function getCodeCommune()
    {
        return $this->code_commune;
    }

    /**
     * @param string $code_commune
     */
    public function setCodeCommune($code_commune)
    {
        $this->code_commune = $code_commune;
    }

    /**
     * @return int
     */
    public function getArrondissement()
    {
        return $this->arrondissement;
    }

    /**
     * @param int $arrondissement
     */
    public function setArrondissement($arrondissement)
    {
        $this->arrondissement = $arrondissement;
    }

    /**
     * @return string
     */
    public function getCanton()
    {
        return $this->canton;
    }

    /**
     * @param string $canton
     */
    public function setCanton($canton)
    {
        $this->canton = $canton;
    }

    /**
     * @return int
     */
    public function getAmdi()
    {
        return $this->amdi;
    }

    /**
     * @param int $amdi
     */
    public function setAmdi($amdi)
    {
        $this->amdi = $amdi;
    }

    /**
     * @return int
     */
    public function getPopulation2010()
    {
        return $this->population_2010;
    }

    /**
     * @param int $population_2010
     */
    public function setPopulation2010($population_2010)
    {
        $this->population_2010 = $population_2010;
    }

    /**
     * @return int
     */
    public function getPopulation1999()
    {
        return $this->population_1999;
    }

    /**
     * @param int $population_1999
     */
    public function setPopulation1999($population_1999)
    {
        $this->population_1999 = $population_1999;
    }

    /**
     * @return int
     */
    public function getPopulation2012()
    {
        return $this->population_2012;
    }

    /**
     * @param int $population_2012
     */
    public function setPopulation2012($population_2012)
    {
        $this->population_2012 = $population_2012;
    }

    /**
     * @return int
     */
    public function getDensite2010()
    {
        return $this->densite_2010;
    }

    /**
     * @param int $densite_2010
     */
    public function setDensite2010($densite_2010)
    {
        $this->densite_2010 = $densite_2010;
    }

    /**
     * @return float
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @param float $surface
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;
    }

    /**
     * @return float
     */
    public function getLongitudeDeg()
    {
        return $this->longitude_deg;
    }

    /**
     * @param float $longitude_deg
     */
    public function setLongitudeDeg($longitude_deg)
    {
        $this->longitude_deg = $longitude_deg;
    }

    /**
     * @return float
     */
    public function getLatitudeDeg()
    {
        return $this->latitude_deg;
    }

    /**
     * @param float $latitude_deg
     */
    public function setLatitudeDeg($latitude_deg)
    {
        $this->latitude_deg = $latitude_deg;
    }

    /**
     * @return string
     */
    public function getLongitudeGrd()
    {
        return $this->longitude_grd;
    }

    /**
     * @param string $longitude_grd
     */
    public function setLongitudeGrd($longitude_grd)
    {
        $this->longitude_grd = $longitude_grd;
    }

    /**
     * @return string
     */
    public function getLatitudeGrd()
    {
        return $this->latitude_grd;
    }

    /**
     * @param string $latitude_grd
     */
    public function setLatitudeGrd($latitude_grd)
    {
        $this->latitude_grd = $latitude_grd;
    }

    /**
     * @return string
     */
    public function getLongitudeDms()
    {
        return $this->longitude_dms;
    }

    /**
     * @param string $longitude_dms
     */
    public function setLongitudeDms($longitude_dms)
    {
        $this->longitude_dms = $longitude_dms;
    }

    /**
     * @return string
     */
    public function getLatitudeDms()
    {
        return $this->latitude_dms;
    }

    /**
     * @param string $latitude_dms
     */
    public function setLatitudeDms($latitude_dms)
    {
        $this->latitude_dms = $latitude_dms;
    }

    /**
     * @return int
     */
    public function getZmin()
    {
        return $this->zmin;
    }

    /**
     * @param int $zmin
     */
    public function setZmin($zmin)
    {
        $this->zmin = $zmin;
    }

    /**
     * @return int
     */
    public function getZmax()
    {
        return $this->zmax;
    }

    /**
     * @param int $zmax
     */
    public function setZmax($zmax)
    {
        $this->zmax = $zmax;
    }
}
