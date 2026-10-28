<?php require "./data/conexao.php" ;

require "./data/auth.php";

    $sql ="SELECT id, nome, email FROM usuarios";
    $resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/listar-usuarios.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php include "./view/header.php" ?>
    <main class="usuarios">
        <div class="usuarios-cabecalho">
            <div>
                <p class="usuarios-legenda">ADMINISTRAÇÃO</p>
                <h1>Usuários cadastrados</h1>
            </div>
            <p class="usuarios-total"><?= $resultado->num_rows ?> <?= $resultado->num_rows === 1 ? "usuário" : "usuários" ?></p>
        </div>

        <?php if ($resultado->num_rows > 0): ?>
            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($usuario = $resultado->fetch_object()): ?>
                            <tr>
                                <td data-label="ID"><span class="usuario-id">#<?= htmlspecialchars($usuario->id) ?></span></td>
                                <td data-label="Nome"><?= htmlspecialchars($usuario->nome) ?></td>
                                <td data-label="E-mail"><?= htmlspecialchars($usuario->email) ?></td>
                                <td data-label="Ação"><a class="botao-editar" href="editar-usuario.php?id=<?= $usuario->id ?>" aria-label="Editar usuário <?= htmlspecialchars($usuario->nome) ?>">Editar</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="usuarios-vazio">Nenhum usuário cadastrado.</p>
        <?php endif; ?>
    </main>
    <?php include "./view/footer.php" ?>
</body>
</html>