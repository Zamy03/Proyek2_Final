<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['email', 'username', 'fullname', 'user_image'];

    // Metode untuk mendapatkan data profil pengguna
    public function getUserById($userId)
    {
        return $this->find($userId);
    }
}
