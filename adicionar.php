<?php

declare(strict_types=1);

session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Peça - ReuseTech</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #000000;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            flex-shrink: 0;
        }

        header h1 {
            color: #00ff00;
        }

        main {
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
            flex-grow: 1;
        }

        .conteudo {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .rodape {
            background-color: #000000;
            height: 50px;
            padding: 0 10px;
            border-radius: 0 0 10px 10px;
            text-align: center;
            color: #00ff00;
            margin-top: auto;
        }

        #funcoes a {
            background-color: transparent;
            color: #000;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            display: block;
            margin: 10px auto;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            text-align: center;
            width: 400px;
        }

        #funcoes a:hover {
            background-color: gray;
        }
    </style>
</head>
<body>
    <header>
        <img src="images/reusetech.png" alt="ReuseTech">
        <h1>ReuseTech</h1>
    </header>
    <main>
        <div class="conteudo">
            <div id="funcoes">
                <a href="pecas/adicionar_peca.php?table=armazenamento">
                    <h1>Armazenamento</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=fonte">
                    <h1>Fonte</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=gabinete">
                    <h1>Gabinete</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=memoriaram">
                    <h1>Memoria Ram</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=pc">
                    <h1>Pc</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=placaderede">
                    <h1>Placa de Rede</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=placadevideo">
                    <h1>Placa de Vídeo</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=placamae">
                    <h1>Placa Mãe</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=processador">
                    <h1>Processador</h1>
                </a>
                <a href="pecas/adicionar_peca.php?table=usuario">
                    <h1>Usuario</h1>
                </a>
            </div>
        </div>
    </main>
    <div class="rodape">
        &copy; ReuseTech 2021-2023. Todos os direitos reservados.
    </div>
</body>
</html>
