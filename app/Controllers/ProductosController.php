<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ListadeProductos;
//use App\Models\ProveedoresModel;

class ProductosController extends BaseController
{
    
    
    public function inicio(){

        $listPr = new ListadeProductos();
        $datos = $listPr->ShowProductos();

        $data = ["datos" => $datos];
        $view = view('WebBody/Header').
                view('WebBody/NavBar').
                view('Inicio/index', $data).
                view('WebBody/Footer');
        return $view;
        

    }
    
    public function SeeAndEdit(){
        print_r($_POST);
        
        $view = view('WebBody/Header').
                view('WebBody/NavBar').
                
                view('WebBody/ScriptsJs').
                view('WebBody/Footer');
        return $view;
        
    }

    public function AgregarProductos(){    
        $categorias = new CategoriasModel();
        $datos = $categorias->ShowCategorias();
    
        $data = ["datos" =>$datos];
        $view = view('WebBody/Header').
                view('WebBody/NavBar').
                view('Inicio/agregarProducto', $data).
                view('WebBody/ScriptsJs').
                view('WebBody/Footer');
        return $view;
    }
    
    public function GuardarProducto(){
    
        $modelUser = new \App\Models\ProductosModels();
        

        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $idCa = $this->request->getPost('idCa');
            $nombre = $this->request->getPost('Producto');
            $descripcion = $this->request->getPost('Descripcion');        
            $precio = $this->request->getPost('Precio');
            $cantidad = $this->request->getPost('Cantidad');
            
        
            //array con los datos a guardar
            $small = [
                'idCa' => $idCa,
                'nombre' => $nombre,
                'descripcion' => $descripcion,              
                'precio' => $precio,
                'stock' => $cantidad,
                'eliminado'=> false
                
            ];
            
            
       $modelUser->guardar($small);


       $categorias = new CategoriasModel();
        $datos = $categorias->ShowCategorias();
    
        $data = ["datos" =>$datos];
        $view = view('WebBody/Header').
                view('WebBody/NavBar').
                view('Inicio/agregarProducto', $data).
                view('WebBody/ScriptsJs').
                view('WebBody/Footer');
        return $view;
    }
    }

}