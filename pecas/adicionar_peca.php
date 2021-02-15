<?php
    require_once("../conexao.php");
    if (isset($_POST['table'])){
        $table = $_POST['table'];
    }
    if (isset($_GET['table'])){
        $table = $_GET['table'];
    }
?>
<?php
    if(isset($_POST["marca"])){
        $query = mysqli_query($conecta, "SHOW COLUMNS FROM $table");

        while($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
        foreach($result as $coluna){
            if($coluna[Field] != "id"){
                $columns .= "$coluna[Field]";
                if ($coluna[Field] != end($result)[Field]){
                    $columns .= ", ";
                }
            }
        }

        foreach($result as $coluna){
            if($coluna[Field] != "id"){
                $consulta = $coluna["Field"];
                $atributes .= "'";
                $atributes .= "$_POST[$consulta]";
                $atributes .= "'";
                if ($coluna[Field] != end($result)[Field]){
                    $atributes .= ", ";
                }
            }
        }
        
        $inserir = "INSERT INTO $table($columns)VALUES ($atributes)";

        
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
        <form action="adicionar_peca.php" method="POST">
            
            <?php
                $query = mysqli_query($conecta, "SHOW COLUMNS FROM $table");

                while($row = mysqli_fetch_assoc($query)){
                    $result[] = $row;
                }
                echo "<input type='hidden' value='$table' name='table' >";
                foreach($result as $coluna){
                    if($coluna[Field] != "id"){
                        if (strpos($coluna[Type], "int") or $coluna[Type] == "int" or $coluna[Type] == "float" or $coluna[Type] == "decimal" or $coluna[Type] == "real"){
                            $inputType = "number";
                        }
                        else if(strpos($coluna[Type], "char") or $coluna[Type] == "char" or $coluna[Type] == "binary" or $coluna[Type] == "text" or $coluna[Type] == "blob" or $coluna[Type] == "enum" or $coluna[Type] == "set"){
                            $inputType = "text";
                        }
                        else if(strpos($coluna[Type], "time") or $coluna[Type] == "date"){
                            $inputType = "date";
                        }
                        echo "<label>$coluna[Field] $coluna[Type]</label>";
                        echo "<input type='$inputType' placeholder='$coluna[Field]' name='$coluna[Field]'><br>";
                    }
                }
                echo '<input type="submit" value="Adicionar">';
                
                
                /*
                Array ( 
                [0] => Array ( [Field] => id [Type] => int [Null] => NO [Key] => PRI [Default] => [Extra] => auto_increment ) 
                [1] => Array ( [Field] => marca [Type] => varchar(100) [Null] => YES [Key] => [Default] => [Extra] => ) 
                [2] => Array ( [Field] => modelo [Type] => varchar(150) [Null] => NO [Key] => [Default] => [Extra] => ) 
                [3] => Array ( [Field] => soquete [Type] => varchar(100) [Null] => NO [Key] => [Default] => [Extra] => ) 
                [4] => Array ( [Field] => chipset [Type] => varchar(100) [Null] => YES [Key] => [Default] => [Extra] => ) 
                [5] => Array ( [Field] => tipoBarraRam [Type] => varchar(100) [Null] => NO [Key] => [Default] => [Extra] => ) 
                [6] => Array ( [Field] => quantBarraRam [Type] => int [Null] => YES [Key] => [Default] => [Extra] => ) 
                [7] => Array ( [Field] => tipoPCI [Type] => varchar(100) [Null] => YES [Key] => [Default] => [Extra] => ) 
                [8] => Array ( [Field] => quantidadePCI [Type] => int [Null] => YES [Key] => [Default] => [Extra] => ) 
                [9] => Array ( [Field] => tipoBarraArmaz [Type] => varchar(100) [Null] => YES [Key] => [Default] => [Extra] => ) 
                [10] => Array ( [Field] => quantBarraArmaz [Type] => int [Null] => YES [Key] => [Default] => [Extra] => ) 
                [11] => Array ( [Field] => funciona [Type] => tinyint(1) [Null] => YES [Key] => [Default] => [Extra] => ) 
                )
                */
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