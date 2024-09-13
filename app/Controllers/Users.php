<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    protected $userModel;
    protected $helpers = ["form"];

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Get all user from database
        $users = $this->userModel->getAllUser();

        // Specifie badge color to user depending on their role
        $badge = [
            'admin' => 'badge-success',
            'verificator' => 'badge-warning',
            'anggota' => 'badge-primary'
        ];

        // Data will send to users page
        $data = [
            'title' => 'Halaman Users',
            'users' => $users,
            'badge' => $badge
        ];

        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('admin/users', $data);
        }

        // Catch data from input user or from post methon
        $userData = [
            'username' => $this->request->getPost('username'),
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'group' => $this->request->getPost('group'),
        ];

        // The rules of the validation
        $rules = [
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|max_length[30]|is_unique[users.username]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                    'is_unique' => '{field} has been taken by another user',
                    'max_length' => 'Your {field} is too long.',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|max_length[254]|valid_email',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                    'valid_email' => 'Your {field} is not a valid email address',
                ],
            ],
            'name' => [
                'label'  => 'Name',
                'rules'  => 'required|max_length[30]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                ],
            ],
            'group' => [
                'label'  => 'Group',
                'rules'  => 'required',
            ],
        ];

        // Check if data form users is match with validation rules
        if (!$this->validateData($userData, $rules)) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        $users = auth()->getProvider();

        $newUser = new User([
            'username'  => $userData['username'],
            'email'     => $userData['email'],
            'password'  => 'admin1234',
            'name'      => $userData['name'],
            'photo'     => 'default-user.png',
        ]);
        $users->save($newUser);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Activate user
        $user->activate();

        // Add group to user
        $user->addGroup($userData['group']);

        // Persiapkan data session untuk dikirim ke halaman
        session()->setFlashdata('success', 'User baru berhasil ditambahkan.');

        // Back to users page with message success input data
        return redirect()->to('admin/users');
    }

    public function activateUser($id)
    {
        $users = auth()->getProvider();
        $user = $users->findById($id);

        $user->activate();

        session()->setFlashdata('message', 'User berhasil diaktifkan');

        return redirect()->to('admin/users');
    }

    public function deleteUser($id)
    {
        $users = auth()->getProvider();
        $users->delete($id, true);

        session()->setFlashdata('message', 'User berhasil dihapus');

        return redirect()->to('admin/users');
    }
}
