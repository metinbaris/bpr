<?php

namespace BasicFormApp\Controllers;

class HomePageController extends BaseController
{
    /** Basic Form, Home Page */
    public function index()
    {
        return $this->view('home');
    }
}