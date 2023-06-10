<?php

namespace App\Models;

use CodeIgniter\Model;


class CategoriasModel extends Model{
    public function ShowCategorias(){
        $categorias = $this->db->query('SELECT idCa, nombre From categorias');
        return $categorias->getResult();
    }
}
// class ProductosModel extends Model
// {
//     protected $table = 'productos';
//     protected $primaryKey = 'id';
//     protected $allowedFields = [
//         'idCa',
//         'nombre',
//         'descripcion',
//         'precio',
//         'stock',
//         'eliminado'
//     ];

//     protected $useAutoIncrement = true;
//     protected $returnType = 'array';
// }