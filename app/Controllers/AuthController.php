<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form']);
        echo view('login');
    }

    public function cek_login() 
    {
        $muser = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $muser->get_data($username, $password);

        if ($cek) {
            session()->set('username', $cek['username']);
            session()->set('nama', $cek['nama']);
            session()->set('id_user', $cek['id_user']);
            return redirect()->to(base_url('slider'));
        } else {
            session()->setFlashdata('gagal', 'Username / Password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
