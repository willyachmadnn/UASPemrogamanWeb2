<?php
namespace App\Controllers;
use App\Models\DaftarModel;

class Laporan extends BaseController
{
    public function index()
    {
        $daftarModel = new DaftarModel();
        $status = $this->request->getGet('status');
        $pieData = $daftarModel->getKategoriWithTotal($status);
        $data['active'] = 'laporan';
        $data['pieData'] = $pieData;
        $data['status'] = $status;

        return view('laporan/index', $data);
    }

}