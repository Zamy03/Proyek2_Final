<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ActivityModel;
use App\Models\UserModel;

class UserController extends Controller
{
    protected $userModel; // Tambahkan property untuk UserModel
    protected $auth; // Tambahkan property untuk auth service

    public function __construct()
    {
        $this->userModel = new UserModel(); // Inisialisasi UserModel
        $this->auth = service('authentication'); // Inisialisasi auth service

    }

    public function profile()
    {
        // Contoh: Mendapatkan data profil pengguna dari model
        $data['userProfile'] = $this->userModel->getUserProfile(user()->id);

        // Tampilkan view dengan data profil
        return view('user/profile', $data);
    }

    public function logout()
    {
        // Lakukan logout pengguna
        $this->auth->logout();

        // Redirect ke halaman login atau halaman lain yang diinginkan
        return redirect()->to('login');
    }
}
