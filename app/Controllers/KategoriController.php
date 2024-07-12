<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    public function __construct()
    {
        session()->start();
    }

    public function index()
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->findAll();
        return view('kategori/index', $data);
    }

    public function store()
    {
        $model = new KategoriModel();

        // Data untuk disimpan
        $data = [
            'id_kat' => $this->request->getPost('id_kat'),
            'nama_kat' => $this->request->getPost('nama_kat'),
        ];

        $model->insert($data);

        return redirect()->to(base_url('kategori'));
    }
}
