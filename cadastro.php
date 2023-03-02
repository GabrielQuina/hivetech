<?php
    include 'carrinho.class.php';
    
    $password = $_POST['password'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $cpf = $_POST['cpf'];
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'];
    } else {
        $idcliente = 0;
    }

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

    $sql = "INSERT INTO cliente (nome, email, cpf ,data_de_nascimento, senha )
    VALUES ('$nome', '$email', '$cpf','$data', sha2('$password',256))";
    if (mysqli_query($conn, $sql)) {
        echo "INSERÇÃO FEITA COM SUCESSO";
        $id=$conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $id_cliente = $conn->insert_id;
    header("Location: usuario.php?cliente=$id");
?>