<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Models\ModeloUsuario;
use Aki\Util\Sessao;
use Aki\Models\ModeloIndex;

class ControleIndex {

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

    public function telaInicial() {

        return $this->response->setContent($this->twig->render('index.html'));
    }

    public function telaQuemSou() {
        return $this->response->setContent($this->twig->render('QuemSou.html'));
    }

    public function busca() {

        $busca = $this->request->get('procura');
        $modelo = new ModeloIndex();
        $resultado = $modelo->listarBuscaBD($busca);

        return $this->response->setContent($this->twig->render('Busca.html', array('empresas' => $resultado, 'busca' => $busca)));
    }

}
