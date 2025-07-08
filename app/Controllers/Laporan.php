<?php
namespace App\Controllers;
use App\Models\DaftarModel;

class Laporan extends BaseController
{
    public function index()
    {
        $daftarModel = new DaftarModel();
        $pieData = $daftarModel->getKategoriWithTotal();

        $data['active'] = 'laporan';
        $data['pieData'] = $pieData;

        return view('laporan/index', $data);
    }
}