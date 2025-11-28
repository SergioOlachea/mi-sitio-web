<?php

namespace App\Controllers;

use App\Models\Producto;

class señuelosController {

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
        $señuelosData = null;

        if($id) {
            $señuelos = new Producto(getPDO());
            $señuelosData = $señuelos->find($id);
        }

        return view('admin/señuelos/form', ['señuelos' => $señuelosData]);
    }

    public function show($id) {
        $señuelos = new Producto(getPDO());
        $señuelos = $señuelosModel->find($id);
        return view('public/señuelos/señuelos.details', ['señuelos' => $señuelos]);
    }

    public function store($data, $files) {

        $señuelos = new Producto(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['imagen_url'] = $imageName;

        $señuelos->insert($data);

        header("Location: index.php?route=señuelos");

    }

    public function update($id, $post, $files) {
        $señuelos = new Producto(getPDO());
        $current = $señuelos->find($id);

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

        $señuelos->update($data);

        header("Location: index.php?route=señuelos");
        exit;    
    }



    public function delete($id)
    {
        $señuelos = new Producto(getPDO());
        $señuelos->delete($id);

        header("Location: index.php?route=señuelos");
    }
    

}
