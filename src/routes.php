<?php

namespace Aki\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();

$rotas->add('raiz', new Route('/', array(
    '_controller' => 'Aki\Controllers\ControleIndex', 
    '_method' => 'telaInicial')));

$rotas->add('cadastrousuario', new Route('/cadastrousuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'cadastroUsuario')));

$rotas->add('salvarusuario', new Route('/salvarusuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'salvarUsuario')));

$rotas->add('login', new Route('/login', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'telaLogin')));

$rotas->add('validalogin', new Route('/validalogin', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'validaLogin')));

$rotas->add('paineldecontrole', new Route('/paineldecontrole', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'paineldeControle')));

$rotas->add('cadastroempresa', new Route('/cadastroempresa', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'cadastroEmpresa')));

$rotas->add('cadastroempresa', new Route('/novolugar', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'cadastroEmpresa')));

$rotas->add('salvarempresa', new Route('/salvarempresa', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'salvarEmpresa')));

$rotas->add('salvarcategoria', new Route('/salvarcategoria', array('_controller' =>
    'Aki\Controllers\Cadastro',
    '_method' => 'salvarCategoria')));

$rotas->add('cadastrocategoria', new Route('/cadastrocategoria', array('_controller' =>
    'Aki\Controllers\Cadastro',
    '_method' => 'cadastroCategoria')));


return $rotas;