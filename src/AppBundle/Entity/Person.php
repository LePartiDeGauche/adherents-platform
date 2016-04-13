<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A person.
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
     * @Groups({"person_read", "person_write", "encasement_write"})
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
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/accessCode")
     * @Groups({"person_read", "person_write"})
     */
    protected $plainPassword;

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
     * @Iri("https://schema.org/alternateName")
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
    private $nickName;

    /**
     * Person's birth date.
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Iri("https://schema.org/birthDate")
     * @Groups({"person_read", "person_write"})
     */
    private $birthDate;

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
     * @Iri("https://schema.org/streetAddress")
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
     * @Iri("https://schema.org/addressLocality")
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
     * @Iri("https://schema.org/postalCode")
     * @Groups({"person_read", "person_write"})
     */
    private $zipCode;

    /**
     * Person's department.
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/addressRegion")
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
     * @Iri("https://schema.org/addressRegion")
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
     * @Iri("https://schema.org/telephone")
     * @Groups({"person_read", "person_write"})
     */
    private $mobilePhone;

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
     * Person's orginal organ.
     *
     * @var Organ
     *
     * @ORM\ManyToOne(targetEntity="Organ", inversedBy="persons")
     * @Groups({"person_read", "person_write"})
     */
    private $organ;

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
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     *
     * @return Person
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
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
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
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
        if (!in_array($gender, array(self::GENDER_FEMALE, self::GENDER_MALE, self::GENDER_NONE))) {
            throw new \InvalidArgumentException('Invalid status');
        }
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
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
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
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param string $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
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
     * @return Organ
     */
    public function getOrgan()
    {
        return $this->organ;
    }

    /**
     * @param Organ $organ
     */
    public function setOrgan(Organ $organ)
    {
        $this->organ = $organ;
    }
}
