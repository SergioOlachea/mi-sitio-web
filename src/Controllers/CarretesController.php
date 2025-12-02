<?php

namespace App\Controllers;

use App\Models\Producto;

class CarretesController {

    public function index() {
        $carretesModel = new Producto(getPDO());
        $carretes = $carretesModel->all(); 
        return view('public/carretes/carretes.index', ['carretes' => $carretes]);
    }

    public function adminIndex() {
        $carretesModel = new Producto(getPDO());
        $carretes = $carretesModel->all(); 
        return view('admin/carretes/carretesAdm.index', ['carretes' => $carretes]);
    }

    public function form($id = null) {
        $carretesData = null;

        if($id) {
            $carretesModel = new Producto(getPDO());
            $carretesData = $carretesModel->find($id);
        }

        return view('admin/carretes/carretesForm', ['carretes' => $carretesData]);
    }
    public function show($id) {

        if(!$id) {
            die("Error: No se recibió un ID válido.");
        }

        $carretesModel = new Producto(getPDO());
        $carrete = $carretesModel->find($id);

        if(!$carrete) {
            die("Error: No se encontró el carrete.");
        }

        return view('public/carretes/carretes.details', [
            'carrete' => $carrete
        ]);
    }
        

    public function store($data, $files) {

        $carretes = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['imagen_url'] = $imageName;

        $carretes->insert($data);

        header("Location: index.php?route=carretes");

    }

    public function update($id, $post, $files) {
        $carretes = new Producto(getPDO());
        $current = $carretes->find($id);

        $imageName = $current->imagen_url;

        if (!empty($files['image']['name'])) {
            $newImage = uploadImage($files['image'], 'img');
            if ($newImage) {
                deleteImage('img', $current->imagen_url);
                $imageName = $newImage;
            }
        }

        $data = [
            'id_producto' => $id,
            'nombre' => $post['nombre'],
            'descripcion' => $post['descripcion'],
            'precio' => $post['precio'],
            'stock' => $post['stock'],
            'categoria' => $post['categoria'],
            'imagen_url' => $imageName
        ];

        $carretes->update($data);

        header("Location: index.php?route=carretes");
        exit;    
    }



    public function delete($id)
    {
        $carretes = new Producto(getPDO());
        $carretes->delete($id);

        header("Location: index.php?route=carretes");
    }
    

}
