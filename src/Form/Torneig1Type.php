<?php

namespace App\Form;

use App\Entity\Torneig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Countries;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Torneig1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countries = Countries::getNames("ca");
        $builder
            ->add('nom')
            ->add('pais', ChoiceType::class, array(
                'choices' => array_flip($countries),
                'label'=>'Country'
            ))
            ->add('numRondes')
            ->add('numByes')
            //->add('llistaJugadors')
            ->add('arbitre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Torneig::class,
        ]);
    }
}
