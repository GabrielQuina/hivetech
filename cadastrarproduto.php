<?php
    include 'carrinho.class.php'; 
    include 'header.php';
?>
<br>
<div class="container">
    <div class="d-flex justify-content-center">
        <div style="background-color: white; padding: 10px; border-radius: 10px; border: solid; border-width: 1px;">
            <form action="cadastroprod.php" method="post" class="row g-3"> 
                <h1>Cadastro de Produtos</h1>           
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Ex: Freezer" required>
                </div>            
                <div class="col-md-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="text" name="preco" class="form-control" id="preco" placeholder="Ex: R$1000.00" required>
                </div>
                <div class="col-12">
                    <label for="foto" class="form-label">Imagem</label>
                    <input type="text" name="foto" class="form-control" id="foto" required>
                </div>
                <div class="col-md-2">
                    <label for="quant" class="form-label">Quantidade</label>
                    <input type="number" id="quant" name="quant" placeholder="Ex: 0" class="form-control ">
                </div>            
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<?php
    include 'footer.php';
?>