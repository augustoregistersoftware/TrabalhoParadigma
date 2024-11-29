<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url('public/assets/js/app.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/datatables.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/dataTables.buttons.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/buttons.flash.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/jszip.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/pdfmake.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/vfs_fonts.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/buttons.print.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/js/page/datatables.js');?>"></script>
  <script src="<?php echo base_url('public/assets/js/scripts.js');?>"></script>
  <script src="<?php echo base_url('public/assets/js/custom.js');?>"></script>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
		<div class="btn-group mr-2">
		
		</div>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">5 Ultimas Obras Cadastradas</h2>
	</div>

  <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>5 Ultimos Clietes Cadastrados</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
			<thead>
				<tr>
          <th>#</th>
					<th>Nome Obra</th>
					<th>Descrição</th>
					<th>Ponto</th>
					<th>Prazo</th>
					<th>Responsavel</th>
          <th>Status</th>
          <th>Valor Estimado</th>
          <th>Valor Final</th>
          <th>Rua</th>
          <th>Bairro</th>
          <th>Numero</th>
          <th>CEP</th>
				</tr>
			</thead>
			<tbody>
      <?php foreach($obras as $obras) : ?>
          <tr>
            <td><?= $obras['id_obra']?></td>
            <td><?= $obras['nome_obra']?></td>
            <td><?= $obras['descricao']?></td>
            <td><?= $obras['ponto']?></td>
            <td><?= $obras['data_formatada']?></td>
            <th><?= $obras['responsavel']?></th>
            <?php if($obras['aprovado'] == 'T') : ?>
              <td id="status"><span class="badge badge-pill pull-right" style="background-color: #03ab14; color: #fff; padding: 8px 10px; margin-top: 5px;">Aprovado</span></td>
            <?php elseif($obras['aprovado'] == 'C') : ?>
              <td id="status"><span class="badge badge-pill pull-right" style="background-color: #0070ff; color: #fbfbfb; padding: 8px 10px; margin-top: 5px;">Finalizado</span></td>
            <?php else :?>
              <td id="status"><span class="badge badge-pill pull-right" style="background-color: #f28b05; color: #fff; padding: 8px 10px; margin-top: 5px;">Reprovado</span></td>
            <?php endif ; ?>
            <td>R$ <?= number_format($obras['valor_programado'],2,",",".")?></td>
            <td>R$ <?= number_format($obras['valor_final'],2,",",".")?></td>
            <td><?= $obras['rua']?></td>
            <td><?= $obras['bairro']?></td>
            <td><?= $obras['numero']?></td>
            <td><?= $obras['cep']?></td>
          </tr>
        <?php endforeach;?>
			</tbody>
		</table>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">5 Ultimas Ouvidorias Cadastradas</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Cidadão</th>
					<th>CEP</th>
					<th>Endereço</th>
          <th>Rua</th>
          <th>Numero</th>
          <th>Bairro</th>
          <th>Reclamação</th>
				</tr>
			</thead>
			<tbody>
      <?php foreach($ouvidoria as $ouvidoria) : ?>
          <tr>
            <td><?= $ouvidoria['id_ouvidoria']?></td>
            <td><?= $ouvidoria['cidadao']?></td>
            <td><?= $ouvidoria['cep']?></td>
            <td><?= $ouvidoria['endereco']?></td>
            <td><?= $ouvidoria['rua']?></td>
            <td><?= $ouvidoria['numero']?></td>
			      <td><?= $ouvidoria['bairro']?></td>
            <th><?= $ouvidoria['reclamacao']?></th>
          </tr>
        <?php endforeach;?>
			</tbody>
		</table>

    <script src="<?php echo base_url('public/assets/js/app.min.js');?>"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('public/assets/bundles/datatables/datatables.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/dataTables.buttons.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/buttons.flash.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/jszip.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/pdfmake.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/vfs_fonts.js');?>"></script>
  <script src="<?php echo base_url('public/assets/bundles/datatables/export-tables/buttons.print.min.js');?>"></script>
  <script src="<?php echo base_url('public/assets/js/page/datatables.js');?>"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url('public/assets/js/scripts.js');?>"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url('public/assets/js/custom.js');?>"></script>
  
	</div>

    <div class="cardBox">

        <!-- Card de Lucro -->
    <a href="<?= base_url() ?>dashboard" class="card-link">
      <div class="card" id="cardes">
          <img src="\finar\imagens\blueberry-online-meeting-via-group-call.gif" alt="Imagem de perfil" style="width: 100%; height: auto;">
          <div class="cardName">Bem-Vindo, Augusto</div>
          <p>Dashboard</p>
      </div>
      <div class="iconBx">
          <ion-icon name="eye-outline"></ion-icon>
      </div>
    </a>

    <!-- Card de Cobranças -->
    <a href="<?= base_url() ?>obra" class="card-link">
        <div class="card">
		<?php foreach($total_gasto as $total_gasto) : ?>
            <div class="numbers">R$ <?= number_format($total_gasto['gasto'],2,",",".")?></div>
		<?php endforeach;?>
            <div class="cardName">Total de Gastos</div>
        </div>
        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </a>
    
    <!-- Card de Compras -->
    <a href="<?= base_url() ?>obra" class="card-link">
        <div class="card">
		<?php foreach($total_obras as $total_obras) : ?>
            <div class="numbers"><?= $total_obras['finalizado']?></div>
		<?php endforeach;?>
            <div class="cardName">Total Obras Finalizadas</div>
        </div>
        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </a>


    <!-- Card de Lucro -->
    <a href="<?= base_url() ?>obra" class="card-link">
        <div class="card">
		<?php foreach($total_gasto_futuro as $total_gasto_futuro) : ?>
            <div class="numbers">R$ <?= number_format($total_gasto_futuro['gasto_futuro'],2,",",".")?></div>
		<?php endforeach;?>
            <div class="cardName">Despesa Futura</div>
        </div>
        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </a>
