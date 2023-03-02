<?php
class Produto{
    var $nome;
    var $preco;
    var $qtd;
    var $img;

    function __construct($nome, $preco, $qtd, $img, $insertDB = false){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->qtd = $qtd;
        $this->img = $img;

        if($insertDB){
            $this->insertDB();
        }
    }

    function insertDb(){
        $mysqli = new mysqli("localhost","root","","HiveTechDB");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $sql = "INSERT INTO produto (nome, preco, quantidade, imagem) VALUES ('$this->nome', '$this->preco', '$this->qtd', '$this->img')";
        $mysqli->query($sql);
        $mysqli->close();
    }

    function getProduto($id){
        $mysqli = new mysqli("localhost","root","","HiveTechDB");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $sql = "SELECT * FROM produtos WHERE id_produto = $id";
        $result = $mysqli->query($sql);
        $mysqli->close();

        $produto = $result->fetch_object();

        return $produto;
    }

    function mostrarProduto(){
        $mysqli = new mysqli("localhost","root","","HiveTechDB");

        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $sql = "SELECT * FROM produto where quantidade > 0";
        $result = $mysqli->query($sql);

        while($row = $result->fetch_assoc()){ ?>
            <div class="card mb-3 col-lg-3 col-md-8 col-xl-4 col-xxl-3 col-sm-12 cardProdutos" style="margin-left: 3rem;">
                <center>                    
                    <img src="<?php echo $row['imagem'] ?>" class="card-img-top" style="height: 200px; width: auto;" alt="...">
                </center>
                <div class="card-body">
                    <h5 class="card-title" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap; height: 25px"><?php echo $row['nome'] ?></h5>
                    <p class="card-text" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">Quantidade disponível: <?php echo $row['quantidade'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0"><b>R$ <?php echo $row['preco'] ?></b></p>
                        <form action="adicionar.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-success">Comprar</button>
                        </form>
                    </div>
                </div>
            </div> 
        <?php
        }
    }
}

?>