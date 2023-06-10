<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
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
            'idCa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'precio' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stock' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'eliminado' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('idCa', 'categorias', 'idCa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos');
    }

    public function down()
    {
        $this->forge->dropTable('productos');
    }
}