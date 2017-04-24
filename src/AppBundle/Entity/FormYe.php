<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="formYe")
 */
class FormYe
{
    public function __construct()
    {
        $this->yeFeedbackDate = new \DateTime();
    }


    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormStatus")
     */
    private $yeStatus;

    /**
     * @Assert\Date()
     * @ORM\Column(type="date", nullable=true)
     */
    private $yeFeedbackDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeFeedbackSupervisor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeFeedbackHR;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeQ1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeQ2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeQ3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $yeQ4;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RatingYe")
     */
    private $yeRating;


    // SELF ASSESSMENT 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1FeedbackYE;


    // SELF ASSESSMENT 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2FeedbackYE;


    // SELF ASSESSMENT 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3FeedbackYE;


    // SELF ASSESSMENT 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4FeedbackYE;


    // SELF ASSESSMENT 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5FeedbackYE;



    // TASKS AND RESPONSIBILITIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1FeedbackYE;


    // TASKS AND RESPONSIBILITIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2FeedbackYE;


    // TASKS AND RESPONSIBILITIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3FeedbackYE;


    // TASKS AND RESPONSIBILITIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4FeedbackYE;


    // TASKS AND RESPONSIBILITIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5FeedbackYE;



    // SKILLS AND COMPETENCIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1FeedbackYE;


    // SKILLS AND COMPETENCIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2FeedbackYE;


    // SKILLS AND COMPETENCIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3FeedbackYE;


    // SKILLS AND COMPETENCIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4FeedbackYE;


    // SKILLS AND COMPETENCIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5FeedbackYE;



    // ORGANIZATION COMPETENCIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1FeedbackYE;


    // ORGANIZATION COMPETENCIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2FeedbackYE;


    // ORGANIZATION COMPETENCIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3FeedbackYE;


    // ORGANIZATION COMPETENCIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4FeedbackYE;


    // ORGANIZATION COMPETENCIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5FeedbackYE;



    // GETTERS & SETTERS

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
    public function getYeStatus()
    {
        return $this->yeStatus;
    }

    /**
     * @param mixed $yeStatus
     */
    public function setYeStatus($yeStatus)
    {
        $this->yeStatus = $yeStatus;
    }

    /**
     * @return mixed
     */
    public function getYeFeedbackDate()
    {
        return $this->yeFeedbackDate;
    }

    /**
     * @param mixed $yeFeedbackDate
     */
    public function setYeFeedbackDate($yeFeedbackDate)
    {
        $this->yeFeedbackDate = $yeFeedbackDate;
    }

    /**
     * @return mixed
     */
    public function getYeFeedbackSupervisor()
    {
        return $this->yeFeedbackSupervisor;
    }

    /**
     * @param mixed $yeFeedbackSupervisor
     */
    public function setYeFeedbackSupervisor($yeFeedbackSupervisor)
    {
        $this->yeFeedbackSupervisor = $yeFeedbackSupervisor;
    }

    /**
     * @return mixed
     */
    public function getYeFeedbackHR()
    {
        return $this->yeFeedbackHR;
    }

    /**
     * @param mixed $yeFeedbackHR
     */
    public function setYeFeedbackHR($yeFeedbackHR)
    {
        $this->yeFeedbackHR = $yeFeedbackHR;
    }

    /**
     * @return mixed
     */
    public function getYeQ1()
    {
        return $this->yeQ1;
    }

    /**
     * @param mixed $yeQ1
     */
    public function setYeQ1($yeQ1)
    {
        $this->yeQ1 = $yeQ1;
    }

    /**
     * @return mixed
     */
    public function getYeQ2()
    {
        return $this->yeQ2;
    }

    /**
     * @param mixed $yeQ2
     */
    public function setYeQ2($yeQ2)
    {
        $this->yeQ2 = $yeQ2;
    }

    /**
     * @return mixed
     */
    public function getYeQ3()
    {
        return $this->yeQ3;
    }

    /**
     * @param mixed $yeQ3
     */
    public function setYeQ3($yeQ3)
    {
        $this->yeQ3 = $yeQ3;
    }

    /**
     * @return mixed
     */
    public function getYeQ4()
    {
        return $this->yeQ4;
    }

    /**
     * @param mixed $yeQ4
     */
    public function setYeQ4($yeQ4)
    {
        $this->yeQ4 = $yeQ4;
    }

    /**
     * @return mixed
     */
    public function getYeRating()
    {
        return $this->yeRating;
    }

    /**
     * @param mixed $yeRating
     */
    public function setYeRating($yeRating)
    {
        $this->yeRating = $yeRating;
    }

    /**
     * @return mixed
     */
    public function getSa1FeedbackYE()
    {
        return $this->sa1FeedbackYE;
    }

