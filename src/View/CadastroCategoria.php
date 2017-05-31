!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../img/aki_logo.png">

        <title>Cadastro de Categoria!</title>

        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../css/estilo.css" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" action="/salvarcategoria" method="post">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input class="form-control" name="categoria" type="text">
                        <button type="submit" class="btn btn-default">
                            Salvar Dados da Categoria
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/npm.js"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>