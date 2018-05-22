<?php

namespace Backend\Modules\FacebookConnector\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Model;
use Backend\Modules\FacebookConnector\Command\SavePageId;
use Backend\Modules\FacebookConnector\Component\FacebookStep;
use Backend\Modules\FacebookConnector\Form\PageIdType;
use Backend\Modules\FacebookConnector\Helper\FacebookHelper;
use Symfony\Component\HttpKernel\KernelInterface;

class Settings extends ActionEdit
{
    /** @var FacebookHelper */
    private $helper;

    public function __construct(KernelInterface $kernel)
    {
        parent::__construct($kernel);

        $this->helper = $this->get('facebook.helper');
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute(): void
    {
        parent::execute();

        switch ($this->helper->getStep()) {
            case FacebookStep::STEP_ONE_REQUIRES_FACEBOOK_APP_ID_AND_SECRET:
                $this->view(1, 'requiresApplicationIdAndSecret');
                break;
            case FacebookStep::STEP_TWO_REQUIRES_LOGIN:
                $this->view(2, 'loginUrl', $this->helper->getLoginUrl());
                break;
            case FacebookStep::STEP_THREE_REQUIRES_PAGE_ID:
                $this->loadPageIdForm();
                break;
            case FacebookStep::STEP_FOUR_REQUIRES_PAGE_ACCESS_TOKEN:
                $this->helper->getPageAccessToken();
                $this->view(5, 'active');
                break;
            default:
                $this->view(5, 'active');
                break;
        }
    }

    private function loadPageIdForm(): void
    {
        $form = $this->createForm(PageIdType::class, new SavePageId());
        $form->handleRequest($this->get('request'));

        if (!$form->isValid()) {
            $this->template->assign('form', $form->createView());
            $this->view(3, 'pageIdChooser');

            return;
        }

        $this->get('command_bus')->handle($form->getData());

        $this->redirect(Model::createURLForAction('Settings'));
    }

    public function view(int $step, string $stepName = null, $stepValue = true): void
    {
        if ($stepName) {
            $this->template->assign($stepName, $stepValue);
        }

        $this->template->assign('step', $step);
        parent::parse();
        $this->display();
    }
}
