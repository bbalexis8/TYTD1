<?php

namespace TytdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\Type;
use Symfony\Component\Intl\DateFormatter\IntlDateFormatter;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use TytdBundle\Entity\Categorie;
use TytdBundle\Entity\Utilisateur;

class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextareaType::class, array(
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('description', TextareaType::class, array(
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('texte', TextareaType::class, array(
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('date', DateType::class, array(
                'label' => 'Date',
                'format' => 'dd:MM:yyyy',
                'input' => 'datetime',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'tailleautresforms')
            ))

            ->add('image', FileType::class, array('label' => 'image (PNG file)',
                "attr" => array('class' => 'tailleautresforms')))
            ->add('categorie', EntityType::class, array(
                "class" => Categorie::class,
                "choice_label" => 'nomCa',
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
