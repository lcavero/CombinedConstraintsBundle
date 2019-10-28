<?php

namespace LCV\CombinedConstraintsBundle\Exception;

use LCV\CommonExceptions\Exception\InvalidConstraintsException;

class InvalidFormularyException extends InvalidConstraintsException
{
    protected $constraintsErrors;

    public function __construct($constraintsErrors = [],
                                $message = "lcv.invalid_formulary",
                                $translationParams = [],
                                \Exception $previous = null,
                                $statusCode = 400)
    {
        $this->constraintsErrors = $constraintsErrors;
        parent::__construct($constraintsErrors, $message, $translationParams, $previous, $statusCode);
    }

    /**
     * @return array
     */
    public function getConstraintsErrors()
    {
        return $this->constraintsErrors;
    }


}
