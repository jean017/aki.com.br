<?php

namespace Aki\Models;

use Aki\Util\Conexao;
use PDO;

class ModeloIndex {

    function __construct() {
        
    }

    public function listarBuscaBD($busca) {
        try {
            $sql = "SELECT DISTINCT empresa.* FROM empresa, categoria "
                    . "WHERE categoria.categoria LIKE concat('%', :busca, '%') AND categoria.idcategoria = empresa.fkcategoria "
                    . "OR empresa.fantasia LIKE concat('%', :busca, '%') "
                    . "OR empresa.razao_social LIKE concat('%', :busca, '%') "
                    . "OR empresa.cidade LIKE concat('%', :busca, '%') "
                    . "OR empresa.telefone LIKE concat('%', :busca, '%') ORDER BY empresa.fantasia ASC";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':busca', $busca);
            $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {

            print_r('Erro na Listagem da Busca!\n' . $ex);
        }
    }

}
