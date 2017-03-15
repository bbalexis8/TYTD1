<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TytdBundle\Entity\Categorie;
use TytdBundle\Entity\Utilisateur;

class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description', TextareaType::class, array(
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('texte', TextareaType::class, array(
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('date', DateTimeType::class, array(
            'label' => 'Date de publication'))
            ->add('image', FileType::class, array('label' => 'image (PDF file)'))
            ->add('categorie', EntityType::class, array(
                "class" => Categorie::class,
                "choice_label" => 'nomCa'
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
            'data_class' => 'TytdBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_article';
    }


}
