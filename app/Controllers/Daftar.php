<?php
namespace App\Controllers;

class Daftar extends BaseController
{

    public function index()
    {
        $data['active'] = 'daftar';  // <-- ini WAJIB
        return view('daftar/index', $data);
    }
}