<?php

namespace TytdBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'label' => 'Nom',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prenom',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('adresse', TextType::class, array(
                "attr" => array('class' => 'tailletitlesforms')))
            ->add('codepostal', IntegerType::class, array(
                'label' => 'Code Postal',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('ville', TextType::class, array(
                "attr" => array('class' => 'tailletitlesforms')))
            ->add('pays', CountryType::class, array(
                'label' => 'Pays'))
            ->add('username', TextType::class, array(
                'label' => 'Pseudo',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('password', PasswordType::class, array(
                'label' => 'Mot de passe',
                "attr" => array('class' => 'tailletitlesforms')
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
                "attr" => array('class' => 'tailletextsforms')
            ))
            ->add('image', FileType::class, array('label' => 'image (PNG file)',
                "attr" => array('class' => 'tailleautresforms')
            ))
            ->add('dateinscription', DateTimeType::class, array(
                'label' => 'Date d\'inscription',
                'format' => 'dd:MM:yyyy',
                'input' => 'datetime',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'tailleautresforms')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_utilisateur';
    }


}
