<?php

namespace FKakSila\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhraseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'text',array('label'=>false))
            ->add('Перевести', 'submit')
            ->setMethod('GET');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FKakSila\Bundle\MainBundle\Entity\Phrase',
            'csrf_protection'=>false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fkaksila_bundle_mainbundle_phrase';
    }
}
