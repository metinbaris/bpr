<?php

namespace BasicFormApp\Controllers;

use BasicFormApp\Models\Enquiry;
use BasicFormApp\Validators\ContactFormValidator;

class ContactFormController extends BaseController
{
    /**
     * @var ContactFormValidator
     */
    protected $contactFormValidator;

    /**
     * @var Enquiry
     */
    protected $enquiry;

    public function __construct()
    {
        $this->contactFormValidator = new ContactFormValidator();
        $this->enquiry = new Enquiry();
    }

    /** Contact form submitter*/
    public function submitCustomerEnquiry()
    {
        if ($this->contactFormValidator->validate($_POST)) {
            session_start();
            $_SESSION[ 'customerName' ] = $_POST[ 'customer_name' ];
            // $this->store($_POST);
            header('Location: /enquiry-successfully-saved');
        } else {
            $this->view('home', $_POST);
        }
    }

    /**
     * @param array $array
     */
    protected function store($array)
    {
        $this->database()->insert($this->enquiry->getTableName(), $array);
    }
}
