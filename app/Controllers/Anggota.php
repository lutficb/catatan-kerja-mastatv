<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Anggota extends BaseController
{
    protected $catatanModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->catatanModel = new CatatanModel();
    }

    public function index()
    {
        // prepare data for default Anggota's page
        $data = [
            'title' => 'Catatan Kerja Saya',
        ];

        return view('anggota/main', $data);
    }

    public function addNewCatatan()
    {
        // prepare data for "Add New Catatan Kerja" page
        $data = [
            'title' => 'Catatan Kerja Baru',
        ];

        // Check if method request is post or not, if not return to Add New Catatan page
        if (! $this->request->is('post')) {
            return view('anggota/new-catatan', $data);
        }

        // Catch data from user request form
        $newCatatanData = [
            'user_id' => $this->request->getPost('user_id'),
            'waktu_catatan' => $this->request->getPost('waktu_catatan'),
            'deskripsi_catatan' => $this->request->getPost('note'),
            'deskripsi_permasalahan' => $this->request->getPost('note_problem'),
            'deskripsi_solusi' => $this->request->getPost('solution')
        ];

        // Check if data form users is match with validation rules
        if (!$this->validateData($newCatatanData, 'catatan_rules')) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }
    }
}
