<?php

namespace AppBundle\Form;

use AppBundle\Entity\Form;
use AppBundle\Entity\RatingYE;
use AppBundle\Repository\RatingYERepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->formParam = $options['formParam'];

        if (($this->formParam['formProgress'] == 'ye') and ($this->formParam['formAction'] == 'edit') and ($this->formParam['userType'] == 'user')){
            $builder
                // YEAR-END SPECIFIC
                ->add('yeFeedbackDate', DateType::class, [
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'js-datepicker'
                    ],
                    'html5' => false,
                    'format' => 'dd-MM-yyyy'
                ])
                ->add('yeQ1')
                ->add('yeQ2')
                ->add('yeQ3')
                ->add('yeQ4')

                // SELF ASSESSMENT
                ->add('sa1FeedbackYE')
                ->add('sa2FeedbackYE')
                ->add('sa3FeedbackYE')

                // TASKS AND RESPONSIBILITIES
                ->add('tr1FeedbackYE')
                ->add('tr2FeedbackYE')
                ->add('tr3FeedbackYE')

                // SKILLS AND COMPETENCIES
                ->add('sc1FeedbackYE')
                ->add('sc2FeedbackYE')
                ->add('sc3FeedbackYE')

                // ORGANIZATIONAL COMPETENCIES
                ->add('oc1FeedbackYE')
                ->add('oc2FeedbackYE')
                ->add('oc3FeedbackYE')

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

                $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
                    $formData = $event->getData();
                    $form = $event->getForm();

                    // SELF ASSESSMENT
                    if ($formData->getSa4CoreQuality() != null) $form->add('sa4FeedbackYE');
                    if ($formData->getSa4CoreQuality() != null) $form->add('sa4FeedbackYE');

                    // TASKS AND RESPONSIBILITIES
                    if ($formData->getTr4WhatWhy() != null) $form->add('tr4FeedbackYE');
                    if ($formData->getTr5WhatWhy() != null) $form->add('tr5FeedbackYE');

                    // SKILLS AND COMPETENCIES
                    if ($formData->getSc4WhatWhy() != null) $form->add('sc4FeedbackYE');
                    if ($formData->getSc5WhatWhy() != null) $form->add('sc5FeedbackYE');

                    // ORGANIZATIONAL COMPETENCIES
                    if ($formData->getOc4WhatWhy() != null) $form->add('oc4FeedbackYE');
                    if ($formData->getOc5WhatWhy() != null) $form->add('oc5FeedbackYE');
                })
            ;
        }

        if (($this->formParam['formProgress'] == 'ye') and ($this->formParam['formAction'] == 'edit') and ($this->formParam['userType'] == 'supervisor')){
            $builder
                // YEAR-END SPECIFIC
                ->add('yeFeedbackSupervisor')
                ->add('yeRating', EntityType::class, [
                    'class' => RatingYE::class,
                    'placeholder' => 'Select a status',
                    'query_builder' => function(RatingYERepository $repo){
                        return $repo->findAllRatingYEOrderById();
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

        if (($this->formParam['formProgress'] == 'ye') and ($this->formParam['formAction'] == 'edit') and ($this->formParam['userType'] == 'hr')){
            $builder
                // YEAR-END SPECIFIC
                ->add('yeFeedbackHR')
                ->add('yeRating', EntityType::class, [
                    'class' => RatingYE::class,
                    'placeholder' => 'Select a status',
                    'query_builder' => function(RatingYERepository $repo){
                        return $repo->findAllRatingYEOrderById();
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
            'data_class' => Form::class,
            'formParam'  => null,
            //'validation_groups' => ['Default', 'Registration']
        ]);
    }
}