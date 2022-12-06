<?php

namespace App\Form;

use App\Entity\Cateforie;
use App\Entity\Chaton;
use App\Entity\Proprietaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Symfony\Component\Translation\t;

class ChatonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Sterelise')
            ->add('Photo')
            ->add('Categorie', EntityType::class, [
                'class'=>Cateforie::class,
                'choice_label'=>"titre",
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add('proprietaire_id', EntityType::class, [
                'class'=>Proprietaire::class,
                'choice_label'=>"prenom",
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('ok', SubmitType::class,['label'=>"Ok"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chaton::class,
        ]);
    }

}