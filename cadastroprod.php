<?php 
    include 'produtos.class.php';
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];
    $quant = $_POST['quant'];

    echo $foto;
    $p1 = new Produto("$nome", "$preco", $quant,"$foto", true);
    header("Location:produtos.php");
?>
