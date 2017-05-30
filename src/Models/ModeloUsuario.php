<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;
use Aki\Entity\Usuario;

class ModeloUsuario {

    function __construct() {
        
    }

    public function inserirBD(Usuario $usuario) {
             
        try {
            
            $sql = "INSERT INTO usuario (usuario, senha, nome, email) VALUES (:usuario, md5(:senha), :nome, :email);";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':usuario', $usuario->getUsuario());
            $p_sql->bindValue(':senha', $usuario->getSenha().'maps');
            $p_sql->bindValue(':nome', $usuario->getNome());
            $p_sql->bindValue(':email', $usuario->getEmail());
            
            $p_sql->execute();
            
             return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Inclusão de Usúario!\n Erro: '.$ex);
        }
    }
    
    public function alterarBD(Usuario $usuario){
        
        try {
            $sql = "UPDATE usuario SET usuario = :usuario, senha = md5(:senha), nome = :nome, "
                    . "email = :email WHERE idusuario = :idusuario";
                   
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':usuario', $usuario->getUsuario());
            $p_sql->bindValue(':senha'.'aki', $usuario->getSenha());
            $p_sql->bindValue(':nome', $usuario->getNome());
            $p_sql->bindValue(':email', $usuario->getEmail());
            $p_sql->bindValue(':idusuario', $usuario->getIdUsuario());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        } catch (Exception $ex) {
            
            print_r('Erro na Alteração de Usúario!\n Erro: '.$ex);
        }
    }
    
    public function excluirBD(Usuario $usuario){
        
        try{
            $sql = "DELETE FROM usuario WHERE idusuario = :idusuario";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(':idusuario', $usuario->getIdUsuario());
            
            $p_sql->execute();
            
            return Conexao::getInstance()->lastInsertId();
            
        }  catch (Exception $ex){
            
            print_r('Erro na Exclusão de Usúario!\n Erro: '.$ex);
            
        }
    }
    
    public function listarBD (){
        try {
            $sql = "SELECT * FROM usuario";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            
            return $p_sql->fetchAll(PDO::FETCH_CLASS, "Aki\Entity\Usuario");
            
        } catch (Exception $ex) {
            
            print_r('Erro na Listagem de Categoria!\n' .$ex);
            
        }
    }

}
