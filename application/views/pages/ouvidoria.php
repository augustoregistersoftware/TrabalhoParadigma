<style>
    #chatbot-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    #chatbot-modal .modal-content {
        height: 500px;
    }
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <h1 class="h2">Cadastros de Ouvidoria</h1>
        <div class="btn-group mr-2">
        </div>
    </div>

    <div class="table-responsive">
        <table class="row-border" id="produtos">
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
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($ouvidoria as $ouvidoria) : ?>   
            <tr>
                <td><?= $ouvidoria['id_ouvidoria'] ?></td>
                <td><?= $ouvidoria['cidadao'] ?></td>
                <th><?= $ouvidoria['cep'] ?></th>
                <th><?= $ouvidoria['endereco'] ?></th>
                <th><?= $ouvidoria['rua'] ?></th>
                <th><?= $ouvidoria['numero'] ?></th>
                <th><?= $ouvidoria['bairro'] ?></th>
                <th><?= $ouvidoria['reclamacao'] ?></th>
                <td>
                    <a title="Aprovar Ouvidoria" href="javascript:goAprova(<?= $ouvidoria['id_ouvidoria']?>, <?= $ouvidoria['cep']?>)" class="btn btn-primary btn-sm btn-success"><i class="fa-solid fa-check"></i></a>
                    <a title="Excluir Ouvidoria" href="javascript:goDelete(<?= $ouvidoria['id_ouvidoria']?>)" class="btn btn-danger btn-sm btn-primary"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        new DataTable('#produtos');
    </script>

</main>

<script>
function confirmarAcao(id,cep, titulo, url) {
    swal({
        title: titulo,
        text: "Essa ação terá impacto",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((confirmado) => {
        if (confirmado) {
            window.location.href = `${url}${id}/${cep}`;
        }
    });
}

function goAprova(id,cep) {
    confirmarAcao(id,cep, "Deseja Realmente Aprovar Essa Ouvidoria ?", '<?= base_url(); ?>ouvidoria/aprovar/');
}

function goDelete(id) {
    confirmarAcao(id, "Deseja Realmente Reprovar Essa Ouvidoria ?", '<?= base_url(); ?>ouvidoria/deletar/');
}

</script>

