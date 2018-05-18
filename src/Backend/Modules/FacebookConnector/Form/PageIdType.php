<?php

namespace Backend\Modules\FacebookConnector\Form;

use Backend\Modules\FacebookConnector\Helper\FacebookHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PageIdType extends AbstractType
{
    /** @var FacebookHelper */
    private $facebookHelper;

    public function __construct(FacebookHelper $facebookHelper)
    {
        $this->facebookHelper = $facebookHelper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'pageId',
            TextType::class,
            [
                'required' => true,
                'label' => 'lbl.FacebookPageId',
            ]
        );
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'settings';
    }
}
