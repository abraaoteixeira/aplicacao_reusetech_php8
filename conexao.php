<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "FabAbras@5";
    $banco = "dbreusetech";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);
    if(mysqli_connect_errno()){
        die("Conexão falhou: " . mysqli_connect_error());
    }
?>
