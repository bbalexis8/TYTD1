<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TytdBundle\Entity\Categorie;
use TytdBundle\Entity\Todolist;
use TytdBundle\Entity\Utilisateur;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'label' => 'Nom de l\'évènement',
                "attr" => array('class' => 'taillefcontact')
            ))
            ->add('dateE', DateTimeType::class, array(
                'label' => 'Date de l\'évènement',
                'format' => 'dd:MM:yyyy',
                'input' => 'datetime',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'taillefcontact')
            ))
            ->add('categorie', EntityType::class, array(
        "class" => Categorie::class,
        "choice_label" => 'nomCa',
                "attr" => array('class' => 'taillefcontact')
    ))
            ->add('utilisateur', EntityType::class, array(
                "class" => Utilisateur::class,
                "choice_label" => 'username',
                "attr" => array('class' => 'taillefcontact')
            ))
            ->add('todolists', EntityType::class, array(
                "class" => Todolist::class,
                "choice_label" => 'nom',
                "label"=> "Vos \"To Do\"",
                "multiple" =>true,

            ));
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_evenement';
    }


}
