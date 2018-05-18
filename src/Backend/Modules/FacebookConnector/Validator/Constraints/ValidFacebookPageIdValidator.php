<?php

namespace Backend\Modules\FacebookConnector\Validator\Constraints;

use Backend\Modules\FacebookConnector\Helper\FacebookHelper;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValidFacebookPageIdValidator extends ConstraintValidator
{
    /** @var FacebookHelper */
    private $facebookHelper;

    public function __construct(FacebookHelper $facebookHelper)
    {
        $this->facebookHelper = $facebookHelper;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$this->facebookHelper->isValidPageId($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
