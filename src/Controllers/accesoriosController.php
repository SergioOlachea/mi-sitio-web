<?php

namespace App\Controllers;

use App\Models\Producto;

class accesoriosController {

    public function index() {
        $accesoriosModel = new Producto(getPDO());
        $accesorios = $accesoriosModel->all(); 
        
        return view('public/accesorios/accesorios.index', ['accesorios' => $accesorios]);
    }

    public function adminIndex() {
        $accesoriosModel = new Producto(getPDO());
        $accesorios = $accesoriosModel->all(); 
        
        return view('admin/accesorios/accesoriosAdm.index', ['accesorios' => $accesorios]);
    }

    public function form($id = null) {
        $accesoriosData = null;

        if($id) {
            $accesorios = new Producto(getPDO());
            $accesoriosData = $accesorios->find($id);
        }

        return view('admin/accesorios/accesoriosForm', ['accesorios' => $accesoriosData]);
    }

    public function show($id) {

        if(!$id) {
            die("Error: No se recibió un ID válido.");
        }

        $accesoriosModel = new Producto(getPDO());
        $accesorio = $accesoriosModel->find($id);

        if(!$accesorio) {
            die("Error: No se encontró el accesorio.");
        }

        return view('public/accesorios/accesorios.details', [
            'accesorio' => $accesorio
        ]);
    }

    public function store($data, $files) {

        $accesorios = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['imagen_url'] = $imageName;

        $accesorios->insert($data);

        header("Location: index.php?route=accesorios");

    }

    public function update($id, $post, $files) {
        $accesorios = new Producto(getPDO());
        $current = $accesorios->find($id);

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

        $accesorios->update($data);

        header("Location: index.php?route=accesorios");
        exit;    
    }



    public function delete($id)
    {
        $accesorios = new Producto(getPDO());
        $accesorios->delete($id);

        header("Location: index.php?route=accesorios");
    }
    

}
