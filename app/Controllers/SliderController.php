<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SliderModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class SliderController extends BaseController
{

    public function index()
    {
        $model = new SliderModel();
        $data['slider'] = $model->getSlidersWithProdi();
        return view('slider/index', $data);
    }

    public function store()
    {
        $model = new SliderModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan kesalahan
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/image', $newName);

            $data = [
                'id_prodi' => $this->request->getPost('id_prodi'),
                'kategori' => $this->request->getPost('kategori'),
                'title' => $this->request->getPost('title'),
                'image' => 'image/' . $newName, // Simpan path ke gambar
                'npm' => $this->request->getPost('npm'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null,
            ];

            $model->save($data);

            return redirect()->to('/slider')->with('message', 'Image uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'The image could not be uploaded.')->withInput();
        }
    }

    public function wisudawan()
    {
        $model = new SliderModel();
        $data['sliders'] = $model->getSlidersWithProdi();
        return view('slider/wisudawan', $data);
    }

    public function uploadExcel()
    {
        $file = $this->request->getFile('excelFile');
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->getTempName();
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            $model = new SliderModel();
            foreach ($data as $key => $row) {
                // Skip header row and example row
                if ($key == 0 || ($row[0] == '1' && $row[1] == 'Memuaskan' && $row[2] == 'Contoh Judul' && $row[3] == 'contoh.jpg' && $row[4] == 'Ini adalah deskripsi contoh')) {
                    continue;
                }
                $model->save([
                    'id_prodi' => $row[0],
                    'kategori' => $row[1],
                    'title' => $row[2],
                    'image' => $row[3],
                    'npm' => $row[4],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'deleted_by' => null,
                ]);
            }

            return redirect()->to('/slider')->with('message', 'Data uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'The file could not be uploaded.')->withInput();
        }
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers for the template
        $sheet->setCellValue('A1', 'ID Program Studi');
        $sheet->setCellValue('B1', 'Kategori');
        $sheet->setCellValue('C1', 'Judul');
        $sheet->setCellValue('D1', 'Gambar');
        $sheet->setCellValue('E1', 'Deskripsi');

        // Add example data
        $sheet->setCellValue('A2', 'Teknik Informatika');
        $sheet->setCellValue('B2', 'Memuaskan');
        $sheet->setCellValue('C2', 'Contoh Judul');
        $sheet->setCellValue('D2', 'contoh.jpg');
        $sheet->setCellValue('E2', 'Ini adalah deskripsi contoh');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Create a temporary file in the system
        $filePath = tempnam(sys_get_temp_dir(), 'template_') . '.xlsx';
        $writer->save($filePath);

        // Return the file as a download
        return $this->response->download($filePath, null)->setFileName('template_slider.xlsx');
    }
}
