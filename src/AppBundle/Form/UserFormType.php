<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email', EmailType::class)
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'English' => 'en',
                ]
            ])
            ->add('jobtitle')
            ->add('team')
            ->add('dateHire', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('dateLastpromotion', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('supervisor', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'fullname',
                'placeholder' => 'No Supervisor selected',
                'query_builder' => function(UserRepository $repo){
                    return $repo->findAllSupervisorsOrderedByFirstname();
                }
            ])
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Employee' => 'ROLE_USER',
                    'Supervisor' => 'ROLE_SUPERVISOR',
                    'Board Member' => 'ROLE_BOARD',
                    'HR Administrator' => 'ROLE_HR',
                ],
                //'data' => [
                //    'ROLE_USER',
                //]
            ]);
            //->add('enabled');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['Default', 'Registration']
        ]);
    }
}
