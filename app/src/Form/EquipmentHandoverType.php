<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\Equipment;
use App\Entity\EquipmentHandover;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentHandoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('handoverDate', DateType::class)
            ->add('takeoverDate', DateType::class, [
                'required' => false
            ])
            ->add('employee', EntityType::class, [
                'class' => Employee::class,
                'choice_label' => function (?Employee $employee) {
                    return $employee->getName() . ' ' . $employee->getSurname();
                }
            ])
            ->add('equipment', EntityType::class, [
                'class' => Equipment::class,
                'choice_label' => function (?Equipment $equipment) {
                    return $equipment->getBrandName() . ' ' . $equipment->getModel() . ' ' . $equipment->getYear()->format('Y') . ' ' . $equipment->getPrice();
                }
            ])
            ->add('handoverUser', EntityType::class, [
                'class' => Employee::class,
                'choice_label' => function (?Employee $employee) {
                    return $employee->getName() . ' ' . $employee->getSurname();
                }
            ])
            ->add('takeoverUser',  EntityType::class, [
                'class' => Employee::class,
                'choice_label' => function (?Employee $employee) {
                    return $employee->getName() . ' ' . $employee->getSurname();
                },
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EquipmentHandover::class,
        ]);
    }
}
