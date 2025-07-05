<?php
namespace App\Controllers;

class Laporan extends BaseController
{

    public function index()
    {
        $data['active'] = 'laporan';
        return view('laporan/index', $data);
    }
}