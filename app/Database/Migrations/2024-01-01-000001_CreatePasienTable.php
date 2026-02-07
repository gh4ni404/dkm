<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_rekam_medis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '17',
            ],
        ]);
        
        $this->forge->addKey('no_rekam_medis', true);
        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
