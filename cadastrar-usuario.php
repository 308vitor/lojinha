<?php require "./data/conexao.php";

require "./data/auth.php";

$mensagem_erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    if ($nome == '' || $email == '' || $senha == '') {
        $mensagem_erro = 'Preencha todos os campos';
    } else {
        $sql = "INSERT INTO usuarios(nome, email, senha) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);
        try {
            $stmt->execute();
            header("Location: ./listar-usuarios.php");
            exit;
        } catch (mysqli_sql_exception $e) {
            $mensagem_erro = $e->getMessage() === 1062 ? 'Email já cadastrado' : 'Erro ao cadastrar usuário';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/cadastrar.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php" ?>
    <section>
        <h1>Criar Conta</h1>
        <form method="POST">
            <label for="nome">nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">email</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">senha</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Cadastrar</button>
        </form>
        <?php if ($mensagem_erro): ?>
            <p><?= $mensagem_erro; ?></p>
        <?php endif; ?>
    </section>
    <?php include "./view/footer.php" ?>
</body>

</html>