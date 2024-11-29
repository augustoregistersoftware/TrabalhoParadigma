# Projeto Finar - Guia de Configuração

Bem-vindo ao projeto **Finar**. Este guia tem como objetivo ajudar na configuração inicial do ambiente de desenvolvimento para que você possa executar o projeto corretamente.

## Requisitos

- [XAMPP](https://www.apachefriends.org/index.html) instalado (contendo Apache, MySQL, PHP).
- Navegador de sua preferência.

## Passos para Configuração

### 1. Baixar e Instalar o XAMPP

1. Baixe a versão nao tao recente do XAMPP a partir do [site oficial](https://www.apachefriends.org/index.html).
2. Instale o XAMPP em seu sistema. Durante a instalação, certifique-se de que os módulos **Apache** e **MySQL** estão selecionados.

### 2. Iniciar o XAMPP

1. Abra o **XAMPP Control Panel**.
2. Inicie o **Apache** e o **MySQL** clicando nos botões "Start" ao lado de cada um.

### 3. Configurar o Banco de Dados

1. Abra seu navegador e acesse o **phpMyAdmin** em [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Crie um novo banco de dados chamado **finar**:
   - Clique em "**Novo**" no menu lateral esquerdo.
   - Digite **finar** como o nome do banco de dados.
   - Clique em "**Criar**".
3. Importe o arquivo de backup do banco de dados:
   - Clique no banco de dados **finar**.
   - Selecione a aba "**Importar**".
   - Clique em "**Escolher arquivo**" e selecione o arquivo de backup do banco de dados (deve ter extensão **.sql**).
   - Clique em "**Executar**" para importar o banco de dados.

### 4. Configurar o Projeto

1. Coloque os arquivos do projeto na pasta **htdocs** do XAMPP. Geralmente o caminho é: `C:\xampp\htdocs\`.
2. Certifique-se de que os arquivos estão dentro de uma pasta com o nome do projeto, por exemplo: `C:\xampp\htdocs\finar`.

### 5. Executar o Projeto

1. Abra seu navegador.
2. Digite o seguinte URL: [http://localhost/finar](http://localhost/finar).
3. O projeto deverá ser carregado e você poderá visualizar a aplicação funcionando.

## Problemas Comuns

- **Porta Ocupada**: Se o Apache não iniciar, pode ser que a porta 80 esteja em uso. Você pode alterar a porta no arquivo de configuração do Apache (httpd.conf) ou liberar a porta fechando o programa que está utilizando-a.
- **Erro ao Importar o Banco**: Certifique-se de que o arquivo de backup é válido e não está corrompido.

## Contato

Para dúvidas ou suporte, entre em contato pelo e-mail do desenvolvedor.

Obrigado por usar o **Finar**!

