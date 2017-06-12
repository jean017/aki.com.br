<?php

namespace Aki;

error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';

use Aki\Util\Sessao;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;
use Twig_Function;
use Twig_Loader_Filesystem;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$sessao = new Sessao();
$sessao->start();

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

include 'routes.php';

$loader = new Twig_Loader_Filesystem(__DIR__ .'/View');
$twig = new Twig_Environment($loader);

$function = new Twig_Function('VerificaSessao', function(){
    if($_SESSION != null){
        return " ". $usuarioLogao = $_SESSION['noh']['nome'];
    }else{
        return null;
    }
});

$twig->addFunction($function);

$requestContext = new RequestContext();
$request = Request::createFromGlobals();
$requestContext->fromRequest($request);
$response = new Response();

$urlMatcher = new UrlMatcher($rotas, $requestContext);
$atributos = $urlMatcher->match($requestContext->getPathInfo());

$controlador = new $atributos['_controller']($response, $request, $twig, $sessao);

if (isset($atributos['_method'])) {
    $metodo = $atributos['_method'];
    if (isset($atributos['_param']))
        $controlador->$metodo($atributos['_param']);
    else
        $controlador->$metodo();
}

$response->send();
