<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">Finalizar Obra</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

			<div class="col-md-12">
            <form action="<?= base_url('obra/finalizarObraUpdt/'.$obras['id_obra']); ?>" method="post">
                <div class="col-md-6">
						<div class="form-group">
							<label for="nomeObra">Nome Obra</label>
							<input disabled type="text" class="form-control" name="nomeObra" id="nomeObra" placeholder="Nome Obra" value="<?= isset($obras) ? $obras["nome_obra"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="descricao">Descrição</label>
							<input disabled type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="<?= isset($obras) ? $obras["descricao"] : "" ?>">
						</div>
				</div> 

                <div class="col-md-6">
						<div class="form-group">
							<label for="valor_negociado">Valor Negociado R$</label>
							<input disabled type="text" class="form-control" name="valor_negociado" id="valor_negociado" placeholder="Valor Negociado R$" value="<?= isset($obras) ? $obras["valor_programado"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="valor_final">Valor Final R$</label>
							<input type="text" class="form-control" name="valor_final" id="valor_final" placeholder="Valor Final R$" required>
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="diferenca">Diferença R$</label>
							<input disabled type="number" class="form-control" name="diferenca" id="diferenca" placeholder="Diferença R$">
						</div>
				</div>
					<div class="col-md-6">
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
							<a href="<?= base_url() ?>obra" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
						</div>			
					</div>
				</form>
			</div>
    </main>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function calcularDiferenca() {
        let valorNegociado = parseFloat(document.getElementById('valor_negociado').value) || 0;
        let valorFinal = parseFloat(document.getElementById('valor_final').value) || 0;

        let diferenca = valorFinal - valorNegociado;

        document.getElementById('diferenca').value = diferenca.toFixed(2);
    }

    document.getElementById('valor_final').addEventListener('input', calcularDiferenca);
    document.getElementById('valor_negociado').addEventListener('input', calcularDiferenca);
</script>


