<?php

namespace LCV\CombinedConstraintsBundle\Exception;

class EmptyFormularyException extends InvalidFormularyException
{
    public function __construct()
    {
        parent::__construct([], "lcv.empty_formulary");
    }
}
