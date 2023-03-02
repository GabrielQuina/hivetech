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

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //INICIA O SPAN LIMPO
    if(!isset($_GET['erro'])){
        $_SESSION['msglogin'] = "";
    }
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'];
    } else {
        $idcliente = 0;
    }
?>
<center>
    <?php if ($idcliente > 0) {
        header("Location: processar.php");            
    } else { ?>
        <div class="wrapper">
            <div class="logo">
                <img src="img/hivetech.png" alt="">
            </div>
            <form action="processar.php" method="post" class="p-3 mt-3">
                <input type="hidden" name="comprar" value="<?= $_GET['comprar'] ?? 0 ?>">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="username" id="userName" placeholder="Usuário">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Senha">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check" onchange="mostrarsenha()">
                        <label class="custom-control-label" for="check">Mostrar Senha</label>
                    </div>
                </div>
                <button type="submit" class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="cadastrarcliente.php">Cadastrar</a>
            </div>
        </div> 
        <?php } ?>
</center>

<script>
    function mostrarsenha() {
        
        checkbox = document.getElementById('check').checked; //VERIFICA A MARCAÇÃO NA CAIXA DE MOSTRAR SENHA
        console.log(checkbox);

        if (checkbox == true) {
            document.getElementById('pwd').type="text"; //MOSTRA A SENHA CASO A CAIXA ESTEJA MARCADA
        } else {
            document.getElementById('pwd').type="password"; // ESCONDE A SENHA SE A CAIXA ESTIVER DESMARCADA
        }
    }
</script>
