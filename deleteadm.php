<?php
    include 'carrinho.class.php';
    
    $id = $_POST['id']; 

    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "HiveTechDB";
    // Cria conexão
    $conn = new mysqli($servername, $username, $pwd, $dbname);
    // Checa conexão ao bd
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM administrador WHERE id_cliente = $id";
    if (mysqli_query($conn, $sql)) {
        echo "EXCLUSÃO FEITA COM SUCESSO";
        $id=$conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $id_cliente = $conn->insert_id;

    header("Location: administradores.php");
?>