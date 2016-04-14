<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An encasement.
 *
 * @ORM\Table(name="encasement")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Encasement
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
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $member;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $payer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateCreated")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     * @Iri("https://schema.org/amount")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $amountProvided;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     * @Iri("https://schema.org/amount")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $amountReceived;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/comment")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $comment;

    /**
     * @var EncasementType
     *
     * @ORM\ManyToOne(targetEntity="EncasementType")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $encasementType;

    /**
     * @var EncasementDetail
     *
     * @ORM\OneToOne(targetEntity="EncasementDetail")
     * @Groups({"encasement_read", "encasement_write"})
     */
    private $encasementDetail;

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
     * @return Person
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param Person $member
     */
    public function setMember(Person $member)
    {
        $this->member = $member;
    }

    /**
     * @return Person
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * @param Person $payer
     */
    public function setPayer(Person $payer)
    {
        $this->payer = $payer;
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
     * @return float
     */
    public function getAmountProvided()
    {
        return $this->amountProvided;
    }

    /**
     * @param float $amountProvided
     */
    public function setAmountProvided($amountProvided)
    {
        $this->amountProvided = $amountProvided;
    }

    /**
     * @return float
     */
    public function getAmountReceived()
    {
        return $this->amountReceived;
    }

    /**
     * @param float $amountReceived
     */
    public function setAmountReceived($amountReceived)
    {
        $this->amountReceived = $amountReceived;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return EncasementType
     */
    public function getEncasementType()
    {
        return $this->encasementType;
    }

    /**
     * @param EncasementType $encasementType
     */
    public function setEncasementType(EncasementType $encasementType)
    {
        $this->encasementType = $encasementType;
    }

    /**
     * @return EncasementDetail
     */
    public function getEncasementDetail()
    {
        return $this->encasementDetail;
    }

    /**
     * @param EncasementDetail $encasementDetail
     */
    public function setEncasementDetail(EncasementDetail $encasementDetail)
    {
        $this->encasementDetail = $encasementDetail;
    }
}
