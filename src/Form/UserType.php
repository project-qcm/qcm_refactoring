<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('imageFile', FileType::class, [
//                'required' => false,
//                'attr' => [
//                    'id' => 'file-input'
//                ]
//            ])
            ->add('firstName', null, [
                'label' => 'nom',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('name', null, [
                'label' => 'prénom',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', null, [
                'label' => 'adresse email',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('username', null, [
                'label' => 'pseudo',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'mot de passe',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
//            ->add('confirme_password', PasswordType::class, [
//                'label' => 'Confirmation du mot de passe',
//                'required' => true,
//                'attr' => [
//                    'class' => 'form-control'
//                ]
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
