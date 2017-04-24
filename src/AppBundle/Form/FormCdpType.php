<?php

namespace AppBundle\Form;

use AppBundle\Entity\CoreQuality;
use AppBundle\Entity\Form;
use AppBundle\Entity\FormCdp;
use AppBundle\Entity\FormYe;
use AppBundle\Entity\Pitfall;
use AppBundle\Entity\RatingYe;
use AppBundle\Repository\CoreQualityRepository;
use AppBundle\Repository\PitfallRepository;
use AppBundle\Repository\RatingYeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormCdpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->formParam = $options['formParam'];
        $formData = $options['formData'];

        if (($this->formParam['userType'] == 'user') and (($this->formParam['formAction'] == 'edit') or ($this->formParam['formAction'] == 'create'))){
            $builder
                ->add('cdpFeedbackDate', DateType::class, [
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'js-datepicker'
                    ],
                    'html5' => false,
                    'format' => 'dd-MM-yyyy'
                ])

                // SELF ASSESSMENT 1
                ->add('sa1CoreQuality', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Core Quality',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa1CoreQualityDesc')
                ->add('sa1Pitfall', EntityType::class, [
                    'class' => Pitfall::class,
                    'placeholder' => 'Select a Pitfall',
                    'query_builder' => function(PitfallRepository $repo){
                        return $repo->findAllEnglishPitfallOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa1PitfallDesc')
                ->add('sa1Challenge', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Challenge',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa1ChallengeDesc')
                ->add('sa1How')
                ->add('sa1Success')
                ->add('sa1Needs')

                // SELF ASSESSMENT 2
                ->add('sa2CoreQuality', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Core Quality',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa2CoreQualityDesc')
                ->add('sa2Pitfall', EntityType::class, [
                    'class' => Pitfall::class,
                    'placeholder' => 'Select a Pitfall',
                    'query_builder' => function(PitfallRepository $repo){
                        return $repo->findAllEnglishPitfallOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa2PitfallDesc')
                ->add('sa2Challenge', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Challenge',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa2ChallengeDesc')
                ->add('sa2How')
                ->add('sa2Success')
                ->add('sa2Needs')

                // SELF ASSESSMENT 3
                ->add('sa3CoreQuality', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Core Quality',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa3CoreQualityDesc')
                ->add('sa3Pitfall', EntityType::class, [
                    'class' => Pitfall::class,
                    'placeholder' => 'Select a Pitfall',
                    'query_builder' => function(PitfallRepository $repo){
                        return $repo->findAllEnglishPitfallOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa3PitfallDesc')
                ->add('sa3Challenge', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Challenge',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa3ChallengeDesc')
                ->add('sa3How')
                ->add('sa3Success')
                ->add('sa3Needs')

                // SELF ASSESSMENT 4
                ->add('sa4CoreQuality', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Core Quality',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa4CoreQualityDesc')
                ->add('sa4Pitfall', EntityType::class, [
                    'class' => Pitfall::class,
                    'placeholder' => 'Select a Pitfall',
                    'query_builder' => function(PitfallRepository $repo){
                        return $repo->findAllEnglishPitfallOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa4PitfallDesc')
                ->add('sa4Challenge', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Challenge',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa4ChallengeDesc')
                ->add('sa4How')
                ->add('sa4Success')
                ->add('sa4Needs')

                // SELF ASSESSMENT 5
                ->add('sa5CoreQuality', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Core Quality',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa5CoreQualityDesc')
                ->add('sa5Pitfall', EntityType::class, [
                    'class' => Pitfall::class,
                    'placeholder' => 'Select a Pitfall',
                    'query_builder' => function(PitfallRepository $repo){
                        return $repo->findAllEnglishPitfallOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa5PitfallDesc')
                ->add('sa5Challenge', EntityType::class, [
                    'class' => CoreQuality::class,
                    'placeholder' => 'Select a Challenge',
                    'query_builder' => function(CoreQualityRepository $repo){
                        return $repo->findAllEnglishCoreQualityOrderByName();
                    },
                    'required' => false
                ])
                ->add('sa5ChallengeDesc')
                ->add('sa5How')
                ->add('sa5Success')
                ->add('sa5Needs')


                // TASKS AND RESPONSIBILITIES 1
                ->add('tr1WhatWhy')
                ->add('tr1How')
                ->add('tr1Success')
                ->add('tr1Needs')

                // TASKS AND RESPONSIBILITIES 2
                ->add('tr2WhatWhy')
                ->add('tr2How')
                ->add('tr2Success')
                ->add('tr2Needs')

                // TASKS AND RESPONSIBILITIES 3
                ->add('tr3WhatWhy')
                ->add('tr3How')
                ->add('tr3Success')
                ->add('tr3Needs')

                // TASKS AND RESPONSIBILITIES 4
                ->add('tr4WhatWhy')
                ->add('tr4How')
                ->add('tr4Success')
                ->add('tr4Needs')

                // TASKS AND RESPONSIBILITIES 5
                ->add('tr5WhatWhy')
                ->add('tr5How')
                ->add('tr5Success')
                ->add('tr5Needs')


                // SKILLS AND COMPETENCIES 1
                ->add('sc1WhatWhy')
                ->add('sc1How')
                ->add('sc1Success')
                ->add('sc1Needs')

                // SKILLS AND COMPETENCIES 2
                ->add('sc2WhatWhy')
                ->add('sc2How')
                ->add('sc2Success')
                ->add('sc2Needs')

                // SKILLS AND COMPETENCIES 3
                ->add('sc3WhatWhy')
                ->add('sc3How')
                ->add('sc3Success')
                ->add('sc3Needs')

                // SKILLS AND COMPETENCIES 4
                ->add('sc4WhatWhy')
                ->add('sc4How')
                ->add('sc4Success')
                ->add('sc4Needs')

                // SKILLS AND COMPETENCIES 5
                ->add('sc5WhatWhy')
                ->add('sc5How')
                ->add('sc5Success')
                ->add('sc5Needs')


                // ORGANIZATION COMPETENCIES 1
                ->add('oc1WhatWhy', TextareaType::class, array(
                    'required' => false
                ))
                ->add('oc1Desc')
                ->add('oc1How')
                ->add('oc1Success')
                ->add('oc1Needs')

                // ORGANIZATION COMPETENCIES 2
                ->add('oc2WhatWhy', TextareaType::class, array(
                    'required' => false
                ))
                ->add('oc2Desc')
                ->add('oc2How')
                ->add('oc2Success')
                ->add('oc2Needs')

                // ORGANIZATION COMPETENCIES 3
                ->add('oc3WhatWhy', TextareaType::class, array(
                    'required' => false
                ))
                ->add('oc3Desc')
                ->add('oc3How')
                ->add('oc3Success')
                ->add('oc3Needs')

                // ORGANIZATION COMPETENCIES 4
                ->add('oc4WhatWhy', TextareaType::class, array(
                    'required' => false
                ))
                ->add('oc4Desc')
                ->add('oc4How')
                ->add('oc4Success')
                ->add('oc4Needs')

                // ORGANIZATION COMPETENCIES 5
                ->add('oc5WhatWhy', TextareaType::class, array(
                    'required' => false
                ))
                ->add('oc5Desc')
                ->add('oc5How')
                ->add('oc5Success')
                ->add('oc5Needs')


                // CAREER OBJECTIVES
                ->add('careerObjectives')


                // ADDITIONAL INFORMATION
                ->add('additionalInfo')


                // BUTTONS
                ->add('btnSave', SubmitType::class, [
                    'label' => '<span class="fa fa-save"></span> Save',
                    'attr' => array('value' => 2),
                ])
                ->add('btnSendToSupervisor', SubmitType::class, [
                    'label' => '<span class="fa fa-send"></span> Send to Supervisor',
                    'attr' => array(
                        'value' => 3,
                        'onclick' => "return confirm('This form will be send to your Supervisor.\\nYou will not be able to make any changes.\\n\\nDo you want to continue?')"
                    )
                ])
                ;

                /*$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
                    //$formData = $event->getData();
                    //dump($formData);die;
                    $form = $event->getForm();

                    // SELF ASSESSMENT
                    if ($formData->getSa4CoreQuality() != null) {
                        $form->add('sa4FeedbackYE');
                    }
                    if ($formData->getSa5CoreQuality() != null) {
                        $form->add('sa5FeedbackYE');
                    }

                    // TASKS AND RESPONSIBILITIES
                    if ($formData->getTr4WhatWhy() != null) {
                        $form->add('tr4FeedbackYE');
                    }
                    if ($formData->getTr5WhatWhy() != null) {
                        $form->add('tr5FeedbackYE');
                    }

                    // SKILLS AND COMPETENCIES
                    if ($formData->getSc4WhatWhy() != null) {
                        $form->add('sc4FeedbackYE');
                    }
                    if ($formData->getSc5WhatWhy() != null) {
                        $form->add('sc5FeedbackYE');
                    }

                    // ORGANIZATIONAL COMPETENCIES
                    if ($formData->getOc4WhatWhy() != null) {
                        $form->add('oc4FeedbackYE');
                    }
                    if ($formData->getOc5WhatWhy() != null) {
                        $form->add('oc5FeedbackYE');
                    }
            });*/
        }

        if (($this->formParam['userType'] == 'supervisor') and ($this->formParam['formAction'] == 'edit')){
            $builder
                // CDP SPECIFIC
                ->add('cdpFeedbackSupervisor')

                // BUTTONS
                ->add('btnSave', SubmitType::class, [
                    'label' => '<span class="fa fa-save"></span> Save',
                    'attr' => array('value' => 3),
                ])
                ->add('btnSendBackToEmployee', SubmitType::class, [
                    'label' => '<span class="fa fa-send"></span> Send back to Employee',
                    'attr' => array(
                        'value' => 4,
                        'onclick' => "return confirm('This form will be send back to the Employee.\\nThe Employee will be able to make changes again.\\n\\nDo you want to continue?')"
                    )
                ])
                ->add('btnSendToHR', SubmitType::class, [
                    'label' => '<span class="fa fa-send"></span> Send to HR',
                    'attr' => array(
                        'value' => 5,
                        'onclick' => "return confirm('This form will be send to HR.\\nYou will not be able to make any changes.\\n\\nDo you want to continue?')"
                    )
                ])
            ;
        }

        if (($this->formParam['userType'] == 'board') and ($this->formParam['formAction'] == 'edit')){
            $builder
                // YEAR-END SPECIFIC
                ->add('cdpFeedbackHR')

                // BUTTONS
                ->add('btnSave', SubmitType::class, [
                    'label' => '<span class="fa fa-save"></span> Save',
                    'attr' => array('value' => 5),
                ])
            ;
        }

        if (($this->formParam['userType'] == 'hr') and ($this->formParam['formAction'] == 'edit')){
            $builder
                // YEAR-END SPECIFIC
                ->add('cdpFeedbackHR')

                // BUTTONS
                ->add('btnSave', SubmitType::class, [
                    'label' => '<span class="fa fa-save"></span> Save',
                    'attr' => array('value' => 5),
                ])
                ->add('btnSendBackToEmployee', SubmitType::class, [
                    'label' => '<span class="fa fa-send"></span> Send back to Employee',
                    'attr' => array(
                        'value' => 7,
                        'onclick' => "return confirm('This form will be send back to the Employee.\\nThe Employee will be able to make changes again.\\n\\nDo you want to continue?')"
                    )
                ])
                ->add('btnOnHold', SubmitType::class, [
                    'label' => '<span class="fa fa-hourglass-start"></span> On Hold',
                    'attr' => array('value' => 6),
                ])
                ->add('btnCompleted', SubmitType::class, [
                    'label' => '<span class="fa fa-flag-checkered"></span> Completed',
                    'attr' => array(
                        'value' => 8,
                        'onclick' => "return confirm('This form will be completed and cannot be undone.\\nYou will not be able to make any changes.\\n\\nDo you want to continue?')"
                    )
                ])
            ;
        }

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormCdp::class,
            'formParam'  => null,
            'formData'   => null,
        ]);
    }
}