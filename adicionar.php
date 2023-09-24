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
        <title>Adicionar Peça - ReuseTech</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/adicionar.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <header>
            <img src="images/reusetech.png" alt="ReuseTech">
            <h1>ReuseTech</h1>
        </header>
        <main>
            <div class="coluna">
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=armazenamento">
                        <h1>Armazenamento</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=fonte">
                        <h1>Fonte</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=gabinete">
                        <h1>Gabinete</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=memoriaram">
                        <h1>Memoria Ram</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=pc">
                        <h1>Pc</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=placaderede">
                        <h1>Placa de Rede</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=placadevideo">
                        <h1>Placa de Vídeo</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=placamae">
                        <h1>Placa Mãe</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=processador">
                        <h1>Processador</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/adicionar_peca.php?table=usuario">
                        <h1>Usuario</h1>
                    </a>
                </div>
            </div>
            <div class="sair">
                <a href="index.php"><input type="button" value="Voltar"></a>
            </div>
        </main>
    </body>
</html>