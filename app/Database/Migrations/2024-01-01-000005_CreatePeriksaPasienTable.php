<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeriksaPasienTable extends Migration
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
            'kd_dokter' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'ket_diagnosa' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('no_rekam_medis', 'pasien', 'no_rekam_medis', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kd_dokter', 'dokter', 'kd_dokter', 'CASCADE', 'CASCADE');
        $this->forge->createTable('periksa_pasien');
    }

    public function down()
    {
        $this->forge->dropTable('periksa_pasien');
    }
}
