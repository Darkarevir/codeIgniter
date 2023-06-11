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
        $id = $this->request->getGet('id');
        $idProduc = new ListadeProductos();
        $producto = $idProduc->ObtenerProductoPorId($id);

        $categorias = new CategoriasModel();
        $categor = $categorias->ShowCategorias();
    
        $data = ["producto" =>$producto, "categor" => $categor, "id" => $id];
        // print_r($data);
        
        $view = view('WebBody/Header').
                view('WebBody/NavBar').
                view('Inicio/ViewActualizar', $data).
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
        $modelDetalle = new \App\Models\DetalleProModels();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $idCa = $this->request->getPost('categoria');
            $nombre = $this->request->getPost('Producto');
            $descripcion = $this->request->getPost('Descripcion');        
            $precio = $this->request->getPost('Precio');
            $cantidad = $this->request->getPost('Cantidad');
            // Detalles de producto
            $Color = $this->request->getPost('Color');
            $Peso = $this->request->getPost('Peso');
            $Dimension = $this->request->getPost('Dimensiones');
            
        
            //array con los datos a guardar en productos
            $small = [
                'idCa' => $idCa,
                'nombre' => $nombre,
                'descripcion' => $descripcion,              
                'precio' => $precio,
                'stock' => $cantidad,
                'eliminado'=> false
                
            ];

        if ($modelUser->guardar($small)) {
            $idInsertado = $modelUser->insertID();
            //array con los datos a guardar en productos
            $dock = [
                'producto_id' => $idInsertado,
                'color' => $Color,
                'peso' => $Peso,
                'dimensiones' => $Dimension,
                'accion' => "C"
            ];

            $modelDetalle->guardar($dock);
            
        }else{
            
        }

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

    public function UpdateProducto(){

        $modelUser = new \App\Models\ProductosModels();
        $modelDetalle = new \App\Models\DetalleProModels();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $id = $this->request->getPost('id');
            $idCa = $this->request->getPost('categoria');
            $nombre = $this->request->getPost('Producto');
            $descripcion = $this->request->getPost('Descripcion');        
            $precio = $this->request->getPost('Precio');
            $cantidad = $this->request->getPost('Cantidad');
            // Detalles de producto
            $Color = $this->request->getPost('Color');
            $Peso = $this->request->getPost('Peso');
            $Dimension = $this->request->getPost('Dimensiones');
            
        
            //array con los datos a guardar en productos
            $small = [
                'idCa' => $idCa,
                'nombre' => $nombre,
                'descripcion' => $descripcion,              
                'precio' => $precio,
                'stock' => $cantidad,
                'eliminado'=> false
                
            ];

        $modelUser->actualizarProducto($id, $small);
            //array con los datos a guardar en productos
            $dock = [
                'color' => $Color,
                'peso' => $Peso,
                'dimensiones' => $Dimension,
                'accion' => "U"
            ];
            $modelDetalle->actualizarDetalle($id, $dock);
            
            
            return $this->inicio();
    }
    }

    public function BorrarProducto(){
        $modelUser = new \App\Models\ProductosModels();
        if ($_SERVER['REQUEST_METHOD']==='GET') {
            $id = $this->request->getGet('idDelete');

            $delete = [
                'eliminado' => true
            ];

            $modelUser->deleteProducto($id, $delete);
            return $this->inicio();
        }
    }

}