<?php

namespace App\Form;

use App\Entity\Jugador;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Countries;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JugadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countries = Countries::getNames("ca");
        $builder
            ->add('nom')
            ->add('cognoms')
            ->add('equip')
            ->add('pais', ChoiceType::class, array(
                'choices' => array_flip($countries),
                'label'=>'Country'
            ))
            ->add('elo')
            //->add('byes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jugador::class,
        ]);
    }
}
