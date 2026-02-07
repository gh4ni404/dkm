<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePoliTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_poli' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nm_poli' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        
        $this->forge->addKey('id_poli', true);
        $this->forge->createTable('poli');
    }

    public function down()
    {
        $this->forge->dropTable('poli');
    }
}
