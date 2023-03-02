<?php
    include 'carrinho.class.php';
    
    $password = $_POST['password']; //chave de acesso
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

    $sql = "INSERT INTO administrador (id_cliente, chaveDeAcesso )
    VALUES ('$id', sha2('$password',256))";
    if (mysqli_query($conn, $sql)) {
        echo "INSERÇÃO FEITA COM SUCESSO";
        $id=$conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $id_cliente = $conn->insert_id;
    header("Location: administradores.php");
?>