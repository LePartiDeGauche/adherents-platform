<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A person
 * 
 * @see http://schema.org/Person Documentation on Schema.org
 * @ORM\Table(name="person")
 * @ORM\Entity
 * @UniqueEntity({"email"})
 * @Iri("http://schema.org/Person")
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Person extends BaseUser
{
    const GENDER_FEMALE = 'f';
    const GENDER_MALE = 'm';

    /**
     * @var int Person id.
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string Email address.
     *
     * @Assert\Email()
     * @Iri("https://schema.org/email")
     * @Groups({"person_read", "person_write"})
     */
    protected $email;

    /**
     * @var string Person's username.
     *
     * @Groups({"person_read", "person_write"})
     */
    protected $username;


    /**
     * @var string Person's password.
     *
     * @Groups({"person_read", "person_write"})
     */
    protected $password;
    
    /**
     * @var string Person's first name.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/givenName")
     * @Groups({"person_read", "person_write"})
     */
    private $firstname;
    
    /**
     * @var string Person's last name.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/familyName")
     * @Groups({"person_read", "person_write"})
     */
    private $lastname;

    /**
     * @var string Person's maiden name (birth name).
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $maidenname;

    /**
     * @var string Person's pseudonym.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/additionalName")
     * @Groups({"person_read", "person_write"})
     */
    private $pseudonym;

    /**
     * @var \DateTime Person's birth date.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\DateTime()
     * @Groups({"person_read", "person_write"})
     */
    private $birthdate;

    /**
     * @var string Gender of the person.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/gender")
     * @Groups({"person_read", "person_write"})
     */
    private $gender;

    /**
     * @var string Physical address of the item.
     * 
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/address")
     * @Groups({"person_read", "person_write"})
     */
    private $address;


    /**
     * @var string Physical city of the item.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $city;

    /**
     * @var string Zip code of the city.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $zipcode;

    /**
     * @var string Person's department.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $department;

    /**
     * @var string Person's region.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $region;

    /**
     * @var string Mobile phone number.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $mobilephone;

    /**
     * @var string Phone number.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/telephone")
     * @Groups({"person_read", "person_write"})
     */
    private $phone;

    /**
     * @var string Person's job title.
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/jobTitle")
     * @Groups({"person_read", "person_write"})
     */
    private $job;

    /**
     * @var string Person's status (adherent, user, suscriber, etc.)
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $status;




    /**
     * Sets id.
     * 
     * @param int $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Sets email.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getMaidenname()
    {
        return $this->maidenname;
    }

    /**
     * @param string $maidenname
     */
    public function setMaidenname($maidenname)
    {
        $this->maidenname = $maidenname;
    }

    /**
     * @return string
     */
    public function getPseudonym()
    {
        return $this->pseudonym;
    }

    /**
     * @param string $pseudonym
     */
    public function setPseudonym($pseudonym)
    {
        $this->pseudonym = $pseudonym;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getMobilephone()
    {
        return $this->mobilephone;
    }

    /**
     * @param string $mobilephone
     */
    public function setMobilephone($mobilephone)
    {
        $this->mobilephone = $mobilephone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
