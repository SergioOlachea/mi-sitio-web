<?php

namespace App\Models;

use PDO;
use PDOException; 

class Producto {
    private PDO $pdo;
    
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $categoria;
    public $imagen_url;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        try {
            $sql = "SELECT * FROM producto";
            $stmt = $this->pdo->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $productos = [];

            foreach($rows as $row) {
                $producto = new Producto($this->pdo);
                $producto->id = $row['id_producto'];
                $producto->nombre = $row['nombre'];
                $producto->descripcion = $row['descripcion'];
                $producto->precio = $row['precio'];
                $producto->stock = $row['stock'];
                $producto->categoria = $row['categoria'];
                $producto->imagen_url = $row['imagen_url'];
                $productos[] = $producto;
            }

            return $productos;
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: ". $e->getMessage());
            return [];
        }
    }

    public function find($id) {
        if(!is_numeric($id) || $id <= 0) {
            return null;
        }

        try {
            $sql = "SELECT * FROM producto WHERE id_producto = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]); 
            
            $productoDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productoDetails) {
                return null;
            }

            $this->id = $productoDetails['id_producto'];
            $this->nombre = $productoDetails['nombre'];
            $this->descripcion = $productoDetails['descripcion'];
            $this->precio = $productoDetails['precio'];
            $this->stock = $productoDetails['stock'];
            $this->categoria = $productoDetails['categoria'];
            $this->imagen_url = $productoDetails['imagen_url']; 

            return $this;
        } catch (PDOException $e) {
            error_log("Error al buscar producto: " . $e->getMessage());
            return null; 
        }
    }

    public function insert($data) {
        try {
            $sql = "INSERT INTO producto (nombre, descripcion, precio, stock, categoria, imagen_url) 
                    VALUES (:nombre, :descripcion, :precio, :stock, :categoria, :imagen_url)";
            
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'precio' => $data['precio'],
                'stock' => $data['stock'],
                'categoria' => $data['categoria'],
                'imagen_url' => $data['imagen_url'] 
            ]);

        } catch (PDOException $e) {
            error_log("Error al insertar: " . $e->getMessage());
            return false;
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE producto SET 
                        nombre = :nombre, 
                        descripcion = :descripcion, 
                        precio = :precio,
                        stock = :stock,
                        categoria = :categoria,
                        imagen_url = :imagen_url 
                    WHERE id_producto = :id";
            
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'precio' => $data['precio'],
                'stock' => $data['stock'],
                'categoria' => $data['categoria'],
                'imagen_url' => $data['imagen_url'],
                'id' => $data['id'] 
            ]);

        } catch (PDOException $e) {
            error_log("Error al actualizar: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM producto WHERE id_producto = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar: " . $e->getMessage());
            return false;
        }
    }

    public function getByCategory($categoria) {
        try {
            // Filtramos por la columna categoria
            $sql = "SELECT * FROM producto WHERE categoria = :categoria";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['categoria' => $categoria]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $productos = [];

            foreach($rows as $row) {
                $producto = new Producto($this->pdo);
                // Mapeamos los datos igual que en el método all()
                $producto->id = $row['id_producto'];
                $producto->nombre = $row['nombre'];
                $producto->descripcion = $row['descripcion'];
                $producto->precio = $row['precio'];
                $producto->stock = $row['stock'];
                $producto->categoria = $row['categoria'];
                $producto->imagen_url = $row['imagen_url'];
                $productos[] = $producto;
            }

            return $productos;
        } catch (PDOException $e) {
            error_log("Error al filtrar por categoría: ". $e->getMessage());
            return [];
        }
    }

    
}