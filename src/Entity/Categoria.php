<?php

namespace Aki\Entity;

class Categoria {
    
    private $idCategoria;
    private $descricao;
    
    function __construct() {
        
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
