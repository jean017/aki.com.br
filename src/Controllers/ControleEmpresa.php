<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloEmpresa;
use Aki\Entity\Empresa;

class ControleEmpresa {

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

    public function paineldeControle() {
        return $this->response->setContent($this->twig->render('PaineldeControle.php',  array ('fulano'=> $this->sessao->get("nome"))));
    }

    public function cadastroEmpresa() {
        
        $modelo = new ModeloEmpresa();
        $categoria = $modelo->listarCategorias();
        
//       foreach ($categoria as $dados ){
//            
//            echo"</br>".$dados->descricao;
//             
            return $this->response->setContent($this->twig->render('CadastroEmpresa.php', array('opcoes' => $categoria)));
             
    }

    public function salvarEmpresa() {

        $empresa = new Empresa();
        $file = null;
              
        $empresa->setRazaoSocial($this->request->get('razao'));
        $empresa->setFantasia($this->request->get('fantasia'));
        $empresa->setCnpj($this->request->get('cnpj'));
        $empresa->setCep($this->request->get('cep'));
        $empresa->setCategoria($this->request->get('categoria'));
        $empresa->setLagradouro($this->request->get('lagradouro'));
        $empresa->setNumero($this->request->get('numero'));
        $empresa->setBairro($this->request->get('bairro'));
        $empresa->setCidade($this->request->get('cidade'));
        $empresa->setUf($this->request->get('uf'));
        $empresa->setTelefone($this->request->get('telefone'));
        $empresa->setEmail($this->request->get('email'));
        $teste = $empresa->setInfoAdd($this->request->get('add'));
        
        print_r($teste);
        
        $this->$file = $this->request->files->get('imagem');
        
        var_dump($file);
                
      //  $modelo = new ModeloEmpresa();
       // $modelo->inserirBD($empresa, $imagem);

       // $destino = "/paineldecontrole";
       // $this->redireciona($destino);
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
