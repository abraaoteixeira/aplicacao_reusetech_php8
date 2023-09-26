<?php

declare(strict_types=1);

require_once("conexao.php");

session_start();

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"], $_POST["peca"])) {
    $peca = filter_input(INPUT_POST, 'peca', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($peca && $id) {
        $stmt = $conecta->prepare("DELETE FROM $peca WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            die("Falha na Consulta ao Banco");
        }
    }
}

$processador2 = $conecta->query("SELECT * FROM processador");
$placa_mae2 = $conecta->query("SELECT * FROM placa_mae");

if(!$processador2 || !$placa_mae2){
    die("Falha na Consulta ao Banco2");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualizar Estoque - ReuseTech</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/visualizar.css">
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

            .peca {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 20px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .peca h3 {
                margin-bottom: 10px;
            }

            .peca ul {
                list-style-type: none;
                padding: 0;
            }

            .peca ul li {
                margin-bottom: 5px;
            }

            .lixao {
                text-align: center;
            }

            .lixo {
                background-color: transparent;
                color: #000;
                padding: 8px 16px;
                border-radius: 5px;
                text-decoration: none;
                font-size: 16px;
                border: 1px solid #000;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .lixo:hover {
                background-color: gray;
            }

            .topo {
                text-align: center;
            }

            .sair {
                text-align: center;
                margin-top: 20px;
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
        </style>
    </head>
    <body>

        <header>
            <img src="images/reusetech.png" alt="ReuseTech">
            <h1>ReuseTech</h1>
        </header>

        <div class="topo">
            <h1>Visualizar Estoque </h1>
        </div>

        <?php
            while($proc = mysqli_fetch_assoc($processador2)) {
            $num = 0;
        ?>

        <div class="peca">
            <h3>PROCESSADOR</h3>
            <ul>
                <li>Marca: <?php echo $proc["marca"] ?></li>
                <li>Modelo: <?php echo $proc["modelo"] ?></li>
                <li>Quantidade de Nucleos: <?php echo $proc["quantNucleos"] ?></li>
                <li>Quantidade de Threads: <?php echo $proc["quantThreads"]?></li>
                <li>Soquete: <?php echo $proc["soquete"]?></li>
                <li>Possui Gráficos Integrado: <?php echo $proc["possuiGraficosIntegrados"]?></li>
                <li>TDP: <?php echo $proc["TDP"]?></li>
                <li>Tipo de Barramento Suportado: <?php echo $proc["tipoBarraRamSuportado"]?></li>
                <li>Estado: <?php echo $proc["funciona"]?> </li>
                <form action="visualizar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $proc["id"]?>"><br>
                    <input type="hidden" name="peca" value="processador"><br>
                    <div class="lixao">
                        <input type="submit" value="🗑" class="lixo">
                    </div>
                </form>
            </ul>
        </div>
        <?php
            }
        ?>

        <?php
            while($placa = mysqli_fetch_assoc($placa_mae2)) {
        ?>
        <div class="peca">
            <h3>PLACA MÃE</h3>
            <ul>
                <li>Marca: <?php echo $placa["marca"] ?></li>
                <li>Modelo: <?php echo $placa["modelo"] ?></li>
                <li>Soquete: <?php echo $placa["soquete"] ?></li>
                <li>Chipset: <?php echo $placa["chipset"]?></li>
                <li>Tipo Barramento RAM: <?php echo $placa["tipoBarraRam"]?></li>
                <li>Quantidade Barramento RAM: <?php echo $placa["quantBarraRam"]?></li>
                <li>Tipo PCI: <?php echo $placa["tipoPCI"]?></li>
                <li>Quantidade PCI: <?php echo $placa["quantidadePCI"]?></li>
                <li>Tipo Barramento de Armazenamento: <?php echo $placa["tipoBarraArmaz"]?> </li>
                <li>Quantidade de Barramento de Armazenamento: <?php echo $placa["quantBarraArmaz"]?> </li>
                <li>funciona: <?php echo $placa["funciona"]?> </li>
                <form action="visualizar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $placa["id"]?>"><br>
                    <input type="hidden" name="peca" value="placamae"><br>
                    <div class="lixao">
                        <input type="submit" value="🗑" class="lixo">
                    </div>
                </form>
            </ul>
        </div>
        <?php
            }
        ?>

        <div class="sair">
            <a href="index.php"><input type="button" value="Voltar"></a>
        </div>
        <div class="rodape">
        &copy; ReuseTech 2021-2023. Todos os direitos reservados.
        </div>

    </body>
</html>


<?php
    mysqli_close($conecta);
?>
