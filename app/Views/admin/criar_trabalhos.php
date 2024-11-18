<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Trabalho</title>
    <style>
        /* Estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh; /* Garantir que a altura mínima seja 100% da altura da tela */
            margin: 0;
            background-color: #f4f4f4; /* Light background for modern look */
            font-family: 'Roboto', sans-serif; /* Modern font */
            position: relative; /* Permitir o posicionamento do footer */
        }
        .container {
            max-width: 500px;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 80px; /* Espaço para o footer */
        }
        .header {
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .title {
            font-size: 24px;
            color: #333;
        }

        /* Mensagens de feedback */
        .messages {
            margin-bottom: 20px;
        }
        .success-message {
            color: green;
            margin-bottom: 10px;
        }
        .error-message, .error-list {
            color: red;
            margin-bottom: 10px;
        }
        .error-list {
            list-style-type: none;
            padding: 0;
        }

        /* Estilo do formulário */
        .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .form-group {
            text-align: left;
        }
        .form-label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }
        .form-input:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea.form-input {
            resize: vertical;
            min-height: 100px;
        }
        .form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #205483; /* Footer background color */
            color: #fff;
            text-align: center;
            padding: 40px 0; /* Increased padding for a taller footer */
            font-size: 16px; /* Increased font size */
            font-weight: bold;
            width: 100%; /* Ensure footer takes full width */
            position: absolute; /* Fix footer at the bottom */
            bottom: 0; /* Fix to bottom */
        }

        footer img {
            max-width: 80px;
            margin-top: 10px;
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
    <div class="container">
        <header class="header">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa" class="logo"> <!-- Exemplo de logo -->
            <h1 class="title">Criar Trabalho</h1>
        </header>

        <!-- Exibe mensagens de sucesso ou erro, se existirem -->
        <div class="messages">
            <?php if (session()->getFlashdata('success')): ?>
                <p class="success-message"><?= session()->getFlashdata('success') ?></p>
            <?php elseif (session()->getFlashdata('error')): ?>
                <p class="error-message"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <!-- Exibe erros de validação -->
            <?php if (isset($errors)): ?>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Formulário para criar trabalho -->
        <form action="<?= base_url('criar-trabalho') ?>" method="post" class="form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="protocolo" class="form-label">Protocolo:</label>
                <input type="text" name="protocolo" id="protocolo" value="<?= old('protocolo') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea name="resumo" id="resumo" required class="form-input"><?= old('resumo') ?></textarea>
            </div>

            <div class="form-group">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" name="curso" id="curso" value="<?= old('curso') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="modelo_avaliativo" class="form-label">Modelo Avaliativo:</label>
                <input type="text" name="modelo_avaliativo" id="modelo_avaliativo" value="<?= old('modelo_avaliativo') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="avaliadores" class="form-label">Avaliadores:</label>
                <input type="text" name="avaliadores" id="avaliadores" value="<?= old('avaliadores') ?>" required class="form-input">
            </div>

            <button type="submit">Criar Trabalho</button>
        </form>
    </div>

    <button onclick="window.history.back()" class="voltar-btn">Voltar</button>

    <footer>
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa">
    </footer>
</body>
</html>
