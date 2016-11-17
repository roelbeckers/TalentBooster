<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 25/10/2016
 * Time: 9:04 PM
 */

namespace AppBundle\Entity;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="It looks like you already have an account!")
\ */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=40)
     */
    private $firstname;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=40)
     */
    private $lastname;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=2)
     */
    private $language = "en";

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=40)
     */
    private $jobtitle;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=40)
     */
    private $team;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_hire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_lastpromotion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $supervisor;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled = true;


    // GETTERS AND SETTERS


    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $plainPassword = "temppassword";

    public function getUsername()
    {
        return $this->email;
    }

    public function getRoles()
    {
        $roles = $this->roles;

        // give everyone ROLE_USER!
        /*if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }*/

        return $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        // guarantees that the entity looks "dirty" to Doctrine
        // when changing the plainPassword
        $this->password = null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    /**
     * @param mixed $jobtitle
     */
    public function setJobtitle($jobtitle)
    {
        $this->jobtitle = $jobtitle;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    /**
     * @return mixed
     */
    public function getDateHire()
    {
        return $this->date_hire;
    }

    /**
     * @param mixed $date_hire
     */
    public function setDateHire($date_hire)
    {
        $this->date_hire = $date_hire;
    }

    /**
     * @return mixed
     */
    public function getDateLastpromotion()
    {
        return $this->date_lastpromotion;
    }

    /**
     * @param mixed $date_lastpromotion
     */
    public function setDateLastpromotion($date_lastpromotion)
    {
        $this->date_lastpromotion = $date_lastpromotion;
    }

    /**
     * @return mixed
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * @param mixed $supervisor
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function getFullName()
    {
        return $this->getFirstname() .' '. $this->getLastname();
    }

    public function __toString()
    {
        return $this->getFirstname();
    }


}