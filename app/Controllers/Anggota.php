<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Anggota extends BaseController
{
    public function index()
    {
        // prepare data for default Anggota's page
        $data = [
            'title' => 'Halaman Anggota',
        ];

        return view('anggota/main', $data);
    }
}
