function alteraQuantidade(produtoId, quantidade, acao) {
    if (acao === 'aumentar') {
        quantidade++;
    } else if (acao === 'diminuir') {
        quantidade--;
    }
    document.getElementById('quantidade-' + produtoId).value = quantidade;
    document.getElementById('form-' + produtoId).submit();
}