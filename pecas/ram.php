<?php
    require_once("../conexao.php");
?>
<?php
    if(isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $tamanho =  $_POST["tamanho"];
        $frequencia = $_POST["frequencia"];
        $estado = $_POST["estado"];
       
        $inserir = "INSERT INTO processador (marca, modelo, tamanho, frequencia, estado) VALUES ('$marca', '$modelo',  '$tamanho','$frequencia', '$estado') ";

        $insert = mysqli_query($conecta, $inserir);
        if(!$insert){
            die("Erro no Banco de Dados");
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Memória RAM - ReuseTech</title>
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
        <form action="ram.php" method="POST">
            <h1>Adicionando Memória RAM</h1>
            <input type="text" placeholder="Marca" name="marca"><br>
            <input type="text" name="modelo" placeholder="Modelo"><br>
            <input type="text" name="tecnologia" placeholder="Tecnologia"><br>
            <input type="text" name="tamanho" placeholder="Tamanho"><br>
            <input type="text" name="frequencia" placeholder="Frequencia"><br>
            <input type="text" name="estado" placeholder="Funciona / Não Funciona">
            <input type="submit" value="Adicionar">
        </form>
        <div class="sair">
            <a href="../adicionar.html"><input type="button" value="Voltar"></a>
        </div>
    </body>
</html>
<?php
    mysqli_close($conecta);
?>