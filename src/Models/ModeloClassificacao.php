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
    
    public function alterarBD(Classificacao $classificacao){
        
        try {
            $sql = "UPDATE classificacao SET descricao = :descricao WHERE idclassificacao = :idclassificacao";
                   
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':descricao', $classificacao->getDescricao());
            $p_sql->bindValue(':idclassificacao', $classificacao->getIdClassificacao());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Alteração da Classificação!\n Erro: '.$ex);
        }
    }
    
    public function excluirBD(Classificacao $classificacao){
        
        try{
            $sql = "DELETE FROM classificacao WHERE idclassificacao = :idclassificacao";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':idclassificacao', $classificacao->getIdClassificacao());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        }  catch (Exception $ex){
            
            print_r('Erro na Exclusão da Classificação!\n Erro: '.$ex);
            
        }
    }
    
    public function listarBD (){
        try {
            $sql = "SELECT * FROM classificacao";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            
            return $p_sql->fetchAll(PDO::FETCH_CLASS, "Aki\Entity\Classificacao");
            
        } catch (Exception $ex) {
            
            print_r('Erro na Listagem de Classificação!\n' .$ex);
            
        }
    }

}
