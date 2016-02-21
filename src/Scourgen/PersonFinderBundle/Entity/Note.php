<?php

namespace Scourgen\PersonFinderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="Scourgen\PersonFinderBundle\Repository\NoteRepository")
 */
class Note
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
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="person_records")
     * @ORM\JoinColumn(name="person_id",referencedColumnName="id",nullable=false)
     */
    private $person;

    /**
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="linked_person_records")
     * @ORM\JoinColumn(name="linked_person_id",referencedColumnName="id",nullable=true)
     */
    private $linked_person;

    /**
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="entry_date", type="datetime", nullable=true)
     */
    private $entryDate;

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
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="source_date", type="datetime")
     */
    private $sourceDate;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $author_made_contact;

    /**
     * @ORM\Column(type="string",length=45,nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string",length=45,nullable=true)
     */
    private $email_of_found_person;

    /**
     * @ORM\Column(type="string",length=45,nullable=true)
     */
    private $phone_of_found_person;

    /**
     * @ORM\Column(type="string",length=45,nullable=true)
     */
    private $last_know_location;

    /**
     * @ORM\Column(type="text",length=45,nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string",length=45,nullable=true)
     */
    private $photo_url;

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
     * Set entryDate
     *
     * @param \DateTime $entryDate
     *
     * @return Note
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
     * Set authorName
     *
     * @param string $authorName
     *
     * @return Note
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
     * @return Note
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
     * @return Note
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
     * Set sourceDate
     *
     * @param \DateTime $sourceDate
     *
     * @return Note
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
     * Set author_made_contact
     *
     * @param boolean $authorMadeContact
     * @return Note
     */
    public function setAuthorMadeContact($authorMadeContact)
    {
        $this->author_made_contact = $authorMadeContact;

        return $this;
    }
    /**
     * Get author_made_contact
     *
     * @return boolean
     */
    public function getAuthorMadeContact()
    {
        return $this->author_made_contact;
    }
    /**
     * Set status
     *
     * @param string $status
     * @return Note
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Set email_of_found_person
     *
     * @param string $emailOfFoundPerson
     * @return Note
     */
    public function setEmailOfFoundPerson($emailOfFoundPerson)
    {
        $this->email_of_found_person = $emailOfFoundPerson;

        return $this;
    }
    /**
     * Get email_of_found_person
     *
     * @return string
     */
    public function getEmailOfFoundPerson()
    {
        return $this->email_of_found_person;
    }
    /**
     * Set phone_of_found_person
     *
     * @param string $phoneOfFoundPerson
     * @return Note
     */
    public function setPhoneOfFoundPerson($phoneOfFoundPerson)
    {
        $this->phone_of_found_person = $phoneOfFoundPerson;

        return $this;
    }
    /**
     * Get phone_of_found_person
     *
     * @return string
     */
    public function getPhoneOfFoundPerson()
    {
        return $this->phone_of_found_person;
    }
    /**
     * Set last_known_location
     *
     * @param string $lastKnownLocation
     * @return Note
     */
    public function setLastKnownLocation($lastKnownLocation)
    {
        $this->last_known_location = $lastKnownLocation;

        return $this;
    }
    /**
     * Get last_known_location
     *
     * @return string
     */
    public function getLastKnownLocation()
    {
        return $this->last_known_location;
    }
    /**
     * Set text
     *
     * @param string $text
     * @return Note
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * Set photo_url
     *
     * @param string $photoUrl
     * @return Note
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photo_url = $photoUrl;

        return $this;
    }
    /**
     * Get photo_url
     *
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photo_url;
    }

    /**
     * Set Person
     * @param \Scourgen\PersonFinderBundle\Entity\Person $person
     * @return Note
     */
    public function setPerson(\Scourgen\PersonFinderBundle\Entity\Person $person=null)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * Get Person
     * @return \Scourgen\PersonFinderBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set linked_person
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Person $linkedPerson
     * @return Note
     */
    public function setLinkedPerson(\Scourgen\PersonFinderBundle\Entity\Person $linkedPerson=null)
    {
        $this->linked_person = $linkedPerson;

        return $this;
    }

    /**
     * Get linke
     * @return \Scourgen\PersonFinderBundle\Entity\Person
     */
    public function getLinkedPerson()
    {
        return $this->linked_person;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->person = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set lastKnowLocation
     *
     * @param string $lastKnowLocation
     *
     * @return Note
     */
    public function setLastKnowLocation($lastKnowLocation)
    {
        $this->last_know_location = $lastKnowLocation;

        return $this;
    }

    /**
     * Get lastKnowLocation
     *
     * @return string
     */
    public function getLastKnowLocation()
    {
        return $this->last_know_location;
    }

    /**
     * Add person
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Person $person
     *
     * @return Note
     */
    public function addPerson(\Scourgen\PersonFinderBundle\Entity\Person $person)
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \Scourgen\PersonFinderBundle\Entity\Person $person
     */
    public function removePerson(\Scourgen\PersonFinderBundle\Entity\Person $person)
    {
        $this->person->removeElement($person);
    }
}
