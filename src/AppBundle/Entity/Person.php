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
 * @UniqueEntity("email")
 * @Iri("http://schema.org/Person")
 *
 * @author Quentin Barloy <quentin@les-tilleuls.coop>
 */
class Person extends BaseUser
{
    const GENDER_FEMALE = 'f';
    const GENDER_MALE = 'm';
    const GENDER_NONE = 'n';

    /**
     * @var int Person id.
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Email address.
     *
     * @var string
     * @Assert\Email()
     * @Iri("https://schema.org/email")
     * @Groups({"person_read", "person_write"})
     */
    protected $email;

    /**
     * Person's username.
     *
     * @var string
     * @Groups({"person_read", "person_write"})
     */
    protected $username;


    /**
     * Person's password.
     *
     * @var string
     * @Groups({"person_read", "person_write"})
     */
    protected $password;
    
    /**
     * Person's first name.
     *
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/givenName")
     * @Groups({"person_read", "person_write"})
     */
    private $firstName;
    
    /**
     * Person's last name.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/familyName")
     * @Groups({"person_read", "person_write"})
     */
    private $lastName;

    /**
     * Person's maiden name (birth name).
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $maidenName;

    /**
     * Person's nickname.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/additionalName")
     * @Groups({"person_read", "person_write"})
     */
    private $nickname;

    /**
     * Person's birth date.
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Groups({"person_read", "person_write"})
     */
    private $birthdate;

    /**
     * Gender of the person.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/gender")
     * @Groups({"person_read", "person_write"})
     */
    private $gender;

    /**
     * Physical address of the item.
     *
     * @var string
     * 
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/address")
     * @Groups({"person_read", "person_write"})
     */
    private $address;


    /**
     * Physical city of the item.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $city;

    /**
     * Zip code of the city.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $zipcode;

    /**
     * Person's department.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $department;

    /**
     * Person's region.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $region;

    /**
     * Mobile phone number.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"person_read", "person_write"})
     */
    private $mobilephone;

    /**
     * Phone number.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/telephone")
     * @Groups({"person_read", "person_write"})
     */
    private $phone;

    /**
     * Person's job title.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/jobTitle")
     * @Groups({"person_read", "person_write"})
     */
    private $job;

    /**
     *
     * Person's status (adherent, user, suscriber, etc.)
     *
     * @var PersonType
     *
     * @ORM\ManyToOne(targetEntity="PersonType", inversedBy="persons")
     * @Groups({"person_read", "person_read"})
     */
    private $type;


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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMaidenName()
    {
        return $this->maidenName;
    }

    /**
     * @param string $maidenName
     */
    public function setMaidenName($maidenName)
    {
        $this->maidenName = $maidenName;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
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
     * @return PersonType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param PersonType $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
