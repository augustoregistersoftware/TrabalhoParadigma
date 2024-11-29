<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Cidadã - Prefeitura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="/finar/imagens/icone.png">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Ouvidoria Cidadão - Prefeitura Marilia</h1>
            <p>Estamos aqui para ouvir você. Envie suas sugestões de melhoria para nossa cidade.</p>
        </div>
    </header>
    
    <main>
        <section id="form-section">
            <div class="form-container">
                <h2>Fale Conosco</h2>
                <form action="<?= base_url() ?>ouvidoria/inserir/" method="post">
                    <div class="form-group">
                        <label for="nome">Nome Completo:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="cep" id="cep" name="cep" placeholder="Digite seu CEP" required onblur="pesquisacep(this.value);">
                    </div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="bairro">Bairro</label>
							<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="rua">Rua</label>
							<input type="text" class="form-control" name="rua" id="rua" placeholder="Rua">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="numero">Numero</label>
							<input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="cidade">Cidade</label>
							<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
						</div>
					</div>

                    <div class="col-md-6">
						<div class="form-group">
							<label for="endereco_por_extenso">Endereço por Extenso</label>
							<input type="text" class="form-control" name="endereco_por_extenso" id="endereco_por_extenso" placeholder="Endereço por extenso">
						</div>
					</div>

                    <div class="form-group">
                        <label for="mensagem">Mensagem:</label>
                        <textarea id="mensagem" name="mensagem" rows="5" placeholder="Digite sua mensagem" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit">Enviar <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>Prefeitura Municipal - Todos os direitos reservados &copy; 2024</p>
            <div class="social-media">
                <a href="https://www.facebook.com/login/?locale=pt_BR"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/?lang=pt-br&mx=2"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>

<style>
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    color: #333;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff;
    padding: 1rem 2rem;
    color: #fff;
}

.logo {
    font-size: 1.5rem;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 1rem;
}

.nav-links li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.header-content {
    text-align: center;
    padding: 4rem 2rem;
    background: linear-gradient(to right, #007bff, #00b8ff);
    color: #fff;
}

header h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

header p {
    font-size: 1.25rem;
}

.form-container {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

label {
    font-weight: bold;
}

input, select, textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

input::placeholder, textarea::placeholder {
    color: #999;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 1rem;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    justify-content: center;
}

button:hover {
    background-color: #0056b3;
}

footer {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    padding: 1.5rem 0;
    margin-top: 2rem;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 800px;
    margin: auto;
}

.social-media a {
    color: #fff;
    font-size: 1.25rem;
    margin: 0 0.5rem;
}

.social-media a:hover {
    color: #00b8ff;
} 
</style>

<script>
/* script.js */
const form = document.getElementById("ouvidoria-form");

form.addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Mensagem enviada com sucesso! Agradecemos seu contato.");
    form.reset();
});

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
