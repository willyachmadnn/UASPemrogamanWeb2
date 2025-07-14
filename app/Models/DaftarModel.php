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

    public function getKategoriWithTotal($status = null)
    {
        $builder = $this->db->table('perangkat');
        $builder->select('jenis_router.jenis_router as category_name, perangkat.category_id, MIN(perangkat.gambar) as gambar, COUNT(*) as total');
        $builder->join('jenis_router', 'jenis_router.id = perangkat.category_id');

        if ($status && in_array($status, ['Aktif', 'Tidak Aktif'])) {
            $builder->where('perangkat.status', $status);
        }

        $builder->groupBy('perangkat.category_id, jenis_router.jenis_router');
        $builder->orderBy('jenis_router.jenis_router', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

}