<?php

namespace App\Controllers;

use App\Models\ContatoModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\DAO\MySQL\ContatoDAO;

class ContatoController
{
    public function insertContato(Request $request, Response $response)
    {

        $data = $request->getParsedBody();

        $contato = new ContatoModel();
        $contato->setNome($data['nome']);

        $contatoDao = new ContatoDAO;
        $result = $contatoDao->insertContato($contato);

        $response = $response->withJson([
            'id' => $result,
            'data' => $data
        ], 201);

        return $response;
    }

    public function getContatos(Request $request, Response $response)
    {
        $contatoDao = new ContatoDAO();
        $contatos = $contatoDao->getContatos();
        $response = $response->withJson($contatos);
        return $response;
    }
}