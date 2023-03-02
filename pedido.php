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
    $pedido = $_GET['pedido'];
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'];
    } else {
        $idcliente = 0;
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>

<div class="row" >
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="msg" style="width: 450px;height: 300px;">
            <div class="logo">
                <img src="img/hivetech.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                <b> Seu pedido foi gerado com sucesso! </b><br> Código do pedido: <?php echo $pedido ?>
            </div>
            <br>
            <div class="text-center fs-6">
                <a class="btn btn-secondary" href="index.php">Produtos</a>
                <a class="btn btn-secondary" href="carrinho.php">Carrinho</a>
                <a class="btn btn-secondary" href="listarpedido.php">Pedidos</a>
            </div>
        </div>
    </div>

</div>