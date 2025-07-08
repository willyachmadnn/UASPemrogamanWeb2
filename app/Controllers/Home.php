<?php
namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\DaftarModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session('username')) {
            return redirect()->to('/login');
        }
        $kategoriModel = new KategoriModel();
        $daftarModel = new DaftarModel();

        $data['kategori'] = $kategoriModel->countAllResults();
        $data['total_perangkat'] = $daftarModel->countAllResults();
        $data['perangkat_aktif'] = $daftarModel
            ->where('status', 'Aktif')
            ->countAllResults();
        $data['perangkat_tidak_aktif'] = $daftarModel
            ->like('status', 'Tidak Aktif', 'both')
            ->countAllResults();
        $data['username'] = session('username');
        $data['active'] = 'home';
        return view('home/index', $data);
    }
}