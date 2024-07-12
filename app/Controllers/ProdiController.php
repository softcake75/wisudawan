<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;

class ProdiController extends BaseController
{

    public function __construct()
    {
        session()->start();
    }

    public function index()
    {
        $model = new ProdiModel();
        $data['prodi'] = $model->findAll();
        return view('prodi/index', $data);
    }

    public function store()
    {
        $model = new ProdiModel();

        // Data untuk disimpan
        $data = [
            'id_prodi' => $this->request->getPost('id_prodi'),
            'nama_prodi' => $this->request->getPost('nama_prodi'),
        ];

        $model->insert($data);

        return redirect()->to(base_url('prodi'));
    }
}
