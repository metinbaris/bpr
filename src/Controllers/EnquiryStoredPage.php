<?php

namespace BasicFormApp\Controllers;

class EnquiryStoredPage extends BaseController
{
    /** Successfully Sent Customer Enquiry Page*/
    public function index()
    {
        session_start();

        return $this->view('enquiry_stored');
    }
}
