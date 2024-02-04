<?php

require 'config/database.php';
$authController = new AuthController($pdo);

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function autenticar() {
        session_start(); // Ensure session is started
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (empty($username) || empty($password)) {
            $_SESSION['toast'] = ['message' => 'Usuário ou Senha Inválido', 'type' => 'error'];
            header('Location: /login');
            exit;
        }

        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: /home');
                exit;
            } else {
                $_SESSION['toast'] = ['message' => 'Usuário ou Senha Inválido', 'type' => 'error'];
                header('Location: /login');
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['toast'] = ['message' => 'Erro no servidor', 'type' => 'error'];
            header('Location: /login');
            exit;
        }
    }
}
