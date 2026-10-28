<?php
session_start();

$usuarioAutorizado = isset($_SESSION["usuario_id"], $_SESSION["usuario_email"])
    && (int) $_SESSION["usuario_id"] === 9
    && $_SESSION["usuario_email"] === "vitor@gmail.com";

if (!$usuarioAutorizado) {
    header("Location: /login.php");
    exit();
}
?>