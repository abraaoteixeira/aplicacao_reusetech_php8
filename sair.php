<?php

declare(strict_types=1);

session_start();

if (isset($_SESSION["login"])) {
    unset($_SESSION["login"]);
}

header("location:login.php");
exit();

?>