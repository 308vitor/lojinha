<?php
$usuarioAutenticado = isset($_SESSION["usuario_id"]);
$usuarioAdministrador = $usuarioAutenticado
    && (int) $_SESSION["usuario_id"] === 9
    && ($_SESSION["usuario_email"] ?? "") === "vitor@gmail.com";
?>
<header>
    <a class="marca-loja" href="./produtos.php#inicio" aria-label="KaBuM! - início da loja">
        <h1>KaBuM!</h1>
    </a>
    <nav>
        <a href="./produtos.php#inicio">Início</a>
        <a href="./produtos.php#produtos">Produtos</a>
        <?php if ($usuarioAdministrador): ?>
            <a href="./listar-usuarios.php">Usuários</a>
            <a href="./cadastrar-usuario.php">Cadastrar</a>
        <?php endif; ?>
        <?php if ($usuarioAutenticado): ?>
            <a class="nav-conta" href="./logout.php">Sair</a>
        <?php else: ?>
            <a class="nav-conta" href="./login.php">Entrar</a>
        <?php endif; ?>
    </nav>
</header>
