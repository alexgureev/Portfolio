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
            ->add('next')
            ->add('prev')
            ->add('assetTitle')
            ->add('date', 'date', array(
                'widget' => 'choice',
                'pattern' => 'y',
                'years'         => range(date('Y') - 5, date('Y') + 5),
                'format'        => \IntlDateFormatter::MEDIUM,
                'label' => 'Разработано'))
            ->add('url', 'url', array(
                'label' => 'Ссылка'))
            ->add('title')
            ->add('description')
            ->add('carousel')
            ->add('tags', 'entity', array('class'=>'Knws\PortfolioBundle\Entity\Tag', 'property'=>'title', ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Knws\PortfolioBundle\Entity\Work',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention'       => 'mytopsecret',
        ));
    }

    public function getName()
    {
        return 'knws_portfoliobundle_worktype';
    }
}
