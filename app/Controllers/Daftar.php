<?php
namespace App\Controllers;
use App\Models\DaftarModel;
use App\Models\JenisRouterModel;

class Daftar extends BaseController
{
    public function index()
    {
        $perangkatModel = new DaftarModel();
        $data['perangkat'] = $perangkatModel->getKategoriWithTotal();
        $data['active'] = 'daftar';
        $data['message'] = session()->getFlashdata('message');
        $data['error'] = session()->getFlashdata('error');
        return view('daftar/index', $data);
    }

    public function create()
    {
        $jenisRouterModel = new JenisRouterModel();
        $data['kategori'] = $jenisRouterModel->findAll();
        $data['active'] = 'daftar';
        return view('daftar/create', $data);
    }

    public function store()
    {
        $perangkatModel = new DaftarModel();
        $jenisRouterModel = new JenisRouterModel();

        $validation = \Config\Services::validation();
        $rules = [
            'category_id' => 'required|integer',
            'mac_address' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi!');
        }

        $gambar = $this->request->getFile('gambar');
        $fileName = null;
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $fileName = $gambar->getRandomName();
            $gambar->move('uploads', $fileName);
        }

        $categoryId = $this->request->getPost('category_id');
        $kategori = $jenisRouterModel->find($categoryId);

        $perangkatModel->save([
            'category_id' => $categoryId,
            'mac_address' => $this->request->getPost('mac_address'),
            'status' => $this->request->getPost('status'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $fileName,
        ]);
        $namaKategori = $kategori ? $kategori['jenis_router'] : '(Kategori tidak ditemukan)';
        $pesan = 'Data perangkat kategori <b>' . esc($namaKategori) . '</b> berhasil ditambah.';

        return redirect()->to('/daftar')->with('message', $pesan);
    }

    public function edit($id)
    {
        $perangkatModel = new DaftarModel();
        $jenisRouterModel = new JenisRouterModel();
        $data['perangkat'] = $perangkatModel->find($id);
        $data['kategori'] = $jenisRouterModel->findAll();

        $referer = $this->request->getServer('HTTP_REFERER');
        $queryString = '';
        if ($referer && strpos($referer, '/list') !== false) {
            $data['active'] = 'all';
            $parts = parse_url($referer);
            $queryString = isset($parts['query']) ? '?' . $parts['query'] : '';
        } else {
            $data['active'] = 'daftar';
        }
        $data['queryString'] = $queryString;

        if (!$data['perangkat']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data tidak ditemukan");
        }
        return view('daftar/edit', $data);
    }

    public function update($id)
    {
        $perangkatModel = new DaftarModel();
        $perangkat = $perangkatModel->find($id);

        if (!$perangkat) {
            return redirect()->to('/list')->with('error', 'Perangkat tidak ditemukan!');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'category_id' => 'required|integer',
            'mac_address' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'if_exist|is_image[gambar]|max_size[gambar,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi & gambar harus gambar valid!');
        }

        $gambar = $this->request->getFile('gambar');
        $fileName = $perangkat['gambar'];
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $fileName = $gambar->getRandomName();
            $gambar->move('uploads', $fileName);
            if (!empty($perangkat['gambar']) && file_exists('uploads/' . $perangkat['gambar'])) {
                unlink('uploads/' . $perangkat['gambar']);
            }
        }

        $perangkatModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'mac_address' => $this->request->getPost('mac_address'),
            'status' => $this->request->getPost('status'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $fileName,
        ]);
        $queryString = '';
        if (!empty($_SERVER['QUERY_STRING'])) {
            $queryString = '?' . $_SERVER['QUERY_STRING'];
        } else {
            $referer = $this->request->getServer('HTTP_REFERER');
            if ($referer && strpos($referer, '/list') !== false) {
                $parts = parse_url($referer);
                $queryString = isset($parts['query']) ? '?' . $parts['query'] : '';
            }
        }
        return redirect()->to('/list' . $queryString)->with('message', 'Perangkat tersebut berhasil diupdate.');
    }

    public function delete($id)
    {
        $perangkatModel = new DaftarModel();
        $data = $perangkatModel->find($id);

        if ($data) {
            if (!empty($data['gambar']) && file_exists('uploads/' . $data['gambar'])) {
                unlink('uploads/' . $data['gambar']);
            }
            $perangkatModel->delete($id);
            session()->setFlashdata('message', 'Perangkat tersebut berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Perangkat tidak ditemukan!');
        }
        $referer = $this->request->getServer('HTTP_REFERER');
        $queryString = '';
        if ($referer && strpos($referer, '/list') !== false) {
            $parts = parse_url($referer);
            $queryString = isset($parts['query']) ? '?' . $parts['query'] : '';
        }
        return redirect()->to('/list' . $queryString);
    }

    public function hapusKategori()
    {
        $category_id = $this->request->getPost('category_id');
        if (!$category_id) {
            session()->setFlashdata('error', 'Gagal: Kategori tidak ditemukan!');
            return redirect()->to('/daftar');
        }
        $perangkatModel = new DaftarModel();
        $all = $perangkatModel->where('category_id', $category_id)->findAll();
        foreach ($all as $row) {
            if (!empty($row['gambar']) && file_exists('uploads/' . $row['gambar'])) {
                unlink('uploads/' . $row['gambar']);
            }
        }
        $perangkatModel->where('category_id', $category_id)->delete();
        session()->setFlashdata('message', 'Semua perangkat pada kategori berhasil dihapus!');
        return redirect()->to('/daftar');
    }
}