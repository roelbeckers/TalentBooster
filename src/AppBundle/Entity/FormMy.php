<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="formMy")
 */
class FormMy
{
    // GENERAL

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormStatus")
     */
    private $myStatus;

    /**
     * @Assert\Date()
     * @ORM\Column(type="date", nullable=true)
     */
    private $myFeedbackDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $myFeedbackSupervisor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $myFeedbackHR;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RatingMy")
     */
    private $myRating;


    // SELF ASSESSMENT 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1FeedbackMY;


    // SELF ASSESSMENT 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2FeedbackMY;


    // SELF ASSESSMENT 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3FeedbackMY;


    // SELF ASSESSMENT 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4FeedbackMY;


    // SELF ASSESSMENT 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5FeedbackMY;



    // TASKS AND RESPONSIBILITIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1FeedbackMY;


    // TASKS AND RESPONSIBILITIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2FeedbackMY;


    // TASKS AND RESPONSIBILITIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3FeedbackMY;


    // TASKS AND RESPONSIBILITIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4FeedbackMY;


    // TASKS AND RESPONSIBILITIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5FeedbackMY;



    // SKILLS AND COMPETENCIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1FeedbackMY;


    // SKILLS AND COMPETENCIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2FeedbackMY;


    // SKILLS AND COMPETENCIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3FeedbackMY;


    // SKILLS AND COMPETENCIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4FeedbackMY;


    // SKILLS AND COMPETENCIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5FeedbackMY;



    // ORGANIZATION COMPETENCIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1FeedbackMY;


    // ORGANIZATION COMPETENCIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2FeedbackMY;


    // ORGANIZATION COMPETENCIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3FeedbackMY;


    // ORGANIZATION COMPETENCIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4FeedbackMY;


    // ORGANIZATION COMPETENCIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5FeedbackMY;



    // GETTERS & SETTERS

    /**
     * @return mixed
     */
    public function getCdp()
    {
        return $this->cdp;
    }

    /**
     * @param mixed $cdp
     */
    public function setCdp($cdp)
    {
        $this->cdp = $cdp;
    }

    /**
     * @return mixed
     */
    public function getMyStatus()
    {
        return $this->myStatus;
    }

    /**
     * @param mixed $myStatus
     */
    public function setMyStatus($myStatus)
    {
        $this->myStatus = $myStatus;
    }

    /**
     * @return mixed
     */
    public function getMyFeedbackDate()
    {
        return $this->myFeedbackDate;
    }

    /**
     * @param mixed $myFeedbackDate
     */
    public function setMyFeedbackDate($myFeedbackDate)
    {
        $this->myFeedbackDate = $myFeedbackDate;
    }

    /**
     * @return mixed
     */
    public function getMyFeedbackSupervisor()
    {
        return $this->myFeedbackSupervisor;
    }

    /**
     * @param mixed $myFeedbackSupervisor
     */
    public function setMyFeedbackSupervisor($myFeedbackSupervisor)
    {
        $this->myFeedbackSupervisor = $myFeedbackSupervisor;
    }

    /**
     * @return mixed
     */
    public function getMyFeedbackHR()
    {
        return $this->myFeedbackHR;
    }

    /**
     * @param mixed $myFeedbackHR
     */
    public function setMyFeedbackHR($myFeedbackHR)
    {
        $this->myFeedbackHR = $myFeedbackHR;
    }

    /**
     * @return mixed
     */
    public function getMyRating()
    {
        return $this->myRating;
    }

    /**
     * @param mixed $myRating
     */
    public function setMyRating($myRating)
    {
        $this->myRating = $myRating;
    }

    /**
     * @return mixed
     */
    public function getSa1FeedbackMY()
    {
        return $this->sa1FeedbackMY;
    }

