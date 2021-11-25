<?php

namespace App\Form;

use App\Entity\QuestionTable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('question')
            ->add('reply1')
            ->add('reply2')
            ->add('reply3')
            ->add('reply4')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuestionTable::class,

        ]);
    }
}
