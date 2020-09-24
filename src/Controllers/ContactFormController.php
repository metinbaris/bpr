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

    /** Contact Form Submission*/
    public function submitCustomerMessage()
    {
        if (! $this->contactFormValidator->validate($_POST)) {
            $this->view('home');
        }
        //$this->view('contact_form_success');
    }
}
