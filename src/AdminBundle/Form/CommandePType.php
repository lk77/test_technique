<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CommandePType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('singleField',TextType::class,array('label' => false,'disabled' => true) )
            ->add('produit',null,array('label' => false,'attr'=>array('style'=>'display:none;')) )
            ->add('quantite',null,array('label' => false,'attr'=>array('style'=>'display:none;')) )
            ->add('prix',null,array('label' => false,'attr'=>array('style'=>'display:none;')) )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Commande_Produit'
        ));
    }
}
