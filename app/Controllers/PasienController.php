<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class PasienController extends BaseController
{
    protected $pasienModel;
    
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }
    
    // READ - Tampilkan semua data pasien
    public function index()
    {
        $data = [
            'title' => 'Data Pasien',
            'pasien' => $this->pasienModel->findAll()
        ];
        
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data['pasien']
        ]);
    }
    
    // READ - Tampilkan satu data pasien berdasarkan no_rekam_medis
    public function show($no_rekam_medis = null)
    {
        $pasien = $this->pasienModel->find($no_rekam_medis);
        
        if (!$pasien) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data pasien tidak ditemukan'
            ])->setStatusCode(404);
        }
        
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $pasien
        ]);
    }
    
    // CREATE - Tambah data pasien baru
    public function create()
    {
        $data = [
            'no_rekam_medis' => $this->request->getPost('no_rekam_medis'),
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'nik' => $this->request->getPost('nik'),
        ];
        
        if (!$this->pasienModel->insert($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menambahkan data pasien',
                'errors' => $this->pasienModel->errors()
            ])->setStatusCode(400);
        }
        
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data pasien berhasil ditambahkan',
            'data' => $data
        ])->setStatusCode(201);
    }
    
    // UPDATE - Edit data pasien
    public function update($no_rekam_medis = null)
    {
        $pasien = $this->pasienModel->find($no_rekam_medis);
        
        if (!$pasien) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data pasien tidak ditemukan'
            ])->setStatusCode(404);
        }
        
        $data = [
            'nama_pasien' => $this->request->getRawInput()['nama_pasien'] ?? $pasien['nama_pasien'],
            'nik' => $this->request->getRawInput()['nik'] ?? $pasien['nik'],
        ];
        
        if (!$this->pasienModel->update($no_rekam_medis, $data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal mengupdate data pasien',
                'errors' => $this->pasienModel->errors()
            ])->setStatusCode(400);
        }
        
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data pasien berhasil diupdate',
            'data' => array_merge(['no_rekam_medis' => $no_rekam_medis], $data)
        ]);
    }
    
    // DELETE - Hapus data pasien
    public function delete($no_rekam_medis = null)
    {
        $pasien = $this->pasienModel->find($no_rekam_medis);
        
        if (!$pasien) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data pasien tidak ditemukan'
            ])->setStatusCode(404);
        }
        
        if (!$this->pasienModel->delete($no_rekam_medis)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menghapus data pasien'
            ])->setStatusCode(400);
        }
        
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data pasien berhasil dihapus'
        ]);
    }
}
