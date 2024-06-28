<?php
if((!isset($_SESSION['funcLogged']) && !isset($_SESSION['clientLogged'])) || 
    ((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] == FALSE) && (isset($_SESSION['clientLogged']) && $_SESSION['clientLogged'] == FALSE))){
    echo '
        <nav>
            <div class="nav-wrapper">
            <a href="#" class="brand-logo">  ☁️ Preguicinha</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
                <li><a href="loginCli.php">Clientes</a></li>
                <li><a href="loginFunc.php">Funcionários</a></li>
            </ul>
            </div>
        </nav>';
}else{
    if(isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] == TRUE){
        echo '
            <nav>
                <div class="nav-wrapper">
                <a href="#" class="brand-logo">  ☁️ Preguicinha</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="listarFunc.php">Funcionários</a></li>
                    <li><a href="listarCli.php">Produtos</a></li>
                    <li><a href="listarCli.php">Cliente</a></li>
                    <li><a href="../controller/logoff.php">Sair</a></li>
                </ul>
                </div>
            </nav>';
    }else{
        if(isset($_SESSION['clientLogged']) && $_SESSION['clientLogged'] == TRUE){
            echo '
                <nav>
                    <div class="nav-wrapper">
                    <a href="#" class="brand-logo">  ☁️ Preguicinha</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                        <li><a href="carrinho.php">Carrinho</a></li>
                    </ul>
                    </div>
                </nav>
            ';
        }
    }
}

?>

