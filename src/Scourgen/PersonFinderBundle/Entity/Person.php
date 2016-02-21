<?php

namespace Scourgen\PersonFinderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="Scourgen\PersonFinderBundle\Repository\PersonRepository")
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Note", mappedBy="person")
     **/
    private $person_records;

    /**
     * @ORM\OneToMany(targetEntity="Note",mappedBy="linked_person")
     */
    private $linked_person_records;
    /**
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=true)
     */
    private $entryDate;

    /**
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="expiry_date", type="datetime", nullable=true)
     */
    private $expiryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name", type="string", length=45,nullable=true)
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="author_email", type="string", length=45, nullable=true)
     */
    private $authorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="author_phone", type="string", length=45, nullable=true)
     */
    private $authorPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="source_name", type="string", length=45, nullable=true)
     */
    private $sourceName;

    /**
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="source_date", type="datetime")
     */
    private $sourceDate;

    /**
     * @var string
     *
     * @ORM\Column(name="source_url", type="string", length=45, nullable=true)
     */
    private $sourceUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=45)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="given_name", type="string", length=20, nullable=true)
     */
    private $givenName;

    /**
     * @var string
     *
     * @ORM\Column(name="family_name", type="string", length=45, nullable=true)
     */
    private $familyName;

    /**
     * @var string
     *
     * @ORM\Column(name="alternate_names", type="string",length=45, nullable=true)
     */
    private $alternateNames;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10,nullable=true)
     */
    private $sex;

    /**
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="smallint", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="home_street", type="string", length=100, nullable=true)
     */
    private $homeStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="home_neighborhood", type="string", length=45, nullable=true)
     */
    private $homeNeighborhood;

    /**
     * @var string
     *
     * @ORM\Column(name="home_city", type="string", length=45,nullable=true)
     */
    private $homeCity;

    /**
     * @var string
     *
     * @ORM\Column(name="home_state", type="string", length=45,nullable=true)
     */
    private $homeState;

    /**
     * @var string
     *
     * @ORM\Column(name="home_postal_code", type="string", length=45, nullable=true)
     */
    private $homePostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="home_country", type="string", length=45,nullable=true)
     */
    private $homeCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_url", type="string", length=100, nullable=true)
     */
    private $photoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_urls", type="string", length=100, nullable=true)
     */
    private $profileUrls;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->person_records = new \Doctrine\Common\Collections\ArrayCollection();
        $this->linked_person_records = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Person
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Set entryDate
     *
     * @param \DateTime $entryDate
     *
     * @return Person
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get entryDate
     *
     * @return \DateTime
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * Set expiryDate
     *
     * @param \DateTime $expiryDate
     *
     * @return Person
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * Get expiryDate
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set authorName
     *
     * @param string $authorName
     *
     * @return Person
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set authorEmail
     *
     * @param string $authorEmail
     *
     * @return Person
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;

        return $this;
    }

    /**
     * Get authorEmail
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * Set authorPhone
     *
     * @param string $authorPhone
     *
     * @return Person
     */
    public function setAuthorPhone($authorPhone)
    {
        $this->authorPhone = $authorPhone;

        return $this;
    }

    /**
     * Get authorPhone
     *
     * @return string
     */
    public function getAuthorPhone()
    {
        return $this->authorPhone;
    }

    /**
     * Set sourceName
     *
     * @param string $sourceName
     *
     * @return Person
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = $sourceName;

        return $this;
    }

    /**
     * Get sourceName
     *
     * @return string
     */
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * Set sourceDate
     *
     * @param \DateTime $sourceDate
     *
     * @return Person
     */
    public function setSourceDate($sourceDate)
    {
        $this->sourceDate = $sourceDate;

        return $this;
    }

    /**
     * Get sourceDate
     *
     * @return \DateTime
     */
    public function getSourceDate()
    {
        return $this->sourceDate;
    }

    /**
     * Set sourceUrl
     *
     * @param string $sourceUrl
     *
     * @return Person
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;

        return $this;
    }

    /**
     * Get sourceUrl
     *
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Person
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set givenName
     *
     * @param string $givenName
     *
     * @return Person
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * Get givenName
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Set familyName
     *
     * @param string $familyName
     *
     * @return Person
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set alternateNames
     *
     * @param string $alternateNames
     *
     * @return Person
     */
    public function setAlternateNames($alternateNames)
    {
        $this->alternateNames = $alternateNames;

        return $this;
    }

    /**
     * Get alternateNames
     *
     * @return string
     */
    public function getAlternateNames()
    {
        return $this->alternateNames;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Person
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Person
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Person
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set homeStreet
     *
     * @param string $homeStreet
     *
     * @return Person
     */
    public function setHomeStreet($homeStreet)
    {
        $this->homeStreet = $homeStreet;

        return $this;
    }

    /**
     * Get homeStreet
     *
     * @return string
     */
    public function getHomeStreet()
    {
        return $this->homeStreet;
    }

    /**
     * Set homeNeighborhood
     *
     * @param string $homeNeighborhood
     *
     * @return Person
     */
    public function setHomeNeighborhood($homeNeighborhood)
    {
        $this->homeNeighborhood = $homeNeighborhood;

        return $this;
    }

    /**
     * Get homeNeighborhood
     *
     * @return string
     */
    public function getHomeNeighborhood()
    {
        return $this->homeNeighborhood;
    }

    /**
     * Set homeCity
     *
     * @param string $homeCity
     *
     * @return Person
     */
    public function setHomeCity($homeCity)
    {
        $this->homeCity = $homeCity;

        return $this;
    }

    /**
     * Get homeCity
     *
     * @return string
     */
    public function getHomeCity()
    {
        return $this->homeCity;
    }

    /**
     * Set homeState
     *
     * @param string $homeState
     *
     * @return Person
     */
    public function setHomeState($homeState)
    {
        $this->homeState = $homeState;

        return $this;
    }

    /**
     * Get homeState
     *
     * @return string
     */
    public function getHomeState()
    {
        return $this->homeState;
    }

    /**
     * Set homePostalCode
     *
     * @param string $homePostalCode
     *
     * @return Person
     */
    public function setHomePostalCode($homePostalCode)
    {
        $this->homePostalCode = $homePostalCode;

        return $this;
    }

    /**
     * Get homePostalCode
     *
     * @return string
     */
    public function getHomePostalCode()
    {
        return $this->homePostalCode;
    }

    /**
     * Set homeCountry
     *
     * @param string $homeCountry
     *
     * @return Person
     */
    public function setHomeCountry($homeCountry)
    {
        $this->homeCountry = $homeCountry;

        return $this;
    }

    /**
     * Get homeCountry
     *
     * @return string
     */
    public function getHomeCountry()
    {
        return $this->homeCountry;
    }

    /**
     * Set photoUrl
     *
     * @param string $photoUrl
     *
     * @return Person
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    /**
     * Get photoUrl
     *
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * Set profileUrls
     *
     * @param string $profileUrls
     *
     * @return Person
     */
    public function setProfileUrls($profileUrls)
    {
        $this->profileUrls = $profileUrls;

        return $this;
    }

    /**
     * Get profileUrls
     *
     * @return string
     */
    public function getProfileUrls()
    {
        return $this->profileUrls;
    }

    /**
     * Add person_records
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Note $personRecords
     * @return Person
     */
    public function addPersonRecord(\Scourgen\PersonFinderBundle\Entity\Note $personRecords)
    {
        $this->person_records[] = $personRecords;

        return $this;
    }
    /**
     * Remove person_records
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Note $personRecords
     */
    public function removePersonRecord(\Scourgen\PersonFinderBundle\Entity\Note $personRecords)
    {
        $this->person_records->removeElement($personRecords);
    }
    /**
     * Get person_records
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonRecords()
    {
        return $this->person_records;
    }
    /**
     * Add linked_person_records
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Note $linkedPersonRecords
     * @return Person
     */
    public function addLinkedPersonRecord(\Scourgen\PersonFinderBundle\Entity\Note $linkedPersonRecords)
    {
        $this->linked_person_records[] = $linkedPersonRecords;

        return $this;
    }
    /**
     * Remove linked_person_records
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Note $linkedPersonRecords
     */
    public function removeLinkedPersonRecord(\Scourgen\PersonFinderBundle\Entity\Note $linkedPersonRecords)
    {
        $this->linked_person_records->removeElement($linkedPersonRecords);
    }
    /**
     * Get linked_person_records
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinkedPersonRecords()
    {
        return $this->linked_person_records;
    }
}

