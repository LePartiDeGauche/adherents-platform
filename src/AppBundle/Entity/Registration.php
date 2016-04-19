<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Registration of an user to an event.
 *
 * @ORM\Entity()
 */
class Registration
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Person who registers
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @Assert\NotNull
     * @Groups({"registration_read", "registration_write", "event_read", "event_write"})
     */
    private $person;

    /**
     * @var Event concerned.
     *
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="registrations")
     * @Assert\NotNull
     * @Groups({"registration_read", "registration_write", "event_read", "event_write"})
     */
    private $event;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"registration_read", "registration_write", "event_read", "event_write"})
     */
    private $numberOfRegistered;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     * @Assert\Type(type="boolean")
     *
     * @Groups({"registration_read", "registration_write", "event_read", "event_write"})
     */
    private $enabled;

    /**
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
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return int
     */
    public function getNumberOfRegistered()
    {
        return $this->numberOfRegistered;
    }

    /**
     * @param int $numberOfRegistered
     */
    public function setNumberOfRegistered($numberOfRegistered)
    {
        $this->numberOfRegistered = $numberOfRegistered;
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
}
