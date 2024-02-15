<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class Inventory extends BaseController
{
    protected $namapakaian;
    

    public function __construct()
    {
        $this->namapakaian = new InventoryModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Stock Inventory',
            'namapakaian' => $this->namapakaian->findAll()
        ];
        return view('Admin/index', $data);
    }

    public function insert()
    {
        $data = [
            'namapakaian' => 'required',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'warna' => 'required',
            'kode_pakaian' => 'required',
            'stok' => 'required',
            'hargapakaian' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,6048]',
        ];
        if (!$this->validate($data)) {
            $validation = \Config\Services::validation();
            $errorMessages = $validation->getErrors();
            $errorString = implode('<br>', $errorMessages);
            session()->setFlashdata('validationErrors', $errorString);
            return redirect()->to(base_url('/inventory'))->withInput()->with('showModalInsert', true);
        }

        // Ambil file gambar dari formulir
        $gambar = $this->request->getFile('gambar');

        // Pindahkan file ke direktori yang diinginkan
        $newName = $gambar->getRandomName();
        $gambar->move(ROOTPATH . 'public/uploads', $newName);

        $dataInput =[
            'namapakaian' => $this->request->getVar('namapakaian'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ukuran' => $this->request->getVar('ukuran'),
            'warna' => $this->request->getVar('warna'),
            'kode_pakaian' => $this->request->getVar('kode_pakaian'),
            'stok' => $this->request->getVar('stok'),
            'hargapakaian' => $this->request->getVar('hargapakaian'),
            'gambar' => $newName, // Simpan nama file gambar
        ];

        // dd($dataInput);
        $this->namapakaian->save($dataInput);

        session()->setFlashdata('message', 'The new category has been successfully added!');
        return redirect()->to(base_url('/inventory'));
    }

    public function delete($id)
    {
        $this->namapakaian->deletePakaian($id);

        session()->setFlashdata('message', 'The menu has been successfully deleted!');
        return redirect()->to(base_url('/inventory'));
    }

    public function update($id)
    {
        if (!$this->validate([
            'namapakaian' => 'required',
            'deskripsi' => 'required',
            'kode_pakaian' => 'required',
            'stok' => 'required|integer',
            'warna' => 'required',
            'ukuran' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,6048]',
        ])) {
            $validation = \Config\Services::validation();
            $errorMessages = $validation->getErrors();
            $errorString = implode('<br>', $errorMessages);
            session()->setFlashdata('validationErrors', $errorString);
            return redirect()->to(base_url('/inventory'))->withInput()->with('showModalInsert', true);
        }

        // Ambil file gambar dari formulir
        $gambar = $this->request->getFile('gambar');

        // Pindahkan file ke direktori yang diinginkan
        $newName = $gambar->getRandomName();
        $gambar->move(ROOTPATH . 'public/uploads', $newName);

        $data = [
            'namapakaian' => $this->request->getVar('namapakaian'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'kode_pakaian' => $this->request->getVar('kode_pakaian'),
            'stok' => $this->request->getVar('stok'),
            'warna' => $this->request->getVar('warna'),
            'ukuran' => $this->request->getVar('ukuran'),
            'gambar' => $newName,
        ];
    
        $this->namapakaian->updatePakaian($id, $data);

        session()->setFlashdata('message', 'The new category has been successfully added!');
        return redirect()->to(base_url('/inventory'));
    }
}
