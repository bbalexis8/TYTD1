<?php

namespace TytdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use TytdBundle\Entity\Evenement;
use TytdBundle\Entity\Todolist;


class TodolistType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                "label" => 'Nom',
                "attr" => array('class' => 'tailleautresforms')
            ))
            ->add('evenements', EntityType::class, array(
                "class" => Evenement::class,
                'label' => 'Evenements',
                "choice_label" => 'nom',
                "multiple" =>true,
                "attr" => array('class' => 'taillechoicesforms')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Todolist'
        ));
    }

    public function getBlockPrefix()
    {
        return 'tytdbundle_todolist';
    }


}
