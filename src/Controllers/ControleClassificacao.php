<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloClassificacao;
use Aki\Entity\Classificacao;

class ControleClassificacao {

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

    public function salvarClassificacao() {
        $classificacao = new Classificacao();
        $classificacao->setClassificacao($this->request->get('nota'));
        $classificacao->setEmpresa($this->request->get('empresa'));

        $modelo = new ModeloClassificacao();
        $modelo->inserirBD($classificacao);

       return $this->response->setContent($this->twig->render('Classificacao.html', array('empresa' => $this->request->get('empresa'))));
    }

    public function redireciona($destino) {
        $redirect = new RedirectResponse($destino);
        $redirect->send();
    }

}
