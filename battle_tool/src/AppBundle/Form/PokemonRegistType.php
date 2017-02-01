<?php

namespace AppBundle\Form;

use AppBundle\Entity\Party;
use AppBundle\Entity\PokemonOriginal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('h',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
            ])
            ->add('a',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
            ])
            ->add('b',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
            ])
            ->add('c',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
            ])
            ->add('d',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
            ])
            ->add('s',IntegerType::class,[
                'attr' => ['class' => 'form-control'],
                'data' => 0
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