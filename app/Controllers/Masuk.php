<?php

namespace App\Controllers;

use App\Models\MasukModel;
use App\Models\InventoryModel;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Files;

class Masuk extends BaseController
{
    protected $masukModel;
    protected $inventoryModel;

    public function __construct()
    {
        $this->masukModel = new MasukModel();
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        // Validasi input form jika diperlukan

        // Ambil data transaksi dan gabungkan dengan data pakaian
        $masukData = $this->masukModel
        ->select('pakaian_masuk.*, pakaian.namapakaian, pakaian.kode_pakaian, pakaian.ukuran, pakaian.warna')
        ->join('pakaian', 'pakaian.idpakaian = pakaian_masuk.id_pakaian')
        ->findAll();
        
        $data = [
            'barangnya' => $this->inventoryModel->findAll(),
            'masukData' => $masukData
        ];

        // Logika untuk halaman produk
        return view('barang_masuk/index', $data); // Sesuaikan dengan struktur direktori dan nama file view yang Anda gunakan
    }


    public function processAddStock()
    {
        // Validasi input form jika diperlukan

        $idPakaian = $this->request->getPost('barangnya');
        $tanggalPakaianMasuk = date('Y-m-d H:i:s'); // Sesuaikan dengan kebutuhan format tanggal
        $keterangan = $this->request->getPost('keterangan');
        $jumlahPakaianMasuk = $this->request->getPost('jumlah_pakaian_masuk');

        // Tambahkan data ke tabel pakaian_masuk
        $this->masukModel->insert([
            'id_pakaian' => $idPakaian,
            'tanggal_pakaian_masuk' => $tanggalPakaianMasuk,
            'keterangan' => $keterangan,
            'jumlah_pakaian_masuk' => $jumlahPakaianMasuk,
        ]);

        // Ambil data stok pakaian sekarang
        $currentStok = $this->inventoryModel->select('stok')->find($idPakaian)['stok'];

        // Update stok pada tabel pakaian
        $newStok = $currentStok + $jumlahPakaianMasuk;
        $this->inventoryModel->updatePakaian($idPakaian, ['stok' => $newStok]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/barang_masuk');
    }
}
