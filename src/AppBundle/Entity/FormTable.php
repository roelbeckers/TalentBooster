<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormTableRepository")
 * @ORM\Table(name="formTable")
 */
class FormTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cycle")
     */
    private $cycle;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormCdp")
     */
    private $formCdp;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormMy")
     */
    private $formMy;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormYe")
     */
    private $formYe;



    // GETTERS AND SETTERS

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * @param mixed $cycle
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;
    }

    /**
     * @return mixed
     */
    public function getFormCdp()
    {
        return $this->formCdp;
    }

    /**
     * @param mixed $formCdp
     */
    public function setFormCdp($formCdp)
    {
        $this->formCdp = $formCdp;
    }

    /**
     * @return mixed
     */
    public function getFormMy()
    {
        return $this->formMy;
    }

    /**
     * @param mixed $formMy
     */
    public function setFormMy($formMy)
    {
        $this->formMy = $formMy;
    }

    /**
     * @return mixed
     */
    public function getFormYe()
    {
        return $this->formYe;
    }

    /**
     * @param mixed $formYe
     */
    public function setFormYe($formYe)
    {
        $this->formYe = $formYe;
    }
}