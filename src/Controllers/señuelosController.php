<?php

namespace App\Controllers;

use App\Models\Producto;

class CarretesController {

    public function index() {
        $señuelosModel = new Producto(getPDO());
        $señuelos = $señuelosModel->all(); 
        
        return view('public/señuelos/señuelos.index', ['señuelos' => $señuelos]);
    }

    public function adminIndex() {
        $señuelosModel = new Producto(getPDO());
        $señuelos = $señuelosModel->all(); 
        
        return view('admin/señuelos/index', ['señuelos' => $señuelos]);
    }

    public function form($id = null) {
        $carretesData = null;

        if($id) {
            $señuelos = new Carretes(getPDO());
            $señuelosData = $señuelos->find($id);
        }

        return view('admin/señuelos/form', ['señuelos' => $señuelosData]);
    }

    public function show($id) {
        $carretesModel = new Producto(getPDO());
        $señuelos = $señuelosModel->find($id);
        return view('public/carretes/carretes.details', ['señuelos' => $señuelos]);
    }

    public function store($data, $files) {

        $señuelos = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['image'] = $imageName;

        $señuelos->insert($data);

        return redirect('/admin/señuelos');

    }
    

}
