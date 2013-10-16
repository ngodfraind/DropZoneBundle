<?php

namespace Icap\DropzoneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CorrectionCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['allowCommentInCorrection'] == true) {
            if ($options['edit'] === true) {
                $params = array('required' => true);
                $params['attr'] = array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced'
                );
                $builder
                    ->add('comment', 'textarea', $params);
            }
        }

        $builder
            ->add('goBack', 'hidden', array('mapped' => false));
    }

    public function getName()
    {
        return 'icap_dropzone_correct_comment_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'edit' => true,
            'allowCommentInCorrection' => false,
            'translation_domain' => 'icap_dropzone'
        ));
    }
}