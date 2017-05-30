<?php

namespace Aki\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();

$rotas->add('raiz', new Route('/', array(
    '_controller' => 'Aki\Controllers\ControleIndex', 
    '_method' => 'telaInicial')));

$rotas->add('hotel', new Route('/hotel', array(
    '_controller' => 'Aki\Controllers\CategoriaHotel',
    '_method' => 'msgInicial')));

$rotas->add('bares', new Route('/bares', array(
    '_controller' => 'Aki\Controllers\CategoriaBares',
    '_method' => 'msgInicial')));

$rotas->add('restaurantes', new Route('/restaurantes', array('_controller' =>
    'Aki\Controllers\CategoriaRestaurantes',
    '_method' => 'msgInicial')));

$rotas->add('igrejas', new Route('/igrejas', array('_controller' =>
    'Aki\Controllers\CategoriaIgrejas',
    '_method' => 'msgInicial')));

$rotas->add('carros', new Route('carros', array('_controller' =>
    'Aki\Controllers\CategoriaCarros',
    '_method' => 'msgInicial')));

$rotas->add('construcao', new Route('/construcao', array('_controller' =>
    'Aki\Controllers\CategoriaConstrucao',
    '_method' => 'msgInicial')));

$rotas->add('medicos', new Route('/medicos', array('_controller' =>
    'Aki\Controllers\CategoriaMedicos',
    '_method' => 'msgInicial')));

$rotas->add('cultura', new Route('/cultura', array('_controller' =>
    'Aki\Controllers\CategoriaCultura',
    '_method' => 'msgInicial')));

$rotas->add('informatica', new Route('/informatica', array('_controller' =>
    'Aki\Controllers\CategoriaInformatica',
    '_method' => 'msgInicial')));

$rotas->add('lazer', new Route('/lazer', array('_controller' =>
    'Aki\Controllers\CategoriaLazer',
    '_method' => 'msgInicial')));

$rotas->add('roupas', new Route('/roupas', array('_controller' =>
    'Aki\Controllers\CategoriaRoupas',
    '_method' => 'msgInicial')));

$rotas->add('educacao', new Route('/educacao', array('_controller' =>
    'Aki\Controllers\CategoriaEducacao',
    '_method' => 'msgInicial')));

$rotas->add('login', new Route('/login', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'telaLogin')));

$rotas->add('salvarcategoria', new Route('/salvarcategoria', array('_controller' =>
    'Aki\Controllers\Cadastro',
    '_method' => 'salvarCategoria')));

$rotas->add('cadastrocategoria', new Route('/cadastrocategoria', array('_controller' =>
    'Aki\Controllers\Cadastro',
    '_method' => 'cadastroCategoria')));

$rotas->add('cadastrousuario', new Route('/cadastrousuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'cadastroUsuario')));

$rotas->add('salvarusuario', new Route('/salvarusuario', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'salvarUsuario')));

$rotas->add('paineldecontrole', new Route('/paineldecontrole', array('_controller' =>
    'Aki\Controllers\ControleUsuario',
    '_method' => 'paineldeControle')));

return $rotas;