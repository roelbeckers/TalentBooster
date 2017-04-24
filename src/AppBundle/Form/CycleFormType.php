<?php

namespace AppBundle\Form;

use AppBundle\Entity\Cycle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CycleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cdpDateStart', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('cdpDateEnd', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            //->add('cdpAutoMail')
            ->add('myDateStart', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('myDateEnd', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            //->add('myAutoMail')
            ->add('yeDateStart', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ])
            ->add('yeDateEnd', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
                'html5' => false,
                'format' => 'dd-MM-yyyy'
            ]);
            //->add('yeAutoMail');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cycle::class,
            //'validation_groups' => ['Default', 'Registration']
        ]);
    }
}