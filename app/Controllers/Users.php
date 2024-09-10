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
            'name'  => $this->request->getPost('nama'),
            'password' => $this->request->getPost('password'),
        ];

        $rules = [
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|max_length[30]|is_unique[users.username]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|max_length[255]|min_length[10]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?',
                ],
            ],
            'name' => [
                'label'  => 'Name',
                'rules'  => 'required|max_length[30]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                ],
            ],
        ];

        if (!$this->validateData($userData, $rules)) {

            return redirect()->back()->withInput();
        }

        $users = auth()->getProvider();

        $newUser = new User([
            'username'  => $userData['username'],
            'email'     => '',
            'password'  => $userData['password'],
            'name'      => $userData['name'],
            'photo'     => 'default-user.png',
        ]);
        $users->save($newUser);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        session()->setFlashdata('success', 'User baru berhasil ditambahkan.');

        return redirect()->to('admin/users');
    }

    public function addNewUsers()
    {
        $username = $this->request->getVar('username');
        $nama = $this->request->getVar('nama');
        $password = $this->request->getVar('password');

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $newUser = new User([
            'username'  => $username,
            'email'     => '',
            'password'  => $password,
            'name'      => $nama,
            'photo'     => 'default-user.png',
        ]);
        $users->save($newUser);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        redirect()->to('admin/users')->withInput();
    }
}
