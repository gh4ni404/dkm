<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        // Seed Poli
        $poliData = [
            ['nm_poli' => 'Poli Gigi'],
            ['nm_poli' => 'Poli Umum'],
            ['nm_poli' => 'Poli Anak'],
            ['nm_poli' => 'Poli Mata'],
        ];
        
        foreach ($poliData as $poli) {
            $this->db->table('poli')->insert($poli);
        }
        
        // Seed Pasien
        $pasienData = [
            [
                'no_rekam_medis' => '001',
                'nama_pasien' => 'Iwan Setiawan',
                'nik' => '3201234567890001'
            ],
            [
                'no_rekam_medis' => '002',
                'nama_pasien' => 'Siti Nurhaliza',
                'nik' => '3201234567890002'
            ],
            [
                'no_rekam_medis' => '003',
                'nama_pasien' => 'Budi Santoso',
                'nik' => '3201234567890003'
            ],
            [
                'no_rekam_medis' => '004',
                'nama_pasien' => 'Dewi Lestari',
                'nik' => '3201234567890004'
            ],
            [
                'no_rekam_medis' => '005',
                'nama_pasien' => 'Ahmad Dahlan',
                'nik' => '3201234567890005'
            ],
        ];
        
        foreach ($pasienData as $pasien) {
            $this->db->table('pasien')->insert($pasien);
        }
        
        // Seed Dokter
        $dokterData = [
            [
                'kd_dokter' => 'D001',
                'nm_dokter' => 'Dr. Angga Pratama',
                'id_poli' => 1
            ],
            [
                'kd_dokter' => 'D002',
                'nm_dokter' => 'Dr. Sarah Wijaya',
                'id_poli' => 2
            ],
            [
                'kd_dokter' => 'D003',
                'nm_dokter' => 'Dr. Bambang Susilo',
                'id_poli' => 3
            ],
            [
                'kd_dokter' => 'D004',
                'nm_dokter' => 'Dr. Maya Sari',
                'id_poli' => 4
            ],
        ];
        
        foreach ($dokterData as $dokter) {
            $this->db->table('dokter')->insert($dokter);
        }
        
        // Seed Registrasi Pasien
        $registrasiData = [
            [
                'no_rekam_medis' => '001',
                'no_registrasi' => '001',
                'id_poli_tujuan' => 1,
                'tgl_registrasi' => '2024-01-06'
            ],
            [
                'no_rekam_medis' => '002',
                'no_registrasi' => '002',
                'id_poli_tujuan' => 2,
                'tgl_registrasi' => '2024-01-06'
            ],
            [
                'no_rekam_medis' => '003',
                'no_registrasi' => '003',
                'id_poli_tujuan' => 3,
                'tgl_registrasi' => '2024-01-06'
            ],
            [
                'no_rekam_medis' => '001',
                'no_registrasi' => '001',
                'id_poli_tujuan' => 2,
                'tgl_registrasi' => '2024-01-07'
            ],
            [
                'no_rekam_medis' => '004',
                'no_registrasi' => '002',
                'id_poli_tujuan' => 1,
                'tgl_registrasi' => '2024-01-07'
            ],
            [
                'no_rekam_medis' => '005',
                'no_registrasi' => '003',
                'id_poli_tujuan' => 4,
                'tgl_registrasi' => '2024-01-07'
            ],
        ];
        
        foreach ($registrasiData as $registrasi) {
            $this->db->table('registrasi_pasien')->insert($registrasi);
        }
        
        // Seed Periksa Pasien
        $periksaData = [
            [
                'no_rekam_medis' => '001',
                'kd_dokter' => 'D001',
                'ket_diagnosa' => 'Gigi berlubang, perlu penambalan'
            ],
            [
                'no_rekam_medis' => '002',
                'kd_dokter' => 'D002',
                'ket_diagnosa' => 'Demam dan batuk ringan'
            ],
            [
                'no_rekam_medis' => '003',
                'kd_dokter' => 'D003',
                'ket_diagnosa' => 'Demam pada anak, imunisasi'
            ],
            [
                'no_rekam_medis' => '001',
                'kd_dokter' => 'D002',
                'ket_diagnosa' => 'Kontrol tekanan darah tinggi'
            ],
            [
                'no_rekam_medis' => '004',
                'kd_dokter' => 'D001',
                'ket_diagnosa' => 'Scaling gigi'
            ],
            [
                'no_rekam_medis' => '005',
                'kd_dokter' => 'D004',
                'ket_diagnosa' => 'Mata minus, perlu kacamata'
            ],
        ];
        
        foreach ($periksaData as $periksa) {
            $this->db->table('periksa_pasien')->insert($periksa);
        }
        
        echo "Data seeder berhasil dijalankan!\n";
    }
}
