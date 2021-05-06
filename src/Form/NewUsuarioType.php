<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use App\Entity\Usuario;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class NewUsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class, ['constraints' => [new NotBlank()]])
                ->add('surname', TextType::class, ['constraints' => [new NotBlank()]])
                ->add('email', TextType::class, ['constraints' => [new NotBlank()]])
                ->add('password', TextType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Length(['min' => 8])]])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(
                ['data_class' => Usuario::class]
        );
    }

    public function getName() {
        return 'logros';
    }

}
