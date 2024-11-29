<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Login</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div class="col-md-12">
            <form action="<?= base_url() ?>Cadastrologin/inserir/" method="post" enctype="multipart/form-data">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
                        <a href="<?= base_url() ?>Cadastrologin" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
                    </div>
                </div>
            </form>
    </div>
</main>
