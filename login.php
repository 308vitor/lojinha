<?php
session_start();
require "./data/conexao.php";
$mensagem_erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = Trim($_POST["email"]);
    $senha = Trim($_POST["password"]);

    $sql = "SELECT id, nome, email FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_object();
    if ($usuario) {
        session_regenerate_id(true);
        $_SESSION["usuario_id"] = (int) $usuario->id;
        $_SESSION["usuario_nome"] = $usuario->nome;
        $_SESSION["usuario_email"] = $usuario->email;
        header("Location: /produtos.php");
        exit();
    } else {
        unset($_SESSION["usuario_id"], $_SESSION["usuario_nome"], $_SESSION["usuario_email"]);
        $mensagem_erro = "Credenciais inválidas";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <header class="cabecalho-login">
        <a class="marca" href="./produtos.php" aria-label="Voltar à loja">KaBuM!</a>
        <a class="voltar-loja" href="./produtos.php">Voltar à loja</a>
    </header>

    <main class="pagina-login">
        <section class="cartao-login" aria-labelledby="titulo-login">
            <div class="login-introducao">
                <span class="login-etiqueta">ÁREA DO CLIENTE</span>
                <h1 id="titulo-login">Acesse sua conta</h1>
                <p>Entre para continuar suas compras.</p>
            </div>

            <form class="formulario-login" method="POST">
                <div class="campo-login">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="campo-login">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                </div>
                <button type="submit">Entrar</button>
            </form>

            <?php if ($mensagem_erro): ?>
                <div class="login-alerta">
                    <p style="color: red;"><?= $mensagem_erro; ?></p>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>