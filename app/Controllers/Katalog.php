<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class Katalog extends BaseController
{
    protected $namapakaian;

    public function __construct()
    {
        $this->namapakaian = new InventoryModel();
    }

    public function index()
    {
        $data['showButton'] = true;
        $data = [
            'namapakaian' => $this->namapakaian->findAll()
        ];
        return view('katalog/index', $data);
    }
}
