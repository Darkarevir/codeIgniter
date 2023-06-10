<?php namespace App\Database\Seeds;

class categoriasSeed extends \CodeIgniter\Database\Seeder{

    public function run(){

        $data = array(
            array(
                'nombre'=>'Electrónica',
                'descripcion'=>'Productos electrónicos'
            ),
            array(
                'nombre'=>'Ropa',
                'descripcion'=>'Ropa y accesorios'
            ),
            array(
                'nombre'=>'Hogar',
                'descripcion'=>'Productos para el hogar'
            )

        );
        $this->db->table('categorias')->insert($data);

    }
}