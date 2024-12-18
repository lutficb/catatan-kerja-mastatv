<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobdesModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;

class Profil extends BaseController
{
    protected $jobdesModel;
    protected $userModel;

    public function __construct()
    {
        $this->jobdesModel = new JobdesModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Get user id
        $userid = auth()->user()->id;

        // Get User jobdes
        $jobdes = $this->jobdesModel->getUserJobdes($userid);

        // Get user detail
        $user = $this->userModel->getUserDetail($userid);

        // Check if user require force password
        $require = auth()->user()->requiresPasswordReset();

        // Array of data send to view
        $data = [
            'title' => 'Profil Saya',
            'subtitle1' => 'Informasi Akun',
            'subtitle2' => 'Informasi Pribadi',
            'subtitle3' => 'Ganti Password',
            'jobdes' => $jobdes,
            'user' => $user,
            'require' => $require,
        ];

        return view('profil/index', $data);
    }

    public function editAkun()
    {

        // Prepare data for sending to view
        $data = [
            'title' => 'Edit Informasi Akun',
            'subtitle' => 'Informasi Akun',
        ];

        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('profil/edit-akun', $data);
        }

        // Catch data from post method
        $datapost = [
            'id' => $this->request->getPost('user_id'),
            'name' => $this->request->getPost('name'),
        ];

        $rules = [
            'name' => [
                'label'  => 'Nama',
                'rules'  => [
                    'required',
                    'max_length[100]',
                    'min_length[3]',
                    'alpha_space'
                ],
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} terlalu panjang. Maksimal 100 karakter.',
                    'min_length' => '{field} terlalu pendek. Minimal 3 karakter',
                    'alpha_space' => '{field} tidak boleh kombinasi dengan angka. Tidak sesuai dengan kebiasaan orang Indonesia.'
                ],
            ],
        ];

        // Check if data form users is match with validation rules. Rules saved in Config/Validation
        if (!$this->validateData($datapost, $rules)) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        // Get user to update
        $users = auth()->getProvider();
        $user = $users->findById($datapost['id']);

        $user->fill([
            'name' => $datapost['name'],
        ]);

        $users->save($user);

        // Persiapkan data session untuk dikirim ke halaman
        session()->setFlashdata('akun-success', 'Nama berhasil diupdate.');

        // Back to users page with message success input data
        return redirect()->to('profil/');
    }

    public function addDetailAkun()
    {
        // Prepare data for sending to view
        $data = [
            'title' => 'Tambah Informasi Pribadi',
            'subtitle' => 'Form Informasi Pribadi',
        ];

        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('profil/add-pribadi', $data);
        }

        // Get data from post method
        $datapost = [
            'user_id' => $this->request->getPost('user_id'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
        ];

        // Check if data form users is match with validation rules. Rules saved in Config/Validation
        if (!$this->validateData($datapost, 'pribadi_rules')) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        // Add data to databse
        $result = $this->userModel->addUserDetail($datapost);

        if ($result == true) {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('pribadi-success', 'Data berhasil disimpan.');
        } else {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('pribadi-fail', 'Data gagal disimpan.');
        }

        // Back to users page with message success input data
        return redirect()->to('profil/');
    }

    public function editDetailAkun()
    {
        // Get data user id
        $userid = auth()->user()->id;

        // Get user data
        $user = $this->userModel->getUserDetail($userid);

        // Prepare data for sending to view
        $data = [
            'title' => 'Edit Informasi Pribadi',
            'subtitle' => 'Edit Informasi Pribadi',
            'user' => $user,
        ];

        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('profil/edit-pribadi', $data);
        }

        // Id detail user
        $id = $this->request->getPost('id');

        // Get data from post method
        $datapost = [
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US'),
        ];

        // Check if data form users is match with validation rules. Rules saved in Config/Validation
        if (!$this->validateData($datapost, 'pribadi_rules')) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        // Save data to database
        $result = $this->userModel->updateUserDetail($id, $datapost);

        if ($result == true) {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('pribadi-success', 'Data berhasil diupdate.');
        } else {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('pribadi-fail', 'Data gagal diupdate.');
        }

        // Back to users page with message success input data
        return redirect()->to('profil/');
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ubah Password',
            'subtitle1' => 'Form Ubah Password'
        ];
        if (auth()->user()->requiresPasswordReset()) {
            if (! $this->request->is('post')) {
                return view('profil/ubah-password', $data);
            }

            if (! $this->validate($this->getValidationRules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $result = auth()->check([
                'email'    => auth()->user()->email,
                'password' => $this->request->getPost('old_password'),
            ]);

            if (!$result->isOK()) {
                return redirect()->back()->withInput()->with('error', 'Password saat ini salah.');
            }

            // Success!

            $users = auth()->getProvider();

            $user = auth()->user()->fill([
                'password' => $this->request->getPost('password')
            ]);

            $users->save($user);

            // Remove force password reset flag
            auth()->user()->undoForcePasswordReset();

            // logout user and print login via new password
            auth()->logout();
            return redirect()->to('login')
                ->with('message', 'Password berhasil dirubah. Silahkan login dengan password baru!');
        }

        // if user login but NOT need requiresPasswordReset
        throw PageNotFoundException::forPageNotFound();
    }

    protected function getValidationRules(): array
    {
        return setting('Validation.changePassword') ?? [
            'password' => [
                'label' => 'Auth.password',
                'rules' => 'required|strong_password',
                'errors' => [
                    'required' => 'Kolom password baru wajib diisi.',
                    'strong_password' => 'Pawword terlalu lemah. Gunakan yang sedikit lebih kompleks.',
                ],
            ],
            'confirm_password' => [
                'label' => 'Auth.passwordConfirm',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Kolom konfirmasi password wajib diisi.',
                    'matches' => 'Konfirmasi password tidak sama dengan kolom password.'
                ],
            ],
        ];
    }
}
