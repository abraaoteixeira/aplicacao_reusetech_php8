<?php
    require_once("../conexao.php");
?>
<?php
    if(isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $chipset = $_POST["chipset"];
        $barramento_ram = $_POST["barramento_ram"];
        $soquete = $_POST["soquete"];
        $quantidade_ram = $_POST["quantidade_ram"];
        $tipo_pci =  $_POST["tipo_pci"];
        $quantidade_pci = $_POST["quantidade_pci"];
        $tipo_armaz = $_POST["tipo_armaz"];
        $quantidade_armaz = $_POST["quantidade_armaz"];
        $estado = $_POST["funciona"];
       
        $inserir = "INSERT INTO placamae(marca, modelo, soquete, chipset, tipoBarraRam, quantBarraRam, tipoPCI, quantidadePCI, tipoBarraArmaz, quantBarraArmaz, funciona) VALUES ('$marca', '$modelo','$soquete', '$chipset', '$barramento_ram', $quantidade_ram, '$tipo_pci', $quantidade_pci, '$tipo_armaz', $quantidade_armaz, '$estado') ";

        $insert = mysqli_query($conecta, $inserir);
        if(!$insert){
            die("Erro no Banco de Dados");
        }else{
            header("location:../certo.html");
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Placa Mãe - ReuseTech</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/pecas.css">
        <link rel="stylesheet" href="../css/responsive.css">
    </head>
    <body>
        <header>
            <img src="../images/reusetech.png" alt="ReuseTech">
            <h1>ReuseTech</h1>
        </header>
        <form action="placa_mae.php" method="POST">
            <h1>Adicionando Placa Mãe</h1>
            <input type="text" placeholder="Marca" name="marca"><br>
            <input type="text" name="modelo" placeholder="Modelo"><br>
            <input type="text" name="soquete" placeholder="Soquete"><br>
            <input type="text" name="chipset" placeholder="Chipset"><br>
            <input type="text" name="barramento_ram" placeholder="Tipo barramente RAM"><br>
            <input type="number" name="quantidade_ram" placeholder="Quantidade Barramento RAM"><br>
            <input type="text" name="tipo_pci" placeholder="Tipo PCI"><br>
            <input type="number" name="quantidade_pci" placeholder="Quantidade PCI"><br>
            <input type="text" name="tipo_armaz" placeholder="Tipo Barramento Armaz"><br>
            <input type="number" name="quantidade_armaz" placeholder="Quantidade Barramento Armaz"><br>
            <input type="text" name="funciona" placeholder="Funciona / Não Funciona">
            <input type="submit" value="Adicionar">
        </form>
        <div class="sair">
            <a href="../adicionar.php"><input type="button" value="Voltar"></a>
        </div>
    </body>
</html>
<?php
    mysqli_close($conecta);
?>