</div>

<button id="helpButton" onclick="startTour()">
    <i class="fas fa-question-circle"></i>
</button>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Obras', 'Status'],
          <?php foreach ($obra_grafico as $obra_grafico) : ?>
          ['<?php echo $obra_grafico['status_obra']?>',  <?php echo $obra_grafico['quantidade']?>],
          <?php endforeach;?>
        ]);

        var options = {
          title: 'Obras',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>


<script>
	function abrirGraficoEstoque(){
		document.getElementById("d1").setAttribute("open","");
	}

  function boas_vindas(){
    Swal.fire({
  title: "Olá,<?php echo $this->session->userdata('name'); ?>",
  text: "Seja muito bem-vindo(a)! Hoje, vamos nos aventurar juntos em uma jornada cheia de possibilidades. Estou ansioso(a) para explorar, aprender e criar momentos inesquecíveis ao seu lado. Vamos fazer deste dia algo extraordinário!",
  imageUrl: "https://ouch-cdn2.icons8.com/JlfQgQozPSgBq00v8E7N2L96CLHslRQofr_gnO39aRY/rs:fit:608:456/extend:false/wm:1:re:0:0:0.8/wmid:ouch/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9zdmcvNzMx/LzM1MDcyODA3LTky/NmYtNGM5Mi1hZjQw/LTgyNmI0MjQ5MWJi/OS5zdmc.png",
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: "Custom image"
});
}

   // Função para limpar um parâmetro da URL
   function limparParametroURL(nomeParametro) {
        if (history.replaceState) {
            // Obtém a URL atual sem os parâmetros de consulta
            const novaURL = window.location.protocol + "//" + window.location.host + window.location.pathname;

            // Substitui a URL atual sem o parâmetro especificado
            history.replaceState({}, document.title, novaURL);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Verifica se o parâmetro 'aviso' está presente na URL
        const urlParams = new URLSearchParams(window.location.search);
        const avisoParam = urlParams.get('aviso');

        // Se o parâmetro 'aviso' for 'sucesso', exibe a modal
        if (avisoParam === 'sucesso') {
          boas_vindas();
        }
    });

    function startTour() {
        const driver = window.driver.js.driver;
        const driverObj = driver({
            showProgress: true,
            steps: [
                { element: '#GridObra', popover: { title: 'Grid De Informações de Obras', description: 'Aqui você encontra as 5 ultimas obras cadastradas no site', side: "left", align: 'start' }},
                { element: '#status', popover: { title: 'Status', description: 'Na Grid ele mostra qual status esta a obra', side: "bottom", align: 'start' }},
                { element: '#cardes', popover: { title: 'Card Informativo', description: 'Esse Cards sao informativos ao clicar neles eles te levam ate a pagina para consultar mais', side: "bottom", align: 'start' }},
                { element: '#piechart_3d', popover: { title: 'Grafico', description: 'Esse grafico representa as quantidades divididas das obras por seu status', side: "left", align: 'start' }},
            ]
        });
        driverObj.drive();
    }
</script>



<style>
	/* ======================= Cards ====================== */

.card-link {
  text-decoration: none;
  color: inherit;
    /* Adicione quaisquer outros estilos necessários para manter a aparência do seu card */
}
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(--blue);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}

/* Estilo do botão de ajuda */
#helpButton {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #007bff;
        color: white;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        transition: background-color 0.3s;
    }
    #helpButton:hover {
        background-color: #0056b3;
    }
    #helpButton ion-icon {
        font-size: 2rem;
    }


</style>