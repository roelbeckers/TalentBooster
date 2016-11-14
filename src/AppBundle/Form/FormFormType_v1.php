<?php

namespace AppBundle\Form;

use AppBundle\Entity\Challenge;
use AppBundle\Entity\CoreQuality;
use AppBundle\Entity\Form;
use AppBundle\Entity\Pitfall;
use AppBundle\Entity\RatingMY;
use AppBundle\Entity\RatingYE;
use AppBundle\Repository\ChallengeRepository;
use AppBundle\Repository\CoreQualityRepository;
use AppBundle\Repository\PitfallRepository;
use AppBundle\Repository\RatingMYRepository;
use AppBundle\Repository\RatingYERepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $formParam = $options['formParam'];

        //dump($formParam);die;

        $builder
            //CDP SPECIFIC
            /*->add('cdpFeedbackDate', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])*/
            //->add('cdpFeedbackSupervisor')
            //->add('cdpFeedbackHR')


            //MID-YEAR SPECIFIC
            /*->add('myFeedbackDate', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('myFeedbackSupervisor')
            ->add('myFeedbackHR')
            ->add('myRating', EntityType::class, [
                'class' => RatingMY::class,
                'placeholder' => 'Select a status',
                'query_builder' => function(RatingMYRepository $repo){
                    return $repo->findAllRatingMYOrderById();
                }
            ])*/

            //YEAR-END SPECIFIC
            ->add('yeFeedbackDate', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            //->add('yeFeedbackSupervisor')
            ->add('yeFeedbackHR')
            ->add('yeQ1')
            ->add('yeQ2')
            ->add('yeQ3')
            ->add('yeQ4')
            ->add('yeRating', EntityType::class, [
                'class' => RatingYE::class,
                'placeholder' => 'Select a status',
                'query_builder' => function(RatingYERepository $repo){
                    return $repo->findAllRatingYEOrderById();
                }
            ])

            // SELF ASSESSMENT 1
            /*->add('sa1CoreQuality', EntityType::class, [
                'class' => CoreQuality::class,
                'placeholder' => 'Select a Core Quality',
                'query_builder' => function(CoreQualityRepository $repo){
                    return $repo->findAllEnglishCoreQualityOrderById();
                }
            ])
            ->add('sa1CoreQualityDesc')
            ->add('sa1Pitfall', EntityType::class, [
                'class' => Pitfall::class,
                'placeholder' => 'Select a Pitfall',
                'query_builder' => function(PitfallRepository $repo){
                    return $repo->findAllEnglishPitfallOrderById();
                }
            ])
            ->add('sa1PitfallDesc')
            ->add('sa1Challenge', EntityType::class, [
                'class' => Challenge::class,
                'placeholder' => 'Select a Challenge',
                'query_builder' => function(ChallengeRepository $repo){
                    return $repo->findAllEnglishChallengeOrderById();
                }
            ])
            ->add('sa1ChallengeDesc')
            ->add('sa1How')
            ->add('sa1Success')
            ->add('sa1Needs')
            ->add('sa1FeedbackMY')*/
            //->add('sa1FeedbackYE')

            // SELF ASSESSMENT 2
            /*->add('sa2CoreQuality', EntityType::class, [
                'class' => CoreQuality::class,
                'placeholder' => 'Select a Core Quality',
                'query_builder' => function(CoreQualityRepository $repo){
                    return $repo->findAllEnglishCoreQualityOrderById();
                }
            ])
            ->add('sa2CoreQualityDesc')
            ->add('sa2Pitfall', EntityType::class, [
                'class' => Pitfall::class,
                'placeholder' => 'Select a Pitfall',
                'query_builder' => function(PitfallRepository $repo){
                    return $repo->findAllEnglishPitfallOrderById();
                }
            ])
            ->add('sa2PitfallDesc')
            ->add('sa2Challenge', EntityType::class, [
                'class' => Challenge::class,
                'placeholder' => 'Select a Challenge',
                'query_builder' => function(ChallengeRepository $repo){
                    return $repo->findAllEnglishChallengeOrderById();
                }
            ])
            ->add('sa2ChallengeDesc')
            ->add('sa2How')
            ->add('sa2Success')
            ->add('sa2Needs')
            ->add('sa2FeedbackMY')*/
            ->add('sa2FeedbackYE')

            // SELF ASSESSMENT 3
            /*->add('sa3CoreQuality', EntityType::class, [
                'class' => CoreQuality::class,
                'placeholder' => 'Select a Core Quality',
                'query_builder' => function(CoreQualityRepository $repo){
                    return $repo->findAllEnglishCoreQualityOrderById();
                }
            ])
            ->add('sa3CoreQualityDesc')
            ->add('sa3Pitfall', EntityType::class, [
                'class' => Pitfall::class,
                'placeholder' => 'Select a Pitfall',
                'query_builder' => function(PitfallRepository $repo){
                    return $repo->findAllEnglishPitfallOrderById();
                }
            ])
            ->add('sa3PitfallDesc')
            ->add('sa3Challenge', EntityType::class, [
                'class' => Challenge::class,
                'placeholder' => 'Select a Challenge',
                'query_builder' => function(ChallengeRepository $repo){
                    return $repo->findAllEnglishChallengeOrderById();
                }
            ])
            ->add('sa3ChallengeDesc')
            ->add('sa3How')
            ->add('sa3Success')
            ->add('sa3Needs')
            ->add('sa3FeedbackMY')*/
            ->add('sa3FeedbackYE')

            // SELF ASSESSMENT 4
            /*->add('sa4CoreQuality', EntityType::class, [
                'class' => CoreQuality::class,
                'placeholder' => 'Select a Core Quality',
                'query_builder' => function(CoreQualityRepository $repo){
                    return $repo->findAllEnglishCoreQualityOrderById();
                }
            ])
            ->add('sa4CoreQualityDesc')
            ->add('sa4Pitfall', EntityType::class, [
                'class' => Pitfall::class,
                'placeholder' => 'Select a Pitfall',
                'query_builder' => function(PitfallRepository $repo){
                    return $repo->findAllEnglishPitfallOrderById();
                }
            ])
            ->add('sa4PitfallDesc')
            ->add('sa4Challenge', EntityType::class, [
                'class' => Challenge::class,
                'placeholder' => 'Select a Challenge',
                'query_builder' => function(ChallengeRepository $repo){
                    return $repo->findAllEnglishChallengeOrderById();
                }
            ])
            ->add('sa4ChallengeDesc')
            ->add('sa4How')
            ->add('sa4Success')
            ->add('sa4Needs')
            ->add('sa4FeedbackMY')*/
            ->add('sa4FeedbackYE')

            // SELF ASSESSMENT 5
            /*->add('sa5CoreQuality', EntityType::class, [
                'class' => CoreQuality::class,
                'placeholder' => 'Select a Core Quality',
                'query_builder' => function(CoreQualityRepository $repo){
                    return $repo->findAllEnglishCoreQualityOrderById();
                }
            ])
            ->add('sa5CoreQualityDesc')
            ->add('sa5Pitfall', EntityType::class, [
                'class' => Pitfall::class,
                'placeholder' => 'Select a Pitfall',
                'query_builder' => function(PitfallRepository $repo){
                    return $repo->findAllEnglishPitfallOrderById();
                }
            ])
            ->add('sa5PitfallDesc')
            ->add('sa5Challenge', EntityType::class, [
                'class' => Challenge::class,
                'placeholder' => 'Select a Challenge',
                'query_builder' => function(ChallengeRepository $repo){
                    return $repo->findAllEnglishChallengeOrderById();
                }
            ])
            ->add('sa5ChallengeDesc')
            ->add('sa5How')
            ->add('sa5Success')
            ->add('sa5Needs')
            ->add('sa5FeedbackMY')*/
            ->add('sa5FeedbackYE')


            // TASKS AND RESPONSIBILITIES 1
            /*->add('tr1WhatWhy')
            ->add('tr1How')
            ->add('tr1Success')
            ->add('tr1Needs')
            ->add('tr1FeedbackMY')*/
            ->add('tr1FeedbackYE')

            // TASKS AND RESPONSIBILITIES 2
            /*->add('tr2WhatWhy')
            ->add('tr2How')
            ->add('tr2Success')
            ->add('tr2Needs')
            ->add('tr2FeedbackMY')*/
            ->add('tr2FeedbackYE')

            // TASKS AND RESPONSIBILITIES 3
            /*->add('tr3WhatWhy')
            ->add('tr3How')
            ->add('tr3Success')
            ->add('tr3Needs')
            ->add('tr3FeedbackMY')*/
            ->add('tr3FeedbackYE')

            // TASKS AND RESPONSIBILITIES 4
            /*->add('tr4WhatWhy')
            ->add('tr4How')
            ->add('tr4Success')
            ->add('tr4Needs')
            ->add('tr4FeedbackMY')*/
            ->add('tr4FeedbackYE')

            // TASKS AND RESPONSIBILITIES 5
            /*->add('tr5WhatWhy')
            ->add('tr5How')
            ->add('tr5Success')
            ->add('tr5Needs')
            ->add('tr5FeedbackMY')*/
            ->add('tr5FeedbackYE')


            // SKILLS AND COMPETENCIES 1
            /*->add('sc1WhatWhy')
            ->add('sc1How')
            ->add('sc1Success')
            ->add('sc1Needs')
            ->add('sc1FeedbackMY')*/
            ->add('sc1FeedbackYE')

            // SKILLS AND COMPETENCIES 2
            /*->add('sc2WhatWhy')
            ->add('sc2How')
            ->add('sc2Success')
            ->add('sc2Needs')
            ->add('sc2FeedbackMY')*/
            ->add('sc2FeedbackYE')

            // SKILLS AND COMPETENCIES 3
            /*->add('sc3WhatWhy')
            ->add('sc3How')
            ->add('sc3Success')
            ->add('sc3Needs')
            ->add('sc3FeedbackMY')*/
            ->add('sc3FeedbackYE')

            // SKILLS AND COMPETENCIES 4
            /*->add('sc4WhatWhy')
            ->add('sc4How')
            ->add('sc4Success')
            ->add('sc4Needs')
            ->add('sc4FeedbackMY')*/
            ->add('sc4FeedbackYE')

            // SKILLS AND COMPETENCIES 5
            /*->add('sc5WhatWhy')
            ->add('sc5How')
            ->add('sc5Success')
            ->add('sc5Needs')
            ->add('sc5FeedbackMY')*/
            ->add('sc5FeedbackYE')


            // ORGANIZATIONAL COMPETENCIES 1
            /*->add('oc1WhatWhy')
            ->add('oc1Desc')
            ->add('oc1How')
            ->add('oc1Success')
            ->add('oc1Needs')
            ->add('oc1FeedbackMY')*/
            ->add('oc1FeedbackYE')

            // ORGANIZATIONAL COMPETENCIES 2
            /*->add('oc2WhatWhy')
            ->add('oc2Desc')
            ->add('oc2How')
            ->add('oc2Success')
            ->add('oc2Needs')
            ->add('oc2FeedbackMY')*/
            ->add('oc2FeedbackYE')

            // ORGANIZATIONAL COMPETENCIES 3
            /*->add('oc3WhatWhy')
            ->add('oc3Desc')
            ->add('oc3How')
            ->add('oc3Success')
            ->add('oc3Needs')
            ->add('oc3FeedbackMY')*/
            ->add('oc3FeedbackYE')

            // ORGANIZATIONAL COMPETENCIES 4
            /*->add('oc4WhatWhy')
            ->add('oc4Desc')
            ->add('oc4How')
            ->add('oc4Success')
            ->add('oc4Needs')
            ->add('oc4FeedbackMY')*/
            ->add('oc4FeedbackYE');

            // ORGANIZATIONAL COMPETENCIES 5
            /*->add('oc5WhatWhy')
            ->add('oc5Desc')
            ->add('oc5How')
            ->add('oc5Success')
            ->add('oc5Needs')
            ->add('oc5FeedbackMY')*/
            //->add('oc5FeedbackYE');


            // OTHER COMMENTS
            /*->add('careerObjectives')
            ->add('additionalInfo');*/

            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
                $formData = $event->getData();
                $form = $event->getForm();

                //dump($oc5);die;

                //if ($formData->getOc5WhatWhy() != null) $form->add('oc5FeedbackYE');
            });
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