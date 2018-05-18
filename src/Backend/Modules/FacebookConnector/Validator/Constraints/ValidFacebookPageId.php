<?php

namespace Backend\Modules\FacebookConnector\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class ValidFacebookPageId extends Constraint
{
    public $message = 'The page-id "{{ string }}" is wrong.';
}
