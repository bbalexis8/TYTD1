<?php

namespace TytdBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                'label' => 'Nom'
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prenom'
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email'
            ))
            ->add('adresse')
            ->add('codepostal', IntegerType::class, array(
                'label' => 'Code Postal'
            ))
            ->add('ville')
            ->add('pays', CountryType::class, array(
                'label' => 'Pays'))
            ->add('username', TextType::class, array(
                'label' => 'Pseudo'
            ))
            ->add('password', PasswordType::class, array(
                'label' => 'Mot de passe'
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description'
            ))
            ->add('image', TextType::class, array(
                'label' => 'Avatar'
            ))
            ->add('dateinscription', DateTimeType::class, array(
                'label' => 'Date d\'inscription'
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
