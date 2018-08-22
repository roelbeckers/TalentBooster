<?php

namespace AppBundle\Form;

use AppBundle\Entity\Form;
use AppBundle\Entity\FormCdp;
use AppBundle\Entity\FormMy;
use AppBundle\Entity\RatingMy;
use AppBundle\Repository\RatingMyRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormMyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->formParam = $options['formParam'];
        $formData = $options['formData'];

        if (($this->formParam['userType'] == 'user') and (($this->formParam['formAction'] == 'edit') or ($this->formParam['formAction'] == 'create'))){
            $builder
                // MID-YEAR SPECIFIC
                ->add('myFeedbackDate', DateType::class, [
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'js-datepicker'
                    ],
                    'html5' => false,
                    'format' => 'dd-MM-yyyy'
                ])
                //->add('yeQ1')
                //->add('yeQ2')
                //->add('yeQ3')
                //->add('yeQ4')

                // SELF ASSESSMENT
                ->add('sa1FeedbackMY')

                // TASKS AND RESPONSIBILITIES
                ->add('tr1FeedbackMY')

                // SKILLS AND COMPETENCIES
                ->add('sc1FeedbackMY')

                // ORGANIZATIONAL COMPETENCIES
                ->add('oc1FeedbackMY')

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

                $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($formData){
                    //$formData = $event->getData();
                    //dump($formData);die;
                    $form = $event->getForm();

                    // SELF ASSESSMENT
                    if (($formData->getSa2CoreQuality() != null) or ($formData->getSa2CoreQualityDesc() != null) or ($formData->getSa2Pitfall() != null) or ($formData->getSa2PitfallDesc() != null) or ($formData->getSa2Challenge() != null) or ($formData->getSa2ChallengeDesc() != null) or ($formData->getSa2How() != null) or ($formData->getSa2Success() != null) or ($formData->getSa2Needs() != null)) {
                        $form->add('sa2FeedbackMY');
                    }
                    if (($formData->getSa3CoreQuality() != null) or ($formData->getSa3CoreQualityDesc() != null) or ($formData->getSa3Pitfall() != null) or ($formData->getSa3PitfallDesc() != null) or ($formData->getSa3Challenge() != null) or ($formData->getSa3ChallengeDesc() != null) or ($formData->getSa3How() != null) or ($formData->getSa3Success() != null) or ($formData->getSa3Needs() != null)) {
                        $form->add('sa3FeedbackMY');
                    }
                    if (($formData->getSa4CoreQuality() != null) or ($formData->getSa4CoreQualityDesc() != null) or ($formData->getSa4Pitfall() != null) or ($formData->getSa4PitfallDesc() != null) or ($formData->getSa4Challenge() != null) or ($formData->getSa4ChallengeDesc() != null) or ($formData->getSa4How() != null) or ($formData->getSa4Success() != null) or ($formData->getSa4Needs() != null)) {
                        $form->add('sa4FeedbackMY');
                    }
                    if (($formData->getSa5CoreQuality() != null) or ($formData->getSa5CoreQualityDesc() != null) or ($formData->getSa5Pitfall() != null) or ($formData->getSa5PitfallDesc() != null) or ($formData->getSa5Challenge() != null) or ($formData->getSa5ChallengeDesc() != null) or ($formData->getSa5How() != null) or ($formData->getSa5Success() != null) or ($formData->getSa5Needs() != null)) {
                        $form->add('sa5FeedbackMY');
                    }

                    // TASKS AND RESPONSIBILITIES
                    if ($formData->getTr2WhatWhy() != null) {
                        $form->add('tr2FeedbackMY');
                    }
                    if ($formData->getTr3WhatWhy() != null) {
                        $form->add('tr3FeedbackMY');
                    }
                    if ($formData->getTr4WhatWhy() != null) {
                        $form->add('tr4FeedbackMY');
                    }
                    if ($formData->getTr5WhatWhy() != null) {
                        $form->add('tr5FeedbackMY');
                    }

                    // SKILLS AND COMPETENCIES
                    if ($formData->getSc2WhatWhy() != null) {
                        $form->add('sc2FeedbackMY');
                    }
                    if ($formData->getSc3WhatWhy() != null) {
                        $form->add('sc3FeedbackMY');
                    }
                    if ($formData->getSc4WhatWhy() != null) {
                        $form->add('sc4FeedbackMY');
                    }
                    if ($formData->getSc5WhatWhy() != null) {
                        $form->add('sc5FeedbackMY');
                    }

                    // ORGANIZATIONAL COMPETENCIES
                    if ($formData->getOc2WhatWhy() != null) {
                        $form->add('oc2FeedbackMY');
                    }
                    if ($formData->getOc3WhatWhy() != null) {
                        $form->add('oc3FeedbackMY');
                    }
                    if ($formData->getOc4WhatWhy() != null) {
                        $form->add('oc4FeedbackMY');
                    }
                    if ($formData->getOc5WhatWhy() != null) {
                        $form->add('oc5FeedbackMY');
                    }
            });
        }

        if (($this->formParam['userType'] == 'supervisor') and ($this->formParam['formAction'] == 'edit')){
            $builder
                // MID-YEAR SPECIFIC
                ->add('myFeedbackSupervisor')
                ->add('myRating', EntityType::class, [
                    'class' => RatingMy::class,
                    //'placeholder' => 'Select a status',
                    'query_builder' => function(RatingMyRepository $repo){
                        return $repo->findAllRatingMyOrderById();
                    }
                ])

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

        if (($this->formParam['userType'] == 'board') and (($this->formParam['formAction'] == 'edit') or ($this->formParam['formAction'] == 'create'))){
            $builder
                // MID-YEAR SPECIFIC
                ->add('myFeedbackHR')

                // BUTTONS
                ->add('btnSave', SubmitType::class, [
                    'label' => '<span class="fa fa-save"></span> Save',
                    'attr' => array('value' => 5),
                ])
            ;
        }

        if (($this->formParam['userType'] == 'hr') and (($this->formParam['formAction'] == 'edit') or ($this->formParam['formAction'] == 'create'))){
            $builder
                // MID-YEAR SPECIFIC
                ->add('myFeedbackHR')
                ->add('myRating', EntityType::class, [
                    'class' => RatingMy::class,
                    //'placeholder' => 'Select a status',
                    'query_builder' => function(RatingMyRepository $repo){
                        return $repo->findAllRatingMyOrderById();
                    }
                ])

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
            'data_class' => FormMy::class,
            'formParam'  => null,
            'formData'   => null,
        ]);
    }
}