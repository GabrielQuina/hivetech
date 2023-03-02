function excluir(meuid) {
    console.log(meuid);
    const a = document.querySelector("#excluir");
    a.href = "remover.php?cod=" + meuid;
    console.log(a);
}

function editar(meuide) {
    console.log(meuide);
    const a = document.querySelector("#editar");
    a.href = "alterar.php?cod=" + meuide;
    console.log(a);
}

function alterarId(id) {
    document.getElementById('idProduto').value = id;

}

