<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;
use Aki\Entity\Categoria;

class ModeloCategoria {

    function __construct() {
        
    }

    public function inserirBD(Categoria $categoria) {
             
        try {
            
            $sql = "INSERT INTO categoria (descricao) VALUES (:descricao)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':descricao', $categoria->getDescricao());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Inclusão da Categoria!\n Erro: '.$ex);
        }
    }
    
    public function alterarBD(Categoria $categoria){
        
        try {
            $sql = "UPDATE categoria SET descricao = :descricao WHERE idcategoria = :idcategoria";
                   
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':descricao', $categoria->getDescricao());
            $p_sql->bindValue(':idcategoria', $categoria->getIdCategoria());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Alteração da Categoria!\n Erro: '.$ex);
        }
    }
    
    public function excluirBD(Categoria $categoria){
        
        try{
            $sql = "DELETE FROM categoria WHERE idcategoria = :idcategoria";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':idcategoria', $categoria->getIdCategoria());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        }  catch (Exception $ex){
            
            print_r('Erro na Exclusão da Categoria!\n Erro: '.$ex);
            
        }
    }
    
    public function listarBD (){
        try {
            $sql = "SELECT * FROM categoria";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            
            return $p_sql->fetchAll(PDO::FETCH_CLASS, "Aki\Entity\Categoria");
            
        } catch (Exception $ex) {
            
            print_r('Erro na Listagem de Categoria!\n' .$ex);
            
        }
    }
    
       public function retornaIdBD ($categoria){

        try {
            $sql = "SELECT idcategoria FROM categoria WHERE descricao = :categoria";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':categoria', $categoria);
            
            $p_sql->execute();
            
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            
            print_r('Erro na Retorna ID de Categoria!\n' .$ex);
            
        }
    }

}
