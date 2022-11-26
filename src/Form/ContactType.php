<?php

namespace App\Form;

use Asset\NotBlank;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr' => [
                'class' => 'form-control input',
                'minlenght' => '2',
                'maxlenght' => '50',
                'placeholder' => 'Name'
            ],
            'constraints' => [
                new Assert\NotBlank(),
            ]
        ])
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'form-control input',
                'minlenght' => '2',
                'maxlenght' => '180',
                'placeholder' => 'email'
            ],
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Email(),
                new Assert\Length(['min' => 2, 'max' => 180])
            ]
        ])
        ->add('subject', TextType::class,
            [
                'attr' => [
                    'class' => 'form-control input',
                    'minlenght' => '2',
                    'maxlenght' => '100',
                    'placeholder' => 'subject'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 100])
                ]
            ]
        )
        ->add(
            'message',
            TextareaType::class,
            [
                'attr' => [
                    'class' => 'form-control textarea',
                    'placeholder' => 'Your message'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ]
        )
        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'btn mt-4'
            ],
            'label' => 'Send Message !'
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
