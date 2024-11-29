<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Senha</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div class="col-md-12">
        <?php $senha_para_crip = 'bNzLsJB3/H$dasrg654fg'; ?>
        <?php if (isset($senha)) : ?>
            <form action="<?= base_url() ?>Cadastrologin/updateSenha/<?= $senha['id_login'] ?>" method="post" enctype="multipart/form-data">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input disabled type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= $senha['email'] ?? '' ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="senha_antiga">Senha Antiga</label>
                        <input disabled type="text" class="form-control" name="senha_antiga" id="senha_antiga" placeholder="Senha Antiga" value="<?= openssl_decrypt($senha['senha'], "AES-128-ECB", $senha_para_crip) ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nova_senha">Nova Senha</label>
                        <input type="password" class="form-control" name="nova_senha" id="nova_senha" placeholder="Nova Senha">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
                        <a href="<?= base_url() ?>Cadastrologin" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</main>
