<?php

namespace App\Controllers;

use App\Models\Carretes;

class CarretesController {

    public function index() {
        $carretesModel = new Carretes(getPDO());
        $carretes = $carretesModel->all(); 
        
        return view('public/carretes/carretes.index', ['carretes' => $carretes]);
    }

    public function adminIndex() {
        $carretesModel = new Carretes(getPDO());
        $carretes = $carretesModel->all(); 
        
        return view('admin/carretes/index', ['carretes' => $carretes]);
    }

    public function form($id = null) {
        $carretesData = null;

        if($id) {
            $carretes = new Carretes(getPDO());
            $carretesData = $carretes->find($id);
        }

        return view('admin/carretes/form', ['carretes' => $carretesData]);
    }

    public function show($id) {
        $carretesModel = new Carretes(getPDO());
        $carretes = $carretesModel->find($id);
        return view('public/carretes/carretes.details', ['carretes' => $carretes]);
    }

    public function store($data, $files) {

        $carretes = new Carretes(getPDO());

        $imageName = uploadImage($files['image'], 'img');

        $data['image'] = $imageName;

        $carretes->insert($data);

        return redirect('/admin/carretes');

    }
    

}
