<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos Conditions d\'utilisations.',
                    ]),
                ],
                "label" => "C.G.U"
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit avoir 6 caractères minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                "label" => "Mot de passe"
            ])
            ->add('nom', TextType::class, [
                "label" => "Nom"
            ])
            ->add('prenom', TextType::class, [
                "label" => "Prénom"
            ])
            ->add('mail', TextType::class, [
                "label" => "E-mail"
            ])
            ->add('ville', TextType::class, [
                "label" => "Ville"
            ])
            ->add('cp', TextType::class, [
                "label" => "Code Postal"
            ])
            ->add('adresse', TextType::class, [
                "label" => "Adresse"
            ])
            ->add('telephone', TextType::class, [
                "label" => "Telephone"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
