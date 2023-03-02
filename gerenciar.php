<?php
    include 'carrinho.class.php';
    include 'header.php';
    include 'produtos.class.php';
    if (isset($_SESSION['cliente'])){
        $idcliente = $_SESSION['cliente'];
    } else {
        $idcliente = 0;
    }
?>
<br>
<div class="container">
    
    <div class="row">
        <div class="col">
            <div class="card" style="width: 15rem; height: 18rem;padding: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="ms-5 card-img-top bi bi-people" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/></svg>
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Gerenciamento de clientes</p>
                    <a href="clientes.php" class="btn btn-dark d-block">Abrir</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 15rem; height: 18rem; padding: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="ms-5 card-img-top bi bi-cart-check" viewBox="0 0 16 16"><path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/></svg>
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>
                    <p class="card-text">Gerenciamento de Produtos</p>
                    <a href="produtos.php" class="btn btn-dark d-block">Abrir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 15rem; height: 18rem;padding: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="ms-5 card-img-top bi bi-cart-check" viewBox="0 0 16 16"><path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                <div class="card-body">
                    <h5 class="card-title">Pedidos</h5>
                    <p class="card-text">Gerenciamento de Pedidos</p>
                    <a href="pedidos.php" class="btn btn-dark d-block">Abrir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 15rem; height: 18rem;padding: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="ms-5 card-img-top bi bi-cart-check" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/></svg>
                <div class="card-body">
                    <h5 class="card-title">Administradores</h5>
                    <p class="card-text">Gerenciamento de administrador</p>
                    <a href="administradores.php" class="btn btn-dark d-block">Abrir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';

?>