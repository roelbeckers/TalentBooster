<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CycleRepository")
 * @ORM\Table(name="cycle")
 */
class Cycle
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
    private $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @ORM\Column(type="date")
     */
    private $cdpDateStart;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @ORM\Column(type="date")
     */
    private $cdpDateEnd;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cdpAutoMail = false;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $myDateStart;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $myDateEnd;

    /**
     * @ORM\Column(type="boolean")
     */
    private $myAutoMail = false;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $yeDateStart;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $yeDateEnd;

    /**
     * @ORM\Column(type="boolean")
     */
    private $yeAutoMail = false;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCdpDateStart()
    {
        return $this->cdpDateStart;
    }

    /**
     * @param mixed $cdpDateStart
     */
    public function setCdpDateStart($cdpDateStart)
    {
        $this->cdpDateStart = $cdpDateStart;
    }

    /**
     * @return mixed
     */
    public function getCdpDateEnd()
    {
        return $this->cdpDateEnd;
    }

    /**
     * @param mixed $cdpDateEnd
     */
    public function setCdpDateEnd($cdpDateEnd)
    {
        $this->cdpDateEnd = $cdpDateEnd;
    }

    /**
     * @return mixed
     */
    public function getCdpAutoMail()
    {
        return $this->cdpAutoMail;
    }

    /**
     * @param mixed $cdpAutoMail
     */
    public function setCdpAutoMail($cdpAutoMail)
    {
        $this->cdpAutoMail = $cdpAutoMail;
    }

    /**
     * @return mixed
     */
    public function getMyDateStart()
    {
        return $this->myDateStart;
    }

    /**
     * @param mixed $myDateStart
     */
    public function setMyDateStart($myDateStart)
    {
        $this->myDateStart = $myDateStart;
    }

    /**
     * @return mixed
     */
    public function getMyDateEnd()
    {
        return $this->myDateEnd;
    }

    /**
     * @param mixed $myDateEnd
     */
    public function setMyDateEnd($myDateEnd)
    {
        $this->myDateEnd = $myDateEnd;
    }

    /**
     * @return mixed
     */
    public function getMyAutoMail()
    {
        return $this->myAutoMail;
    }

    /**
     * @param mixed $myAutoMail
     */
    public function setMyAutoMail($myAutoMail)
    {
        $this->myAutoMail = $myAutoMail;
    }

    /**
     * @return mixed
     */
    public function getYeDateStart()
    {
        return $this->yeDateStart;
    }

    /**
     * @param mixed $yeDateStart
     */
    public function setYeDateStart($yeDateStart)
    {
        $this->yeDateStart = $yeDateStart;
    }

    /**
     * @return mixed
     */
    public function getYeDateEnd()
    {
        return $this->yeDateEnd;
    }

    /**
     * @param mixed $yeDateEnd
     */
    public function setYeDateEnd($yeDateEnd)
    {
        $this->yeDateEnd = $yeDateEnd;
    }

    /**
     * @return mixed
     */
    public function getYeAutoMail()
    {
        return $this->yeAutoMail;
    }

    /**
     * @param mixed $yeAutoMail
     */
    public function setYeAutoMail($yeAutoMail)
    {
        $this->yeAutoMail = $yeAutoMail;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }


    // VALIDATION CONSTRAINTS

    /**
     * @Assert\IsTrue(message = "cycle.cdp.dateend.greaterthan.datestart")
     */
    public function isCDPDateEndGreaterThanCDPDateStart()
    {
        return $this->cdpDateEnd > $this->cdpDateStart;
    }

    /**
     * @Assert\IsTrue(message = "cycle.my.dateend.greaterthan.datestart")
     */
    public function isMYDateEndGreaterThanMYDateStart()
    {
        if ($this->myDateStart) {
            $checkDate = $this->myDateEnd > $this->myDateStart;
        }
        else {
            $checkDate = true;
        }

        return $checkDate;
    }

    /**
     * @Assert\IsTrue(message = "cycle.ye.dateend.greaterthan.datestart")
     */
    public function isYEDateEndGreaterThanYEDateStart()
    {
        return $this->yeDateEnd > $this->yeDateStart;
    }

    /**
     * @Assert\IsTrue(message = "cycle.my.datestart.greaterthan.cdp.dateend")
     */
    public function isMYDateStartGreaterThanCDPDateEnd()
    {
        if ($this->myDateStart) {
            $checkDate = $this->myDateStart > $this->cdpDateEnd;
        }
        else {
            $checkDate = true;
        }

        return $checkDate;

    }

    /**
     * @Assert\IsTrue(message = "cycle.ye.datestart.greaterthan.my.dateend")
     */
    public function isYEDateStartGreaterThanMYDateEndOrCDPDateEnd()
    {
        if ($this->myDateEnd) {
            $checkDate = $this->yeDateStart > $this->myDateEnd;
        }
        else {
            $checkDate = $this->yeDateStart > $this->cdpDateEnd;
        }

        return $checkDate;

    }
}
