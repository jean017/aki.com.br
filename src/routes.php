<?php

namespace Aki\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();

$rotas->add('raiz', new Route('/', array(
    '_controller' => 'Aki\Controllers\ControleIndex', 
    '_method' => 'telaInicial')));

$rotas->add('quemsou', new Route('/quemsou', array(
    '_controller' => 'Aki\Controllers\ControleIndex', 
    '_method' => 'telaQuemSou')));

$rotas->add('cadastrousuario', new Route('/cadastrousuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'cadastroUsuario')));

$rotas->add('salvarusuario', new Route('/salvarusuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'salvarUsuario')));

$rotas->add('minhaconta', new Route('/minhaconta', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'ViewUsuario')));

$rotas->add('editarusuario', new Route('/editarusuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'EditarUsuario')));

$rotas->add('login', new Route('/login', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'telaLogin')));

$rotas->add('validalogin', new Route('/validalogin', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'validaLogin')));

$rotas->add('paineldecontrole', new Route('/paineldecontrole', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'paineldeControle')));

$rotas->add('sair', new Route('/sair', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'encerraLogin')));

$rotas->add('cadastroempresa', new Route('/cadastroempresa', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'cadastroEmpresa')));

$rotas->add('novolugar', new Route('/novolugar', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'cadastroEmpresa')));

$rotas->add('salvarempresa', new Route('/salvarempresa', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'salvarEmpresa')));

$rotas->add('categorias', new Route('/categorias', array('_controller' =>
    'Aki\Controllers\ControleCategoria',
    '_method' => 'listarCategorias')));

$rotas->add('salvarcategoria', new Route('/salvarcategoria', array('_controller' =>
    'Aki\Controllers\Cadastro',
    '_method' => 'salvarCategoria')));

$rotas->add('cadastrocategoria', new Route('/cadastrocategoria', array('_controller' =>
    'Aki\Controllers\ControleCategoria',
    '_method' => 'cadastroCategoria')));

$rotas->add('empresas', new Route('/empresas', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'ViewEmpresas')));

$rotas->add('empresasCompletas', new Route('/empresacompleta', array('_controller' =>
    'Aki\Controllers\ControleEmpresa',
    '_method' => 'ViewEmpresasCompletas')));

return $rotas;