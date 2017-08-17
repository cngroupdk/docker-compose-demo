<?php
namespace AppBundle\Form;

use AppBundle\Entity\GuestBookEntry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateEntryForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
          ->add('name', TextType::class)
          ->add('text', TextareaType::class)
          ->add('submit', SubmitType::class, [
            'label' => 'Create'
          ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
          'data_class' => GuestBookEntry::class,
        ));
    }

}