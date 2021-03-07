<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Vardas'
            ])
            ->add('surname', TextType::class, [
                'label' => 'Pavardė'
            ])
            ->add('email', EmailType::class, [
                'label' => 'El. paštas'
            ])
            ->add('phone', TextType::class, [
                'label' => 'Telefono numeris'
            ])
            ->add('department', TextType::class, [
                'label' => 'Skyrius'
            ])
            ->add('position', TextType::class, [
                'label' => 'Pareigos'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
