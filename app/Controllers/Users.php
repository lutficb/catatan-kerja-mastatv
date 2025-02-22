<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobdesModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    protected $userModel;
    protected $jobdesModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->jobdesModel = new JobdesModel();
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

        // Check if data form users is match with validation rules. Rules saved in Config/Validation
        if (!$this->validateData($userData, 'user_rules')) {

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

    public function jobdesUser()
    {
        // Get All jobdes from database
        $jobdes = $this->jobdesModel->findAll();

        $data = [
            'title' => 'Halaman Job Deskripsi',
            'leftsubtitle' => 'Jobdes Baru',
            'rightsubtitle' => 'Daftar Jobdes',
            'jobdes' => $jobdes,
        ];
        // Check if the request from user is post method or not
        if (! $this->request->is('post')) {
            return view('admin/jobdes', $data);
        }

        // Catch data from input user or from post methon
        $jobdesData = [
            'name' => $this->request->getPost('name'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
        ];

        // Check if data form users is match with validation rules. Rules saved in Config/Validation
        if (!$this->validateData($jobdesData, 'jobdes_rules')) {

            // If data not pass the validation, page will back to user page with error from validation
            return redirect()->back()->withInput();
        }

        // Save data jobdes
        $this->jobdesModel->save($jobdesData);

        // Persiapkan data session untuk dikirim ke halaman
        session()->setFlashdata('success', 'Jobdes baru berhasil ditambahkan.');

        // Back to users page with message success input data
        return redirect()->to('admin/jobdes');
    }

    public function editUser($userId)
    {
        // Get user by id
        $user = auth()->getProvider()->findById($userId);

        // Get user jobdes
        $userJobdes = $this->jobdesModel->getUserJobdes($userId);

        // Get jobdes data
        $jobdes = $this->jobdesModel->findAll();

        // Get user group
        $group = $user->getGroups();

        // List of available group
        $lists = [
            'admin' => 'Admin',
            'verificator' => 'Verificator',
            'anggota' => 'Anggota',
        ];

        // Array of data send to view
        $data = [
            'title' => 'Halaman Edit User',
            'subtitle' => 'Perbarui Data User',
            'user' => $user,
            'group' => $group,
            'lists' => $lists,
            'jobdes' => $jobdes,
            'userJobdes' => $userJobdes,
        ];

        return view('admin/edit-user', $data);
    }

    public function updateUserAction($userId)
    {
        // Get data from post method
        $postData = [
            'oldGroup' => $this->request->getPost('oldgroup'),
            'newGroup' => $this->request->getPost('group'),
            'name' => $this->request->getPost('name')
        ];

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = $users->findById($userId);
        $user->fill([
            'name' => $postData['name'],
        ]);
        $users->save($user);

        if ($postData['oldGroup'] != $postData['newGroup']) {
            // Remove old group
            $user->removeGroup($postData['oldGroup']);

            // Add new group
            $user->addGroup($postData['newGroup']);
        }

        // Persiapkan data session untuk dikirim ke halaman
        session()->setFlashdata('success', 'Data user berhasil diubah.');

        // Back to users page with message success input data
        return redirect()->to('admin/edit-user/' . $userId);
    }

    public function updateJobdesAction($userId)
    {
        // Prepare data
        $jobId = $this->request->getPost('jobdes');
        // dd($jobId);

        $userjobdes = $this->jobdesModel->getFromUserJobdes($userId);
        // dd($userjobdes);

        if ($userjobdes) {
            // Update data
            $successInsert = $this->jobdesModel->updateUserJobdes($userId, $jobId);
        } else {
            // Insert new data
            $dataToInsert = [
                'user_id' => $userId,
                'job_id' => $jobId,
            ];

            $successInsert = $this->jobdesModel->addJobdesToUser($dataToInsert);
        }

        if ($successInsert < 1) {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('fail', 'Jobdes gagal disimpan.');
        } else {
            // Persiapkan data session untuk dikirim ke halaman
            session()->setFlashdata('success', 'Jobdes berhasil disimpan.');
        }

        // Back to users page with message success input data
        return redirect()->to('admin/edit-user/' . $userId);
    }

    public function userForceResetPassword($id)
    {
        $user = auth()->getProvider()->findById($id);

        $user->forcePasswordReset();

        session()->setFlashdata('message', 'Force Reset berhasil diubah');

        return redirect()->to('admin/users');
    }
}
