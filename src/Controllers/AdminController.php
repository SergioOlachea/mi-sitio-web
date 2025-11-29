<?php

namespace App\Controllers;

use App\Models\Producto; // Asegúrate de importar tu modelo

class AdminController
{
    // Panel Principal (Dashboard)
    public function index()
    {
        requireAdmin(); // Protege la ruta
        return view('admin/home');
    }

    // --- MÉTODOS PARA LAS CATEGORÍAS ---

    public function carretes()
    {
        requireAdmin();
        $model = new Producto();
        // Obtenemos solo carretes para la vista de admin
        $productos = $model->where('categoria', 'carretes')->get();
        return view('admin/carretes/index', ['productos' => $productos]);
    }

    public function canas()
    {
        requireAdmin();
        $model = new Producto();
        $productos = $model->where('categoria', 'canas')->get();
        return view('admin/canas/index', ['productos' => $productos]);
    }

    public function senuelos()
    {
        requireAdmin();
        $model = new Producto();
        $productos = $model->where('categoria', 'senuelos')->get();
        return view('admin/senuelos/index', ['productos' => $productos]);
    }

    public function accesorios()
    {
        requireAdmin();
        $model = new Producto();
        // Nota: Asegúrate que en tu BD la categoría sea 'accesorios' (o 'accesorio')
        $productos = $model->where('categoria', 'accesorios')->get();
        return view('admin/accesorios/index', ['productos' => $productos]);
    }
}