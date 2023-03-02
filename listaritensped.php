<?php
    include 'header.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HiveTechDB";
    
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'] ;
    } else {
        $idcliente = 0;
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $id_pedido = $_GET['id_pedido'];

    $sql = "SELECT * FROM itenspedidos where id_pedido ='$id_pedido'";
    $result = $conn->query($sql);

?>
<div class="container" >
    <div class="row">   
        <div class="col-lg-12 m-t-2">
        <br>
        <center><h1 >Itens do pedido</h1></center>
        <br>
        <table class='table table-light table-striped'>
            <tr>
                
                <td><center><b>Produto</b></center></td>
                <td><center><b>Quantidade</b></center></td>
                <td><center><b>Valor</b></center></td>
                <td><center><b>Sub Total</b></center></td>
            </tr>

            <?php
            $valortotal = 0;
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) { ?>                    
                    <tr>
                        
                        <td><center><?php echo $row['produto']?></center></td>
                        <td><center><?php echo $row['quantidade']?></center></td>
                        
                        <td>
                            <?php $id = $row['id_produto'];
                                $sqla = "SELECT preco FROM produto where id = $id";
                                $resulta = $conn->query($sqla);

                                if ($resulta->num_rows > 0) { 
                                    $rowa = $resulta->fetch_assoc();                  
                                    $valortotal += $row['quantidade'] * $rowa['preco'];
                                    echo "<center>"."R$".floatval($rowa['preco'])."<center>";
                                }  
                                ?>
                        </td>
                        <td><?php echo "<center>"."R$". ($row['quantidade'] * floatval($rowa['preco'])) ."<center>";?></td>
        <?php                                               
                }
            }
        ?>                        
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            <tr>                
                <td></td>
                <td></td>
                <td><center><b>Valor Total</b></center></td>
                <td><center><?php echo "R$".$valortotal ?></center></td>
            </tr>
        </table>
        <a href="index.php?cliente=<?php echo $idcliente ?>" class="btn btn-dark">Produtos</a>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
?>