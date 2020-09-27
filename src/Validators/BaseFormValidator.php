<?php


namespace BasicFormApp\Validators;

use Exception;

class BaseFormValidator
{
    /**
     * @param string $value
     * @param string $inputName
     * @return bool
     * @throws Exception
     */
    protected function checkInputIsEmpty($value, $inputName)
    {
        if (empty($value)) {
            throw new Exception("$inputName field is empty please fill it");
        }

        return true;
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws Exception
     */
    protected function isNumeric($value)
    {
        if (! is_numeric($value)) {
            throw new Exception("$value is not numeric");
        }

        return true;
    }

    /**
     * @param string $value
     * @param int $length
     * @return bool
     * @throws Exception
     */
    protected function checkCharLength($value, $length)
    {
        if (strlen($value) === $length) {
            return true;
        }
        throw new Exception("$value is not correct");
    }
}
