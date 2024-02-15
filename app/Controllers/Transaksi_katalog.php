<?php

namespace App\Controllers;

use App\Models\BeliModel;
use App\Models\InventoryModel;
use CodeIgniter\Session\Session;

class Transaksi_katalog extends BaseController
{
    protected $beliModel;
    protected $inventoryModel;
    protected $session;

    public function __construct()
    {
        $this->session = service('session');
        $this->beliModel = new BeliModel();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        // Ambil ID pengguna dari sesi atau tempat lain sesuai kebutuhan Anda
        $userId = session()->get('logged_in');

        // Ambil data transaksi dan gabungkan dengan data pakaian
        $transaksiData = $this->beliModel
            ->select('transaksi.*, pakaian.namapakaian, pakaian.kode_pakaian')
            ->join('pakaian', 'pakaian.idpakaian = transaksi.id_pakaian')
            ->where('transaksi.id_user', $userId) // Gunakan $userId, bukan $userid
            ->findAll();

        $data = [
            'transaksiData' => $transaksiData
        ];

        // Logika untuk halaman produk
        return view('transaksi/index', $data);
    }
}
