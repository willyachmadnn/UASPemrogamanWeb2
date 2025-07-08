<?php
namespace App\Controllers;
use App\Models\DaftarModel;

class All extends BaseController
{
    public function index()
    {
        $daftarModel = new DaftarModel();
        $query = $daftarModel->withCategory();

        if ($q = $this->request->getGet('q')) {
            $query = $query->groupStart()
                ->like('mac_address', $q)
                ->orLike('deskripsi', $q)
                ->orLike('jenis_router.jenis_router', $q)
                ->groupEnd();
        }

        if ($status = $this->request->getGet('status')) {
            $query = $query->where('status', $status);
        }

        $perPage = 10;
        $data['perangkat'] = $query->paginate($perPage);
        $data['pager'] = $daftarModel->pager;
        $data['active'] = 'all';

        return view('all/index', $data);
    }
}