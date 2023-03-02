<!-- Modal -->
<div class="modal fade" id="gerente" tabindex="-1" aria-labelledby="gerente" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="gerente">Chave de Acesso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="gerenciamento.php" method="post">
          <label for="chave">Insira sua chave de acesso:</label>
          <div class="d-flex">
            <input id="chave" name="chave" type="password" class="form-control">
            <button type="submit" class="btn btn-primary">Logar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="script.js"></script>
  </body>
</html>