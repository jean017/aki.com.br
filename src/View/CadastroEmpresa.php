<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../img/aki_logo.png">

        <title>Novo Lugar</title>

        <link href="../../css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>

        {{include ('menu.php') }}

        <div class="container">
            <img src="../../img/pano.jpg" class="img-responsive" width="150" height="500">
        </div>

        <div class="container">

            <div class="row">

                <h1 class="form-signin text-center">Cadastro de Empresas</h1>
                </br>
                </br>

                <form class="form-signin" action="/salvarempresa" method="post">

                    <div class="col-md-4">
                        <h3 class="form-signin-heading text-center">Dados</h3>
                        <label for="inputRazaoSocial" class="sr-only">Razão Social</label>
                        <input type="text" class="form-control" placeholder="Razão Social" name="razao" required autofocus>
                        </br>
                        <label for="inputFantasia" class="sr-only">Nome Fantasia</label>
                        <input type="text" class="form-control" name="fantasia" placeholder="Nome Fantasia" required>
                        </br>
                        <label for="inputCNPJ" class="sr-only">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                        </br>
                        <select class="form-control" name="categoria">
                            <option value="">Selecione uma Categoria</option>
                            <option value="Bares">Bares</option>
                            <option value="Contruções">Contruções</option>
                            <option value="Educação">Educação</option>
                            <option value="Hotéis">Hotéis</option>
                            <option value="Igrejas">Igrejas</option>
                            <option value="Informática">Informática</option>
                            <option value="Restaurantes">Restaurantes</option>
                            <option value="Saúde">Saúde</option>
                        </select>
                        <br />
                        <label for="inputCEP" class="sr-only">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" value="" placeholder="CEP" required autofocus>
                        </br>
                        <label for="inputLagradouro" class="sr-only">Lagradouro</label>
                        <input type="text" class="form-control" name="lagradouro" id="rua" placeholder="Lagradouro">
                        </br>
                        <label for="inputNumero" class="sr-only">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
                        </br>
                        <label for="inputBairro" class="sr-only">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" >
                        </br>
                        <label for="inputCidade" class="sr-only">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" readonly="true">
                        </br>
                        <label for="inputUF" class="sr-only">UF</label>
                        <input type="text" class="form-control" name="uf" id="uf" readonly="true" placeholder="UF">
                        </br>
                    </div>

                    <div class="col-md-4">

                        <h3 class="form-signin-heading text-center">Contato</h3>

                        <label for="inputTelefone" class="sr-only">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
                        </br>
                        <label for="inputTelefone2" class="sr-only">Telefone2</label>
                        <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2">
                        </br>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email: @">
                        </br>
                        <label for="inputAdd" class="sr-only">Informações Adicionais</label>
                        <input type="text" class="form-control" name="add" id="add" placeholder="Informações Adicionais">
                        </br>

                    </div>
                    <div class="col-md-4">
                        <h3 class="form-signin-heading text-center">Fotos (até 3 arquivos de 3 MB)</h3>
                        <label for="inputFoto" class="sr-only">Fotos</label>
                        <input type="file" class="form-control" name="foto1" id="foto1" placeholder="Fotos" accept="image/*">
                        </br>
                        <input type="file" class="form-control" name="foto2" id="foto2" placeholder="Fotos" accept="image/*">
                        </br>
                        <input type="file" class="form-control" name="foto3" id="foto3" placeholder="Fotos" accept="image/*">
                        </br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <img src="../../img/pano.jpg" class="img-responsive" width="150" height="500">
        </div>

        {{include ('footer.php') }}

        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../../js/jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/npm.js" type="text/javascript"></script>
        <script src="../../js/script.js" type="text/javascript"></script>

    </body>
</html>