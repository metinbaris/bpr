<?php

namespace BasicFormApp\Controllers;

use BasicFormApp\Mail\NewEnquiry;
use BasicFormApp\Mail\NewEnquiryMail;
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
    /**
     * @var NewEnquiryMail
     */
    protected $newEnquiryMail;

    /**
     * ContactFormController constructor.
     */
    public function __construct()
    {
        $this->contactFormValidator = new ContactFormValidator();
        $this->enquiry = new Enquiry();
        $this->newEnquiryMail = new NewEnquiryMail();
    }

    /**
     * Contact form submitter
     */
    public function submitCustomerEnquiry()
    {
        $isMailSent = false;
        if ($this->contactFormValidator->validate($_POST)) {
            $enquiry = $this->enquiry->setEnquiry($_POST);
            $this->store($enquiry->getTableName(), $enquiry->getEnquiry());
            $this->sessionPut('customerName', $enquiry->getName());
            $isMailSent = $this->newEnquiryMail->sendMail($enquiry);
        }

        $this->responseClientRequest($isMailSent);
    }

    /**
     * @param bool $isMailSent
     */
    private function responseClientRequest($isMailSent)
    {
        if ($isMailSent === true) {
            $this->redirect('/enquiry-successfully-saved');
        } else {
            $this->redirect('/', $_POST);
        }
    }
}
