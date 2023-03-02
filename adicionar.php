<?php
    include 'carrinho.class.php';
    session_start();

    $cod = $_POST['id'];

    $mysqli = new mysqli("localhost","root","","HiveTechDB");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT * FROM produto where id=$cod";
    $result = $mysqli->query($sql);
    
    while($row = $result->fetch_assoc()){
        $c = new Carrinho;
        $c->Id= $row['id'];
        $c->Produto= $row['nome'];
        $c->Preco= $row['preco'];
        $c->Quantidade=$_SESSION['carrinho'][ $row['id']]->Quantidade + 1;
        $c->Imagem= $row['imagem'];
        $_SESSION['carrinho'][$row['id']] = $c;
    }
    header("Location: carrinho.php");
?>