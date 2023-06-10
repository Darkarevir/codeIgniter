<?php

namespace App\Controllers;

use App\Models\CategoriasModel;

class CategoriasController extends BaseController
{
    public function index()
    {
        $view = view('WebBody/Header').
                view('Categorias/index').
                view('WebBody/Footer');
        return $view;

    }

    public function categorias(){
        $categorias = new CategoriasModel();
        $datos = $categorias->ShowCategorias();

        $data = ["datos" =>$datos];

        $view = view('WebBody/Header').
                view('Categorias/lista', $data).
                view('WebBody/Footer');
        return $view;
        

    }


}