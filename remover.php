<?php 
    include 'carrinho.class.php';
    session_start();
    $chave = $_POST['cod'];
    unset($_SESSION['carrinho'][$chave]);

    if (sizeof($_SESSION['carrinho']) == 0){
        unset($_SESSION['carrinho']);
    }

    header("Location: carrinho.php");
?>