<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokterTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_dokter' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'nm_dokter' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_poli' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
        ]);
        
        $this->forge->addKey('kd_dokter', true);
        $this->forge->addForeignKey('id_poli', 'poli', 'id_poli', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokter');
    }

    public function down()
    {
        $this->forge->dropTable('dokter');
    }
}
