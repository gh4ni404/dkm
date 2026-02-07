<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table      = 'pasien';
    protected $primaryKey = 'no_rekam_medis';
    
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields = ['no_rekam_medis', 'nama_pasien', 'nik'];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'no_rekam_medis' => 'required|max_length[20]|is_unique[pasien.no_rekam_medis]',
        'nama_pasien'    => 'required|max_length[255]',
        'nik'            => 'required|max_length[17]',
    ];
    
    protected $validationMessages = [
        'no_rekam_medis' => [
            'required'  => 'No Rekam Medis harus diisi',
            'is_unique' => 'No Rekam Medis sudah ada',
        ],
        'nama_pasien' => [
            'required' => 'Nama Pasien harus diisi',
        ],
        'nik' => [
            'required' => 'NIK harus diisi',
        ],
    ];
}
