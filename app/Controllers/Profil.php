<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobdesModel;

class Profil extends BaseController
{
    protected $jobdesModel;

    public function __construct()
    {
        $this->jobdesModel = new JobdesModel();
    }

    public function index()
    {
        // Get user id
        $userid = auth()->user()->id;

        // Get User jobdes
        $jobdes = $this->jobdesModel->getUserJobdes($userid);

        // Array of data send to view
        $data = [
            'title' => 'Profil Saya',
            'subtitle1' => 'Informasi Akun',
            'subtitle2' => 'Informasi Pribadi',
            'subtitle3' => 'Ganti Password',
            'jobdes' => $jobdes,
        ];

        return view('profil/index', $data);
    }
}
