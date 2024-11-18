<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            padding: 15px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }

        .separator {
            margin: 30px 0;
            font-size: 14px;
            color: #777;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 12px;
            color: #777;
        }

        .footer img {
            max-width: 60px;
        }

        .footer p {
            margin: 5px 0;
        }

        .img-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .img-container img {
            width: 100px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
        </div>

        <div class="buttons">
            <a href="<?= site_url('login') ?>" class="btn">Admin</a>
            <a href="<?= site_url('avaliador') ?>" class="btn">Avaliador</a>
        </div>

       

        
    </div>

    <div class="footer">
        <p>Univiçosa | contato@univicosa.com.br | (31) 3899-8000</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
    <?php endif; ?>

</body>
</html>
