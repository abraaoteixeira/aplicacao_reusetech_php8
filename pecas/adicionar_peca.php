<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Peça - ReuseTech</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/pecas.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <style>
        /* Gradiente de fundo */
        body {
        background: linear-gradient(to bottom, #ffffff, #f0f0f0);
        }

        /* Caixa de formulário estilizada */
        form {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
        }

        label {
        font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        input[type="submit"] {
        background-color: #ff5733;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
        background-color: #e5472b;
        }

        /* Alinhar o botão de voltar */
        .sair {
        text-align: center;
        }

        .sair input[type="button"] {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        }

        .sair input[type="button"]:hover {
        background-color: #555;
        }

    </style>
</head>
<body>
    <header>
        <img src="../images/reusetech.png" alt="ReuseTech">
        <h1>ReuseTech</h1>
    </header>
    <div class="form-container">
        <form action="adicionar_peca.php" method="POST">
            <?php
                require_once("../conexao.php");

                // Verifique se a variável $table está definida e não vazia
                $table = $_POST['table'] ?? $_GET['table'] ?? null;

                if (empty($table)) {
                    die("Erro: Tabela não especificada.");
                }

                if(isset($_POST["marca"])){
                    $query = mysqli_query($conecta, "SHOW COLUMNS FROM " . mysqli_real_escape_string($conecta, $table));
                    $columns = $atributes = '';

                    while($row = mysqli_fetch_assoc($query)){
                        if($row['Field'] !== "id"){
                            $columns .= "{$row['Field']}";
                            $atributes .= "'" . mysqli_real_escape_string($conecta, $_POST[$row['Field']]) . "', ";
                        }
                    }

                    $columns = rtrim($columns, ', ');
                    $atributes = rtrim($atributes, ', ');

                    $inserir = "INSERT INTO " . mysqli_real_escape_string($conecta, $table) . "($columns) VALUES ($atributes)";
                    $insert = mysqli_query($conecta, $inserir);

                    if(!$insert){
                        die("Erro no Banco de Dados: " . mysqli_error($conecta));
                    } else {
                        header("location:../certo.html");
                        exit();
                    }
                }
            ?>

            <!-- Seu código PHP para gerar os campos -->
            <?php
                $query = mysqli_query($conecta, "SHOW COLUMNS FROM " . mysqli_real_escape_string($conecta, $table));
                echo "<input type='hidden' value='$table' name='table' >";
                while($row = mysqli_fetch_assoc($query)){
                    if($row['Field'] !== "id"){
                        $inputType = (strpos($row['Type'], "int") !== false) ? "number" : "text";
                        echo "<label>{$row['Field']} {$row['Type']}</label>";
                        echo "<input type='$inputType' placeholder='{$row['Field']}' name='{$row['Field']}' required><br>"; // Adicionei 'required' para tornar os campos obrigatórios
                    }
                }
            ?>
            <!-- Fim do código PHP -->
            
            <input type="submit" value="Adicionar">
        </form>
    </div>
    <div class="sair">
        <a href="../adicionar.php"><input type="button" value="Voltar"></a>
    </div>
</body>
</html>

<?php
    mysqli_close($conecta);
?>
