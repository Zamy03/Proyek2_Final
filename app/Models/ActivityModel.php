<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'auth_logins';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'ip_address', 'email', 'user_id', 'date', 'success'];

    // Metode untuk mendapatkan log aktivitas pengguna
    public function getUserActivityLog($userId)
    {
        // Logika untuk mengambil log aktivitas dari database
        return $this->where('user_id', $userId)->orderBy('date', 'desc')->findAll();
    }
}
