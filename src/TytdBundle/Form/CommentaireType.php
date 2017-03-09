<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('texteC')
            ->add('dateC')
            ->add('titreC')
            ->add('article', EntityType::class, array(
                "class" => Article::class,
                "choice_label" => 'titre'
            ))
            ->add('utilisateur', EntityType::class, array(
                "class" => Utilisateur::class,
                "choice_label" => 'username'
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
