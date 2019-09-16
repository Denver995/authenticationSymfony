<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * App\Entity\AbstractPhysicalPerson
 *
 * @ORM\MappedSuperclass
 */ 
abstract class AbstractPhysicalPerson implements UserInterface
{

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="usernameCanonical", type="string", length=255, unique=true, nullable=true)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="emailCanonical", type="string", length=255, unique=true, nullable=true)
     * 
     */
    private $emailCanonical;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * 
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plainPassword", type="string", length=255)
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     * 
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array", nullable=true)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     */
    private $biography;

    /** 
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $createdAt;

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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        if ($role === "USER") {
            return $this;
        }

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    /**
     * Set biography
     *
     * @param string $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    
    /**
     * Set createdAt
     *
     * @param \DateTime $date
     */
    public function setCreatedAt($date)
    {
        $this->createdAt = $date;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function eraseCredentials(): void
    {
    }
}

