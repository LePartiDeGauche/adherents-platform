<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use AppBundle\Entity\OrganType;

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
     * @Groups({"organ_read", "organ_write"})
     */
    protected $name;

    /**
     * @var OrganType
     *
     * @ORM\OneToMany(targetEntity="OrganType", mappedBy="organ")
     * @Groups({"organ_read", "organ_write"})
     */
    protected $type;
    
    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Groups({"organ_read", "organ_write"})
     */
    protected $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Groups({"organ_read", "organ_write"})
     */
    protected $create_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"organ_read", "organ_write"})
     */
    protected $update_date;

}
