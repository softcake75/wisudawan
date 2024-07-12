<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'array';
    protected $allowedFields    = ['username', 'password', 'nama', 'prodi', 'role'];

    public function login($username, $password)
    {
        return $this->db->table('users')->where([
            'username' => $username,
            'password' => $password,
            ])->get()->getRowArray();

    }

    public function getUserById($idUsers)
    {
        return $this->where('id_user', $idUsers)->first();
    }
}
