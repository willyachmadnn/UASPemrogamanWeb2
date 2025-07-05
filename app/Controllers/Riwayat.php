<?php
namespace App\Controllers;

class Riwayat extends BaseController
{

    public function index()
    {
        $data['active'] = 'riwayat';
        return view('riwayat/index', $data);
    }
}