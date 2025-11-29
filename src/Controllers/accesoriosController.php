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
        
        return view('admin/accesorios/index', ['accesorios' => $accesorios]);
    }

    public function form($id = null) {
        $accesoriosData = null;

        if($id) {
            $accesorios = new Producto(getPDO());
            $accesoriosData = $accesorios->find($id);
        }

        return view('admin/accesorios/form', ['accesorios' => $accesoriosData]);
    }

    public function show($id) {
        $accesorios = new Producto(getPDO());
        $accesorios = $accesoriosModel->find($id);
        return view('public/accesorios/accesorios.details', ['accesorios' => $accesorios]);
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
