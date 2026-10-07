<?php include "./data/produtos.php";
$id = $_GET['id'] ?? 0;

$produtoSelecionado = null;

for ($i = 0; $i < count($produtos); $i++) {
    if ($produtos[$i]->id == $id) {
        $produtoSelecionado = $produtos[$i];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Lojinha |
        <?= $produtoSelecionado ? $produtoSelecionado->nome : "produto não encontrado" ?>
    </title>
    <link rel="stylesheet" href="./css/produto.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php" ?>
    <section>
        <img class="img" src="<?= htmlspecialchars($produtoSelecionado ? $produtoSelecionado->imagem : '') ?>"
            alt="<?= htmlspecialchars($produtoSelecionado ? $produtoSelecionado->nome : 'Produto não encontrado') ?>" decoding="async">
        <div class="container">
            <div class="hero">
                <p class="categoria"><?= $produtoSelecionado ? $produtoSelecionado->categoria : "Produto não encontrado" ?></p>
                <h1><?= $produtoSelecionado ? $produtoSelecionado->nome : "produto não encontrado" ?></h1>
                <p class="preco"><?= $produtoSelecionado ? "R$ " . number_format($produtoSelecionado->preco, 2, ',', '.') : "" ?></p>
                <p class="estoque"><?= $produtoSelecionado ? $produtoSelecionado->estoque . " unidades disponíveis" : "" ?></p>
            </div>
            <div class="part2">
                <p class="descricao"><?= $produtoSelecionado ? $produtoSelecionado->descricao : "Confira o endereço e tente novamente." ?></p>
                <div class="etiquetas">
                    <p><?= $produtoSelecionado ? $produtoSelecionado->categoria : "" ?></p>
                    <p>Marca: <?= $produtoSelecionado ? $produtoSelecionado->marca : "não informada" ?></p>
                </div>
            </div>
            <a class="voltar" href="./index.php">← Voltar para a loja</a>
        </div>
    </section>
    <?php include "./view/footer.php" ?>
</body>

</html>