    /**
     * @param mixed $sa1FeedbackMY
     */
    public function setSa1FeedbackMY($sa1FeedbackMY)
    {
        $this->sa1FeedbackMY = $sa1FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSa2FeedbackMY()
    {
        return $this->sa2FeedbackMY;
    }

    /**
     * @param mixed $sa2FeedbackMY
     */
    public function setSa2FeedbackMY($sa2FeedbackMY)
    {
        $this->sa2FeedbackMY = $sa2FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSa3FeedbackMY()
    {
        return $this->sa3FeedbackMY;
    }

    /**
     * @param mixed $sa3FeedbackMY
     */
    public function setSa3FeedbackMY($sa3FeedbackMY)
    {
        $this->sa3FeedbackMY = $sa3FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSa4FeedbackMY()
    {
        return $this->sa4FeedbackMY;
    }

    /**
     * @param mixed $sa4FeedbackMY
     */
    public function setSa4FeedbackMY($sa4FeedbackMY)
    {
        $this->sa4FeedbackMY = $sa4FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSa5FeedbackMY()
    {
        return $this->sa5FeedbackMY;
    }

    /**
     * @param mixed $sa5FeedbackMY
     */
    public function setSa5FeedbackMY($sa5FeedbackMY)
    {
        $this->sa5FeedbackMY = $sa5FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getTr1FeedbackMY()
    {
        return $this->tr1FeedbackMY;
    }

    /**
     * @param mixed $tr1FeedbackMY
     */
    public function setTr1FeedbackMY($tr1FeedbackMY)
    {
        $this->tr1FeedbackMY = $tr1FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getTr2FeedbackMY()
    {
        return $this->tr2FeedbackMY;
    }

    /**
     * @param mixed $tr2FeedbackMY
     */
    public function setTr2FeedbackMY($tr2FeedbackMY)
    {
        $this->tr2FeedbackMY = $tr2FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getTr3FeedbackMY()
    {
        return $this->tr3FeedbackMY;
    }

    /**
     * @param mixed $tr3FeedbackMY
     */
    public function setTr3FeedbackMY($tr3FeedbackMY)
    {
        $this->tr3FeedbackMY = $tr3FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getTr4FeedbackMY()
    {
        return $this->tr4FeedbackMY;
    }

    /**
     * @param mixed $tr4FeedbackMY
     */
    public function setTr4FeedbackMY($tr4FeedbackMY)
    {
        $this->tr4FeedbackMY = $tr4FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getTr5FeedbackMY()
    {
        return $this->tr5FeedbackMY;
    }

    /**
     * @param mixed $tr5FeedbackMY
     */
    public function setTr5FeedbackMY($tr5FeedbackMY)
    {
        $this->tr5FeedbackMY = $tr5FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSc1FeedbackMY()
    {
        return $this->sc1FeedbackMY;
    }

    /**
     * @param mixed $sc1FeedbackMY
     */
    public function setSc1FeedbackMY($sc1FeedbackMY)
    {
        $this->sc1FeedbackMY = $sc1FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSc2FeedbackMY()
    {
        return $this->sc2FeedbackMY;
    }

    /**
     * @param mixed $sc2FeedbackMY
     */
    public function setSc2FeedbackMY($sc2FeedbackMY)
    {
        $this->sc2FeedbackMY = $sc2FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSc3FeedbackMY()
    {
        return $this->sc3FeedbackMY;
    }

    /**
     * @param mixed $sc3FeedbackMY
     */
    public function setSc3FeedbackMY($sc3FeedbackMY)
    {
        $this->sc3FeedbackMY = $sc3FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSc4FeedbackMY()
    {
        return $this->sc4FeedbackMY;
    }

    /**
     * @param mixed $sc4FeedbackMY
     */
    public function setSc4FeedbackMY($sc4FeedbackMY)
    {
        $this->sc4FeedbackMY = $sc4FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getSc5FeedbackMY()
    {
        return $this->sc5FeedbackMY;
    }

    /**
     * @param mixed $sc5FeedbackMY
     */
    public function setSc5FeedbackMY($sc5FeedbackMY)
    {
        $this->sc5FeedbackMY = $sc5FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getOc1FeedbackMY()
    {
        return $this->oc1FeedbackMY;
    }

    /**
     * @param mixed $oc1FeedbackMY
     */
    public function setOc1FeedbackMY($oc1FeedbackMY)
    {
        $this->oc1FeedbackMY = $oc1FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getOc2FeedbackMY()
    {
        return $this->oc2FeedbackMY;
    }

    /**
     * @param mixed $oc2FeedbackMY
     */
    public function setOc2FeedbackMY($oc2FeedbackMY)
    {
        $this->oc2FeedbackMY = $oc2FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getOc3FeedbackMY()
    {
        return $this->oc3FeedbackMY;
    }

    /**
     * @param mixed $oc3FeedbackMY
     */
    public function setOc3FeedbackMY($oc3FeedbackMY)
    {
        $this->oc3FeedbackMY = $oc3FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getOc4FeedbackMY()
    {
        return $this->oc4FeedbackMY;
    }

    /**
     * @param mixed $oc4FeedbackMY
     */
    public function setOc4FeedbackMY($oc4FeedbackMY)
    {
        $this->oc4FeedbackMY = $oc4FeedbackMY;
    }

    /**
     * @return mixed
     */
    public function getOc5FeedbackMY()
    {
        return $this->oc5FeedbackMY;
    }

    /**
     * @param mixed $oc5FeedbackMY
     */
    public function setOc5FeedbackMY($oc5FeedbackMY)
    {
        $this->oc5FeedbackMY = $oc5FeedbackMY;
    }
}