<?php
namespace App\Controllers;
use App\Models\JenisRouterModel;

class Kategori extends BaseController
{
    protected $jenisRouterModel;

    public function __construct()
    {
        $this->jenisRouterModel = new JenisRouterModel();
    }

    public function index()
    {
        $data['jenis_router'] = $this->jenisRouterModel->findAll();
        $data['active'] = 'kategori';
        $data['message'] = session()->getFlashdata('message');
        $data['error'] = session()->getFlashdata('error');
        return view('kategori/index', $data);
    }

    public function store()
    {
        $jenis_router = trim($this->request->getPost('jenis_router'));
        if (empty($jenis_router)) {
            session()->setFlashdata('error', 'Nama jenis router wajib diisi!');
            return redirect()->to('/kategori');
        }
        $ada = $this->jenisRouterModel->where('jenis_router', $jenis_router)->first();
        if ($ada) {
            session()->setFlashdata('error', 'Jenis router <b>' . esc($jenis_router) . '</b> sudah ada!');
        } else {
            $this->jenisRouterModel->insert(['jenis_router' => $jenis_router]);
            session()->setFlashdata('message', 'Jenis router <b>' . esc($jenis_router) . '</b> berhasil ditambahkan.');
        }
        return redirect()->to('/kategori');
    }

    public function update($id)
    {
        $jenis_router = trim($this->request->getPost('jenis_router'));

        if (empty($jenis_router)) {
            session()->setFlashdata('error', 'Nama jenis router wajib diisi!');
            return redirect()->to('/kategori');
        }
        $exists = $this->jenisRouterModel
            ->where('jenis_router', $jenis_router)
            ->where('id !=', $id)
            ->first();
        if ($exists) {
            session()->setFlashdata('error', 'Jenis router <b>' . esc($jenis_router) . '</b> sudah ada!');
            return redirect()->to('/kategori');
        }
        $this->jenisRouterModel->update($id, ['jenis_router' => $jenis_router]);
        session()->setFlashdata('message', 'Jenis router tersebut berhasil diupdate.');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $data = $this->jenisRouterModel->find($id);
        if ($data) {
            $this->jenisRouterModel->delete($id);
            session()->setFlashdata('message', 'Jenis router <b>' . esc($data['jenis_router']) . '</b> berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan!');
        }
        return redirect()->to('/kategori');
    }
}