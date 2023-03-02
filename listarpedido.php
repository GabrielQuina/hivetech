<?php
    include 'header.php';
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HiveTechDB";
    if (isset($_SESSION['cliente'])){
        $idcliente = intval($_SESSION['cliente']);
    } else {
        $idcliente = 0;
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pedidos , cliente where pedidos.id_cliente = cliente.id AND cliente.id = $idcliente";
    $result = $conn->query($sql);
    $conn->close();

?>
<div class="container" >
    <div class="row">   
        <div class="col-lg-12 m-t-2">
            <br>
            <center><h1 >Pedidos</h1></center>
            <br>
            <table class='table table-light table-striped'>
                <tr>
                    <td><center><b>Pedido</b></center></td>
                    <td><center><b>Hora do pedido</b></center></td>
                    <td></td>
                </tr>

                <?php  if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) { ?>                    
                        <tr>
                            <td><center><?php echo $row['id_pedido']?></center></td>
                            <td><center><?php echo $row['date_time_pedido']?></center></td>
                            <td><center><a class="btn btn-dark" href="listaritensped.php?id_pedido=<?php echo $row['id_pedido']?>&cliente=<?php echo $idcliente ?>">Ver itens</a></center></td>
                        </tr>

                    <?php } ?>
                <?php } ?>

            </table>
            <a href="index.php?cliente=<?php echo $idcliente ?>" class="btn btn-dark">Produtos</a>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
?>