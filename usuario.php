<?php     
    include 'carrinho.class.php';
    include 'header.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HiveTechDB";

    
    if (isset($_SESSION['carrinho'])){
        $produtos = $_SESSION['carrinho'];
    }
    $usuario = $_GET['cliente'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="msg" style="width: 450px;height: 300px;">
            <div class="logo">
                <img src="img/hivetech.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                <b> Seu usuário foi criado com sucesso! </b><br> Código de usuário: <?php echo $usuario ?>
            </div>
            <br>
            <div class="text-center fs-6">
                <a class="btn btn-secondary" href="login.php">Login</a>
            </div>
        </div>
    </div>

</div>