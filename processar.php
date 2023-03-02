<?php
    $servername = "localhost";
    $user = "root"; $pwd = ""; $dbname = "HiveTechDB";
    $conn = new mysqli($servername, $user, $pwd, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    date_default_timezone_set ("America/Sao_Paulo");

    include 'carrinho.class.php';
    include 'header.php';
    
    if (isset($_POST['username'])){$username=$_POST['username'];} else {$username="";}
    if (isset($_POST['password'])){$password=$_POST['password'];} else {$password="";}
    
    if (isset($_SESSION['carrinho'])){
        $produtos = $_SESSION['carrinho'];
    }
    
    $logado = false;
    if (isset($_SESSION['cliente'])){
        $idcliente = intval($_SESSION['cliente']);
        $sql = "SELECT * FROM cliente WHERE id='$idcliente'";
        $logado = true;
    } else {
        $sql = "SELECT * FROM cliente WHERE nome='$username' AND senha=sha2('$password',256)";
        $idcliente = 0;
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pass = $row['senha']; 
        $nome = $row['nome']; 
        $idcliente = $row['id'];
        
        $_SESSION['cliente'] = $row['id'];
        $_SESSION['ncliente'] = $row['nome'];

        //adm
        $sql = "SELECT * FROM administrador WHERE id_cliente = $idcliente";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $_SESSION['adm'] = true;
        }else{
            $_SESSION['adm'] = false;
        }        
        if (isset($_SESSION['carrinho']) && ($_POST['comprar'] == 1 || $logado)) {
            $sql = "INSERT INTO pedidos (id_cliente, date_time_pedido)
            VALUES ('$idcliente','". date('Y-m-d H:i:s'). "')";
            $result = $conn->query($sql);
            
            $id_pedido = $conn->insert_id;

            foreach ($_SESSION['carrinho'] as $key => $p) {
                $id = $key;
                $produto = $p->Produto;
                $quant = floatval($p->Quantidade);
                $sub = floatval($p->Preco) * $quant;
                $sqlitens = "INSERT INTO itenspedidos (id_pedido, produto, quantidade, id_produto, sub_total)
                VALUES ('$id_pedido','$produto','$quant', $id, $sub)";
                $conn->query($sqlitens);

                $sql = "UPDATE produto set quantidade = (SELECT quantidade FROM (SELECT * FROM produto) as p WHERE id = $id) - $quant where id = $id";
                $conn->query($sql);

                unset($_SESSION['carrinho']);
            }

            header("Location: pedido.php?pedido=$id_pedido");
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: login.php");
    }

    $conn->close();