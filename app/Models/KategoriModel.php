<?php
namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'jenis_router';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_router'];
    public $timestamps = false;
}