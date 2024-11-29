<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	  <?php if(isset($endereco_editar)) : ?>		
			<h1 class="h2">Alterar Endereço</h1>
		<?php else : ?>
				<h1 class="h2">Cadastro de Endereço</h1>
		<?php endif; ?>
      
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

			<div class="col-md-12">
			<?php if(isset($endereco_editar)) : ?>
					
					<form action="<?= base_url() ?>endereco/update/<?= $fornecedor_editar['id_fornecedor'] ?>" method="post">
				<?php else : ?>
					<form action="<?= base_url() ?>endereco/inserir" method="post" enctype="multipart/form-data">
				<?php endif; ?>

				<form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">
						<div class="form-group">
							<label for="cep">CEP *</label>
							<input type="number" class="form-control" name="cep" id="cep" placeholder="CEP" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["cep"] : "" ?>" onblur="pesquisacep(this.value);">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="bairro">Bairro</label>
							<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["endereco"] : "" ?>">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="rua">Rua</label>
							<input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["bairro"] : "" ?>">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="numero">Numero</label>
							<input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["complemento"] : "" ?>">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="cidade">Cidade</label>
							<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["cidade"] : "" ?>">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="pais">Pais</label>
							<input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="<?= isset($fornecedor_editar) ? $fornecedor_editar["numero"] : "" ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
							<a href="<?= base_url() ?>endereco" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
						</div>			
					</div>
				</form>
			</div>
    </main>
  </div>
</div>

<style>
	select.selectCustom:focus {
    box-shadow: 0 0 0 0;
    border: 1px solid #ccc;
    outline: 0;
}
select.selectCustom{
  border-radius: 30px !important
}

</style>

<script>
      function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>