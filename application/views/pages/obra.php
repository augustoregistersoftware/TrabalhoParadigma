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
        <h1 class="h2">Cadastros de Obras</h1>
        <div class="btn-group mr-2">
            <a href="<?= base_url() ?>obra/cadastro" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Obras</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="row-border" id="produtos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome Obra</th>
                    <th>Descrição</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Numero</th>
                    <th>Cidade</th>
                    <th>Pais</th>
                    <th>CEP</th>
                    <th>Ponto</th>
                    <th>Prazo</th>
                    <th>Responsavel</th>
                    <th>Status</th>
                    <th>Valor Negociado</th>
                    <th>Valor Final</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($obras as $obras) : ?>   
            <tr>
                <td><?= $obras['id_obra'] ?></td>
                <td><?= $obras['nome_obra'] ?></td>
                <td><?= $obras['descricao'] ?></td>
                <td><?= $obras['rua'] ?></td>
                <td><?= $obras['bairro'] ?></td>
                <td><?= $obras['numero'] ?></td>
                <td><?= $obras['cidade'] ?></td>
                <td><?= $obras['pais'] ?></td>
                <td><?= $obras['cep'] ?></td>
                <td><?= $obras['ponto'] ?></td>
                <td><?= $obras['data_formatada'] ?></td>
                <td><?= $obras['responsavel'] ?></td>
                <?php if($obras['aprovado'] == 'T') : ?>
                <td><span class="badge badge-pill pull-right" style="background-color: #00ff42; color: #fbfbfb; padding: 8px 10px; margin-top: 5px;">Aprovado</span></td>
                <?php elseif($obras['aprovado'] == 'C') : ?>
                    <td><span class="badge badge-pill pull-right" style="background-color: #0070ff; color: #fbfbfb; padding: 8px 10px; margin-top: 5px;">Finalizado</span></td>
                <?php else :?>
                <td><span class="badge badge-pill pull-right" style="background-color: #ff0c00; color: #fbfbfb; padding: 8px 10px; margin-top: 5px;">Reprovado</span></td>
                <?php endif; ?>
                <td style="color: #e81515;">R$ <?= number_format($obras['valor_programado'], 2, ",", ".") ?></td>
                <td style="color: #e81515;">R$ <?= number_format($obras['valor_final'], 2, ",", ".") ?></td>
                <td>
                    <?php if($obras['aprovado'] == 'T') : ?>
                        <a title="Finalizar Obra" href="javascript:goFinaliza(<?= $obras['id_obra']?>)" class="btn btn-primary btn-sm btn-info"><i class="fa-solid fa-check"></i></a>
                    <?php elseif($obras['aprovado'] == 'C') : ?>
                        <a title="Info Associado" href="javascript:void(0);" class="btn btn-warning btn-sm btn-info circle-exclamation"
                            data-valor_programado="<?= $obras['valor_programado'] ?>"
                            data-valor_final="<?= $obras['valor_final'] ?>"
                            data-valor_diferenca="<?= $obras['diferenca_valor'] ?>"
                            data-user_finalizado="<?= $obras['user_finalizado'] ?>"
                            data-toggle="modal" data-target="#modalInfoAdicional">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </a>
                    <?php else :?>
                        <a title="Editar Obra" href="javascript:goEdita(<?= $obras['id_obra']?>)" class="btn btn-primary btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>
                        <a title="Aprovar Obra" href="javascript:goAprova(<?= $obras['id_obra']?>)" class="btn btn-primary btn-sm btn-success"><i class="fa-solid fa-check"></i></a>
                    <?php endif; ?>
                    <a title="Excluir Obra" href="javascript:goDelete(<?= $obras['id_obra']?>)" class="btn btn-danger btn-sm btn-primary"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="modal fade" id="modalInfoAdicional" tabindex="-1" role="dialog" aria-labelledby="modalInfoAdicionalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoAdicionalLabel">Informações Adicionais</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Valor Programado:</strong> <span id="infoProgramado"></span></p>
                    <p><strong>Valor Final:</strong> <span id="infoFinal"></span></p>
                    <p><strong>Diferença:</strong> <span id="infoDiferenca"></span></p>
                    <p><strong>Usuario Finalização:</strong> <span id="infoFinalizacao"></span></p>
                </div>
            </div>
        </div>
    </div>

    <button id="chatbot-button" class="btn btn-primary rounded-circle">
        <i class="fas fa-comments"></i>
    </button>

    <div class="modal fade" id="chatbot-modal" tabindex="-1" role="dialog" aria-labelledby="chatbotModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatbotModalLabel">Anotações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo do Chatbot -->
                    <div id="chat-container" style="height: 400px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                        <!-- Mensagens do chat aparecerão aqui -->
                    </div>
                    <div class="input-group mt-3">
                        <input type="text" id="user-input" class="form-control" placeholder="Digite sua mensagem aqui...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="send-message">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    confirmarAcao(id, "Deseja Realmente Aprovar Essa Obra?", '<?= base_url(); ?>obra/aprovar/');
}

