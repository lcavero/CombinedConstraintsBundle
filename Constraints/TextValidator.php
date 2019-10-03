<?php


namespace LCV\CombinedConstraintsBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class TextValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Text) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Text');
        }

        if ($constraint->allowNull && null === $value) {
            return;
        }

        if (\is_string($value) && null !== $constraint->normalizer) {
            $value = call_user_func($constraint->normalizer)($value);
        }

        if ($constraint->required && (false === $value || (empty($value) && '0' != $value))) {
            $this->context->buildViolation($constraint->requiredMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(Text::IS_BLANK_ERROR)
                ->addViolation();
        }
    }
}
