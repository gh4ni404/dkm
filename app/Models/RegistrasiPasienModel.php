<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiPasienModel extends Model
{
    protected $table      = 'registrasi_pasien';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields = ['no_rekam_medis', 'no_registrasi', 'id_poli_tujuan', 'tgl_registrasi'];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'no_rekam_medis' => 'required',
        'no_registrasi'  => 'required|max_length[3]',
        'id_poli_tujuan' => 'required|integer',
        'tgl_registrasi' => 'required|valid_date',
    ];
    
    protected $validationMessages = [
        'no_rekam_medis' => [
            'required' => 'No Rekam Medis harus diisi',
        ],
        'no_registrasi' => [
            'required' => 'No Registrasi harus diisi',
        ],
        'id_poli_tujuan' => [
            'required' => 'Poli Tujuan harus diisi',
        ],
        'tgl_registrasi' => [
            'required' => 'Tanggal Registrasi harus diisi',
        ],
    ];
    
    // Generate nomor registrasi otomatis
    public function generateNoRegistrasi($tanggal)
    {
        $last = $this->where('tgl_registrasi', $tanggal)
            ->orderBy('no_registrasi', 'DESC')
            ->first();
        
        if ($last) {
            $lastNo = intval($last['no_registrasi']);
            $newNo = $lastNo + 1;
        } else {
            $newNo = 1;
        }
        
        return str_pad($newNo, 3, '0', STR_PAD_LEFT);
    }
}
