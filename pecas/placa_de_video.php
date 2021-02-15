<?php
    require_once("../conexao.php");
?>
<?php
    if(isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $barramento = $_POST["barramento"];
        $medidas = $_POST["medidas"];
        $saidas = $_POST["saidas"];
        $consuEner = $_POST["consuEner"];
        $conectsEner =  $_POST["conectsEner"];
        $funciona = $_POST["funciona"];
       
        $inserir = "INSERT INTO placadevideo(marca, modelo, barramento, medidas, saidas, consuEner, conectsEner, funciona) VALUES ('$marca', '$modelo','$barramento', '$medidas', '$saidas', '$consuEner', '$conectsEner', '$funciona') ";

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
        <title>Placa de Vídeo - ReuseTech</title>
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
        <form action="placa_de_video.php" method="POST">
            <h1>Adicionando Placa de Vídeo</h1>
            <input type="text" placeholder="Marca" name="marca"><br>
            <input type="text" name="modelo" placeholder="Modelo"><br>
            <input type="text" name="medidas" placeholder="Medidas"><br>
            <input type="text" name="saidas" placeholder="saidas"><br>
            <input type="text" name="barramento" placeholder="Tipo Barramento"><br>
            <input type="number" name="consuEner" placeholder="Consumo de energia"><br>
            <input type="number" name="conectsEner" placeholder="Tipo Conectores Energia"><br>
            <input type="number" name="funciona" placeholder="Funciona / Não Funciona">
            <input type="submit" value="Adicionar">
        </form>
        <div class="sair">
            <a href="/../adicionar.php"><input type="button" value="Voltar"></a>
        </div>
    </body>
</html>
<?php
    mysqli_close($conecta);
?>