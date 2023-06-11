<?php

namespace App\Models;

use CodeIgniter\Model;


class DetalleProModels extends Model{
    protected $table = "detalles_productos";
    protected $primaryKey = "id";
    protected $allowedFields =[
        'producto_id',
        'color',
        'peso',
        'dimensiones',
        'accion'
    ];

    public function guardar($datos){
        
        $this->db->table('detalles_productos')->insert($datos);

        if ($this->db->affectedRows()>0) {
            return true;
        }else{
            return false;
        }
    }

    public function actualizarDetalle($id, $datos){

        //$this->db->table('detalles_productos')->where('producto_id', $id);
        $this->db->table('detalles_productos')->where('producto_id', $id)->update($datos);

        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }
    }
}