<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CatatanModel;


class Verificator extends BaseController
{
    protected $catatanModel;

    public function __construct()
    {
        $this->catatanModel = new CatatanModel();
    }

    public function index()
    {
        // Get data catatan from table
        $catatan = $this->catatanModel->getAllCatatanForVerificator();

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
            'title' => 'Catatan Kerja Anggota',
            'leftsubtitle' => 'Statistik',
            'subtitle2' => 'Catatan Kerja Anggota',
            'catatan' => $catatan,
            'status' => $status,
        ];

        return view('verificator/index', $data);
    }

    public function periksaCatatan($id = null)
    {
        // Get catatn by id
        $catatan = $this->catatanModel->getAllCatatanForVerificator($id);

        // Chang color ada button disabled according to status
        $state = [
            'status' => [
                'checked' => 'Sudah diverifikasi',
                'unchecked' => 'Verifikasi Catatan'
            ],
            'color' => [
                'checked' => 'btn-warning',
                'unchecked' => 'btn-success'
            ],
            'button' => [
                'checked' => 'disabled',
                'unchecked' => ''
            ],
        ];

        // prepare data for default Anggota's page
        $data = [
            'title' => 'Detail Catatan Kerja Anggota',
            'leftsubtitle1' => 'Info Catatan',
            'leftsubtitle2' => 'Detail Catatan',
            'rightsubtitle' => 'Periksa Catatan',
            'catatan' => $catatan,
            'state' => $state,
        ];

        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('verificator/periksa-catatan', $data);
        }

        // Catch data from post method
        $post = [
            'id' => $this->request->getPost('id'),
            'status' => 'checked'
        ];

        // Save new status to database
        $this->catatanModel->save($post);

        // Prepare data session for callback
        session()->setFlashdata('success', 'Catatan berhasil diverifikasi');

        // Back to verificator page with message success input data
        return redirect()->to('verificator/');
    }
}
