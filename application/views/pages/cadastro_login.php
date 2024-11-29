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
        <h1 class="h2">Cadastros de Login</h1>
        <div class="btn-group mr-2">
            <a href="<?= base_url() ?>Cadastrologin/cadastro" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Login</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="row-border" id="produtos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($login as $login) : ?>   
            <tr>
                <td><?= $login['id_login'] ?></td>
                <td><?= $login['nome'] ?></td>
                <th><?= $login['email'] ?></th>
                <td>
                    <a title="Editar Senha" href="javascript:goAprova(<?= $login['id_login']?>)" class="btn btn-primary btn-sm btn-warning"><i class="fa-solid fa-lock"></i></a>
                    <a title="Excluir Login" href="javascript:goDelete(<?= $login['id_login']?>)" class="btn btn-danger btn-sm btn-primary"><i class="fa-solid fa-trash"></i></a>
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
function confirmarAcao(id, titulo, url) {
    swal({
        title: titulo,
        text: "Essa ação terá impacto",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((confirmado) => {
        if (confirmado) {
            window.location.href = url + id;
        }
    });
}

function goAprova(id) {
    confirmarAcao(id, "Deseja Realmente Editar a Senha ?", '<?= base_url(); ?>CadastroLogin/editarSenha/');
}

function goDelete(id) {
    confirmarAcao(id, "Deseja Realmente Deletar Esse Login ?", '<?= base_url(); ?>CadastroLogin/deletar/');
}

</script>

