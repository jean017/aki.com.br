<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Aki\Util\Sessao;
use PDO;
use Aki\Models\ModeloEmpresa;
use Aki\Models\ModeloCategoria;
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

    public function cadastroEmpresa() {

        if ($_SESSION == null) {

            $destino = "/login";
            $this->redireciona($destino);
        } else {

            $modelo = new ModeloCategoria();
            $categorias = $modelo->listarCategoriasBD();

            return $this->response->setContent($this->twig->render('CadastroEmpresa.html', array('opcoesCategorias' => $categorias)));
        }
    }

    public function salvarEmpresa() {

        $empresa = new Empresa();

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
        $empresa->setInfoAdd($this->request->get('add'));

        $imagens = array();

        $imagens[0] = $this->request->files->get('imagem');
        $imagens[1] = $this->request->files->get('imagem2');
        $imagens[2] = $this->request->files->get('imagem3');

        $modeloEmpresa = new ModeloEmpresa();

        $idEmpresa = $modeloEmpresa->inserirBD($empresa, $this->sessao->get('id'));

        if ($imagens[0] != NULL) {
            $modeloEmpresa->inserirBDImagem($idEmpresa, $imagens[0]);
        }

        if ($imagens[1] != NULL) {
            $modeloEmpresa->inserirBDImagem($idEmpresa, $imagens[1]);
        }

        if ($imagens[2] != NULL) {
            $modeloEmpresa->inserirBDImagem($idEmpresa, $imagens[2]);
        }

        $destino = "/paineldecontrole";
        $this->redireciona($destino);
    }

    public function ViewEmpresas() {

        $categoria = $this->request->get('categoriaBusca');

        $modelo = new ModeloEmpresa();
        $empresas = $modelo->listarBDCategoria($categoria);

        return $this->response->setContent($this->twig->render('ViewEmpresa.html', array('categoria' => $categoria, 'empresas' => $empresas)));
    }

    public function ViewEmpresasCompletas() {

        if ($_SESSION == null) {

            $destino = "/login";
            $this->redireciona($destino);
        } else {

            $empresa = $this->request->get('empresa');

            $modelo = new ModeloEmpresa();
            $empresas = $modelo->listarBDCompleta($empresa);
            $imagens = $modelo->listarBDImagens($empresa);

            if (!empty($imagens[0])) {
                $imagem1 = $imagens[0];
            } else {
                $iamgem1 = null;
            }

            if (!empty($imagens[1])) {
                $imagem2 = $imagens[1];
            } else {
                $iamgem2 = null;
            }

            if (!empty($imagens[2])) {
                $imagem3 = $imagens[2];
            } else {
                $imagem3 = NULL;
            }

            return $this->response->setContent($this->twig->render('ViewEmpresaCompleta.html', array('empresa' => $empresa, 'empresas' => $empresas,
                                'nome' => $imagem1['nome'], 'tipo' => $imagem1['tipo'], 'imagem' => base64_encode($imagem1['imagem']),
                                'nome2' => $imagem2['nome'], 'tipo2' => $imagem2['tipo'], 'imagem2' => base64_encode($imagem2['imagem']),
                                'nome3' => $imagem3['nome'], 'tipo3' => $imagem3['tipo'], 'imagem3' => base64_encode($imagem3['imagem']))));
        }
    }

    public function redireciona($destino) {
        $redirect = new RedirectResponse($destino);
        $redirect->send();
    }

}
