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
}
