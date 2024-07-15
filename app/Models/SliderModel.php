<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_prodi','kategori','title', 'image', 'description','created_at', 'update_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];

    public function getSliders()
    {
        return $this->findAll(1000);
    }

    
}
