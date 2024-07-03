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
                <img src="../imagens/<?php echo($produto['imagem']) ?>" alt="Imagem do produto"><br>
            </div>
            <div class="card-content">
                <p><?= htmlspecialchars($produto['descricao']) ?></p>
            </div>
            <div class="card-action">
                <p class="preco">$<?= htmlspecialchars($produto['preco']) ?></p>
                <a href="carrinho.php?codigo=<?= htmlspecialchars($produto['id']) ?>" class="btn">
                    Comprar
                    <i class="small material-icons">local_grocery_store</i>
                </a>
            </div>
        </div> 
    </div>
    <?php
}

function listarProdutos()
{
    global $produtoController;
    $consultaProdutos = $produtoController->getAllProducts();
    while ($produto = $consultaProdutos->fetch(PDO::FETCH_ASSOC)) {
        listarProduto($produto);
    }
}

function listarProduto($produto)
{
    ?>
    <tr>
        <td><?= htmlspecialchars($produto['id']) ?></td>
        <td><?= htmlspecialchars($produto['descricao']) ?></td>
        <td><img src="../imagens/<?= htmlspecialchars($produto['imagem']) ?>" alt="Imagem"></td>
        <td>$<?= htmlspecialchars($produto['preco']) ?></td>
        <td>
            <form action="alterarProduto.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">
                <button type="submit" name="btnEdit" class="btn-floating waves-effect waves-light blue">
                    <i class="material-icons">edit</i>
                </button>
            </form>
        </td>
        <td>
            <form action="listarProdutos.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">
                <button type="submit" name="btnDelete" class="btn-floating waves-effect waves-light red">
                    <i class="material-icons">delete</i>
                </button>
            </form>
        </td>
    </tr>
    <?php
}