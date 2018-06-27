<?php

namespace Backend\Modules\FacebookEvents\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Model;
use Backend\Modules\FacebookEvents\Command\SaveSettings;
use Backend\Modules\FacebookEvents\Form\SaveSettingsType;

class Settings extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        $form = $this->createForm(
            SaveSettingsType::class,
            new SaveSettings($this->get('fork.settings'))
        );

        $form->handleRequest($this->get('request'));

        if (!$form->isValid()) {
            $this->template->assign('form', $form->createView());

            $this->parse();
            $this->display();

            return;
        }

        /** @var SaveSettings $settings */
        $settings = $form->getData();

        // The command bus will handle the saving of the settings in the database.
        $this->get('command_bus')->handle($settings);

        $this->redirect(
            Model::createURLForAction(
                'Settings',
                null,
                null,
                [
                    'report' => 'saved',
                ]
            )
        );
    }
}
