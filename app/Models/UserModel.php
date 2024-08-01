<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'nama', 'prodi', 'role'];

    public function get_data($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }

    public function getUserById($idUsers)
    {
        return $this->where('id_user', $idUsers)->first();
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
