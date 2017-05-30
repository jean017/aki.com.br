<?php

namespace Aki\Entity;

class Classificacao {
    
    private $idClassificacao;
    private $descricao;
    
    function __construct() {
        
    }

    function getIdClassificacao() {
        return $this->idClassificacao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdClassificacao($idClassificacao) {
        $this->idClassificacao = $idClassificacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
