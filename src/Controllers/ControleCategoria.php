<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloCategoria;
use Aki\Entity\Categoria;

class ControleCategoria {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, \Twig_Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function cadastroCategoria() {
        return $this->response->setContent($this->twig->render('CadastroCategoria.html'));
    }

    public function salvarCategoria() {
        $categoria = new Categoria();
        $categoria->setDescricao($this->request->get('categoria'));
        $modelo = new ModeloCategoria();
        $modelo->inserirBD($categoria);

        $destino = "/paineldecontrole";
        $this->redireciona($destino);
    }

    public function alterarCategoria() {
        $categoria = new Categoria();
        $categoria->setIdCategoria($this->request->get('idcategoria'));
        $categoria->setDescricao($this->request->get('categoria'));
        $modelo = new ModeloCategoria();
        $modelo->alterarBD($categoria);
    }

    public function excluirCategoria() {
        $categoria = new Categoria();
        $categoria->setIdCategoria($this->request->get('idcategoria'));
        $modelo = new ModeloCategoria();
        $modelo->excluirBD($categoria);
    }

    public function listarCategorias() {
        $modelo = new ModeloCategoria();
        $categorias = $modelo->listarCategoriasBD();

        return $this->response->setContent($this->twig->render('Categorias.html', array('opcoesCategorias' => $categorias)));
    }

    public function redireciona($destino) {
        $redirect = new RedirectResponse($destino);
        $redirect->send();
    }

}
