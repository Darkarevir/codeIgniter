<?php

namespace App\Models;

use CodeIgniter\Model;


class ListadeProductos extends Model{
    public function ShowProductos(){
        $productos = $this->db->query('SELECT productos.id AS Codigo , categorias.nombre AS Categoria, productos.nombre AS Nombre, productos.descripcion AS Descripcion, productos.precio AS Precio, productos.stock AS Stock FROM productos INNER JOIN categorias WHERE productos.idCa = categorias.idCa AND productos.eliminado = 0');
        return $productos->getResult();
    }

    public function SeeProductos($id){
        
    }
}