<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Masta TV Official Website'
        ];
        return view('welcome_message', $data);
    }
}
