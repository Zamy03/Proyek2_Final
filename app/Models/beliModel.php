<?php

namespace App\Models;

use CodeIgniter\Model;

class BeliModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = false;
    protected $primaryKey = 'id_transaksi'; // Ganti dengan nama primary key yang sesuai
    protected $allowedFields = ['id_user', 'id_pakaian', 'tanggal_transaksi', 'bukti_pembayaran', 'total_pembayaran', 'total_pembelian', 'status_transaksi'];
}
