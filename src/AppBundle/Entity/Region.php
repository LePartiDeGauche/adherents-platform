<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A city.
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Region
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
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"region_read", "region_write"})
     */
    private $nom;

    /**
     *
     * Code INSEE
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"region_read", "region_write"})
     */
    private $code;

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
}
