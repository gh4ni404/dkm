<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRegistrasiPasienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_rekam_medis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'no_registrasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '3',
            ],
            'id_poli_tujuan' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'tgl_registrasi' => [
                'type' => 'DATE',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('no_rekam_medis', 'pasien', 'no_rekam_medis', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_poli_tujuan', 'poli', 'id_poli', 'CASCADE', 'CASCADE');
        $this->forge->createTable('registrasi_pasien');
    }

    public function down()
    {
        $this->forge->dropTable('registrasi_pasien');
    }
}
