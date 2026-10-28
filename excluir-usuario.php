<?php require "./data/conexao.php";

require "./data/auth.php";

$id = $_GET["id"] ?? 0;

$sql = "DELETE FROM usuarios where id=$id";

$conn->query($sql);
header("Location: listar-usuarios.php");