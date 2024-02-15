<?php

// ProfileController.php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang masuk
        $userModel = new UserModel();
        $user = $userModel->find(user()->id);

        // Kirim data pengguna ke view
        return view('profile/index', ['user' => $user]);
    }
}
