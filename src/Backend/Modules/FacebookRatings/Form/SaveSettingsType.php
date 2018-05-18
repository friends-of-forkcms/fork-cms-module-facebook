<?php

namespace Backend\Modules\FacebookRatings\Form;

use Backend\Modules\FacebookConnector\Helper\FacebookHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SaveSettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'minimumRating',
            IntegerType::class,
            [
                'required' => true,
                'label' => 'lbl.MinimumRating',
            ]
        );
    }

    public function getBlockPrefix(): string
    {
        return 'settings';
    }
}
