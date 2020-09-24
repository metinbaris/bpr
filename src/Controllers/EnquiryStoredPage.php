<?php

namespace BasicFormApp\Controllers;

class EnquiryStoredPage extends BaseController
{
    /** Successfully Sent Customer Enquiry Page*/
    public function index()
    {
        $userName = 'ali';

        return $this->view('enquiry_stored', ['userName' => $userName]);
    }
}
