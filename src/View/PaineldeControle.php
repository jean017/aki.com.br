<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../img/aki_logo.png">

        <title>aKi.com.br</title>

        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../css/estilo.css" rel="stylesheet">

    </head>

    <body>

        {{include ('menu.php') }}

        <div class="jumbotron">
            <div class="container">
                <h1>Painel Administrativo de, {{fulano}} </h1>
                <div class="container">
                    <div class="row">                    
                        <p>Aqui você pode gerenciar suas empresas, deixando-a sempre com dados atualizados. </br> Além de seus dados pessoais de conta como email, usuário e senha.</p>                       
                        </br></br>
                        <div class="col-md-4">
                            <p><a class="btn btn-success btn-lg" href="#" role="button">Adicionar Empresa</a></p>
                        </div>
                        <div class="col-md-4">
                            <p><a class="btn btn-success btn-lg" href="#" role="button">Atualizar Dados da Empresa</a></p>
                        </div>
                        <div class="col-md-4">
                            <p><a class="btn btn-success btn-lg" href="#" role="button">Atualizar Meus Dados</a></p>
                        </div>
                        <div class="col-md-4">
                            <p><a class="btn btn-success btn-lg" href="#" role="button">Deletar Empresa</a></p>
                        </div>
                        <div class="col-md-4">
                            <p><a class="btn btn-success btn-lg" href="#" role="button">Minhas Empresas</a></p>
                        </div>
                        <div class="col-md-4">
                            <p><a class="btn btn-danger btn-lg" href="#" role="button">Sair</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{include ('footer.php') }}

        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/npm.js"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>
