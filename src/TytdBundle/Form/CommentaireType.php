<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TytdBundle\Entity\Article;
use TytdBundle\Entity\Utilisateur;

class CommentaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreC', TextType::class, array(
                'label' => 'Titre',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('texte', TextType::class, array(
                'label' => 'Texte',
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('dateC', DateTimeType::class, array(
                'label' => 'Date',
                'format' => 'dd:MM:yyyy',
                'input' => 'datetime',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'tailleautresforms')
            ))
            ->add('article', EntityType::class, array(
                "class" => Article::class,
                "choice_label" => 'titre',
                "attr" => array('class' => 'tailleautresforms')
            ))
            ->add('utilisateur', EntityType::class, array(
                "class" => Utilisateur::class,
                "choice_label" => 'username',
                "attr" => array('class' => 'tailleautresforms')
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Commentaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_commentaire';
    }


}
