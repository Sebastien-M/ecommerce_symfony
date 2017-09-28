<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('ref')
                ->add('name')
                ->add('description')
                ->add('isEnabled')
                ->add('isPremium')
                ->add('price')
                ->add('note')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('brand', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'AppBundle:Brand',
                    // use the User.username property as the visible option string
                    'choice_label' => 'name',
                    // used to render a select box, check boxes or radios
                    // 'multiple' => true,
                    // 'expanded' => true,
                ))
                ->add('type', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'AppBundle:Type',
                    // use the User.username property as the visible option string
                    'choice_label' => 'name',
                    // used to render a select box, check boxes or radios
                    // 'multiple' => true,
                    // 'expanded' => true,
                ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
