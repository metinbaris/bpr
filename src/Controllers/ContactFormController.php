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
            $this->enquiry->setEnquiry($_POST);
            $this->store($this->enquiry->getTableName(), $this->enquiry->getEnquiry());
            $this->sessionPut('customerName', $this->enquiry->getName());

            return $this->redirect('/enquiry-successfully-saved');
        } else {
            $this->view('home', $_POST);
        }
    }
}
