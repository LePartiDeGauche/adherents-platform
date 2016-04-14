<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * An payment detail.
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Payment
{
    const METHOD_CHECK = 'check';
    const METHOD_CASH = 'cash';
    const METHOD_UNIQUE_DEBIT = 'unique_debit';
    const METHOD_REGULAR_DEBIT = 'regular_debit';
    const METHOD_TRANSFER = 'transfer';

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"payment_read", "payment_write"})
     */
    protected $id;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @Groups({"payment_read", "payment_write"})
     */
    private $payer;

    /**
     * @var Order
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="payments")
     * @Assert\NotNull
     * @Groups({"payment_read", "payment_write"})
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/paymentMethod")
     * @Groups({"payment_read", "payment_write"})
     */
    private $method;

    /**
     * Depend of payment method : check number, IBAN, etc.
     *
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Groups({"payment_read", "payment_write"})
     */
    private $info;

    /**
     * Depend of payment method : bank name, BIC, etc.
     *
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Groups({"payment_read", "payment_write"})
     */
    private $bank;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     * @Iri("https://schema.org/dateCreated")
     * @Groups({"payment_read", "payment_write"})
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\Type(type="string")
     * @Groups({"payment_read", "payment_write"})
     */
    private $proof;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     * @Groups({"payment_read", "payment_write"})
     */
    private $amount;

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
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        if (!in_array($method, array(self::METHOD_CHECK, self::METHOD_CASH, self::METHOD_UNIQUE_DEBIT, self::METHOD_REGULAR_DEBIT, self::METHOD_TRANSFER))) {
            throw new \InvalidArgumentException('Invalid payment method');
        }
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param string $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
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
    public function getProof()
    {
        return $this->proof;
    }

    /**
     * @param string $proof
     */
    public function setProof($proof)
    {
        $this->proof = $proof;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
