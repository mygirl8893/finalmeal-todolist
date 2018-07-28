<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType; //valid for number only
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('attr' => array(
                'class' => 'form-control',
                'title' => 'Input Create Name',
            )))
            ->add('finalmeal', TextareaType::class, array('attr' => array(
                'class' => 'form-control',
                'title' => 'Input the Final-Meal Figure',
            )))
            ->add('extra_order', TextType::class, array('attr' => array(
                'class' => 'form-control',
                'title' => 'Input Extra Order',
            )))
            ->add('cutlery', NumberType::class, array('attr' => array(
                'class' => 'form-control',
                'title' => 'Input Cutlery',
            )))
            ->add('flight', ChoiceType::class, array(
                'choices' => array(
                    'BR218 333' => 'BR218 333 (C30/Y279)',
                    'BR228 333' => 'BR228 333 (C30/Y279)',
                    'BR218 332' => 'BR218 332 (C24/Y228)',
                    'BR228 332' => 'BR228 332 (C24/Y228)',
                    'BR218 321' => 'BR218 321 (C08/Y176)',
                    'BR228 321' => 'BR228 321 (C08/Y176)',
                    'BR228 77A' => 'BR228 77A (C39/Y294)',
                    'BR228 77B' => 'BR228 77B (C39/Y314)',
                    'BR228 77M' => 'BR228 77M (C38/Y285)'
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'title' => 'Select the Fight',
                )
            ))
            ->add('reminder', TextType::class, array('attr' => array(
                'class' => 'form-control',
                'title' => 'Input Extra Order',
                'value' => '-',
            )))
            ->add('wastage', NumberType::class, array('attr' => array(
                'class' => 'form-control',
                'style' => 'width: 20%;',
                'title' => 'Input Wastage',
                'value' => '0',
            )))
            ->add('category', ChoiceType::class, array(
                'choices' => array(
                    '1' => '1', //1st time data saved
                    '2 - 2cd time update' => '2', //data have been updated as 2cd times
                    '3 - 3rd time update' => '3',
                    'HR and Catering figure are tally.' => 'Confirmed',
                    //'Closed' => 'Closed',
                    'Canceled' => 'Canceled' //for flt canx
                ),
                'attr' => array(
                    'class' => 'form-control',
                    'style' => 'width:20%;', //float: right; margin-top: -35px; margin-right: 602px;',
                    'title' => 'Default as 1 for 1st save',
                )
            ))
            ->add('create_date', DateType::class, array(
                'attr' => array(
                    'title' => 'Select the date (Only for amended details prior)',
                    'class' => 'form-control',
                    'style' => 'width:20%;', //float: right; margin-top: -35px; margin-right: 288px;',
                   // 'widget' => 'single_text'
                ),
                     'widget' => 'single_text',
                     //'disabled' => true //to disabled input required or amend date
                     'required' => false //to ignore required
            ))
            //->add('save', CreateDateType::class)
            ->add('save', SubmitType::class, array(
                'label' => 'Create | Update',
                'attr' => array(
                    'class' => 'btn btn-primary',
                    'style' => 'margin-top: -34px; margin-bottom: 23px; float: right;',
                    'title' => 'Create | Update'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Todo'
        ));
    }
}
