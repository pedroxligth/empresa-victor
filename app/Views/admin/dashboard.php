<?php

use App\Controllers\Logout;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reset de margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Cabeçalho */
        header {
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            max-width: 150px;
        }

        /* Container principal */
        .container {
            flex-grow: 1;
            width: 100%;
            max-width: 600px;
            margin-top: 30px;
            padding: 0 20px;
        }

        /* Card principal */
        .card-dashboard {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Botões */
        .btn-custom {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            text-transform: uppercase;
            border: none;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-voltar {
            background-color: #6c757d;
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
            padding: 10px;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Rodapé */
        footer {
            width: 100%;
            background-color: #343a40;
            color: white;
            padding: 30px;
            text-align: center;
            font-size: 14px;
            position: relative;
            bottom: 0;
            margin-top: auto;
        }

        footer img {
            max-width: 60px;
            margin-top: 10px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            footer {
                font-size: 12px;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <header>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa">
    </header>

    <div class="container">
        <!-- Card principal do dashboard -->
        <div class="card-dashboard">
            <div class="card-header">
                Dashboard Admin
            </div>

            <!-- Logo Simpac -->
            <div class="text-center mb-4">
                <img src="<?= base_url('assets/images/simpac.png') ?>" alt="Logo Simpac" class="img-fluid" style="max-width: 180px;">
            </div>

            <!-- Botões empilhados e menores -->
            
            <a href="<?= site_url('trabalhos/criar') ?>" class="btn btn-custom">Criar Trabalhos</a>
            <a href="<?= site_url('avaliador/dashboard') ?>" class="btn btn-custom">Resultados</a>
            <a href="<?= site_url('useradmin') ?>" class="btn btn-custom">Cadastrar Usuário</a>
            

            <button onclick="window.history.back()" class="btn btn-voltar">Voltar</button>
            <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <footer>
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa">
    </footer>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
