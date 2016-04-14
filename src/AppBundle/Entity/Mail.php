<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A mail.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class Mail
{
    /**
     * @var int
     */
    protected $id = 1;

    /**
     * Sender of the email.
     *
     * @var string
     * @Assert\Email()
     */
    private $sender;

    /**
     * Recipients of the email.
     *
     * @var ArrayCollection
     */
    private $recipients;

    /**
     * Date of the email.
     *
     * @var \DateTime
     * @Assert\DateTime()
     */
    private $date;

    /**
     * Subject of the email.
     *
     * @var string
     * @Assert\Type(type="string")
     */
    private $subject;

    /**
     * Body of the mail.
     *
     * @var string
     * @Assert\Type(type="string")
     */
    private $body;

    /**
     * Mail constructor.
     */
    public function __construct()
    {
        $this->recipients = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return ArrayCollection
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * Add a recipient.
     *
     * @param Person $recipients
     *
     * @return Person
     */
    public function addRecipient(Person $recipients)
    {
        $this->recipients[] = $recipients;

        return $this;
    }

    /**
     * Remove a recipient.
     *
     * @param Person $recipients
     */
    public function removeRecipient(Person $recipients)
    {
        $this->recipients->removeElement($recipients);
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}
