<?php

declare(strict_types=1);

require_once("conexao.php");

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"], $_POST["senha"])) {
    $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if ($usuario && $senha) {
        $stmt = $conecta->prepare("SELECT * FROM usuario WHERE `login` = ? AND senha = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        if (!$stmt->execute()) {
            die("Falha na Consulta ao Banco");
        }
        
        $informacao = $stmt->get_result()->fetch_assoc();
        if(empty($informacao)){
            $mensagem = "Login Sem Sucesso, Tente Novamente";
        } else {
            $_SESSION["login"] = $informacao["login"];
            header("Location: index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReuseTech Login</title>
    <!-- LINKS CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <header>
        <img src="images/reusetech.png" alt="ReuseTech">
        <h1>ReuseTech</h1>
    </header>
    <main>
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <input type="text" placeholder="Login" name="login"><br>
            <input type="password" placeholder="Senha" name="senha"><br>
            <input type="submit" value="Entrar">
            <?php if(isset($mensagem)){ ?>
            <p style="background-color:  rgb(252, 70, 70);"><?php echo $mensagem; }?></p>
        </form>
    </main>
</body>
</html>
<?php
    mysqli_close($conecta);
?>
