<?php

namespace Aki\Util;

class Sessao {

    function __construct() {
        
    }

    public function start() {
        return session_start();
    }

    public function add($chave, $valor) {
        $_SESSION['noh'][$chave] = $valor;
    }

    public function get($chave) {
        if (isset($_SESSION['noh'][$chave])) {
            return $_SESSION['noh'][$chave];
        } else
            return "";
    }

    public function rem($chave) {
        session_unset($_SESSION['noh'][$chave]);
    }

    public function del() {
        session_unset($_SESSION['noh']);
        session_destroy();
    }

}
