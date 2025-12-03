<?php 

namespace App\Controllers;

use PDO;

class AuthController {

public function index()
    {
        requireAdmin(); 

        return view('admin/home');
    }

    public function findUserByEmail($email)
    {
        $stmt = getPDO()->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function attemptLogin($email, $password)
    {
        $user = $this->findUserByEmail($email);

        // Validación de credenciales
        if (!$user || !password_verify($password, $user['contrasena'])) { // contraseña con hash
                // if (!$user || $password !== $user['contrasena']) { // contraseña sin hash


            return viewWithoutLayout('Auth/login', ['error' => 'Credenciales incorrectas']);
        }

        // Guardar sesión
        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['tipo'] = $user['tipo'];



        $_SESSION['user'] = [
                    'id_usuario' => $_SESSION['user_id'],
                    'nombre' => $_SESSION['user_name'],
                    'tipo' => $_SESSION['tipo']
                ];


        return view('home/index');
        
        exit;
    }



    public function logout()
    {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        // Eliminar todas las variables de sesión   
        $_SESSION = [];

        // Destruir la sesión
        session_destroy();

        // Redirigir al login
        return view('home/index');
    }

    // password_hash($password, PASSWORD_DEFAULT);
}