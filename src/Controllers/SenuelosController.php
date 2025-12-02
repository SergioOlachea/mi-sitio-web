<?php

namespace App\Controllers;

use App\Models\Producto;

class SenuelosController {

    public function index() {
        $senuelosModel = new Producto(getPDO());
        $senuelos = $senuelosModel->all(); 
        return view('public/senuelos/senuelos.index', ['senuelos' => $senuelos]);
    }

    public function adminIndex() {
        $senuelosModel = new Producto(getPDO());
        $senuelos = $senuelosModel->all(); 
        return view('admin/senuelos/senuelosAdm.index', ['senuelos' => $senuelos]);
    }

    public function form($id = null) {
        $senuelosData = null;

        if($id) {
            $senuelos = new Producto(getPDO());
            $senuelosData = $senuelos->find($id);
        }

        return view('admin/senuelos/senuelosForm', ['senuelos' => $senuelosData]);
    }

    public function show($id) {

        if(!$id) {
            die("Error: No se recibió un ID válido.");
        }

        $senuelosModel = new Producto(getPDO());
        $senuelo = $senuelosModel->find($id);

        if(!$senuelo) {
            die("Error: No se encontró el carrete.");
        }

        return view('public/senuelos/senuelos.details', [
            'senuelo' => $senuelo
        ]);
    }


    public function store($data, $files) {

        $senuelos = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['imagen_url'] = $imageName;

        $senuelos->insert($data);

        header("Location: index.php?route=senuelos");

    }

    public function update($id, $post, $files) {
        $senuelos = new Producto(getPDO());
        $current = $senuelos->find($id);

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

        $senuelos->update($data);

        header("Location: index.php?route=senuelos");
        exit;    
    }



    public function delete($id)
    {
        $senuelos = new Producto(getPDO());
        $senuelos->delete($id);

        header("Location: index.php?route=senuelos");
    }
    

}
