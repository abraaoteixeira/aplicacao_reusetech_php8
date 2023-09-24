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
        $stmt = $conecta->prepare("DELETE FROM ? WHERE id = ?");
        $stmt->bind_param("si", $peca, $id);
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
    </body>
</html>
<?php
    mysqli_close($conecta);
?>