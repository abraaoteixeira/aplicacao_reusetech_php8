<?php
    require_once("../conexao.php");
?>
<?php
    if(isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $quantNucleos = $_POST["nucleos"];
        $quantThreads = $_POST["threads"];
        $soquete = $_POST["soquete"];
        $graficos = $_POST["graficos"];
        $barramento =  $_POST["barramento"];
        $estado = $_POST["funciona"];
        $tdp = $_POST["tdp"];
       
        $inserir = "INSERT INTO processador (marca, modelo, quantNucleos, quantThreads, soquete, possuiGraficosIntegrados, TDP, tipoBarraRamSuportado, funciona) VALUES ('$marca', '$modelo', $quantNucleos, $quantThreads, '$soquete', '$graficos','$tdp', '$barramento', '$estado') ";

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
        <title>Processador - ReuseTech</title>
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
        <form action="processador.php" method="POST">
            <h1>Adicionando Processador</h1>
            <input type="text" placeholder="Marca" name="marca"><br>
            <input type="text" name="modelo" placeholder="Modelo"><br>
            <input type="number" name="nucleos" placeholder="Quantidade de Nucleos">
            <input type="number" name="threads" placeholder="Quantidade de Threads">
            <input type="text" name="soquete" placeholder="Soquete"><br>
            <input type="text" name="graficos" placeholder="Possui Gráficos Integrados"><br>
            <input type="text" name="tdp" placeholder="TDP"><br>
            <input type="text" name="barramento" placeholder="Tipo Barramento Suportado"><br>
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