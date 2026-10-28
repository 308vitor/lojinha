<?php
$configuracaoLocal = __DIR__ . "/conexao.local.php";

if (is_file($configuracaoLocal)) {
    require $configuracaoLocal;
    return;
}

$host = getenv("DB_HOST");
$dbname = getenv("DB_NAME");
$user = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

if ($host === false || $dbname === false || $user === false || $password === false) {
    throw new RuntimeException("Configure DB_HOST, DB_NAME, DB_USER e DB_PASSWORD no ambiente.");
}

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    throw new RuntimeException("Falha ao conectar ao banco de dados.");
}
