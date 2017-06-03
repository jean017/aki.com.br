<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;
use Aki\Entity\Empresa;
use Aki\Models\ModeloCategoria;

class ModeloEmpresa {

    function __construct() {
        
    }

    public function inserirBD(Empresa $empresa) {
        
       // echo $empresa->getCategoria();
        
        try {

            $sql = "INSERT INTO empresa (razao_social, fantasia, telefone, info_add, cnpj, fkcategoria, "
                    . "lagradouro, numero,bairro, cep, uf, cidade, email, imagem) "
                    . "VALUES (:razao_social, :fantasia, :telefone, :info_add, :cnpj, :fkcategoria, "
                    . ":lagradouro, :numero, :bairro, :cep, :uf, :cidade, :email, :imagem)";


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
            $p_sql->bindValue('imagem', $empresa->getFoto());

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Inclusão da Empresa!\n Erro: ' . $ex);
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

            return $p_sql->fetchAll(PDO::FETCH_CLASS, "Aki\Entity\Empresa");
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Empresa!\n' . $ex);
        }
    }

    public function listarCategorias() {
        try {
            $sql = "SELECT * FROM categoria";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Categorias!\n' . $ex);
        }
    }

}
