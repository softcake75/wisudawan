<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        session()->start();
    }

    public function index()
{
    $model = new UserModel();
    $data['users'] = $model->findAll();

    // // Mengambil informasi sesi
    // $nama = session()->get('nama');
    // $role = session()->get('role');
    // $idUsers = session()->get('log');

    // // Inisialisasi data untuk dikirim ke view
    // $data = [];

    // if ($role == 1) {
    //     // Jika peran adalah 1, ambil semua data pengguna
    //     $data['users'] = $model->findAll();
    // } elseif ($role == 2) {
    //     // Jika peran adalah 2, ambil data pengguna berdasarkan id_users
    //     $user = $model->getUserById($idUsers);

    //     // Periksa apakah data pengguna ditemukan
    //     if ($user) {
    //         $data['users'] = [$user]; // Mengubah menjadi array agar sesuai dengan struktur data di view
    //     } else {
    //         $data['users'] = []; // Set array kosong jika tidak ada data pengguna ditemukan
    //     }
    // }

    return view('user/index', $data);
}


    public function store()
    {
        $model = new UserModel();

        // Data untuk disimpan
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'role' => $this->request->getPost('role'),

        ];

        $model->insert($data);

        return redirect()->to(base_url('user'));
    }

    public function edit($id)
    {
        // Load model
        $UserModel = new UserModel();

        // Ambil data user berdasarkan ID
        $data['user'] = $UserModel->find($id);

        // Tampilkan modal edit dengan data yang diambil
        return view('user/edit_modal', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        // Data untuk disimpan
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'role' => $this->request->getPost('role'),
        ];

        // Panggil metode custom updateuser
        $model->updateuser($data, $id);

        return redirect()->to(base_url('user'));
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/user');
    }
}
