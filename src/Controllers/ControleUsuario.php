<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloUsuario;
use Aki\Entity\Usuario;

class ControleUsuario {

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

    public function telaLogin() {
        return $this->response->setContent($this->twig->render('Login.php'));
    }

    public function validaLogin() {
        $usuario = new Usuario();
        $usuario->setUsuario($this->request->get('usuario'));
        $usuario->setSenha($this->request->get('senha'));
        $modelo = new ModeloUsuario();
        $usuario = $modelo->Login($usuario);

        if ($usuario) {
            $usuario->senha = '';
            $this->sessao->add("usuario", $usuario);
            $destino = "/paineldecontrole";
            $this->redireciona($destino);
        } else {
            $destino = "/login";
            $this->redireciona($destino);
        }
    }

    public function paineldeControle() {
        return $this->response->setContent($this->twig->render('PaineldeControle.php'));
    }

    public function cadastroUsuario() {
        return $this->response->setContent($this->twig->render('CadastroUsuario.php'));
    }

    public function salvarUsuario() {
        $usuario = new Usuario();
        $usuario->setUsuario($this->request->get('usuario'));
        $usuario->setSenha($this->request->get('senha'));
        $usuario->setNome($this->request->get('nome'));
        $usuario->setEmail($this->request->get('email'));
        $modelo = new ModeloUsuario();
        $modelo->inserirBD($usuario);

        $destino = "/paineldecontrole";
        $this->redireciona($destino);
    }

    /*
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
