<?php
namespace App\Controllers;
use App\Models\DaftarModel;

class LaporanModel extends BaseController // <--- harus 'Laporan' bukan 'LaporanModel'
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