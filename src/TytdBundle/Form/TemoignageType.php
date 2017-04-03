<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TytdBundle\Entity\Evenement;
use TytdBundle\Entity\Utilisateur;

class TemoignageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre_t', TextType::class, array(
            'label' => 'Titre',
            "attr" => array('class' => 'taillefcontact')
            ))
            ->add('descriptionT', TextareaType::class, array(
                'label' => 'Description',
                "attr" => array('class' => 'taillemesscontact')
            ))
            ->add('texteT', TextareaType::class, array(
                'label' => 'Texte',
                "attr" => array('class' => 'taillemesscontact')
            ))
            ->add('dateT', DateTimeType::class, array(
                'label' => '  ',
                'format' => 'dd:MM:yyyy',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'hiddendates')
            ))
            ->add('evenement', EntityType::class, array(
        "class" => Evenement::class,
        "choice_label" => 'nom',
                "attr" => array('class' => 'taillefcontact')
    ))
            ->add('utilisateur', EntityType::class, array(
                "class" => Utilisateur::class,
                "choice_label" => 'username',
                "attr" => array('class' => 'taillefcontact')
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Temoignage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_temoignage';
    }


}
