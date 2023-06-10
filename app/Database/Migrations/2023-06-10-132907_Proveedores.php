<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proveedores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('proveedores');
    }

    public function down()
    {
        $this->forge->dropTable('proveedores');
    }
}