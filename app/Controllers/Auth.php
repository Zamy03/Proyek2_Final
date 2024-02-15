<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */
    protected $viewsFolder = 'auth';

    // public function index(): string
    // {
    //     $data['identity'] = '';
    //     $data['password'] = '';

    //     return view('auth/login', $data);
    // }


    // public function login()
    // {
    //     $session = session();
    //     $ionAuth = new \IonAuth\Libraries\IonAuth();

    //     if ($this->request->getMethod() === 'post') {
    //         $login = $this->request->getPost('login');
    //         $password = $this->request->getPost('password');

    //         if ($ionAuth->login($login, $password)) {
    //             $userId = $ionAuth->user()->row()->id;
    //             $isAdmin = $ionAuth->inGroup('admin', $userId);

    //             if ($isAdmin) {
    //                 return redirect()->to('/admin/dashboard');
    //             } else {
    //                 return redirect()->to('/user/dashboard');
    //             }
    //         } else {
    //             $session->setFlashdata('message', $ionAuth->errors());
    //         }
    //     }

    //     // Load view for login form
    //     return view('auth/login');
    // }
}
