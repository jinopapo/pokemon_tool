<?php

namespace AppBundle\Form;

use AppBundle\Entity\Party;
use AppBundle\Entity\PokemonOriginal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonRegistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('item',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('h',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('a',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('b',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('c',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('d',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('s',NumberType::class,[
                'attr' => ['class' => 'form-control']
            ]);
        /* ->add('summary', TextareaType::class)
            ->add('content', TextareaType::class)
            ->add('authorEmail', EmailType::class)
            ->add('publishedAt', DateTimeType::class);*/
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array( 'data_class' => PokemonOriginal::class,));
    }
}