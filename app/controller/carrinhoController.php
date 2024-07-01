<?php 
require_once '../model/carrinho.php';

class CarrinhoController {
    private $carrinho;

    public function __construct() {
        $this->carrinho = new Carrinho();
    }

    public function changeQuantity($id) {
        $this->carrinho->changeQuantity($id);
    }

    public function addItemCart($id) {
        $this->carrinho->addItemCart($id);
    }

    public function deleteProductCart($id) {
        return $this->carrinho->deleteProductCart($id);
    }
}
?>

