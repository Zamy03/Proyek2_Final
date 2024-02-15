<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'pakaian';
    protected $useTimestamps = false;
    protected $primaryKey = 'idpakaian'; // Ganti dengan nama primary key yang sesuai
    protected $allowedFields = ['namapakaian', 'deskripsi', 'ukuran', 'warna', 'kode_pakaian', 'stok', 'hargapakaian', 'gambar'];


    public function deletePakaian($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('idpakaian', $id);

        return $builder->delete();
    }

    public function updatePakaian($id, $dataUpdate)
    {
        $builder = $this->db->table($this->table);
        $builder->where('idpakaian', $id);

        return $builder->update($dataUpdate);
    }
    
}
