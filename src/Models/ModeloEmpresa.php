<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;
use Aki\Entity\Empresa;
use Aki\Models\ModeloCategoria;

class ModeloEmpresa {

    function __construct() {
        
    }

    public function inserirBD(Empresa $empresa, $idUsuario) {

        try {

            $sql = "INSERT INTO empresa (razao_social, fantasia, telefone, info_add, cnpj, fkcategoria, "
                    . "lagradouro, numero, bairro, cep, uf, cidade, email, fkusuario) "
                    . "VALUES (:razao_social, :fantasia, :telefone, :info_add, :cnpj, :fkcategoria, "
                    . ":lagradouro, :numero, :bairro, :cep, :uf, :cidade, :email, :fkusuario)";


            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(':razao_social', $empresa->getRazaoSocial());
            $p_sql->bindValue(':fantasia', $empresa->getFantasia());
            $p_sql->bindValue(':telefone', $empresa->getTelefone());
            $p_sql->bindValue(':info_add', $empresa->getInfoAdd());
            $p_sql->bindValue(':cnpj', $empresa->getCnpj());
            $p_sql->bindValue(':fkcategoria', $empresa->getCategoria());
            $p_sql->bindValue(':lagradouro', $empresa->getLagradouro());
            $p_sql->bindValue(':numero', $empresa->getNumero());
            $p_sql->bindValue(':bairro', $empresa->getBairro());
            $p_sql->bindValue(':cep', $empresa->getCep());
            $p_sql->bindValue(':uf', $empresa->getUf());
            $p_sql->bindValue(':cidade', $empresa->getCidade());
            $p_sql->bindValue(':email', $empresa->getEmail());
            $p_sql->bindValue(':fkusuario', $idUsuario);

            $p_sql->execute();

            return(Conexao::getInstance()->lastInsertId());
        } catch (Exception $ex) {

            print_r('Erro na Inclusão da Empresa!\n Erro: ' . $ex);
        }
    }

    public function inserirBDImagem($idEmpresa, \Symfony\Component\HttpFoundation\File\UploadedFile $imagem) {

        try {

            $sql = "INSERT INTO imagem (imagem, fkempresa, nome, tipo) VALUES (:imagem, :fkempresa, :nome, :tipo)";

            $p_sql1 = Conexao::getInstance()->prepare($sql);
            $p_sql1->bindValue(':imagem', file_get_contents($imagem->getPathname()));
            $p_sql1->bindValue(':fkempresa', $idEmpresa);
            $p_sql1->bindValue(':nome', $imagem->getClientOriginalName());
            $p_sql1->bindValue(':tipo', $imagem->getMimeType());

            $p_sql1->execute();

            return(Conexao::getInstance()->lastInsertId());
        } catch (Exception $ex) {

            print_r('Erro na Inclusão da Imagem da Empresa\n Erro: ' . $ex);
        }
    }

    public function alterarBD(Empresa $empresa) {

        try {
            $sql = "UPDATE empresa SET razao_social = :razao_social, fantasia = :fantasia, "
                    . "telefone = :telefone, info_add = :info_add, cnpj = cnpj, fkcategoria = :fkcategoria, "
                    . "lagradouro = :lagradouro, numero = :numero, bairro = :bairro, cep = :cep, uf = :uf, "
                    . "cidade = :cidade WHERE idempresa = :idempresa";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(':razao_social', $empresa->getRazaoSocial());
            $p_sql->bindValue(':fantasia', $empresa->getFantasia());
            $p_sql->bindValue(':telefone', $empresa->getTelefone());
            $p_sql->bindValue(':info_add', $empresa->getInfoAdd());
            $p_sql->bindValue(':cnpj', $empresa->getCnpj());
            $p_sql->bindValue(':fkcategoria', $empresa->getCategoria());
            $p_sql->bindValue(':lagradouro', $empresa->getLagradouro());
            $p_sql->bindValue(':lagradouro', $empresa->getLagradouro());
            $p_sql->bindValue(':numero', $empresa->getNumero());
            $p_sql->bindValue(':bairro', $empresa->getBairro());
            $p_sql->bindValue(':cep', $empresa->getCep());
            $p_sql->bindValue(':uf', $empresa->getUf());
            $p_sql->bindValue(':cidade', $empresa->getCidade());
            $p_sql->bindValue(':idempresa', $empresa->getIdEmpresa());

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Alteração da Empresa!\n Erro: ' . $ex);
        }
    }

    public function excluirBD(Empresa $empresa) {

        try {
            $sql = "DELETE FROM empresa WHERE idempresa = :idempresa";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':idempresa', $empresa->getIdEmpresa());

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Exclusão da Empresa!\n Erro: ' . $ex);
        }
    }

    public function listarBD() {
        try {
            $sql = "SELECT * FROM empresa";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Empresa!\n' . $ex);
        }
    }

    public function listarBDCategoria($categoria) {

        try {
            $sql = "SELECT * FROM empresa, categoria WHERE empresa.fkcategoria = categoria.idcategoria "
                    . "AND categoria.descricao = :categoria";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':categoria', $categoria);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Empresa por categoria!\n' . $ex);
        }
    }

}
