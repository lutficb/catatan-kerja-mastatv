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
        $users = $this->userModel->getAllUser();

        $data = [
            'title' => 'Halaman Users',
            'users' => $users,
        ];

        if (! $this->request->is('post')) {
            return view('admin/users', $data);
        }

        $userData = [
            'username' => $this->request->getPost('username'),
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

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
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|max_length[255]|min_length[8]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?',
                ],
            ],
        ];

        if (!$this->validateData($userData, $rules)) {

            return redirect()->back()->withInput();
        }

        $users = auth()->getProvider();

        $newUser = new User([
            'username'  => $userData['username'],
            'email'     => $userData['email'],
            'password'  => $userData['password'],
            'name'      => $userData['name'],
            'photo'     => 'default-user.png',
        ]);
        $users->save($newUser);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Activate user
        $user->activate();

        // Add to default group
        $users->addToDefaultGroup($user);

        // Persiapkan data session untuk dikirim ke halaman
        session()->setFlashdata('success', 'User baru berhasil ditambahkan.');

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
