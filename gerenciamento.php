<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HiveTechDB";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $chave = $_POST['chave'];
    $sql = "SELECT * FROM administrador WHERE chaveDeAcesso=sha2('$chave',256)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        header("Location:gerenciar.php");
    } else {
        header("Location:index.php");
    }
?>
