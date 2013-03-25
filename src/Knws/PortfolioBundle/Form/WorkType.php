<?php

namespace Knws\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('hasmainpage','entity', array('class'=>'Shout\AdminBundle\Entity\Admin', 'property'=>'id', ));
        $builder
            ->add('class')
            ->add('slug')
            ->add('before')
            ->add('after')
            ->add('assetTitle')
            ->add('date')
            ->add('url')
            ->add('title')
            ->add('description')
            ->add('carousel')
            ->add('tags', 'entity', array('class'=>'Knws\PortfolioBundle\Entity\Tag', 'property'=>'title', ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Knws\PortfolioBundle\Entity\Work'
        ));
    }

    public function getName()
    {
        return 'knws_portfoliobundle_worktype';
    }
}
