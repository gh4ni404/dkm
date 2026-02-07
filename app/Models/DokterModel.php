<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table      = 'dokter';
    protected $primaryKey = 'kd_dokter';
    
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields = ['kd_dokter', 'nm_dokter', 'id_poli'];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'kd_dokter' => 'required|max_length[4]|is_unique[dokter.kd_dokter]',
        'nm_dokter' => 'required|max_length[255]',
        'id_poli'   => 'required|integer',
    ];
    
    protected $validationMessages = [
        'kd_dokter' => [
            'required'  => 'Kode Dokter harus diisi',
            'is_unique' => 'Kode Dokter sudah ada',
        ],
        'nm_dokter' => [
            'required' => 'Nama Dokter harus diisi',
        ],
        'id_poli' => [
            'required' => 'ID Poli harus diisi',
        ],
    ];
    
    // Relasi dengan Poli
    public function getPoli($kd_dokter)
    {
        return $this->db->table('dokter')
            ->join('poli', 'dokter.id_poli = poli.id_poli')
            ->where('kd_dokter', $kd_dokter)
            ->get()
            ->getRowArray();
    }
}
