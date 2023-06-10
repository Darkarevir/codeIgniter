<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductosModels extends Model{
    protected $table = "productos";
    protected $primaryKey = "id";
    protected $allowedFields =[
        'idCa',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'eliminado',
    ];

    public function guardar($datos){
        
        $this->db->table('productos')->insert($datos);

        if ($this->db->affectedRows()>0) {
            return true;
        }else{
            return false;
        }
    }
}