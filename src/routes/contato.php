<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ContatoController;

$app->group('/api/v1', function () {

    $this->post('/contato', ContatoController::class . ':insertContato');
    $this->get('/contato', ContatoController::class . ':getContatos');
    
});

