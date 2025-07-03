<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!session('username')) {
            return redirect()->to('/login');
        }
        // Data dummy, nanti bisa diganti dari database
        $data['total_perangkat'] = 123;
        $data['perangkat_aktif'] = 100;
        $data['perangkat_tidak_aktif'] = 23;
        $data['total_riwayat'] = 45;

        $data['username'] = session('username');
        $data['active'] = 'home';
        return view('home/index', $data);
    }
}