<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_prodi', 'kategori', 'title', 'image', 'npm',
        'created_at', 'update_at', 'deleted_at', 'created_by', 
        'updated_by', 'deleted_by'
    ];

    public function getSlidersWithProdi()
    {
        return $this->select('sliders.*, prodi.nama_prodi')
                    ->join('prodi', 'prodi.id_prodi = sliders.id_prodi')
                    ->findAll();
    }
}
