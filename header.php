<?php
session_start();
  if (isset($_SESSION['cliente'])){
    $idcliente = $_SESSION['cliente'];
    $ncliente = $_SESSION['ncliente'];
  } else {
    $idcliente = 0;
  }
  if (isset($_SESSION['adm'])){
    $adm = $_SESSION['adm'];
  } else {
    $adm = "null";
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hive Tech</title>
    <link rel="shortcut icon" href="img/hivetech.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-link active" aria-current="page" href="index.php"><img src="img/hivetech.png" style="height: 30px;" alt=""></a>
        <a class="nav-link" href="index.php">Produtos</a>
        <a class="nav-link" href="carrinho.php">Carrinho</a>  
      </ul>
      <ul class="navbar-nav me-4">
        <?php if ($idcliente > 0) { ?>
          <li class="dropdown-center me-5">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span><?php echo $ncliente; ?></span>            
            </a>
            <ul class="dropdown-menu dropdown-center">
              <li><a class="nav-link text-muted" href="perfil.php">Meu perfil</a></li>
              <li><a class="nav-link text-muted" href="listarpedido.php">Pedidos</a></li>
              <?php if ($adm == true) { ?>            
              <li><a class="nav-link text-muted" data-bs-toggle="modal" data-bs-target="#gerente">Gerenciamento</a></li>
              <?php } ?>  
              <li><a class="nav-link text-muted" href="limpar.php">Sair</a></li>
            </ul>
          </li>  
        <?php } else { ?>
          <a class="nav-link" href="login.php">Login</a>
        <?php } ?>   
      </ul>
    </div>
  </div>
</nav>