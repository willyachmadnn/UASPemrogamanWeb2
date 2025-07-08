<?php
namespace App\Models;

use CodeIgniter\Model;

class DaftarModel extends Model
{
    protected $table = 'perangkat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'deskripsi',
        'gambar',
        'category_id',
        'mac_address',
        'status',
        'model_router',
        'created_at',
        'updated_at'
    ];

    public function withCategory()
    {
        return $this->select('perangkat.*, jenis_router.jenis_router as category_name')
            ->join('jenis_router', 'jenis_router.id = perangkat.category_id', 'left');
    }

    public function getKategoriWithTotal()
    {
        return $this->select('perangkat.category_id, jenis_router.jenis_router as category_name, COUNT(perangkat.id) as total, MIN(perangkat.gambar) as gambar')
            ->join('jenis_router', 'jenis_router.id = perangkat.category_id', 'left')
            ->groupBy('perangkat.category_id')
            ->orderBy('jenis_router.jenis_router', 'ASC')
            ->findAll();
    }

}