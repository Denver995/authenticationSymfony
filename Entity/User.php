<?php
 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User.
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends AbstractPhysicalPerson
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
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\School", inversedBy="adminsSchools")
     * @ORM\JoinColumn(nullable=true)
     * @ORM\JoinTable(name="user_school_admins")
     */
    private $administratedSchools;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\School", inversedBy="followers")
     * @ORM\JoinColumn(nullable=true)
     * @ORM\JoinTable(name="user_school_followers")
     */
    private $followedSchools;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->enabled = false;
        $this->roles = array('ROLE_USER');
        $this->followedSchools = new ArrayCollection();
    }

    /**
     * User init.
     * completes default values while creating a user.
     */
    public function complete()
    {
        $this->setEnabled(false);
        $this->setUsernameCanonical($this->getUsername());
        $this->setEmailCanonical($this->getEmail());
        $this->setCreatedAt(new \DateTime());
        $this->setPlainPassword(md5($this->getPassword()));
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken): void
    {
        $this->resetToken = $resetToken;
    }

    /**
     * Add school.
     *
     * @param \App\Entity\School $school
     *
     * @return User
     */
    public function addFollowedSchool(\App\Entity\School $school)
    {
        if ($this->followedSchools->contains($school)) {
            return;
        }

        $this->followedSchools[] = $school;
        $school->addFollower($this);

        return $this;
    }

    /**
     * Remove school.
     *
     * @param \App\Entity\School $school
     */
    public function removeFollowedSchool(\App\Entity\School $school)
    {
        if (!$this->followedSchools->contains($school)) {
            return;
        }

        $this->followedSchools->removeElement($school);
        $school->removeFollower($this);
    }

    /**
     * Get school.
     *
     * @return \App\Entity\School
     */
    public function getFollowedSchools()
    {
        return $this->followedSchools;
    }

    /**
     * Add administratedSchool.
     *
     * @param \App\Entity\School $administratedSchool
     */
    public function addAdministratedSchool(\App\Entity\School $administratedSchool)
    {
        $this->administratedSchools[] = $administratedSchool;

        return $this;
    }

    /**
     * Remove administratedSchool.
     *
     * @param \App\Entity\School $administratedSchool
     */
    public function removeAdministratedSchool(\App\Entity\School $administratedSchool)
    {
        $this->administratedSchools->removeElement($administratedSchool);
    }

    /**
     * Get administratedSchool.
     *
     * @return \App\Entity\School
     */
    public function getAdministratedSchool()
    {
        return $this->administratedSchools;
    }
}