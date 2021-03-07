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
            ->add('brandName', TextType::class, [
                'label' => 'Gamintojas',
            ])
            ->add('model', TextType::class, [
                'label' => 'Modelis',
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Nešiojamas kompiuteris' => Equipment::EQUIPMENT_TYPE_LAPTOP,
                    'Telefonas' => Equipment::EQUIPMENT_TYPE_PHONE,
                    'Aksesuaras' => Equipment::EQUIPMENT_TYPE_ACCESSORY,
                ],
                'label' => 'Tipas',
            ])
            ->add('year', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker-year'],
                'label' => 'Metai',
            ])
            ->add('identifier', TextType::class, [
                'label' => 'Unikalus kodas',
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Kaina',
            ])
            ->add('warrantyExpires', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker-warranty'],
                'label' => 'Garantija iki',
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
