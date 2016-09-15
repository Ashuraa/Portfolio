<?php

namespace MyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface; 
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    private $class;
    
    public function __construct($class)
    {
        $this->class = $class;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email', array('max_length' => 255, 'label' => 'Adresse email*', 'required' => false, 'trim' => true, 'attr' => array('size'=>'30')))
        ->add('subject', 'text', array('max_length' => 255, 'label' => 'Objet*', 'trim' => true, 'attr' => array('size'=>'30')))
        ->add('content', 'textarea', array('label' => 'Message*', 'attr' => array('rows' => '10','cols' => '80')));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => $this->class,
        );
    }

    public function setDefaultsOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => 'MyBundle\Form\Model\Contact',
    ));
}

    public function getName()
    {
        return 'Contact';
    }
}