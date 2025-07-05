<?php
namespace App\Controllers;

class All extends BaseController
{

    public function index()
    {
        $data['active'] = 'all';  // <-- ini WAJIB
        return view('all/index', $data);
    }
}