<?php
session_start();

if (isset($_SESSION["usuario_id"])) {
    if ((int) $_SESSION["usuario_id"] === 9 && ($_SESSION["usuario_email"] ?? "") === "vitor@gmail.com") {
        header("Location: /listar-usuarios.php");
    } else {
        header("Location: /produtos.php");
    }
    exit();
}

header("Location: /login.php");
exit();
?>