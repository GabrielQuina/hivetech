<?php
    $servername = "localhost";
    $user = "root"; $pwd = ""; $dbname = "HiveTechDB";
    $conn = new mysqli($servername, $user, $pwd, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    include 'carrinho.class.php';
    include 'header.php';

    $id = $_GET['cod'];
    $op = $_GET['op'];

    $sqlp = "SELECT quantidade FROM produto WHERE id = $id";
    $result = $conn->query($sqlp);
    $quantidade = $result->fetch_assoc()['quantidade'];

    if ($op == 1) {
        $sql = "UPDATE produto set quantidade = $quantidade + 1 where id = $id";
        $conn->query($sql);
    }
    if ($op == 2) {
        if ($quantidade >= 1){
            $sql = "UPDATE produto set quantidade = $quantidade - 1 where id = $id";
            $conn->query($sql);
        }
    }   
    $conn->close();
    header("Location: produtos.php");
?>