<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../img/aki_logo.png">

        <title>Login</title>

        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../css/estilo.css" rel="stylesheet">

    </head>
    <body>

        {{include ('menu.php') }}

        <div class="container">
            <img src="../../img/pano.jpg" class="img-responsive" width="150" height="500">
        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-4"></div>

                <div class="col-md-4">
                    <form class="form-signin" method="post" action="\validalogin">
                        <h2 class="form-signin-heading text-center">Login</h2>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
                        </br>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                        </br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <div class="container">
            <img src="../../img/pano.jpg" class="img-responsive" width="150" height="500">
        </div>

        {{include ('footer.php') }}

        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/npm.js"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>