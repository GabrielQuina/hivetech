<?php
    include 'carrinho.class.php';
    session_start();
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
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

    $sql = "SELECT * FROM cliente where id = $idcliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $senha = $row['senha'];
        }
    }
    $pass = hash('sha256', $password);
    if ($pass == $senha) {
        if ($id == $idcliente) {
            if ($newpassword == "") {
                $newpassword = $password;
            }
            $sql = "UPDATE cliente SET nome='$nome', email='$email', cpf='$cpf', data_de_nascimento='$data', senha=sha2('$newpassword',256) WHERE id=$idcliente";
            if (mysqli_query($conn, $sql)) {
                echo "ALTERAÇÃO FEITA COM SUCESSO";
                header("Location: perfil.php?msg=2");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            header("Location: perfil.php?msg=1");
        }
    } else {
        header("Location: perfil.php?msg=3");
    }
        
?>