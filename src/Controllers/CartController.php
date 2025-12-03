<?php

namespace App\Controllers;

use App\Models\Producto;

class CartController {

    private function initCart() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add($id) {
        $this->initCart();

        if (!$id) return;

        $productoModel = new Producto(getPDO());
        $producto = $productoModel->find($id);

        if (!$producto) {
            die("Producto no encontrado.");
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['cantidad']++;
        } else {
            $_SESSION['cart'][$id] = [
                'id'        => $producto->id_producto,
                'nombre'    => $producto->nombre,
                'precio'    => $producto->precio,
                'imagen'    => $producto->imagen_url,
                'cantidad'  => 1
            ];
        }

        header("Location: index.php?route=cart");
        exit;
    }

    public function index() {
        $this->initCart();
        $items = $_SESSION['cart'];
        return view('public/cart/cart.index', ['items' => $items]);
    }

    public function remove($id) {
        $this->initCart();

        if ($id && isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header("Location: index.php?route=cart");
        exit;
    }

    public function updateQty($id, $action) {
        $this->initCart();

        if (!$id || !isset($_SESSION['cart'][$id])) {
            header("Location: index.php?route=cart");
            exit;
        }

        switch ($action) {
            case "increment":
                $_SESSION['cart'][$id]['cantidad']++;
                break;

            case "decrement":
                $_SESSION['cart'][$id]['cantidad']--;
                if ($_SESSION['cart'][$id]['cantidad'] <= 0) {
                    unset($_SESSION['cart'][$id]);
                }
                break;
        }

        header("Location: index.php?route=cart");
        exit;
    }

    public function clear() {
        unset($_SESSION['cart']);
        header("Location: index.php?route=cart");
        exit;
    }
}
