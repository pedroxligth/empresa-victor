<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100vh; /* A altura mínima garante que o footer fique no final */
            margin: 0;
            background-color: #f8f9fa; /* Cor de fundo suave */
        }

        header {
            text-align: center;
            padding: 20px 0;
        }

        h1, h2 {
            text-align: center;
            color: #00AFEF; /* Cor azul */
            margin-top: 10px;
            font-weight: bold;
        }

        h1 {
            font-size: 28px; /* Tamanho do título principal */
        }

        h2 {
            font-size: 20px; /* Tamanho do subtítulo */
        }

        .content {
            text-align: center;
            width: 100%;
            max-width: 400px; /* Tamanho máximo do formulário */
            margin: 0 auto; /* Centraliza o conteúdo */
            padding: 20px;
            background-color: #fff; /* Cor de fundo do formulário */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra do formulário */
        }

        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            color: #333;
        }

        button {
            display: block;
            padding: 10px;
            margin: 10px auto;
            font-size: 18px;
            border-radius: 25px;
            font-weight: bold;
            background-color: #205483;
            color: #fff;
            border: 2px solid #00456b;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            border-color: #00385f;
        }

        /* Footer styling */
        footer {
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            font-weight: bold;
            margin-top: auto; /* Garante que o footer fique no fundo */
        }

        footer img {
            max-width: 80px; /* Ajuste o tamanho máximo da logo */
            margin-top: 10px;
        }

        .logo {
            max-width: 150px; /* Tamanho da logo no cabeçalho */
        }
        .voltar-btn {
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            background-color: #ccc; /* Light gray for the back button */
            color: #333;
            border: none;
            cursor: pointer ;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <header>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="logo">
    </header>

    <div class="content">
        <h1>Cadastrar Novo Usuário</h1>
        
        <?php if (session()->get('success')) : ?>
            <div class="alert alert-success"><?= session()->get('success') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('useradmin/cadastrar') ?>" method="post">
            <div class="form-group">
                <label for="username">Nome de Usuário</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Tipo de Usuário</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="avaliador">Avaliador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <button onclick="window.history.back()" class="voltar-btn">Voltar</button>

    <footer>
        <p>Univiçosa<br> contato@univicosa.com.br<br> (31) 3899-8000<br> Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </footer>
</body>
</html>
