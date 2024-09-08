<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    protected $userModel;

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

        return view('admin/users', $data);
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
