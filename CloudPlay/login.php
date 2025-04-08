<?php
session_start();

// Verifica se já está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: home.php");
    exit;
}

// Processa o login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        header("Location: home.php");
        exit;
    } else {
        $login_error = "Por favor, insira um email e senha!";
    }
}

// Processa o cadastro (simplificado)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && $_POST['password'] === $_POST['confirm_password']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $_POST['name'];
        header("Location: home.php");
        exit;
    } else {
        $register_error = "Por favor, preencha todos os campos corretamente!";
        $show_register = true; // Mostra o formulário de cadastro
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Play - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="auth-container">
        <!-- Formulário de Login -->
        <div class="login-form <?php echo isset($show_register) && $show_register ? 'hidden' : ''; ?>">
            <div class="login-header">
                <h1>Cloud Play</h1>
                <p>Entre para começar a jogar</p>
            </div>
            
            <?php if (isset($login_error)): ?>
                <div class="error-message"><?php echo $login_error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <input type="hidden" name="login" value="1">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="**********" required>
                </div>
                
                <button type="submit" class="auth-btn">Entrar</button>
                
                <div class="auth-links">
                    <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                    <a href="#" id="show-register" class="toggle-form">Criar uma conta</a>
                </div>
            </form>
        </div>

        <!-- Formulário de Cadastro -->
        <div class="register-form <?php echo isset($show_register) && $show_register ? '' : 'hidden'; ?>">
            <div class="register-header">
                <h1>Criar Conta</h1>
                <p>Junte-se ao Cloud Play</p>
            </div>
            
            <?php if (isset($register_error)): ?>
                <div class="error-message"><?php echo $register_error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <input type="hidden" name="register" value="1">
                <div class="form-group">
                    <label for="reg-name">Nome Completo</label>
                    <input type="text" id="reg-name" name="name" placeholder="Seu nome" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" placeholder="seu@email.com" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-password">Senha</label>
                    <input type="password" id="reg-password" name="password" placeholder="**********" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-confirm">Confirmar Senha</label>
                    <input type="password" id="reg-confirm" name="confirm_password" placeholder="**********" required>
                </div>
                
                <button type="submit" class="auth-btn">Cadastrar</button>
                
                <div class="auth-links">
                    <a href="#" id="show-login" class="toggle-form">Já tem uma conta? Entrar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Alternar entre formulários
        document.getElementById('show-register')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.login-form').classList.add('hidden');
            document.querySelector('.register-form').classList.remove('hidden');
        });

        document.getElementById('show-login')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.register-form').classList.add('hidden');
            document.querySelector('.login-form').classList.remove('hidden');
        });
    </script>
</body>
</html>
