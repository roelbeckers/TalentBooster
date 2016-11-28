<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormCdpRepository")
 * @ORM\Table(name="formCdp")
 */
class FormCdp
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
    private $cdpStatus;

    /**
     * @Assert\Date()
     * @ORM\Column(type="date", nullable=true)
     */
    private $cdpFeedbackDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cdpFeedbackSupervisor;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cdpFeedbackHR;



    // SELF ASSESSMENT 1

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoreQuality")
     */
    private $sa1CoreQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1CoreQualityDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pitfall")
     */
    private $sa1Pitfall;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1PitfallDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Challenge")
     */
    private $sa1Challenge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1ChallengeDesc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa1Needs;


    // SELF ASSESSMENT 2

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoreQuality")
     */
    private $sa2CoreQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2CoreQualityDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pitfall")
     */
    private $sa2Pitfall;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2PitfallDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Challenge")
     */
    private $sa2Challenge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2ChallengeDesc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa2Needs;


    // SELF ASSESSMENT 3

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoreQuality")
     */
    private $sa3CoreQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3CoreQualityDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pitfall")
     */
    private $sa3Pitfall;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3PitfallDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Challenge")
     */
    private $sa3Challenge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3ChallengeDesc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa3Needs;


    // SELF ASSESSMENT 4

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoreQuality")
     */
    private $sa4CoreQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4CoreQualityDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pitfall")
     */
    private $sa4Pitfall;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4PitfallDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Challenge")
     */
    private $sa4Challenge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4ChallengeDesc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa4Needs;


    // SELF ASSESSMENT 5

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoreQuality")
     */
    private $sa5CoreQuality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5CoreQualityDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pitfall")
     */
    private $sa5Pitfall;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5PitfallDesc;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Challenge")
     */
    private $sa5Challenge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5ChallengeDesc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sa5Needs;


    // TASKS AND RESPONSIBILITIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr1Needs;


    // TASKS AND RESPONSIBILITIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr2Needs;


    // TASKS AND RESPONSIBILITIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr3Needs;


    // TASKS AND RESPONSIBILITIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr4Needs;


    // TASKS AND RESPONSIBILITIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tr5Needs;


    // SKILLS AND COMPETENCIES 1

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc1Needs;


    // SKILLS AND COMPETENCIES 2

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc2Needs;


    // SKILLS AND COMPETENCIES 3

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc3Needs;


    // SKILLS AND COMPETENCIES 4

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc4Needs;


    // SKILLS AND COMPETENCIES 5

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sc5Needs;


    // ORGANIZATION COMPETENCIES 1

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oc1WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1Desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc1Needs;


    // ORGANIZATION COMPETENCIES 2

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oc2WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2Desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc2Needs;


    // ORGANIZATION COMPETENCIES 3

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oc3WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3Desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc3Needs;


    // ORGANIZATION COMPETENCIES 4

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oc4WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4Desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc4Needs;


    // ORGANIZATION COMPETENCIES 5

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oc5WhatWhy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5Desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5How;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5Success;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $oc5Needs;


    // OTHER COMMENTS

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $careerObjectives;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalInfo;




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
    public function getCdpStatus()
    {
        return $this->cdpStatus;
    }

    /**
     * @param mixed $cdpStatus
     */
    public function setCdpStatus($cdpStatus)
    {
        $this->cdpStatus = $cdpStatus;
    }

    /**
     * @return mixed
     */
    public function getCdpFeedbackDate()
    {
        return $this->cdpFeedbackDate;
    }

    /**
     * @param mixed $cdpFeedbackDate
     */
    public function setCdpFeedbackDate($cdpFeedbackDate)
    {
        $this->cdpFeedbackDate = $cdpFeedbackDate;
    }

    /**
     * @return mixed
     */
    public function getCdpFeedbackSupervisor()
    {
        return $this->cdpFeedbackSupervisor;
    }

    /**
     * @param mixed $cdpFeedbackSupervisor
     */
    public function setCdpFeedbackSupervisor($cdpFeedbackSupervisor)
    {
        $this->cdpFeedbackSupervisor = $cdpFeedbackSupervisor;
    }

    /**
     * @return mixed
     */
    public function getCdpFeedbackHR()
    {
        return $this->cdpFeedbackHR;
    }

    /**
     * @param mixed $cdpFeedbackHR
     */
    public function setCdpFeedbackHR($cdpFeedbackHR)
    {
        $this->cdpFeedbackHR = $cdpFeedbackHR;
    }

    /**
     * @return mixed
     */
    public function getSa1CoreQuality()
    {
        return $this->sa1CoreQuality;
    }

    /**
     * @param mixed $sa1CoreQuality
     */
    public function setSa1CoreQuality($sa1CoreQuality)
    {
        $this->sa1CoreQuality = $sa1CoreQuality;
    }

    /**
     * @return mixed
     */
    public function getSa1CoreQualityDesc()
    {
        return $this->sa1CoreQualityDesc;
    }

    /**
     * @param mixed $sa1CoreQualityDesc
     */
    public function setSa1CoreQualityDesc($sa1CoreQualityDesc)
    {
        $this->sa1CoreQualityDesc = $sa1CoreQualityDesc;
    }

    /**
     * @return mixed
     */
    public function getSa1Pitfall()
    {
        return $this->sa1Pitfall;
    }

    /**
     * @param mixed $sa1Pitfall
     */
    public function setSa1Pitfall($sa1Pitfall)
    {
        $this->sa1Pitfall = $sa1Pitfall;
    }

    /**
     * @return mixed
     */
    public function getSa1PitfallDesc()
    {
        return $this->sa1PitfallDesc;
    }

    /**
     * @param mixed $sa1PitfallDesc
     */
    public function setSa1PitfallDesc($sa1PitfallDesc)
    {
        $this->sa1PitfallDesc = $sa1PitfallDesc;
    }

    /**
     * @return mixed
     */
    public function getSa1Challenge()
    {
        return $this->sa1Challenge;
    }

    /**
     * @param mixed $sa1Challenge
     */
    public function setSa1Challenge($sa1Challenge)
    {
        $this->sa1Challenge = $sa1Challenge;
    }

    /**
     * @return mixed
     */
    public function getSa1ChallengeDesc()
    {
        return $this->sa1ChallengeDesc;
    }

    /**
     * @param mixed $sa1ChallengeDesc
     */
    public function setSa1ChallengeDesc($sa1ChallengeDesc)
    {
        $this->sa1ChallengeDesc = $sa1ChallengeDesc;
    }

    /**
     * @return mixed
     */
    public function getSa1How()
    {
        return $this->sa1How;
    }

    /**
     * @param mixed $sa1How
     */
    public function setSa1How($sa1How)
    {
        $this->sa1How = $sa1How;
    }

    /**
     * @return mixed
     */
    public function getSa1Success()
    {
        return $this->sa1Success;
    }

    /**
     * @param mixed $sa1Success
     */
    public function setSa1Success($sa1Success)
    {
        $this->sa1Success = $sa1Success;
    }

    /**
     * @return mixed
     */
    public function getSa1Needs()
    {
        return $this->sa1Needs;
    }

    /**
     * @param mixed $sa1Needs
     */
    public function setSa1Needs($sa1Needs)
    {
        $this->sa1Needs = $sa1Needs;
    }

    /**
     * @return mixed
     */
    public function getSa2CoreQuality()
    {
        return $this->sa2CoreQuality;
    }

    /**
     * @param mixed $sa2CoreQuality
     */
    public function setSa2CoreQuality($sa2CoreQuality)
    {
        $this->sa2CoreQuality = $sa2CoreQuality;
    }

    /**
     * @return mixed
     */
    public function getSa2CoreQualityDesc()
    {
        return $this->sa2CoreQualityDesc;
    }

    /**
     * @param mixed $sa2CoreQualityDesc
     */
    public function setSa2CoreQualityDesc($sa2CoreQualityDesc)
    {
        $this->sa2CoreQualityDesc = $sa2CoreQualityDesc;
    }

    /**
     * @return mixed
     */
    public function getSa2Pitfall()
    {
        return $this->sa2Pitfall;
    }

    /**
     * @param mixed $sa2Pitfall
     */
    public function setSa2Pitfall($sa2Pitfall)
    {
        $this->sa2Pitfall = $sa2Pitfall;
    }

    /**
     * @return mixed
     */
    public function getSa2PitfallDesc()
    {
        return $this->sa2PitfallDesc;
    }

    /**
     * @param mixed $sa2PitfallDesc
     */
    public function setSa2PitfallDesc($sa2PitfallDesc)
    {
        $this->sa2PitfallDesc = $sa2PitfallDesc;
    }

    /**
     * @return mixed
     */
    public function getSa2Challenge()
    {
        return $this->sa2Challenge;
    }

    /**
     * @param mixed $sa2Challenge
     */
    public function setSa2Challenge($sa2Challenge)
    {
        $this->sa2Challenge = $sa2Challenge;
    }

    /**
     * @return mixed
     */
    public function getSa2ChallengeDesc()
    {
        return $this->sa2ChallengeDesc;
    }

    /**
     * @param mixed $sa2ChallengeDesc
     */
    public function setSa2ChallengeDesc($sa2ChallengeDesc)
    {
        $this->sa2ChallengeDesc = $sa2ChallengeDesc;
    }

    /**
     * @return mixed
     */
    public function getSa2How()
    {
        return $this->sa2How;
    }

    /**
     * @param mixed $sa2How
     */
    public function setSa2How($sa2How)
    {
        $this->sa2How = $sa2How;
    }

    /**
     * @return mixed
     */
    public function getSa2Success()
    {
        return $this->sa2Success;
    }

    /**
     * @param mixed $sa2Success
     */
    public function setSa2Success($sa2Success)
    {
        $this->sa2Success = $sa2Success;
    }

    /**
     * @return mixed
     */
    public function getSa2Needs()
    {
        return $this->sa2Needs;
    }

    /**
     * @param mixed $sa2Needs
     */
    public function setSa2Needs($sa2Needs)
    {
        $this->sa2Needs = $sa2Needs;
    }

    /**
     * @return mixed
     */
    public function getSa3CoreQuality()
    {
        return $this->sa3CoreQuality;
    }

    /**
     * @param mixed $sa3CoreQuality
     */
    public function setSa3CoreQuality($sa3CoreQuality)
    {
        $this->sa3CoreQuality = $sa3CoreQuality;
    }

    /**
     * @return mixed
     */
    public function getSa3CoreQualityDesc()
    {
        return $this->sa3CoreQualityDesc;
    }

    /**
     * @param mixed $sa3CoreQualityDesc
     */
    public function setSa3CoreQualityDesc($sa3CoreQualityDesc)
    {
        $this->sa3CoreQualityDesc = $sa3CoreQualityDesc;
    }

    /**
     * @return mixed
     */
    public function getSa3Pitfall()
    {
        return $this->sa3Pitfall;
    }

    /**
     * @param mixed $sa3Pitfall
     */
    public function setSa3Pitfall($sa3Pitfall)
    {
        $this->sa3Pitfall = $sa3Pitfall;
    }

    /**
     * @return mixed
     */
    public function getSa3PitfallDesc()
    {
        return $this->sa3PitfallDesc;
    }

    /**
     * @param mixed $sa3PitfallDesc
     */
    public function setSa3PitfallDesc($sa3PitfallDesc)
    {
        $this->sa3PitfallDesc = $sa3PitfallDesc;
    }

    /**
     * @return mixed
     */
    public function getSa3Challenge()
    {
        return $this->sa3Challenge;
    }

    /**
     * @param mixed $sa3Challenge
     */
    public function setSa3Challenge($sa3Challenge)
    {
        $this->sa3Challenge = $sa3Challenge;
    }

    /**
     * @return mixed
     */
    public function getSa3ChallengeDesc()
    {
        return $this->sa3ChallengeDesc;
    }

    /**
     * @param mixed $sa3ChallengeDesc
     */
    public function setSa3ChallengeDesc($sa3ChallengeDesc)
    {
        $this->sa3ChallengeDesc = $sa3ChallengeDesc;
    }

    /**
     * @return mixed
     */
    public function getSa3How()
    {
        return $this->sa3How;
    }

    /**
     * @param mixed $sa3How
     */
    public function setSa3How($sa3How)
    {
        $this->sa3How = $sa3How;
    }

    /**
     * @return mixed
     */
    public function getSa3Success()
    {
        return $this->sa3Success;
    }

    /**
     * @param mixed $sa3Success
     */
    public function setSa3Success($sa3Success)
    {
        $this->sa3Success = $sa3Success;
    }

    /**
     * @return mixed
     */
    public function getSa3Needs()
    {
        return $this->sa3Needs;
    }

    /**
     * @param mixed $sa3Needs
     */
    public function setSa3Needs($sa3Needs)
    {
        $this->sa3Needs = $sa3Needs;
    }

    /**
     * @return mixed
     */
    public function getSa4CoreQuality()
    {
        return $this->sa4CoreQuality;
    }

    /**
     * @param mixed $sa4CoreQuality
     */
    public function setSa4CoreQuality($sa4CoreQuality)
    {
        $this->sa4CoreQuality = $sa4CoreQuality;
    }

    /**
     * @return mixed
     */
    public function getSa4CoreQualityDesc()
    {
        return $this->sa4CoreQualityDesc;
    }

    /**
     * @param mixed $sa4CoreQualityDesc
     */
    public function setSa4CoreQualityDesc($sa4CoreQualityDesc)
    {
        $this->sa4CoreQualityDesc = $sa4CoreQualityDesc;
    }

    /**
     * @return mixed
     */
    public function getSa4Pitfall()
    {
        return $this->sa4Pitfall;
    }

    /**
     * @param mixed $sa4Pitfall
     */
    public function setSa4Pitfall($sa4Pitfall)
    {
        $this->sa4Pitfall = $sa4Pitfall;
    }

    /**
     * @return mixed
     */
    public function getSa4PitfallDesc()
    {
        return $this->sa4PitfallDesc;
    }

    /**
     * @param mixed $sa4PitfallDesc
     */
    public function setSa4PitfallDesc($sa4PitfallDesc)
    {
        $this->sa4PitfallDesc = $sa4PitfallDesc;
    }

    /**
     * @return mixed
     */
    public function getSa4Challenge()
    {
        return $this->sa4Challenge;
    }

    /**
     * @param mixed $sa4Challenge
     */
    public function setSa4Challenge($sa4Challenge)
    {
        $this->sa4Challenge = $sa4Challenge;
    }

    /**
     * @return mixed
     */
    public function getSa4ChallengeDesc()
    {
        return $this->sa4ChallengeDesc;
    }

    /**
     * @param mixed $sa4ChallengeDesc
     */
    public function setSa4ChallengeDesc($sa4ChallengeDesc)
    {
        $this->sa4ChallengeDesc = $sa4ChallengeDesc;
    }

    /**
     * @return mixed
     */
    public function getSa4How()
    {
        return $this->sa4How;
    }

    /**
     * @param mixed $sa4How
     */
    public function setSa4How($sa4How)
    {
        $this->sa4How = $sa4How;
    }

    /**
     * @return mixed
     */
    public function getSa4Success()
    {
        return $this->sa4Success;
    }

    /**
     * @param mixed $sa4Success
     */
    public function setSa4Success($sa4Success)
    {
        $this->sa4Success = $sa4Success;
    }

    /**
     * @return mixed
     */
    public function getSa4Needs()
    {
        return $this->sa4Needs;
    }

    /**
     * @param mixed $sa4Needs
     */
    public function setSa4Needs($sa4Needs)
    {
        $this->sa4Needs = $sa4Needs;
    }

    /**
     * @return mixed
     */
    public function getSa5CoreQuality()
    {
        return $this->sa5CoreQuality;
    }

    /**
     * @param mixed $sa5CoreQuality
     */
    public function setSa5CoreQuality($sa5CoreQuality)
    {
        $this->sa5CoreQuality = $sa5CoreQuality;
    }

    /**
     * @return mixed
     */
    public function getSa5CoreQualityDesc()
    {
        return $this->sa5CoreQualityDesc;
    }

    /**
     * @param mixed $sa5CoreQualityDesc
     */
    public function setSa5CoreQualityDesc($sa5CoreQualityDesc)
    {
        $this->sa5CoreQualityDesc = $sa5CoreQualityDesc;
    }

    /**
     * @return mixed
     */
    public function getSa5Pitfall()
    {
        return $this->sa5Pitfall;
    }

    /**
     * @param mixed $sa5Pitfall
     */
    public function setSa5Pitfall($sa5Pitfall)
    {
        $this->sa5Pitfall = $sa5Pitfall;
    }

    /**
     * @return mixed
     */
    public function getSa5PitfallDesc()
    {
        return $this->sa5PitfallDesc;
    }

    /**
     * @param mixed $sa5PitfallDesc
     */
    public function setSa5PitfallDesc($sa5PitfallDesc)
    {
        $this->sa5PitfallDesc = $sa5PitfallDesc;
    }

    /**
     * @return mixed
     */
    public function getSa5Challenge()
    {
        return $this->sa5Challenge;
    }

    /**
     * @param mixed $sa5Challenge
     */
    public function setSa5Challenge($sa5Challenge)
    {
        $this->sa5Challenge = $sa5Challenge;
    }

    /**
     * @return mixed
     */
    public function getSa5ChallengeDesc()
    {
        return $this->sa5ChallengeDesc;
    }

    /**
     * @param mixed $sa5ChallengeDesc
     */
    public function setSa5ChallengeDesc($sa5ChallengeDesc)
    {
        $this->sa5ChallengeDesc = $sa5ChallengeDesc;
    }

    /**
     * @return mixed
     */
    public function getSa5How()
    {
        return $this->sa5How;
    }

    /**
     * @param mixed $sa5How
     */
    public function setSa5How($sa5How)
    {
        $this->sa5How = $sa5How;
    }

    /**
     * @return mixed
     */
    public function getSa5Success()
    {
        return $this->sa5Success;
    }

    /**
     * @param mixed $sa5Success
     */
    public function setSa5Success($sa5Success)
    {
        $this->sa5Success = $sa5Success;
    }

    /**
     * @return mixed
     */
    public function getSa5Needs()
    {
        return $this->sa5Needs;
    }

    /**
     * @param mixed $sa5Needs
     */
    public function setSa5Needs($sa5Needs)
    {
        $this->sa5Needs = $sa5Needs;
    }

    /**
     * @return mixed
     */
    public function getTr1WhatWhy()
    {
        return $this->tr1WhatWhy;
    }

    /**
     * @param mixed $tr1WhatWhy
     */
    public function setTr1WhatWhy($tr1WhatWhy)
    {
        $this->tr1WhatWhy = $tr1WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getTr1How()
    {
        return $this->tr1How;
    }

    /**
     * @param mixed $tr1How
     */
    public function setTr1How($tr1How)
    {
        $this->tr1How = $tr1How;
    }

    /**
     * @return mixed
     */
    public function getTr1Success()
    {
        return $this->tr1Success;
    }

    /**
     * @param mixed $tr1Success
     */
    public function setTr1Success($tr1Success)
    {
        $this->tr1Success = $tr1Success;
    }

    /**
     * @return mixed
     */
    public function getTr1Needs()
    {
        return $this->tr1Needs;
    }

    /**
     * @param mixed $tr1Needs
     */
    public function setTr1Needs($tr1Needs)
    {
        $this->tr1Needs = $tr1Needs;
    }

    /**
     * @return mixed
     */
    public function getTr2WhatWhy()
    {
        return $this->tr2WhatWhy;
    }

    /**
     * @param mixed $tr2WhatWhy
     */
    public function setTr2WhatWhy($tr2WhatWhy)
    {
        $this->tr2WhatWhy = $tr2WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getTr2How()
    {
        return $this->tr2How;
    }

    /**
     * @param mixed $tr2How
     */
    public function setTr2How($tr2How)
    {
        $this->tr2How = $tr2How;
    }

    /**
     * @return mixed
     */
    public function getTr2Success()
    {
        return $this->tr2Success;
    }

    /**
     * @param mixed $tr2Success
     */
    public function setTr2Success($tr2Success)
    {
        $this->tr2Success = $tr2Success;
    }

    /**
     * @return mixed
     */
    public function getTr2Needs()
    {
        return $this->tr2Needs;
    }

    /**
     * @param mixed $tr2Needs
     */
    public function setTr2Needs($tr2Needs)
    {
        $this->tr2Needs = $tr2Needs;
    }

    /**
     * @return mixed
     */
    public function getTr3WhatWhy()
    {
        return $this->tr3WhatWhy;
    }

    /**
     * @param mixed $tr3WhatWhy
     */
    public function setTr3WhatWhy($tr3WhatWhy)
    {
        $this->tr3WhatWhy = $tr3WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getTr3How()
    {
        return $this->tr3How;
    }

    /**
     * @param mixed $tr3How
     */
    public function setTr3How($tr3How)
    {
        $this->tr3How = $tr3How;
    }

    /**
     * @return mixed
     */
    public function getTr3Success()
    {
        return $this->tr3Success;
    }

    /**
     * @param mixed $tr3Success
     */
    public function setTr3Success($tr3Success)
    {
        $this->tr3Success = $tr3Success;
    }

    /**
     * @return mixed
     */
    public function getTr3Needs()
    {
        return $this->tr3Needs;
    }

    /**
     * @param mixed $tr3Needs
     */
    public function setTr3Needs($tr3Needs)
    {
        $this->tr3Needs = $tr3Needs;
    }

    /**
     * @return mixed
     */
    public function getTr4WhatWhy()
    {
        return $this->tr4WhatWhy;
    }

    /**
     * @param mixed $tr4WhatWhy
     */
    public function setTr4WhatWhy($tr4WhatWhy)
    {
        $this->tr4WhatWhy = $tr4WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getTr4How()
    {
        return $this->tr4How;
    }

    /**
     * @param mixed $tr4How
     */
    public function setTr4How($tr4How)
    {
        $this->tr4How = $tr4How;
    }

    /**
     * @return mixed
     */
    public function getTr4Success()
    {
        return $this->tr4Success;
    }

    /**
     * @param mixed $tr4Success
     */
    public function setTr4Success($tr4Success)
    {
        $this->tr4Success = $tr4Success;
    }

    /**
     * @return mixed
     */
    public function getTr4Needs()
    {
        return $this->tr4Needs;
    }

    /**
     * @param mixed $tr4Needs
     */
    public function setTr4Needs($tr4Needs)
    {
        $this->tr4Needs = $tr4Needs;
    }

    /**
     * @return mixed
     */
    public function getTr5WhatWhy()
    {
        return $this->tr5WhatWhy;
    }

    /**
     * @param mixed $tr5WhatWhy
     */
    public function setTr5WhatWhy($tr5WhatWhy)
    {
        $this->tr5WhatWhy = $tr5WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getTr5How()
    {
        return $this->tr5How;
    }

    /**
     * @param mixed $tr5How
     */
    public function setTr5How($tr5How)
    {
        $this->tr5How = $tr5How;
    }

    /**
     * @return mixed
     */
    public function getTr5Success()
    {
        return $this->tr5Success;
    }

    /**
     * @param mixed $tr5Success
     */
    public function setTr5Success($tr5Success)
    {
        $this->tr5Success = $tr5Success;
    }

    /**
     * @return mixed
     */
    public function getTr5Needs()
    {
        return $this->tr5Needs;
    }

    /**
     * @param mixed $tr5Needs
     */
    public function setTr5Needs($tr5Needs)
    {
        $this->tr5Needs = $tr5Needs;
    }

    /**
     * @return mixed
     */
    public function getSc1WhatWhy()
    {
        return $this->sc1WhatWhy;
    }

    /**
     * @param mixed $sc1WhatWhy
     */
    public function setSc1WhatWhy($sc1WhatWhy)
    {
        $this->sc1WhatWhy = $sc1WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getSc1How()
    {
        return $this->sc1How;
    }

    /**
     * @param mixed $sc1How
     */
    public function setSc1How($sc1How)
    {
        $this->sc1How = $sc1How;
    }

    /**
     * @return mixed
     */
    public function getSc1Success()
    {
        return $this->sc1Success;
    }

    /**
     * @param mixed $sc1Success
     */
    public function setSc1Success($sc1Success)
    {
        $this->sc1Success = $sc1Success;
    }

    /**
     * @return mixed
     */
    public function getSc1Needs()
    {
        return $this->sc1Needs;
    }

    /**
     * @param mixed $sc1Needs
     */
    public function setSc1Needs($sc1Needs)
    {
        $this->sc1Needs = $sc1Needs;
    }

    /**
     * @return mixed
     */
    public function getSc2WhatWhy()
    {
        return $this->sc2WhatWhy;
    }

    /**
     * @param mixed $sc2WhatWhy
     */
    public function setSc2WhatWhy($sc2WhatWhy)
    {
        $this->sc2WhatWhy = $sc2WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getSc2How()
    {
        return $this->sc2How;
    }

    /**
     * @param mixed $sc2How
     */
    public function setSc2How($sc2How)
    {
        $this->sc2How = $sc2How;
    }

    /**
     * @return mixed
     */
    public function getSc2Success()
    {
        return $this->sc2Success;
    }

    /**
     * @param mixed $sc2Success
     */
    public function setSc2Success($sc2Success)
    {
        $this->sc2Success = $sc2Success;
    }

    /**
     * @return mixed
     */
    public function getSc2Needs()
    {
        return $this->sc2Needs;
    }

    /**
     * @param mixed $sc2Needs
     */
    public function setSc2Needs($sc2Needs)
    {
        $this->sc2Needs = $sc2Needs;
    }

    /**
     * @return mixed
     */
    public function getSc3WhatWhy()
    {
        return $this->sc3WhatWhy;
    }

    /**
     * @param mixed $sc3WhatWhy
     */
    public function setSc3WhatWhy($sc3WhatWhy)
    {
        $this->sc3WhatWhy = $sc3WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getSc3How()
    {
        return $this->sc3How;
    }

    /**
     * @param mixed $sc3How
     */
    public function setSc3How($sc3How)
    {
        $this->sc3How = $sc3How;
    }

    /**
     * @return mixed
     */
    public function getSc3Success()
    {
        return $this->sc3Success;
    }

    /**
     * @param mixed $sc3Success
     */
    public function setSc3Success($sc3Success)
    {
        $this->sc3Success = $sc3Success;
    }

    /**
     * @return mixed
     */
    public function getSc3Needs()
    {
        return $this->sc3Needs;
    }

    /**
     * @param mixed $sc3Needs
     */
    public function setSc3Needs($sc3Needs)
    {
        $this->sc3Needs = $sc3Needs;
    }

    /**
     * @return mixed
     */
    public function getSc4WhatWhy()
    {
        return $this->sc4WhatWhy;
    }

    /**
     * @param mixed $sc4WhatWhy
     */
    public function setSc4WhatWhy($sc4WhatWhy)
    {
        $this->sc4WhatWhy = $sc4WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getSc4How()
    {
        return $this->sc4How;
    }

    /**
     * @param mixed $sc4How
     */
    public function setSc4How($sc4How)
    {
        $this->sc4How = $sc4How;
    }

    /**
     * @return mixed
     */
    public function getSc4Success()
    {
        return $this->sc4Success;
    }

    /**
     * @param mixed $sc4Success
     */
    public function setSc4Success($sc4Success)
    {
        $this->sc4Success = $sc4Success;
    }

    /**
     * @return mixed
     */
    public function getSc4Needs()
    {
        return $this->sc4Needs;
    }

    /**
     * @param mixed $sc4Needs
     */
    public function setSc4Needs($sc4Needs)
    {
        $this->sc4Needs = $sc4Needs;
    }

    /**
     * @return mixed
     */
    public function getSc5WhatWhy()
    {
        return $this->sc5WhatWhy;
    }

    /**
     * @param mixed $sc5WhatWhy
     */
    public function setSc5WhatWhy($sc5WhatWhy)
    {
        $this->sc5WhatWhy = $sc5WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getSc5How()
    {
        return $this->sc5How;
    }

    /**
     * @param mixed $sc5How
     */
    public function setSc5How($sc5How)
    {
        $this->sc5How = $sc5How;
    }

    /**
     * @return mixed
     */
    public function getSc5Success()
    {
        return $this->sc5Success;
    }

    /**
     * @param mixed $sc5Success
     */
    public function setSc5Success($sc5Success)
    {
        $this->sc5Success = $sc5Success;
    }

    /**
     * @return mixed
     */
    public function getSc5Needs()
    {
        return $this->sc5Needs;
    }

    /**
     * @param mixed $sc5Needs
     */
    public function setSc5Needs($sc5Needs)
    {
        $this->sc5Needs = $sc5Needs;
    }

    /**
     * @return mixed
     */
    public function getOc1WhatWhy()
    {
        return $this->oc1WhatWhy;
    }

    /**
     * @param mixed $oc1WhatWhy
     */
    public function setOc1WhatWhy($oc1WhatWhy)
    {
        $this->oc1WhatWhy = $oc1WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getOc1Desc()
    {
        return $this->oc1Desc;
    }

    /**
     * @param mixed $oc1Desc
     */
    public function setOc1Desc($oc1Desc)
    {
        $this->oc1Desc = $oc1Desc;
    }

    /**
     * @return mixed
     */
    public function getOc1How()
    {
        return $this->oc1How;
    }

    /**
     * @param mixed $oc1How
     */
    public function setOc1How($oc1How)
    {
        $this->oc1How = $oc1How;
    }

    /**
     * @return mixed
     */
    public function getOc1Success()
    {
        return $this->oc1Success;
    }

    /**
     * @param mixed $oc1Success
     */
    public function setOc1Success($oc1Success)
    {
        $this->oc1Success = $oc1Success;
    }

    /**
     * @return mixed
     */
    public function getOc1Needs()
    {
        return $this->oc1Needs;
    }

    /**
     * @param mixed $oc1Needs
     */
    public function setOc1Needs($oc1Needs)
    {
        $this->oc1Needs = $oc1Needs;
    }

    /**
     * @return mixed
     */
    public function getOc2WhatWhy()
    {
        return $this->oc2WhatWhy;
    }

    /**
     * @param mixed $oc2WhatWhy
     */
    public function setOc2WhatWhy($oc2WhatWhy)
    {
        $this->oc2WhatWhy = $oc2WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getOc2Desc()
    {
        return $this->oc2Desc;
    }

    /**
     * @param mixed $oc2Desc
     */
    public function setOc2Desc($oc2Desc)
    {
        $this->oc2Desc = $oc2Desc;
    }

    /**
     * @return mixed
     */
    public function getOc2How()
    {
        return $this->oc2How;
    }

    /**
     * @param mixed $oc2How
     */
    public function setOc2How($oc2How)
    {
        $this->oc2How = $oc2How;
    }

    /**
     * @return mixed
     */
    public function getOc2Success()
    {
        return $this->oc2Success;
    }

    /**
     * @param mixed $oc2Success
     */
    public function setOc2Success($oc2Success)
    {
        $this->oc2Success = $oc2Success;
    }

    /**
     * @return mixed
     */
    public function getOc2Needs()
    {
        return $this->oc2Needs;
    }

    /**
     * @param mixed $oc2Needs
     */
    public function setOc2Needs($oc2Needs)
    {
        $this->oc2Needs = $oc2Needs;
    }

    /**
     * @return mixed
     */
    public function getOc3WhatWhy()
    {
        return $this->oc3WhatWhy;
    }

    /**
     * @param mixed $oc3WhatWhy
     */
    public function setOc3WhatWhy($oc3WhatWhy)
    {
        $this->oc3WhatWhy = $oc3WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getOc3Desc()
    {
        return $this->oc3Desc;
    }

    /**
     * @param mixed $oc3Desc
     */
    public function setOc3Desc($oc3Desc)
    {
        $this->oc3Desc = $oc3Desc;
    }

    /**
     * @return mixed
     */
    public function getOc3How()
    {
        return $this->oc3How;
    }

    /**
     * @param mixed $oc3How
     */
    public function setOc3How($oc3How)
    {
        $this->oc3How = $oc3How;
    }

    /**
     * @return mixed
     */
    public function getOc3Success()
    {
        return $this->oc3Success;
    }

    /**
     * @param mixed $oc3Success
     */
    public function setOc3Success($oc3Success)
    {
        $this->oc3Success = $oc3Success;
    }

    /**
     * @return mixed
     */
    public function getOc3Needs()
    {
        return $this->oc3Needs;
    }

    /**
     * @param mixed $oc3Needs
     */
    public function setOc3Needs($oc3Needs)
    {
        $this->oc3Needs = $oc3Needs;
    }

    /**
     * @return mixed
     */
    public function getOc4WhatWhy()
    {
        return $this->oc4WhatWhy;
    }

    /**
     * @param mixed $oc4WhatWhy
     */
    public function setOc4WhatWhy($oc4WhatWhy)
    {
        $this->oc4WhatWhy = $oc4WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getOc4Desc()
    {
        return $this->oc4Desc;
    }

    /**
     * @param mixed $oc4Desc
     */
    public function setOc4Desc($oc4Desc)
    {
        $this->oc4Desc = $oc4Desc;
    }

    /**
     * @return mixed
     */
    public function getOc4How()
    {
        return $this->oc4How;
    }

    /**
     * @param mixed $oc4How
     */
    public function setOc4How($oc4How)
    {
        $this->oc4How = $oc4How;
    }

    /**
     * @return mixed
     */
    public function getOc4Success()
    {
        return $this->oc4Success;
    }

    /**
     * @param mixed $oc4Success
     */
    public function setOc4Success($oc4Success)
    {
        $this->oc4Success = $oc4Success;
    }

    /**
     * @return mixed
     */
    public function getOc4Needs()
    {
        return $this->oc4Needs;
    }

    /**
     * @param mixed $oc4Needs
     */
    public function setOc4Needs($oc4Needs)
    {
        $this->oc4Needs = $oc4Needs;
    }

    /**
     * @return mixed
     */
    public function getOc5WhatWhy()
    {
        return $this->oc5WhatWhy;
    }

    /**
     * @param mixed $oc5WhatWhy
     */
    public function setOc5WhatWhy($oc5WhatWhy)
    {
        $this->oc5WhatWhy = $oc5WhatWhy;
    }

    /**
     * @return mixed
     */
    public function getOc5Desc()
    {
        return $this->oc5Desc;
    }

    /**
     * @param mixed $oc5Desc
     */
    public function setOc5Desc($oc5Desc)
    {
        $this->oc5Desc = $oc5Desc;
    }

    /**
     * @return mixed
     */
    public function getOc5How()
    {
        return $this->oc5How;
    }

    /**
     * @param mixed $oc5How
     */
    public function setOc5How($oc5How)
    {
        $this->oc5How = $oc5How;
    }

    /**
     * @return mixed
     */
    public function getOc5Success()
    {
        return $this->oc5Success;
    }

    /**
     * @param mixed $oc5Success
     */
    public function setOc5Success($oc5Success)
    {
        $this->oc5Success = $oc5Success;
    }

    /**
     * @return mixed
     */
    public function getOc5Needs()
    {
        return $this->oc5Needs;
    }

    /**
     * @param mixed $oc5Needs
     */
    public function setOc5Needs($oc5Needs)
    {
        $this->oc5Needs = $oc5Needs;
    }

    /**
     * @return mixed
     */
    public function getCareerObjectives()
    {
        return $this->careerObjectives;
    }

    /**
     * @param mixed $careerObjectives
     */
    public function setCareerObjectives($careerObjectives)
    {
        $this->careerObjectives = $careerObjectives;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }
}