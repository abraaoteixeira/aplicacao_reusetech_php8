<?php
declare(strict_types=1);

session_start();

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo ReuseTech</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
            margin: 0; /* Remove a margem padrão do corpo */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Garante que o corpo ocupa toda a altura da tela */
        }

        header {
            background-color: #000000;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            flex-shrink: 0; /* Não permite que o cabeçalho encolha */
        }

        header h1 {
            color: #00ff00;
        }

        main {
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
            flex-grow: 1; /* Permite que o conteúdo principal cresça e ocupe o espaço disponível */
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
            margin-top: auto; /* Mantém o rodapé na parte inferior */
        }
        #funcoes a {
            background-color: transparent;
            color: #000;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            display: block; /* Alterado de inline-block para block */
            margin: 10px auto; /* Centralizar os botões */
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            text-align: center;
            width: 400px; /* Largura fixa para todos os botões */
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
            <!-- Conteúdo principal aqui -->
            <div id="funcoes">
                <a href="visualizar.php">
                    <h1>Visualizar Estoque</h1>
                    <p>Clique aqui para visualizar o nosso estoque de peças</p>
                </a>
                <a href="adicionar.php">
                    <h1>Adicionar Peça ao Estoque</h1>
                    <p>Clique aqui para adicionar peças ao nosso estoque</p>
                </a>
            </div>
        </div>
    </main>
    <div class="rodape">
        &copy; ReuseTech 2021-2023. Todos os direitos reservados.
    </div>
</body>
</html>
