<?php

namespace App\Models;

use CodeIgniter\Model;


class ProveedoresModel extends Model{
    public function ShowProveedores(){
        $proveedores = $this->db->query('SELECT id, nombre FROM proveedores');
        return $proveedores->getResult();
    }
}