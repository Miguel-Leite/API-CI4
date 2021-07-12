<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API RESTfull</title>
    <link rel="stylesheet" href="./public/assets/css/style.css">
</head>

<body>

    <nav>

        <ul>
            <a href="javascript:;" class="logo"> 🚧 API com PHP 8 e Codeigniter 4.1.X 🚧 </a>
            <a href="http://devmiguel.onlinewebshop.net/">Portfolio</a>
            <a href="tel:+244944651758">Ligar agora</a>

        </ul>



    </nav>

    <div class="container">

        <h3>DESENVOLVIDO POR: <a href="https://free.facebook.com/miguel.leite.1217?ref_component=mfreebasic_home_header&ref_page=XPagesBrowserController&ref=page_invite_notification">
                <font color="orange"> Miguel Leite </font>
            </a> </h3>

        <img src="./public/assets/miguelleite.jpg" width="80" alt="">

        <hr>

        <h1 align="center">
            <a href="https://codeigniter.com/">🔗 CODEIGNITER <span class="version">4 v: 4.1.2</span></a> com PHP 8.0.x
        </h1>
        <p align="center"> Para construção desse mini projecto (API) foi utilizado o framework Codeigniter 4 na versão 4.1.2 que neste caso a versão do PHP <br> que se encontrar no <a href="https://codeigniter.com/">🔗 CODEIGNITER 4 </a> é a partir do 7.4 em diante.</p>

        <br><br><br>

        <hr>

        <h3 align="center" id="sobre">
            🚧 API COM CODEIGNITER 4 & PHP 8 - TESTE API 🚧
        </h3>

        <p>
            É um projecto de teste, com objectivo de passar conhecimento de como construir API com Codeigniter 4 ou mesmo com um outro framework do PHP ou também com uma outra linguagem de programação e não só, também tem o objectivo de passar ideia para aqueles desenvolvedores que pretendem aprender a desenvolver ou consumir uma API RESTfull.

        </p>

        <h3 id="instalacao"> 💡 Pré-requisitos </h3>

        <p>
            Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
            WampServer/XAMPP v:3.3.0 ou uma versão superior, vai precisar também do Insominia ou Postaman para poder teste a API.
            Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/).</p>

        <br>
        <p>
            Depois de teres tudo isso instalado na sua maquina, acessa a pasta de projecto do servidor, se for o XAMPP estamos a falar da pasta htdocs e se for o WAMMPSERVER estamos a falar da pasta www. </p>

        <br>
        <p>
            Depois de teres acessado a pasta do seu servidor local criar uma pasta com o nome ci4 e dentro desta pasta coloca a pasta do projecto e renomea ele com o nome api.</p>
        <br>

        <p>
            É obrigatório renomear a pasta do projecto? Sim é devido a configuração feita, depois de se familiarizar com o projecto podes colocar ele numa outra pasta e pode renomear o projecto com um nome a sua escolha. </p>

        <br>
        <h3 id="como-usar">🎲 Como consumir a API</h3>

        <p>
            Primeiramente pega a base de dados com nome ci4.sql que se encontra na pasta do projecto, acessa PhpMyAdmin e em seguida importa a base de dados no servidor ou mesmo executa o seu código SQL no seu servidor.</p>
        <br>
        <p>
            Para começar fazer o teste desta API deves ter em conta que essa API recebe apenas dados do tipo JSON e pelo qual ele
            retorna os dados no mesmo formato que neste caso estamos a falar do formato JSON.</p>
        <br>
        <p>
            Para consumir essa API tens que passar um token válido no sistema caso não tenhas um token válido ou se não passares um token não sera possível enviar e receber dados da API.</p>
        <br>
        <p>
            O token deve ser enviado no formato JSON que é obrigatório armazenar ou seja guarda esse token o indice com nome "vToken", caso o token não se encontra aramazenado no indice "vToken" não sera possível consumir a API.</p>
        <br>
        <p>
            Caso tenhas armazenado esse token no indice vToken, abaixo temos as rotas definidas na nossa API.
        </p>

        <h3>🔗 Endpoints</h3>
        
        <p> Listar todos usuário (GET) -> http://localhost/ci4/api/api/get/users </p><br>
        <p> Listar usuário por ID (GET) -> http://localhost/ci4/api/api/get/one/user/4 </p><br>
        <p> Cadastrar novo usuário (POST) -> http://localhost/ci4/api/api/new/user </p><br>
        <p> Actualizar dados do usuário (UPDATE) -> http://localhost/ci4/api/api/update/user/5 </p><br>
        <p> Apagar dados registro do usuário (DELETE) -> http://localhost/ci4/api/api/delete/user/6 </p><br>
        <p> Efectuar login (POST) -> http://localhost/ci4/api/api/login/user </p><br>
        <hr> <br>
        <p> Listar todos tokens (GET) -> http://localhost/ci4/api/api/get/tokens </p><br>
        <p> Listar por ID (GET) -> http://localhost/ci4/api/api/get/one/token/1 </p><br>
        <p> Cadastrar novo token (POST) -> http://localhost/ci4/api/api/new/token </p><br>
        <p> Actualizar dados do token (UPDATE) -> http://localhost/ci4/api/api/update/token/3 </p><br>
        <p> Apagar dados registro do token (DELETE) -> http://localhost/ci4/api/api/delete/token/9 </p><br>
        

    </div>

</body>

</html>