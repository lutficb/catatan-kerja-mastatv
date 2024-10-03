<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // dd(uniqid());
        return view('welcome_message');
    }
}
