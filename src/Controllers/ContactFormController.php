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

    /** Contact form submission*/
    public function submitCustomerMessage()
    {
        if ($this->contactFormValidator->validate($_POST)) {
            $this->store($_POST);
            header('Location: /enquiry-successfully-saved');
        }

        $this->view('home', $_POST);
    }

    /**
     * @param array $array
     */
    protected function store($array)
    {
        $this->database()->insert($this->enquiry->getTableName(), $array);
    }
}
