<?php

namespace TytdBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('nom', TextType::class, array(
                'label' => 'Nom',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('mail', EmailType::class, array(
                'label' => 'E-mail',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('adresse', TextType::class, array(
                'label' => 'Adresse',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('codepostal', IntegerType::class, array(
                'label' => 'Code Postal',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('ville', TextType::class, array(
                'label' => 'Ville',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('pays', CountryType::class, array(
                'label' => 'Pays',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('typeevent', TextType::class, array(
                'label' => 'Type d\'évènement',
                'attr' => array('class' => 'taillefcontact')
            ))
            ->add('message', TextareaType::class, array(
                'label' => 'Votre Message',
                'attr' => array('class' => 'taillemesscontact')
            ))
            ->add('date', DateTimeType::class, array(
                'label' => ' ',
                'format' => 'dd:MM:yyyy',
                'data' => new \DateTime('now'),
                "attr" => array('class' => 'hiddendates')
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TytdBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tytdbundle_contact';
    }


}
