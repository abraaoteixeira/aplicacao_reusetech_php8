<?php
    require_once("../conexao.php");

    if (isset($_POST['table'])){
        $table = $_POST['table'];
    }
    if (isset($_GET['table'])){
        $table = $_GET['table'];
    }

    if(isset($_POST["marca"])){
        $query = mysqli_query($conecta, "SHOW COLUMNS FROM $table");
        $columns = $atributes = '';

        while($row = mysqli_fetch_assoc($query)){
            if($row['Field'] != "id"){
                $columns .= "{$row['Field']}";
                $atributes .= "'{$_POST[$row['Field']]}', ";
            }
        }

        $columns = rtrim($columns, ', ');
        $atributes = rtrim($atributes, ', ');

        $inserir = "INSERT INTO $table($columns) VALUES ($atributes)";
        $insert = mysqli_query($conecta, $inserir);

        if(!$insert){
            die("Erro no Banco de Dados");
        } else {
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
        <form action="adicionar_peca.php" method="POST">
            <?php
                $query = mysqli_query($conecta, "SHOW COLUMNS FROM $table");

                echo "<input type='hidden' value='$table' name='table' >";
                while($row = mysqli_fetch_assoc($query)){
                    if($row['Field'] != "id"){
                        $inputType = (strpos($row['Type'], "int") !== false) ? "number" : "text";
                        echo "<label>{$row['Field']} {$row['Type']}</label>";
                        echo "<input type='$inputType' placeholder='{$row['Field']}' name='{$row['Field']}'><br>";
                    }
                }
                echo '<input type="submit" value="Adicionar">';
            ?>
        </form>
        <div class="sair">
            <a href="../adicionar.php"><input type="button" value="Voltar"></a>
        </div>
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
