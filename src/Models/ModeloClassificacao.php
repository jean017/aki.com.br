<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;
use Aki\Entity\Classificacao;

class ModeloClassificacao {

    function __construct() {
        
    }

    public function inserirBD(Classificacao $classificacao) {
             
        try {
            
            $sql = "INSERT INTO classificacao (classificacao, empresa) VALUES(:classificacao, :empresa)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':classificacao', $classificacao->getClassificacao());
            $p_sql->bindValue(':empresa', $classificacao->getEmpresa());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Inclusão da Classificacao!\n Erro: '.$ex);
        }
    }
    
            public function excluirBD($empresa) {

        try {
            $sql = "DELETE FROM classificacao WHERE empresa = :empresa";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':empresa', $empresa);

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Exclusão da Classificacao Empresa!\n Erro: ' . $ex);
        }
    }
    
    public function listarMediaBD ($empresa){
        try {
            $sql = "SELECT AVG(classificacao) FROM classificacao WHERE empresa = :empresa";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':empresa', $empresa);
            $p_sql->execute();
            
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $ex) {
            
            print_r('Erro na Listagem de Classificação!\n' .$ex);
            
        }
    }

}
