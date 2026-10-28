<?php
require "./data/conexao.php";

require "./data/auth.php";

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($nome == "" || $senha == "" || $email == "") {
        $mensagem_erro = "preencha todos os campos";
    } else {
        $sql = "UPDATE usuarios SET nome='$nome', senha='$senha', email='$email' WHERE id=$id";
        $conn->query($sql);
        header("Location: listar-usuarios.php");
    }
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$resultado = $conn->query($sql);
$usuario = $resultado->fetch_object();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/editar-usuario.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php" ?>

    <main class="editar-pagina">
        <div class="editar-cabecalho">
            <p>ÁREA DO CLIENTE</p>
            <h1>Editar usuário</h1>
            <span>Atualize os dados da sua conta.</span>
            <a class="editar-voltar" href="./listar-usuarios.php">← Voltar aos usuários</a>
        </div>

        <form method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= $usuario->nome; ?>" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?= $usuario->email; ?>" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" value="<?= $usuario->senha; ?>" required>

            <div class="editar-acoes">
                <button class="botao-salvar" type="submit">Salvar alterações</button>
                <a href="excluir-usuario.php?id=<?= $usuario->id ?>" class="botao-excluir">Excluir</a>
            </div>
        </form>
    </main>

    <?php include "./view/footer.php" ?>
</body>

</html>