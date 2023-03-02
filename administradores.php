<?php
    include 'header.php';
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HiveTechDB";

    if (isset($_POST['p'])){
        $p = $_POST['p'];
        $sql = "SELECT * FROM cliente, administrador where administrador.id_cliente = cliente.id and cliente.cpf like'%$p%' ";
    } else {
        $sql = "SELECT *,administrador.id as id_administrador FROM cliente, administrador where cliente.id = administrador.id";
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    $conn->close();

?>
<div class="container" >
    <div class="row">   
        <div class="col-lg-12 m-t-2">
            <br>
            <center><h1 >Administradores</h1></center>
            <br>
            <center>
                <a href="cadastraradm.php" class="btn btn-dark">Cadastro</a>
            </center>
            <br>
            <table class='table table-light table-striped'>
                <tr>
                    <td><center><b>Código</b></center></td>
                    <td><center><b>Nome</b></center></td>
                    <td><center><b>Email</b></center></td>
                    <td><center><b>CPF</b></center></td>
                    <td style="width: 19%;"><center><b>
                        <form action="administradores.php" style="display: flex" method="post">
                            <input type="text" id="p" placeholder="Busque pelo CPF" name="p" class="cpf" style="width: 100%" class="mw-25 p-3 form-control" aria-describedby="passwordHelpInline">
                            <button type="submit" class="ms-1 btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                            </button>
                            <button type="submit" class="ms-1 btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg>
                            </button>
                        </form>                        
                    </b></center></td>
                </tr>

                <?php  if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) { ?>                    
                        <tr>
                            <td><center><?php echo $row['id']?></center></td>
                            <td><center><?php echo $row['nome']?></center></td>
                            <td><center><?php echo $row['email']?></center></td>
                            <td><center><?php echo $row['cpf']?></center></td>    
                            <td>
                                <form action="deleteadm.php" style="display: flex" method="post">                                    
                                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                    <button type="submit" class="ms-1 btn btn-danger">Retirar</button>
                                </form>
                            </td>                    
                        </tr>

                    <?php } ?>
                <?php } ?>
            </table>    
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.cpf').mask('999.999.999-99', {reverse: true});
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<?php
    include 'footer.php';
?>