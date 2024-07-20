<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificação simples de usuário e senha
    if ($username === 'damiao' && $password === '123') {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Usuário ou senha incorretos.';
    }
}
?>
<!DOCTYPE html>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Damião Firmino - Login</title>

    <!-- Icones -->
    <link rel="stylesheet" href="assets/fonts/style.css" />

    <!-- Swiper -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- STYLES -->
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" type="text" href="./css/lightbox.css">
    <link rel="stylesheet" href="./css/lightbox.min.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
        /* Estilos para o body e html */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
        }
        /* Estilo do container de login */
        .login-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            margin: auto;
        }
        .login-container h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
            text-align: center;
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        .login-form label {
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .login-form input {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        .login-form button {
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .login-container .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .login-container .logo img {
            width: 150px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
        /* Estilo do footer */
        .footer {
            width: 100%;
            --hue: 198;
            --base-color: hsl(var(--hue) 0% 17%);
            background: var(--base-color);
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            left: 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer-content a,
        .footer-content p {
            color: white;
        }
        .social {
            display: flex;
            gap: 10px;
        }
        .logo-footer {
            max-height: 50px;
        }
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .footer-content p {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <header id="header">
        <nav class="container">
            <a class="logo" href="#">
                <img src="./assets/svg/logo6.png" alt="Logo Damião." loading="lazy">
            </a>
            <!-- menu -->
            <div style="margin-left: 60%;" class="menu">
                <ul class="grid">
                    <li><a class="title" href="index.html">Voltar para a home</a></li>
                </ul>
            </div>
            <!-- /menu -->
            <div class="social-links"></div>
            <div class="toggle icon-menu"></div>
            <div class="toggle icon-close"></div>
        </nav>
    </header>
    <div class="login-container">
        <div class="logo">
            <img src="./assets/svg/logo6.png" alt="Logo Damião Firmino">
        </div>
        <h2>Login</h2>
        <?php if ($error): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="post" class="login-form">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <br>
    <footer class="footer">
        <div class="footer-content">
            <a class="" href="#home">
                <img class="logo-footer" src="./assets/svg/logo6.png" alt="Logo Damião" loading="lazy">
            </a>
            <p>©2024 Damião Firmino.<br>Todos os direitos reservados.<br><br>Desenvolvido por Gustavo Prata</p>
            <div class="social">
                <a href="https://www.instagram.com/damiaofirmino.imoveis/" target="_blank">
                    <i class="icon-instagram"></i>
                </a>
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="icon-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
