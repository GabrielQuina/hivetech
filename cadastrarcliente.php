<?php
    include 'carrinho.class.php'; 
    include 'header.php';
?>
<br>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card p-3">
            <form action="cadastro.php" method="post" class="row g-3">   
                <h1>Cadastro</h1>         
                <div class="col-12">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Ex: José das coves" required>
                </div>            
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="Email" placeholder="Ex: jcoves@mail.com" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <small id="password" class="text-muted">
                        Deve ter entre 1 e 5 caracteres.
                    </small>
                </div>
                <div class="col-md-6">
                    <label for="telefone" class="form-label">CPF</label>
                    <input type="text" id="telefone" name="cpf" class="form-control cpf" data-mask="000.000.000-00" placeholder="Ex: 000.000.000-00" >
                </div>
                <div class="col-md-6">
                    <label for="data" class="form-label">Data de nascimento</label>
                    <input type="date" id="data" name="data" class="form-control" data-mask="00/00/0000" placeholder="Ex: 00/00/0000" >
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.cpf').mask('999.999.999-99', {reverse: false});
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<?php
    include 'footer.php';
?>