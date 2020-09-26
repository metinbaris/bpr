<?php

namespace BasicFormApp\Validators;

use BasicFormApp\Models\Enquiry;
use BasicFormApp\Traits\ErrorPage;
use Exception;

class ContactFormValidator extends BaseFormValidator implements ValidatorInterface
{
    /**
     * @param array $array
     * @return bool
     */
    public function validate($array)
    {
        try {
            $this->formValidate($array);

            return true;
        } catch (Exception $e) {
            $_SESSION[ 'flash_message' ] = $e->getMessage();

            return false;
        }
    }

    /**
     * @param array $array
     * @throws Exception
     */
    private function formValidate($array)
    {
        $this->validateCustomerName($array[ 'customer_name' ]);
        $this->validateEmailAddress($array[ 'email_address' ]);
        $this->checkInputIsEmpty($array[ 'message' ], 'Message');
        $this->checkInputIsEmpty(isset($array[ 'terms_and_conditions' ]) ? $array[ 'terms_and_conditions' ] : [],
            'Terms and Conditions checkbox');
        $this->validateOrderNumberAndEnquiryType($array[ 'enquiry_type' ], $array[ 'order_number' ]);
    }

    /**
     * @param string $email
     * @return bool
     * @throws Exception
     */
    private function validateEmailAddress($email)
    {
        $this->checkInputIsEmpty($email, 'Email');
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        return true;
    }

    /**
     * @param $name
     * @return bool
     * @throws Exception
     */
    private function validateCustomerName($name)
    {
        $this->checkInputIsEmpty($name, 'Name');
        if (! preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            throw new Exception("Only letters and white spaces are allowed in name field");
        }

        return true;
    }

    /**
     * @param string $enquiryType
     * @param integer $orderNumber
     * @throws Exception
     */
    private function validateOrderNumberAndEnquiryType($enquiryType, $orderNumber)
    {
        $this->validateEnquiryType($enquiryType);
        if ($enquiryType === Enquiry::Type_of_Enquiry_Regarding_An_Order) {
            $this->checkInputIsEmpty($orderNumber, 'Order Number');
            $this->isNumeric($orderNumber);
        }
    }

    /**
     * @param string $enquiryType
     * @throws Exception
     */
    private function validateEnquiryType($enquiryType)
    {
        if (! in_array($enquiryType, Enquiry::Enquiry_Types)) {
            throw new Exception("Select proper enquiry type");
        };
    }
}
