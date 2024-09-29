<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatatanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Provider\Uuid;

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
        $userId = auth()->user()->id;

        // prepare data for default Anggota's page
        $data = [
            'title' => 'Catatan Kerja Saya',
            'leftsubtitle' => 'Statistik',
            'rightsubtitle' => 'Daftar Catatan Kerja',
            'catatan' => $this->catatanModel->getAllCatatan($userId),
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
