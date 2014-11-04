<?php

namespace FKakSila\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TranslateLetters extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text',array('label'=>false))
            ->add('Перевести', 'submit')
            ->setMethod('GET');
    }

    function getName()
    {
        return 'name';
    }
} 