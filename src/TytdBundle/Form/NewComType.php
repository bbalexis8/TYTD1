<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TytdBundle\Entity\Article;
use TytdBundle\Entity\Utilisateur;

class NewComType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreC', TextType::class, array(
                'label' => 'Titre',
                "attr" => array('class' => 'tailleinput')
            ))
            ->add('texte', TextareaType::class, array(
                'label' => 'Texte',
                "attr" => array('class' => 'tailleinput2')
            ))
            ->add('dateC', DateTimeType::class, array(
                'label' => ' ',
                'format' => 'dd:MM:yyyy',
                'input' => 'datetime',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'hiddendates')
            ))
            ->add('article', EntityType::class, array(
                "class" => Article::class,
                "label" => ' ',
                "choice_label" => 'titre',
                "attr" => array('class' => 'hiddendates')
            ))
            ->add('utilisateur', EntityType::class, array(
                "class" => Utilisateur::class,
                "choice_label" => 'username',
                "attr" => array('class' => 'tailleinput')
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

