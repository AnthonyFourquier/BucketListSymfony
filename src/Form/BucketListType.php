<?php

namespace App\Form;

use App\Entity\BucketList;
use App\Entity\Categorie;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BucketListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label"=>"Titre"])
            // ->add('author', TextType::class, ["label"=>"Auteur"])
            ->add('content', TextType::class, ["label"=>"Description"])
            ->add('image', UrlType::class,  ["label"=>"Image"])
            ->add('categorie', EntityType::class,[
                "label"=>"Categorie", 
                "class"=>Categorie::class,
                "choice_label"=>"name",
                "multiple"=>false ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BucketList::class,
        ]);
    }
}
