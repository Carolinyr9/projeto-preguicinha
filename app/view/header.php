<?php
if((!isset($_SESSION['funcLogged']) && !isset($_SESSION['clientLogged'])) || 
    ((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] == FALSE) && (isset($_SESSION['clientLogged']) && $_SESSION['clientLogged'] == FALSE))){
    echo '
        <nav>
            <div class="nav-wrapper">
            <a href="#" class="brand-logo">  🦥 Preguicinha</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php"><i class="material-icons">home</i></a></li>
                <li><a href="carrinho.php"><i class="material-icons">shopping_cart</i></a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="loginCli.php">Clientes</a></li>
                <li><a href="loginFunc.php">Funcionário</a></li>
            </ul>
            </div>
        </nav>';
}else{
    if(isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] == TRUE){
        echo '
            <nav>
                <div class="nav-wrapper">
                <a href="#" class="brand-logo">  🦥 Preguicinha</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php"><i class="material-icons">home</i></a></li>
                     <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="listarCli.php">Cliente</a></li>
                    <li><a href="listarFunc.php">Funcionário</a></li>
                    <li><a href="../controller/logoff.php">Sair</a></li>
                </ul>
                </div>
            </nav>';
    }else{
        if(isset($_SESSION['clientLogged']) && $_SESSION['clientLogged'] == TRUE){
            echo '
                <nav>
                    <div class="nav-wrapper">
                    <a href="#" class="brand-logo">  🦥 Preguicinha</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="index.php"><i class="material-icons">home</i></a></li>
                        <li><a href="carrinho.php"><i class="material-icons">shopping_cart</i></a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                        <li><a href="../controller/logoff.php">Sair</a></li>
                    </ul>
                    </div>
                </nav>
            ';
        }
    }
}
?>

