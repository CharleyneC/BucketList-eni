<?php

namespace App\Form;

use App\Entity\Wishes;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Config\Definition\BooleanNode;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                "label" => 'Avant de mourir, il faut que je fasse...'
            ])
            ->add('description', TextareaType::class, [
                "label" => 'Plus en détails, je voudrais...'
            ])
            ->add('auteur', TextType::class, [
                "label" => 'Comment je mapelle? jespère men souvenir'
            ])
            ->add('estVisible', CheckboxType::class, [
                "label" => 'Je le rend visible?'
            ])
            ->add('Ajouter', SubmitType::class, [
                "label" => 'Go! Jy penserais'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Wishes::class,
        ]);
    }
}
