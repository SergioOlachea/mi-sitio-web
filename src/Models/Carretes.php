<?php

namespace App\Models;

use PDO;

class Producto {
    private PDO $pdo;
    public $id;
    public $name;
    public $description;
    public $image;

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
                $producto->id = $row['id'];
                $producto->name = $row['name'];
                $producto->description = $row['description'];
                $producto->image = $row['image'];
                $productos[] = $producto;
            }

            return $productos;
        }catch (PDOException $e) {
            error_log("Error al consultar la base de datoso: ". $e->getMessage());
            return [];
        }
    }

    public function find($id) {

        if(!is_numeric($id) || $id <= 0) {
            return null;
        }

        try {
            $sql = "SELECT * FROM producto WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $productoDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productoDetails) {
                return null; // Carrera no encontrada
            }

            $this->id = $productoDetails['id'];
            $this->name = $productoDetails['name'];
            $this->description = $productoDetails['description'];
            $this->image = $productoDetails['image'];

            return $this;
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return [];
        }
    }

    public function insert($data) {
        try {
            $sql = "INSERT INTO producto (name, description, image) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$data['name'], $data['description'], $data['image']]);
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return false;
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE producto SET name = ?, description = ?, image = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$data['name'], $data['description'], $data['image'], $data['id']]);
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM producto WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return false;
        }
    }
}