<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaPasienModel extends Model
{
    protected $table      = 'periksa_pasien';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields = ['no_rekam_medis', 'kd_dokter', 'ket_diagnosa'];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'no_rekam_medis' => 'required',
        'kd_dokter'      => 'required',
    ];
    
    protected $validationMessages = [
        'no_rekam_medis' => [
            'required' => 'No Rekam Medis harus diisi',
        ],
        'kd_dokter' => [
            'required' => 'Kode Dokter harus diisi',
        ],
    ];
}
