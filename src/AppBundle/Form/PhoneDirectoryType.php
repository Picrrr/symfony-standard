<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PhoneDirectoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname', TextType::class)
            ->add('forname', TextType::class)
            ->add('homephone', TextType::class)
            ->add('cellphone', TextType::class)
            ->add('department', IntegerType::class,
                array(
                    'attr' => array(
                        'min' => 1,
                        'max' => 976
                    )
                )
            )
            ->add('save', SubmitType::class);
    }
}