<?php

namespace App\Models;

use CodeIgniter\Model;

class PoliModel extends Model
{
    protected $table      = 'poli';
    protected $primaryKey = 'id_poli';
    
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields = ['nm_poli'];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'nm_poli' => 'required|max_length[100]',
    ];
    
    protected $validationMessages = [
        'nm_poli' => [
            'required' => 'Nama Poli harus diisi',
        ],
    ];
}
