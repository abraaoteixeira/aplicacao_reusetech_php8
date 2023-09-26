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
<html>
<head>
  <meta charset="utf-8">
  <title>ReuseTech: Entrar Aplicação</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
            <img src="images/reusetech.png" alt="" style="width: 50px; margin: 0 7;">
            <h1><a>ReuseTech</a></h1>
        </div>
      <div class="formbg-outer">
        <div class="formbg">
          <div class="formbg-inner padding-horizontal--48">
            <span class="padding-bottom--15">Entrar</span>
            <form id="stripe-login" method="POST">
              <div class="field padding-bottom--24">
                <label for="login">Login</label>
                <input type="text" name="login">
              </div>
              <div class="field padding-bottom--24">
                <label for="senha">Senha</label>
                <input type="password" name="senha">
              </div>
              <div class="field padding-bottom--24">
                <input type="submit" name="submit" value="Entrar">
              </div>
            </form>
          </div>
        </div>
        <div class="footer-link padding-top--24">
          <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
            <span><a href="#">© ReuseTech</a></span>
            <span><a href="#">Contato</a></span>
            <span><a href="#">Privacidade & termos</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
