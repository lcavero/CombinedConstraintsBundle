<?php

namespace LCV\CombinedConstraintsBundle\Exception;

class NotSubmittedFormularyException extends InvalidFormularyException
{
    public function __construct()
    {
        parent::__construct([], "lcv.not_submitted_formulary", [], null, 500);
    }
}
