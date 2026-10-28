<?php
session_start();
include "./data/produtos.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaBuM! | Tecnologia para o dia a dia</title>
    <link rel="stylesheet" href="./css/tema.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php" ?>
    <section class="destaque" id="inicio">
        <div class="destaque-texto">
            <p class="chamada">TECNOLOGIA PARA SUA ROTINA</p>
            <h2>Seu próximo favorito<br>está aqui.</h2>
            <p class="texto-destaque">Eletrônicos para trabalhar, jogar e aproveitar cada momento.</p>
            <a href="#produtos">Explorar produtos <span aria-hidden="true">↓</span></a>
            <p class="destaque-contagem"><span></span><?= count($produtos) ?> produtos na loja</p>
        </div>
        <figure class="destaque-visual">
            <span class="destaque-selo">ESCOLHA DA VITRINE</span>
            <img src="<?= htmlspecialchars($produtos[0]->imagem) ?>" alt="<?= htmlspecialchars($produtos[0]->nome) ?>">
            <figcaption>
                <span>DESTAQUE</span>
                <strong><?= htmlspecialchars($produtos[0]->nome) ?></strong>
            </figcaption>
        </figure>
    </section>
    <main class="produtos" id="produtos" aria-label="Produtos disponíveis">
        <?php foreach ($produtos as $produto): ?>
            <article class="produto">
                <img src="<?= htmlspecialchars($produto->imagem) ?>" alt="<?= htmlspecialchars($produto->nome) ?>" loading="lazy" decoding="async">
                <p class="categoria"><?= htmlspecialchars($produto->categoria) ?></p>
                <h2><?= htmlspecialchars($produto->nome) ?></h2>
                <p><?= htmlspecialchars($produto->descricao) ?></p>
                <p class="preco">R$ <?= number_format($produto->preco, 2, ',', '.') ?></p>
                <a href="./produto.php?id=<?= $produto->id ?>" aria-label="Ver detalhes de <?= htmlspecialchars($produto->nome) ?>">Ver produto</a>
            </article>
        <?php endforeach; ?>
    </main>
    <?php include "./view/footer.php" ?>
</body>

</html>
