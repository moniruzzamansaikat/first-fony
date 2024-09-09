<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label'    => 'Username',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'autofocus' => true]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Firstname',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Lastname',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ]) 
            ->add('submit', SubmitType::class, [
                'label' => 'Submit',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
