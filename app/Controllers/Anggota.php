<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanModel;

class Anggota extends BaseController
{
    protected $catatanModel;

    public function __construct()
    {
        $this->catatanModel = new CatatanModel();
    }

    public function index()
    {
        // Get id from logged user
        $userId = auth()->user()->id;

        // Get all data catatan form database
        $catatan = $this->catatanModel->getAllCatatan($userId);

        // Get users jobdes
        $jobdes = $this->catatanModel->getUserJobdes($userId);

        // Get Total Catatan
        $total = $this->catatanModel->getTotalCatatan($userId);

        // Get total catatan checked
        $checked = $this->catatanModel->getTotalCatatan($userId, 'checked');

        // Get total catatan unchecked
        $unchecked = $this->catatanModel->getTotalCatatan($userId, 'unchecked');

        // Give color to badge in status and Change status name
        $status = [
            'badge' => [
                'unchecked' => 'badge-warning',
                'checked' => 'badge-success'
            ],
            'pekerjaan' => [
                'unchecked' => 'Belum Diperiksa',
                'checked' => 'Diperiksa'
            ],
        ];

        // prepare data for default Anggota's page
        $data = [
            'title' => 'Catatan Kerja Saya',
            'leftsubtitle' => 'Statistik',
            'rightsubtitle' => 'Daftar Catatan Kerja',
            'catatan' => $catatan,
            'status' => $status,
            'jobdes' => $jobdes,
            'total' => $total['total'],
            'checked' => $checked['total'],
            'unchecked' => $unchecked['total'],
        ];

        return view('anggota/main', $data);
    }

    public function addNewCatatan()
    {
        // prepare data for "Add New Catatan Kerja" page
        $data = [
            'title' => 'Catatan Kerja Baru',
            'leftsubtitle' => 'Statistik',
            'rightsubtitle' => 'Form Catatan Baru'
        ];

        // Check if method request is post or not, if not return to Add New Catatan page
        if (! $this->request->is('post')) {
            return view('anggota/add-new-catatan', $data);
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

        // If data pass the validation, save data to database
        $this->catatanModel->save($newCatatanData);

        // Prepare flash for sending to sussecc page
        session()->setFlashdata('success', 'Catatan berhasil disimpan.');

        // Back to anggota page with flashdata
        return redirect()->to('anggota');
    }

    public function detailCatatan($catatanId)
    {
        // get data catatan from database
        $catatan = $this->catatanModel->find($catatanId);

        // Badge status cattaan
        $status = [
            'badge' => [
                'unchecked' => 'badge-warning',
                'checked' => 'badge-success'
            ],
            'title' => [
                'unchecked' => 'Belum diperiksa',
                'checked' => 'Sudah diperiksa'
            ],
        ];

        // prepare data for default Anggota's page
        $data = [
            'title' => 'Detail Catatan Kerja Anggota',
            'leftsubtitle1' => 'Info Catatan',
            'leftsubtitle2' => 'Detail Catatan',
            'rightsubtitle' => 'Aksi',
            'catatan' => $catatan,
            'status' => $status,
        ];

        return view('anggota/detail-catatan', $data);
    }

    public function editCatatan($catatanId)
    {
        // get data catatan from database
        $catatan = $this->catatanModel->find($catatanId);

        // prepare data for "Add New Catatan Kerja" page
        $data = [
            'title' => 'Edit Catatan Kerja',
            'leftsubtitle' => 'Statistik',
            'rightsubtitle' => 'Form Edit Catatan',
            'catatan' => $catatan
        ];

        // Check if method request is post or not, if not return to Add New Catatan page
        if (! $this->request->is('post')) {
            return view('anggota/edit-catatan', $data);
        }

        // Catch data from user request form
        $catatanData = [
            'id' => $catatanId,
            'waktu_catatan' => $this->request->getPost('waktu_catatan'),
            'deskripsi_catatan' => $this->request->getPost('note'),
            'deskripsi_permasalahan' => $this->request->getPost('note_problem'),
            'deskripsi_solusi' => $this->request->getPost('solution')
        ];

        // Check if data form users is match with validation rules
        if (!$this->validateData($catatanData, 'catatan_rules')) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        // If data pass the validation, save data to database
        $this->catatanModel->save($catatanData);

        // Prepare flash for sending to sussecc page
        session()->setFlashdata('success', 'Catatan berhasil disimpan.');

        // Back to anggota page with flashdata
        return redirect()->to('anggota');
    }

    public function uploadImgArticle()
    {
        $img = $this->request->getFile('img');
        $namaFile = $img->getRandomName();

        $image = \Config\Services::image();
        $image->withFile($img)
            ->resize(400, 266, true, 'width')
            ->save('img/img-article/' . $namaFile);

        echo base_url('img/img-article/' . $namaFile);
    }

    public function deleteImgArticle()
    {
        $image = $this->request->getPost('image');
        $namaFile = str_replace(base_url(), '', $image);
        if (unlink($namaFile)) {
            echo 'File berhasil dihapus';
        }
    }
}
