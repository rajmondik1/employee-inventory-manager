<?php

namespace App\Form;

use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brandName', TextType::class)
            ->add('model', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Nešiojamas kompiuteris' => Equipment::EQUIPMENT_TYPE_LAPTOP,
                    'Telefonas' => Equipment::EQUIPMENT_TYPE_PHONE,
                    'Aksesuaras' => Equipment::EQUIPMENT_TYPE_ACCESSORY,
                ]
            ])
            ->add('year', DateType::class)
            ->add('identifier', TextType::class)
            ->add('price', MoneyType::class)
            ->add('warrantyExpires', DateType::class)
            ->add('file', TextType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
