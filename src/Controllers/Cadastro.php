<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloCategoria;
use Aki\Entity\Categoria;
use Aki\Models\ModeloClassificacao;
use Aki\Entity\Classificacao;
use Aki\Models\ModeloEmpresa;
use Aki\Entity\Empresa;
use Aki\Models\ModeloUsuario;
use Aki\Entity\Usuario;

class Cadastro {

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

        $destino = "/";
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

    public function listarCategoria() {
        $modelo = new ModeloCategoria();
        $modelo->listarBD();
    }

    public function cadastroClassificacao() {
        return $this->response->setContent($this->twig->render('CadastroClassificacao.html'));
    }

    public function salvarClassicacao() {
        $classificacao = new Classificacao();
        $classificacao->setDescricao($this->request->get('descricao'));
        $modelo = new ModeloClassificacao();
        $modelo->inserirBD($classificacao);
    }

    public function alterarClassificacao() {
        $classificacao = new Classificacao();
        $classificacao->setIdClassificacao($this->request->get('idclassificacao'));
        $classificacao->setDescricao($this->request->get('descricao'));
        $modelo = new ModeloClassificacao();
        $modelo->alterarBD($classificacao);
    }

    public function excluirClassificacao() {
        $classificacao = new Classificacao();
        $classificacao->setIdClassificacao($this->request->get('idclassificacao'));
        $modelo = new ModeloClassificacao();
        $modelo->excluirBD($classificacao);
    }

    public function listarClassificacao() {
        $modelo = new ModeloClassificacao();
        $modelo->listarBD();
    }

    public function cadastroEmpresa() {
        return $this->response->setContent($this->twig->render('CadastroEmpresa.html'));
    }

    /* public function salvarEmpresa() {
      $empresa = new Empresa();
      $empresa->setRazaoSocial($this->request->get(//dados do form));
      $modelo = new ModeloEmpresa();
      $modelo->inserirBD($empresa);
      }

      public function alterarEmpresa() {
      $empresa = new Empresa();
      $empresa->setIdEmpresa($this->request->get(//dados form));
      $modelo = new ModeloEmpresa();
      $modelo->alterarBD($empresa);
      }

      public function excluirEmpresa() {
      $empresa = new Empresa();
      $empresa->setIdEmpresa($this->request->get(//dados form));
      $modelo = new ModeloEmpresa();
      $modelo->excluirBD($empresa]);
      }

      public function listarEmpresa() {
      $modelo = new ModeloEmpresa();
      $modelo->listarBD();
      }

      public function cadastroUsuario() {
      return $this->response->setContent($this->twig->render('CadastroUsuario.html'));
      }

      public function salvarUsuario() {
      $usuario = new Usuario();
      $usuario->setNome($this->request->get(//dados do form));
      $modelo = new ModeloUsuario();
      $modelo->inserirBD($usuario);
      }

      public function alterarUsuario() {
      $usuario = new Usuario();
      $usuario->setIdUsuario($this->request->get(//dados form));
      $modelo = new ModeloUsuario();
      $modelo->alterarBD($usuario);
      }

      public function excluirUsuario() {
      $usuario = new Usuario();
      $usuario->setIdUsuario($this->request->get(//dados form));
      $modelo = new ModeloUsuario();
      $modelo->excluirBD($usuario);
      }

      public function listarUsuario() {
      $modelo = new ModeloUsuario();
      $modelo->listarBD();
      }
     * 
     */

    public function redireciona($destino) {
        $redirect = new RedirectResponse($destino);
        $redirect->send();
    }

}
