<?php
session_start();

// Verifica se o usuário está "logado" (sem validação real)
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Play - Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Cloud Play</h1>
        <p>Você está logado como: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <a href="logout.php" class="logout-btn">Sair</a>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Play Anywhere,<br>No Downloads Required</h1>
            <p>Stream high-end games instantly on any device. Experience gaming without limitations.</p>
            
            <div class="divider"></div>
            
            <div class="cta">
                <h2>Start Gaming Now</h2>
                
                <div class="features">
                    <h3>Popular Features</h3>
                    <div class="feature-list">
                        <div class="feature-item">
                            <strong>4K Streaming</strong><br>
                            Experience your games in stunning 4K quality with minimal latency.
                        </div>
                        <div class="feature-item">
                            <strong>Steam Integration</strong><br>
                            Access your Steam library directly through our platform.
                        </div>
                        <div class="feature-item">
                            <strong>Cross-Platform</strong><br>
                            Play your favorite games across multiple platforms seamlessly.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="featured-games">
        <div class="container">
            <h2>Featured Games</h2>
            
            <div class="games-grid">
                <div class="game-card">
                    <div class="game-info">
                        <h3 class="game-title">Cyberpunk 2077</h3>
                        <p class="game-description">Next-gen open world RPG</p>
                        <a href="#" class="play-btn">Play Now</a>
                    </div>
                </div>
                
                <div class="game-card">
                    <div class="game-info">
                        <h3 class="game-title">Forza Horizon 5</h3>
                        <p class="game-description">Ultimate racing experience</p>
                        <a href="#" class="play-btn">Play Now</a>
                    </div>
                </div>
                
                <div class="game-card">
                    <div class="game-info">
                        <h3 class="game-title">Red Dead Redemption 2</h3>
                        <p class="game-description">Epic western adventure</p>
                        <a href="#" class="play-btn">Play Now</a>
                    </div>
                </div>
                
                <div class="game-card">
                    <div class="game-info">
                        <h3 class="game-title">Elden Ring</h3>
                        <p class="game-description">Challenging action RPG</p>
                        <a href="#" class="play-btn">Play Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
