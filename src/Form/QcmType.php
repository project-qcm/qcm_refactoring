<?php

namespace App\Form;

use App\Entity\QcmTable;
use App\Entity\QuestionTable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QcmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        dump($options);
        $var = $options['var'];
        $builder
//            ->add('titleMovie')
//            ->add('posterMovie')
//            ->add('dateAt')
//            ->add('questionTableIdQestion')
            ->add('questionTableIdQestion', EntityType::class,[
                'class' => QuestionTable::class,

                'multiple' => true,
                'required' => false
            ])
            ->add('titleMovie',ChoiceType::class,array(
                'choices'  => array(
                    '$var' => $var,
                ),
                'expanded' => true,
                'multiple' => false
            ))
//            ->add('userIdUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QcmTable::class,
            'var' => null,
            'repo' => null,

        ]);
    }
}
