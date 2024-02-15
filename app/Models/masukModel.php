<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'pakaian_masuk';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_pakaian_masuk'; // Ganti dengan nama primary key yang sesuai
    protected $allowedFields = ['id_pakaian', 'tanggal_pakaian_masuk', 'keterangan', 'jumlah_pakaian_masuk'];
}
