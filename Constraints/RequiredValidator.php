<?php


namespace LCV\CombinedConstraintsBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class RequiredValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Required) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Required');
        }

        // Allow null
        if ($constraint->allowNull && null === $value) {
            return;
        }

        // Required
        if ($constraint->required && (false === $value || (empty($value) && '0' != $value))) {
            $this->context->buildViolation($constraint->requiredMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(Required::IS_BLANK_ERROR)
                ->addViolation();

            return;
        }
    }
}
