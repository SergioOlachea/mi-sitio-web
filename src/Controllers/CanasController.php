<?php

namespace App\Controllers;

use App\Models\Producto;

class CanasController {

    public function index() {
        $canasModel = new Producto(getPDO());
        $canas = $canasModel->all(); 
        
        return view('public/canas/canas.index', ['canas' => $canas]);
    }

    public function adminIndex() {
        $canasModel = new Producto(getPDO());
        $canas = $canasModel->all(); 
        
        return view('admin/canas/index', ['canas' => $canas]);
    }

    public function form($id = null) {
        $canasData = null;

        if($id) {
            $canas = new Producto(getPDO());
            $canasData = $canas->find($id);
        }

        return view('admin/canas/form', ['canas' => $canasData]);
    }

    public function show($id) {
        $canas = new Producto(getPDO());
        $canas = $canasModel->find($id);
        return view('public/canas/canas.details', ['canas' => $canas]);
    }

    public function store($data, $files) {

        $canas = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['imagen_url'] = $imageName;

        $canas->insert($data);

        header("Location: index.php?route=canas");

    }

    public function update($id, $post, $files) {
        $canas = new Producto(getPDO());
        $current = $canas->find($id);

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

        $canas->update($data);

        header("Location: index.php?route=canas");
        exit;    
    }



    public function delete($id)
    {
        $canas = new Producto(getPDO());
        $canas->delete($id);

        header("Location: index.php?route=canas");
    }
    

}
