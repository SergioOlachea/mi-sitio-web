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
        $stmt = getPDO()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   public function attemptLogin($email, $password)
    {
        // 1. Buscamos al usuario
        $user = $this->findUserByEmail($email);

        // 2. Verificamos contraseña
        if (!$user || !password_verify($password, $user['password'])) {
            return viewWithoutLayout('auth/login', ['error' => 'Credenciales incorrectas']);
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        
        $_SESSION['tipo'] = $user['tipo']; 

        // 4. REDIRECCIÓN SEGÚN ROL
        if ($user['tipo'] === 'admin') {
            redirect('admin/home'); 
        } else {
            redirect('/'); 
        }
    }

    public function logout()
    {
        session_start();

        // Eliminar todas las variables de sesión
        $_SESSION = [];

        // Destruir la sesión
        session_destroy();

        // Redirigir al login
        redirect('login');
    }
}