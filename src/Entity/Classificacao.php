<?php

namespace Aki\Entity;

class Classificacao {
    
    private $idClassificacao;
    private $classificacao;
    private $empresa;
    
    function __construct() {
        
    }

    function getIdClassificacao() {
        return $this->idClassificacao;
    }

    function getClassificacao() {
        return $this->classificacao;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setIdClassificacao($idClassificacao) {
        $this->idClassificacao = $idClassificacao;
    }

    function setClassificacao($classificacao) {
        $this->classificacao = $classificacao;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


}
