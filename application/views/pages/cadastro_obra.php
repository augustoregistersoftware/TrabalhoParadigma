<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	  <?php if(isset($obra_editar)) : ?>
					
			<h1 class="h2">Alterar Obra</h1>
				<?php else : ?>
					<h1 class="h2">Cadastro de Obra</h1>
				<?php endif; ?>
      
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

			<div class="col-md-12">
			<?php if(isset($obra_editar)) : ?>
					
					<form action="<?= base_url() ?>obra/update/<?= $obra_editar['id_obra'] ?>" method="post">
				<?php else : ?>
					<form action="<?= base_url() ?>obra/inserir" method="post" enctype="multipart/form-data">
				<?php endif; ?>

                <div class="col-md-6">
						<div class="form-group">
							<label for="nomeObra">Nome Obra</label>
							<input type="text" class="form-control" name="nomeObra" id="nomeObra" placeholder="Nome Obra" value="<?= isset($obra_editar) ? $obra_editar["nome_obra"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="descricao">Descrição</label>
							<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="<?= isset($obra_editar) ? $obra_editar["descricao"] : "" ?>">
						</div>
				</div> 
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="endereco">Endereço</label>
							<select name="endereco" id="endereco" class="form-control pesquisa__select col-12 selectCustom">
								<?php foreach($endereco as $endereco) : ?>
								<option value="<?= $endereco["id_endereco"] ?>"><?php echo $endereco["rua"]; ?></option>
								<?php endforeach;?>
							</select>
					</div>
				</div>


                <div class="col-md-6">
						<div class="form-group">
							<label for="ponto">Ponto</label>
							<input type="text" class="form-control" name="ponto" id="ponto" placeholder="Ponto" value="<?= isset($obra_editar) ? $obra_editar["ponto"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="prazo">Prazo</label>
							<input type="date" class="form-control" name="prazo" id="prazo" placeholder="Prazo" required value="<?= isset($obra_editar) ? $obra_editar["prazo"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="responsavel">Responsavel</label>
							<input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Responsavel" required value="<?= isset($obra_editar) ? $obra_editar["responsavel"] : "" ?>">
						</div>
				</div>

                <div class="col-md-6">
						<div class="form-group">
							<label for="valorNegociado">Valor Negociado</label>
							<input type="number" class="form-control" name="valorNegociado" id="valorNegociado" placeholder="Valor Negociado R$" required value="<?= isset($obra_editar) ? $obra_editar["valor_programado"] : "" ?>">
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
function controleDialog(){
	swal("Lembrete!", "O código auxiliar server para saber o relaciomento dos produtos entres as empresas", "info");
	}

</script>
