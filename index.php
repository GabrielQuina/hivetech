<?php
    include 'carrinho.class.php';
    include 'produtos.class.php';
    include 'header.php';
    include 'produtoscarrossel.php';
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'];
    } else {
        $idcliente = 0;
    }
?>
<br>
<div class="container">
    
    <div class="d-flex justify-content-center col-12">
        <div class="d-flex flex-wrap p-4 col-11">
            <?php 
                $produto = new produto("","","","","");
                $produto->mostrarProduto(); 
            ?>
        </div>
    </div>    

</div>
<?php
    include 'footer.php';

?>