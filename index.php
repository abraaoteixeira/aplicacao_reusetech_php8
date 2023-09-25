<?php
declare(strict_types=1);

session_start();

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo ReuseTech</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">

    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-database.js"></script>

    <style>
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
            margin: 0; /* Remove a margem padrão do corpo */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Garante que o corpo ocupa toda a altura da tela */
        }

        header {
            background-color: #000000;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            flex-shrink: 0; /* Não permite que o cabeçalho encolha */
        }

        header h1 {
            color: #00ff00;
        }

        main {
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
            flex-grow: 1; /* Permite que o conteúdo principal cresça e ocupe o espaço disponível */
        }

        .conteudo {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .rodape {
            background-color: #000000;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            text-align: center;
            color: #00ff00;
            margin-top: auto; /* Mantém o rodapé na parte inferior */
        }

        /* Botões */
        #funcoes a {
            background-color: transparent; /* Sem cor de fundo */
            color: #000; /* Texto preto */
            padding: 8px 16px; /* Reduzi o padding para torná-los um pouco menores */
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 10px 5px; /* Adaptei a margem para manter a distância entre os botões */
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        #funcoes a:hover {
            background-color: bl;
        }

    </style>
</head>
<body>
    <header>
        <img src="images/reusetech.png" alt="ReuseTech">
        <h1>ReuseTech</h1>
    </header>
    <main>
        <div class="conteudo">
            <!-- Conteúdo principal aqui -->
            <div id="funcoes">
                <a href="visualizar.php">
                    <h1>Visualizar Estoque</h1>
                    <p>Clique aqui para visualizar o nosso estoque de peças</p>
                </a>
                <a href="adicionar.php">
                    <h1>Adicionar Peça ao Estoque</h1>
                    <p>Clique aqui para adicionar peças ao nosso estoque</p>
                </a>
            </div>
        </div>
    </main>
    <div class="rodape">
        &copy; 2023 ReuseTech. Todos os direitos reservados.
    </div>
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAW8Nu8CnS0rQyjH1r42r2wQYKW4Qr4eE4",
    authDomain: "reusetech-oficial.firebaseapp.com",
    projectId: "reusetech-oficial",
    storageBucket: "reusetech-oficial.appspot.com",
    messagingSenderId: "227940630480",
    appId: "1:227940630480:web:8b34435375efbccfea03d5",
    measurementId: "G-D1VGWLW5S4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</body>
</html>
