<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api/v1', function () {

    $this->get('/categoria', function (Request $request, Response $response) {

        return $response->withJson(['categoria' => 'ok']);
    });

});