function goEdita(id) {
    confirmarAcao(id, "Deseja Realmente Editar Essa Obra?", '<?= base_url(); ?>obra/edita/');
}

function goFinaliza(id) {
    confirmarAcao(id, "Deseja Realmente Finalizar Essa Obra?", '<?= base_url(); ?>obra/finalizar/');
}

function goDelete(id) {
    confirmarAcao(id, "Deseja Realmente Deletar Essa Obra?", '<?= base_url(); ?>obra/deletar/');
}

$(document).ready(function() {
    // Evento de clique no botão de informações adicionais
    $(document).on('click', '.circle-exclamation', function() {
        // Extrai os dados dos atributos data-*
        const { valor_programado, valor_final, valor_diferenca, user_finalizado } = $(this).data();
        
        // Coloca os dados na modal
        $('#infoProgramado').text(valor_programado);
        $('#infoFinal').text(valor_final);
        $('#infoDiferenca').text(valor_diferenca);
        $('#infoFinalizacao').text(user_finalizado);

        // Mostra a modal
        $('#modalInfoAdicional').modal('show');
    });

    // Abrir o modal ao clicar no botão flutuante
    $('#chatbot-button').on('click', function() {
        $('#chatbot-modal').modal('show');
    });

    // Carregar histórico do chat ao iniciar
    fetch('<?= base_url("chat/get_chat_history") ?>', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao carregar histórico do chat');
        }
        return response.json();
    })
    .then(data => {
        data.forEach(message => {
            $('#chat-container').append(`<div><strong>${message.user}:</strong> ${message.message}</div>`);
        });
        $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
    })
    .catch(error => {
        console.error('Erro ao carregar histórico do chat:', error);
    });

    // Enviar a mensagem para o chatbot
    $('#send-message').on('click', function() {
        const userMessage = $('#user-input').val().trim();
        if (userMessage !== '') {
            // Mostrar a mensagem do usuário no chat
            $('#chat-container').append(`<div><strong>Você:</strong> ${userMessage}</div>`);
            $('#user-input').val('');

            // Fazer a requisição para a API da IA
            fetch('<?= base_url("chat/chat_with_ai") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    message: userMessage
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao se comunicar com o servidor');
                }
                return response.json();
            })
            .then(data => {
                const reply = data && data.reply ? data.reply : 'Resposta inválida do servidor.';
                $('#chat-container').append(`<div><strong>IA:</strong> ${reply}</div>`);
                $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
            })
            .catch(error => {
                console.error('Erro ao se comunicar com o servidor:', error);
                //$('#chat-container').append('<div><strong>IA:</strong> Desculpe, houve um erro ao tentar se comunicar com o servidor.</div>');
                $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
            });
        }
    });

    // Permitir enviar a mensagem pressionando Enter
    $('#user-input').keypress(function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#send-message').click();
        }
    });
});
</script>

