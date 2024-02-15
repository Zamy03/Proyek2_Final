<?php

namespace App\Controllers;

use App\Models\BeliModel;
use App\Models\InventoryModel;

class Keluar extends BaseController
{
    protected $beliModel;
    protected $inventoryModel;

    public function __construct()
    {
        $this->beliModel = new BeliModel();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        // Ambil data transaksi dan gabungkan dengan data pakaian
        $transaksiData = $this->beliModel
            ->select('transaksi.*, pakaian.namapakaian, pakaian.kode_pakaian')
            ->join('pakaian', 'pakaian.idpakaian = transaksi.id_pakaian')
            ->findAll();

        $data = [
            'transaksiData' => $transaksiData
        ];

        // Logika untuk halaman produk
        return view('barang_keluar/index', $data);
    }

    public function updateStatus()
    {
        // Lakukan validasi input form jika diperlukan

        $transaksiModel = new BeliModel();

        $id_transaksi = $this->request->getPost('id_transaksi');
        $status_transaksi = $this->request->getPost('status_transaksi');

        // Update status_transaksi pada tabel transaksi
        $transaksiModel->update($id_transaksi, ['status_transaksi' => $status_transaksi]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/barang_keluar');
    }
}
