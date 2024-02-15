<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BeliModel;
use App\Models\InventoryModel;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Files;

class Beli_katalog extends BaseController
{
    protected $namapakaian;
    protected $id_user;

    public function __construct()
    {
        $this->namapakaian = new InventoryModel();
        $this->id_user = new BeliModel();
    }

    public function index($id)
    {
        $data = [
            'namapakaian' => $this->namapakaian->where('idpakaian', $id)->findAll(),
            'id_user' => $this->id_user->findAll()
        ];
        // Logika untuk halaman produk
        return view('Beli/index', $data);
    }

    public function orderPakaian()
    {
        // Lakukan validasi input form jika diperlukan

        $transaksiModel = new BeliModel();
        $inventoryModel = new InventoryModel();

        $gambar = $this->request->getFile('gambar');

        // Pindahkan file ke direktori yang diinginkan
        $newName = $gambar->getRandomName();
        $gambar->move(ROOTPATH . 'public/bukti', $newName);
        // Ambil data dari form atau dari sesi login, sesuaikan dengan kebutuhan proyek Anda
        $data = [
            'id_pakaian'       => $this->request->getPost('id_pakaian'),
            'id_user'          => $this->request->getPost('id_user'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'bukti_pembayaran' => $newName,
            'total_pembayaran' => $this->request->getPost('total_harga'),
            'total_pembelian'  => $this->request->getPost('jumlah_beli'),
            'status_transaksi' => 'Pending',
            // Tambahkan field lain sesuai kebutuhan Anda
        ];
        // Transaksi
        $transaksiModel->insert($data);

        // Kurangi stok pakaian
        $idPakaian = $this->request->getPost('id_pakaian');
        $jumlahBeli = $this->request->getPost('jumlah_beli');

        // Ambil stok sekarang
        $currentStok = $inventoryModel->select('stok')->find($idPakaian)['stok'];

        // Kurangi stok berdasarkan jumlah beli
        $newStok = $currentStok - $jumlahBeli;

        // Update stok pada tabel pakaian
        $inventoryModel->updatePakaian($idPakaian, ['stok' => $newStok]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/transaksi');
    }
}
