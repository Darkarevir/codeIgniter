<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetallesDeProductos extends Migration
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
            'producto_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'peso' => [
                'type' => 'DECIMAL',
                'constraint' => '8,2',
            ],
            'dimensiones' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'accion' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
            ],
            'fecha' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('producto_id', 'productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detalles_productos');
    }

    public function down()
    {
        $this->forge->dropTable('detalles_productos');
    }
}