    /**
     * @param mixed $sa1FeedbackYE
     */
    public function setSa1FeedbackYE($sa1FeedbackYE)
    {
        $this->sa1FeedbackYE = $sa1FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSa2FeedbackYE()
    {
        return $this->sa2FeedbackYE;
    }

    /**
     * @param mixed $sa2FeedbackYE
     */
    public function setSa2FeedbackYE($sa2FeedbackYE)
    {
        $this->sa2FeedbackYE = $sa2FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSa3FeedbackYE()
    {
        return $this->sa3FeedbackYE;
    }

    /**
     * @param mixed $sa3FeedbackYE
     */
    public function setSa3FeedbackYE($sa3FeedbackYE)
    {
        $this->sa3FeedbackYE = $sa3FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSa4FeedbackYE()
    {
        return $this->sa4FeedbackYE;
    }

    /**
     * @param mixed $sa4FeedbackYE
     */
    public function setSa4FeedbackYE($sa4FeedbackYE)
    {
        $this->sa4FeedbackYE = $sa4FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSa5FeedbackYE()
    {
        return $this->sa5FeedbackYE;
    }

    /**
     * @param mixed $sa5FeedbackYE
     */
    public function setSa5FeedbackYE($sa5FeedbackYE)
    {
        $this->sa5FeedbackYE = $sa5FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getTr1FeedbackYE()
    {
        return $this->tr1FeedbackYE;
    }

    /**
     * @param mixed $tr1FeedbackYE
     */
    public function setTr1FeedbackYE($tr1FeedbackYE)
    {
        $this->tr1FeedbackYE = $tr1FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getTr2FeedbackYE()
    {
        return $this->tr2FeedbackYE;
    }

    /**
     * @param mixed $tr2FeedbackYE
     */
    public function setTr2FeedbackYE($tr2FeedbackYE)
    {
        $this->tr2FeedbackYE = $tr2FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getTr3FeedbackYE()
    {
        return $this->tr3FeedbackYE;
    }

    /**
     * @param mixed $tr3FeedbackYE
     */
    public function setTr3FeedbackYE($tr3FeedbackYE)
    {
        $this->tr3FeedbackYE = $tr3FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getTr4FeedbackYE()
    {
        return $this->tr4FeedbackYE;
    }

    /**
     * @param mixed $tr4FeedbackYE
     */
    public function setTr4FeedbackYE($tr4FeedbackYE)
    {
        $this->tr4FeedbackYE = $tr4FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getTr5FeedbackYE()
    {
        return $this->tr5FeedbackYE;
    }

    /**
     * @param mixed $tr5FeedbackYE
     */
    public function setTr5FeedbackYE($tr5FeedbackYE)
    {
        $this->tr5FeedbackYE = $tr5FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSc1FeedbackYE()
    {
        return $this->sc1FeedbackYE;
    }

    /**
     * @param mixed $sc1FeedbackYE
     */
    public function setSc1FeedbackYE($sc1FeedbackYE)
    {
        $this->sc1FeedbackYE = $sc1FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSc2FeedbackYE()
    {
        return $this->sc2FeedbackYE;
    }

    /**
     * @param mixed $sc2FeedbackYE
     */
    public function setSc2FeedbackYE($sc2FeedbackYE)
    {
        $this->sc2FeedbackYE = $sc2FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSc3FeedbackYE()
    {
        return $this->sc3FeedbackYE;
    }

    /**
     * @param mixed $sc3FeedbackYE
     */
    public function setSc3FeedbackYE($sc3FeedbackYE)
    {
        $this->sc3FeedbackYE = $sc3FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSc4FeedbackYE()
    {
        return $this->sc4FeedbackYE;
    }

    /**
     * @param mixed $sc4FeedbackYE
     */
    public function setSc4FeedbackYE($sc4FeedbackYE)
    {
        $this->sc4FeedbackYE = $sc4FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getSc5FeedbackYE()
    {
        return $this->sc5FeedbackYE;
    }

    /**
     * @param mixed $sc5FeedbackYE
     */
    public function setSc5FeedbackYE($sc5FeedbackYE)
    {
        $this->sc5FeedbackYE = $sc5FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getOc1FeedbackYE()
    {
        return $this->oc1FeedbackYE;
    }

    /**
     * @param mixed $oc1FeedbackYE
     */
    public function setOc1FeedbackYE($oc1FeedbackYE)
    {
        $this->oc1FeedbackYE = $oc1FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getOc2FeedbackYE()
    {
        return $this->oc2FeedbackYE;
    }

    /**
     * @param mixed $oc2FeedbackYE
     */
    public function setOc2FeedbackYE($oc2FeedbackYE)
    {
        $this->oc2FeedbackYE = $oc2FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getOc3FeedbackYE()
    {
        return $this->oc3FeedbackYE;
    }

    /**
     * @param mixed $oc3FeedbackYE
     */
    public function setOc3FeedbackYE($oc3FeedbackYE)
    {
        $this->oc3FeedbackYE = $oc3FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getOc4FeedbackYE()
    {
        return $this->oc4FeedbackYE;
    }

    /**
     * @param mixed $oc4FeedbackYE
     */
    public function setOc4FeedbackYE($oc4FeedbackYE)
    {
        $this->oc4FeedbackYE = $oc4FeedbackYE;
    }

    /**
     * @return mixed
     */
    public function getOc5FeedbackYE()
    {
        return $this->oc5FeedbackYE;
    }

    /**
     * @param mixed $oc5FeedbackYE
     */
    public function setOc5FeedbackYE($oc5FeedbackYE)
    {
        $this->oc5FeedbackYE = $oc5FeedbackYE;
    }
}