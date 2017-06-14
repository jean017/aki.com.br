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
        return $this->response->setContent($this->twig->render('Login.html'));
    }

    public function validaLogin() {
        $usuario = new Usuario();
        $usuario->setUsuario($this->request->get('usuario'));
        $usuario->setSenha($this->request->get('senha'));
        $usuario->setEmail($this->request->get('usuario'));
        $modelo = new ModeloUsuario();
        $usuario = $modelo->Login($usuario);

        if ($usuario) {

            $usuario->senha = '';
            $this->sessao->add("usuario", $usuario->usuario);
            $this->sessao->add("nome", $usuario->nome);
            $this->sessao->add("email", $usuario->email);
            $this->sessao->add("id", $usuario->idusuario);
            $destino = "/paineldecontrole";
            $this->redireciona($destino);
        } else {
            $destino = "/login";
            $this->redireciona($destino);
        }
    }

    public function encerraLogin() {
        $this->sessao->del();

        $destino = "/";
        $this->redireciona($destino);
    }

    public function paineldeControle() {

        if ($_SESSION == null) {

            $destino = "/login";
            $this->redireciona($destino);
        } else {
            return $this->response->setContent($this->twig->render('PaineldeControle.html', array('usuario' => $this->sessao->get("nome"))));
        }
    }

    public function cadastroUsuario() {
        return $this->response->setContent($this->twig->render('CadastroUsuario.html'));
    }

    public function salvarUsuario() {
        $usuario = new Usuario();
        $usuario->setUsuario($this->request->get('usuario'));
        $usuario->setSenha($this->request->get('senha'));
        $usuario->setNome($this->request->get('nome'));
        $usuario->setEmail($this->request->get('email'));
        $modelo = new ModeloUsuario();
        $modelo->inserirBD($usuario);

        echo "<script>window.location='/login';alert('Obrigado $usuario->nome por se cadastrar, faça o login para ter acesso ao nosso Painel de Controle.');</script>";

//        $destino = "/paineldecontrole";
//        $this->redireciona($destino);
    }

    public function ViewUsuario() {

        if ($_SESSION == null) {

            $destino = "/login";
            $this->redireciona($destino);
        } else {

            $modelo = new ModeloUsuario();
            $usuario = $modelo->listarBDUsuario($this->sessao->get('id'));

            return $this->response->setContent($this->twig->render('ViewUsuario.html', array('usuario' => $usuario)));
        }
    }
    
        public function EditarUsuario() {

        if ($_SESSION == null) {

            $destino = "/login";
            $this->redireciona($destino);
        } else {

            $modelo = new ModeloUsuario();
            $usuario = $modelo->listarBDUsuario($this->sessao->get('id'));

            return $this->response->setContent($this->twig->render('EditarUsuario.html', array('usuario' => $usuario)));
        }
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
