<?php

namespace App\Form;

use App\Entity\PasswordLength;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PasswordLengthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Length', IntegerType::class, [
                'label' => 'Password Length',
                'attr' => [
                    'type' => 'number',
                    'min' => 12,
                    'max' => 1000000,
                ],
                'required' => true,
                'constraints' => [
                    new Assert\Positive()
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PasswordLength::class,
            'sanitize_html' => true,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'unique_identifier'
        ]);
    }
}
