<?php

namespace LCV\CombinedConstraintsBundle\Exception;

class InvalidFormularyNameException extends InvalidFormularyException
{
    public function __construct($name)
    {
        parent::__construct([], "lcv.invalid_formulary_name", ['name' => $name]);
    }
}
