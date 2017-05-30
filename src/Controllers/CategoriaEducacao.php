<?php

namespace Aki\Controllers;

use Symfony\Component\HttpFoundation\Response;

class CategoriaEducacao {
    
    private $response;

    public function __construct(Response $response) {
        $this->response = $response;
    }

    public function msgInicial() {
        return $this->response->setContent('Msg inicial Educação!');
    }
    
}
