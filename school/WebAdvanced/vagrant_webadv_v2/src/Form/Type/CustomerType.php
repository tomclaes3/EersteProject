<?php
namespace App\Form\Type;

use App\Entity\Customers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', TextType::class, [
            'label' => 'Voornaam',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        $builder->add('lastName', TextType::class, [
            'label' => 'Achternaam',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        $builder->add('gender', ChoiceType::class, [
            'label' => 'geslacht',
            'choices' => Customers::getGenderChoices(),
            'constraints' => [
                new NotBlank(),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customers::class,
        ]);
    }
}