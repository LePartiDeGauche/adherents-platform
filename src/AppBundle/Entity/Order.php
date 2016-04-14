<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An order.
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Order
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
     * @Groups({"order_read", "order_write"})
     */
    private $member;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateCreated")
     * @Groups({"order_read", "order_write"})
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/comment")
     * @Groups({"order_read", "order_write"})
     */
    private $comment;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @Groups({"order_read", "order_write"})
     */
    private $product;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="order", cascade={"persist", "remove"})
     * @Groups({"order_read", "order_write"})
     */
    private $payments;

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
     * Add a payment for the order.
     *
     * @param Payment $payment
     *
     * @return Order
     */
    public function addPayment(Payment $payment)
    {
        $this->payments->add($payment);

        return $this;
    }

    /**
     * Remove a payment for the order.
     *
     * @param Payment $payment
     */
    public function removePayment(Payment $payment)
    {
        $this->payments->removeElement($payment);
    }

    /**

     /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
