<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Avaliador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 380px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        h1 {
            color: #0099cc;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 18px;
            color: #666;
            margin-bottom: 25px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 30px;
            font-size: 16px;
            color: #444;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0099cc;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            border-radius: 30px;
            background-color: #0069d9;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .footer {
            background-color: #004a77;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top: 3px solid #0099cc;
        }

        .footer img {
            max-width: 90px;
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            border-radius: 30px;
            background-color: #ddd;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Avaliador" class="logo">

        <h1>Área do Admin</h1>
        <h2>Bem-vindo, faça o login para continuar</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login/authenticate') ?>" method="post">
            <input type="text" name="username" placeholder="Nome de Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

        <button class="back-btn" onclick="window.history.back()">Voltar</button>
    </div>

    <footer class="footer">
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
