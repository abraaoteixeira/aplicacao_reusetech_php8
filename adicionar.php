<!-- Passar para o PHP-->
<?php
    //Iniciando Variavel de sessão
    session_start();
    //Mandar de volta para a tela de login caso não tenha passado por ela
    if(!isset($_SESSION["user"])){
        header("location:login.php");
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
                    <a href="pecas/processador.php">
                        <h1>Processador</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/placa_mae.php">
                        <h1>Placa Mãe</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/ram.php">
                        <h1>Memória Ram</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/placa_de_video.php">
                        <h1>Placa de Vídeo</h1>
                    </a>
                </div>
            </div>
            <div class="coluna">
                <div class="peca">
                    <a href="pecas/hd.html">
                        <h1>HD</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/ssd.html">
                        <h1>SSD</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/fonte.html">
                        <h1>Fonte</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/gabinete.html">
                        <h1>Gabinete</h1>
                    </a>
                </div>
                <div class="peca">
                    <a href="pecas/placa_de_rede.html">
                        <h1>Placa de Rede</h1>
                    </a>
                </div>
            </div>
            <div class="sair">
                <a href="index.php"><input type="button" value="Voltar"></a>
            </div>
        </main>
    </body>
</html>