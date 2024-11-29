<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <h1 class="h2">Cadastros de Endereço</h1>
        <div class="btn-group mr-2">
            <a href="<?= base_url() ?>endereco/cadastro" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Endereço</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="row-border" id="produtos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Numero</th>
                    <th>Pais</th>
                    <th>Rua</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($endereco as $endereco) : ?>   
            <tr>
                <td><?= $endereco['id_endereco'] ?></td>
                <td><?= $endereco['bairro'] ?></td>
                <td><?= $endereco['cep'] ?></td>
                <td><?= $endereco['cidade'] ?></td>
                <td><?= $endereco['numero'] ?></td>
                <td><?= $endereco['pais'] ?></td>
                <td><?= $endereco['rua'] ?></td>
                <td>
                    <a title="Excluir Endereço" href="javascript:goDeletaObra(<?= $endereco['id_endereco']?>)" class="btn btn-primary btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        new DataTable('#produtos');
    </script>

    </main>

<script>

function goDeletaObra(id) {
    swal({
        title: "Deseja Deletar as Obras vinculada a Esse Endereço?",
        text: "Essa ação nao podera ser desfeita",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var baseUrl = '<?php echo base_url(); ?>'; 
            var myUrl = baseUrl + 'endereco/deletarObras/' + id;
                window.location.href = myUrl;
        } else {
            goDeleta(id);
        }
    })
}

function goDeleta(id) {
    swal({
        title: "Deseja Realmente Deletar Esse Endereço?",
        text: "Essa ação nao podera ser desfeita",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var baseUrl = '<?php echo base_url(); ?>'; 
            var myUrl = baseUrl + 'endereco/deletar/' + id;
                window.location.href = myUrl;
        } else {
            return false;
        }
    })
}
</script>