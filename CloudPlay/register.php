<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação básica
    $errors = [];
    
    if (empty($_POST['name'])) {
        $errors['name'] = "Por favor, insira seu nome";
    }
    
    if (empty($_POST['email'])) {
        $errors['email'] = "Por favor, insira seu email";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Por favor, insira um email válido";
    }
    
    if (empty($_POST['password'])) {
        $errors['password'] = "Por favor, insira uma senha";
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = "A senha deve ter pelo menos 6 caracteres";
    }
    
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['confirm_password'] = "As senhas não coincidem";
    }
    
    // Se não houver erros, "registra" o usuário (simulação)
    if (empty($errors)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $_POST['name'];
        header("Location: home.php");
        exit;
    } else {
        // Volta para o login com os erros (em um sistema real, você armazenaria isso na sessão)
        header("Location: login.php?register_error=1");
        exit;
    }
}
?>
