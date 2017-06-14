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

            $sql = "INSERT INTO usuario (usuario, senha, nome, email) VALUES (:usuario, md5(:senha), :nome, :email)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(':usuario', $usuario->getUsuario());
            $p_sql->bindValue(':senha', $usuario->getSenha() . 'maps');
            $p_sql->bindValue(':nome', $usuario->getNome());
            $p_sql->bindValue(':email', $usuario->getEmail());

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Inclusão de Usúario!\n Erro: ' . $ex);
        }
    }

    public function alterarBD(Usuario $usuario) {

        try {
            $sql = "UPDATE usuario SET usuario = :usuario, senha = md5(:senha), nome = :nome, "
                    . "email = :email WHERE idusuario = :idusuario";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(':usuario', $usuario->getUsuario());
            $p_sql->bindValue(':senha', $usuario->getSenha() . 'maps');
            $p_sql->bindValue(':nome', $usuario->getNome());
            $p_sql->bindValue(':email', $usuario->getEmail());
            $p_sql->bindValue(':idusuario', $usuario->getIdUsuario());

            $p_sql->execute();

            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {

            print_r('Erro na Alteração de Usúario!\n Erro: ' . $ex);
        }
    }

    public function listarBD() {
        try {
            $sql = "SELECT * FROM usuario";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Usuario!\n' . $ex);
        }
    }
    
      public function listarBDUsuario($usuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE idusuario = :idusuario";

            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(':idusuario', $usuario);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem de Usuario por ID!\n' . $ex);
        }
    }

    public function Login(Usuario $usuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = md5(:senha) OR email = :email AND senha = md5(:senha)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":usuario", $usuario->getUsuario());
            $p_sql->bindValue(":senha", $usuario->getSenha() . 'maps');
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->execute();

            if ($p_sql->rowCount() == 1) {

                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

}
