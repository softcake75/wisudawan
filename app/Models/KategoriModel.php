<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id_kat';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_kat'];
}
