<?php

namespace Aki\Entity;

class Usuario{
    
    public $idUsuario;
    public $usuario;
    public $senha;
    public $nome;
    public $email;
    
    function __construct() {
        
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}

