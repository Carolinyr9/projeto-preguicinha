<?php
require_once '../controller/produtoController.php';
$produtoController = new ProdutoController();
function mostrarProdutos()
{
    global $produtoController;
    $consultaProdutos = $produtoController->getAllProducts();
    while ($produto = $consultaProdutos->fetch(PDO::FETCH_ASSOC)) {
        mostrarProduto($produto);
    }
}
function mostrarProduto($produto)
{
    ?>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="../imagens/<?= htmlspecialchars($produto['imagem']) ?>.webp" alt="Imagem do produto"><br>
            </div>
            <div class="card-content">
                <p><?= htmlspecialchars($produto['descricao']) ?></p>
            </div>
            <div class="card-action">
                <p class="preco"><?= htmlspecialchars($produto['preco']) ?></p>
                <a href="carrinho.php?codigo=<?= htmlspecialchars($produto['id']) ?>" class="btn">
                    Comprar
                    <i class="small material-icons">local_grocery_store</i>
                </a>
            </div>
        </div> 
    </div>
    <?php
}