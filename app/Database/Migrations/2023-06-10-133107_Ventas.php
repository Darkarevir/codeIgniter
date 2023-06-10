<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ventas extends Migration
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
            'cliente_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'fecha_venta' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('producto_id', 'productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('cliente_id', 'clientes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ventas');
    }

    public function down()
    {
        $this->forge->dropTable('ventas');
    }
}