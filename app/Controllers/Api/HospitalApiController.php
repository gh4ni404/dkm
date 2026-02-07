<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Database\Query;

class HospitalApiController extends BaseController
{
    protected $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    /**
     * QUERY 1: Join semua tabel dan tampilkan data yang diperlukan
     * Filter: range tanggal, nama pasien, nama dokter
     * 
     * Endpoint: GET /api/pasien-data
     * Parameters (optional):
     * - tanggal_awal: YYYY-MM-DD
     * - tanggal_akhir: YYYY-MM-DD
     * - nama_pasien: string
     * - nama_dokter: string
     */
    public function getPasienData()
    {
        $builder = $this->db->table('pasien as p')
            ->select('
                p.no_rekam_medis,
                p.nama_pasien,
                p.nik,
                r.no_registrasi,
                r.tgl_registrasi,
                poli.nm_poli as nama_poli,
                d.kd_dokter,
                d.nm_dokter as nama_dokter,
                pp.ket_diagnosa
            ')
            ->join('registrasi_pasien as r', 'p.no_rekam_medis = r.no_rekam_medis', 'left')
            ->join('poli', 'r.id_poli_tujuan = poli.id_poli', 'left')
            ->join('periksa_pasien as pp', 'p.no_rekam_medis = pp.no_rekam_medis', 'left')
            ->join('dokter as d', 'pp.kd_dokter = d.kd_dokter', 'left');
        
        // Filter berdasarkan range tanggal
        $tanggalAwal = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        
        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where('r.tgl_registrasi >=', $tanggalAwal);
            $builder->where('r.tgl_registrasi <=', $tanggalAkhir);
        } elseif ($tanggalAwal) {
            $builder->where('r.tgl_registrasi >=', $tanggalAwal);
        } elseif ($tanggalAkhir) {
            $builder->where('r.tgl_registrasi <=', $tanggalAkhir);
        }
        
        // Filter berdasarkan nama pasien
        $namaPasien = $this->request->getGet('nama_pasien');
        if ($namaPasien) {
            $builder->like('p.nama_pasien', $namaPasien);
        }
        
        // Filter berdasarkan nama dokter
        $namaDokter = $this->request->getGet('nama_dokter');
        if ($namaDokter) {
            $builder->like('d.nm_dokter', $namaDokter);
        }
        
        $data = $builder->get()->getResultArray();
        
        return $this->response->setJSON([
            'status' => 'success',
            'total' => count($data),
            'data' => $data
        ]);
    }
    
    /**
     * QUERY 3: Jumlah pasien per dokter
     * Filter: range tanggal, nama dokter
     * 
     * Endpoint: GET /api/pasien-per-dokter
     * Parameters (optional):
     * - tanggal_awal: YYYY-MM-DD
     * - tanggal_akhir: YYYY-MM-DD
     * - nama_dokter: string
     */
    public function getPasienPerDokter()
    {
        $builder = $this->db->table('dokter as d')
            ->select('
                d.kd_dokter,
                d.nm_dokter as nama_dokter,
                poli.nm_poli as nama_poli,
                COUNT(DISTINCT pp.no_rekam_medis) as jumlah_pasien
            ')
            ->join('poli', 'd.id_poli = poli.id_poli', 'left')
            ->join('periksa_pasien as pp', 'd.kd_dokter = pp.kd_dokter', 'left')
            ->join('registrasi_pasien as r', 'pp.no_rekam_medis = r.no_rekam_medis', 'left');
        
        // Filter berdasarkan range tanggal
        $tanggalAwal = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        
        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where('r.tgl_registrasi >=', $tanggalAwal);
            $builder->where('r.tgl_registrasi <=', $tanggalAkhir);
        } elseif ($tanggalAwal) {
            $builder->where('r.tgl_registrasi >=', $tanggalAwal);
        } elseif ($tanggalAkhir) {
            $builder->where('r.tgl_registrasi <=', $tanggalAkhir);
        }
        
        // Filter berdasarkan nama dokter
        $namaDokter = $this->request->getGet('nama_dokter');
        if ($namaDokter) {
            $builder->like('d.nm_dokter', $namaDokter);
        }
        
        $builder->groupBy('d.kd_dokter, d.nm_dokter, poli.nm_poli');
        $builder->orderBy('jumlah_pasien', 'DESC');
        
        $data = $builder->get()->getResultArray();
        
        return $this->response->setJSON([
            'status' => 'success',
            'total_dokter' => count($data),
            'data' => $data
        ]);
    }
}
