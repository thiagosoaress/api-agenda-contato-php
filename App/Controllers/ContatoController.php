<?php

namespace App\Controllers;

use App\Models\ContatoModel;
use App\Models\DAO\MySQL\ContatoDAO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContatoController
{
    public function insertContato(Request $request, Response $response)
    {

        try {

            $data = $request->getParsedBody();

            if (array_key_exists('nome', $data) && array_key_exists('numero', $data) && count($data) == 2) {

                if (!empty($data['nome']) && !empty($data['numero'])) {

                    $contato = new ContatoModel();
                    $contato->setNome($data['nome']);
                    $contato->setNumero($data['numero']);

                    $contatoDao = new ContatoDAO;
                    $result = $contatoDao->insertContato($contato);

                    if (is_a($result, 'Exception')) {
                        throw new \Exception($result->getMessage(), 502);
                    }

                    $response = $response->withJson([
                        'result' => $result,
                        'data' => $data
                    ], 201);

                    return $response;
                } else {

                    throw new \Exception('Verifique se o parâmetro foi passado corretamente', 400);
                }
            } else {

                throw new \Exception('Apenas o parâmetro nome e numro são aceitos', 400);
            }
        } catch (\Exception $e) {

            $response = $response->withJson([
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'data' => $data
            ], $e->getCode());

            return $response;
        }
    }

    public function getContatos(Request $request, Response $response)
    {
        $contatoDao = new ContatoDAO();
        $contatos = $contatoDao->getContatos();
        $response = $response->withJson($contatos);
        return $response;
    }

    public function updateContato(Request $request, Response $response): Response
    {
        try {

            $data = $request->getParsedBody();

            if (array_key_exists('id', $data) && array_key_exists('nome', $data) && count($data) == 2) {

                if ((!empty($data['id'])) && (!empty($data['nome']))) {

                    $contatoModel = new ContatoModel();
                    $contatoModel->setId($data['id']);
                    $contatoModel->setNome($data['nome']);

                    $contatoDao = new ContatoDAO();
                    $result = $contatoDao->updateContato($contatoModel);

                    return $response->withJson([
                        'result' => $result
                    ]);
                } else {

                    throw new \Exception('Verifique se os parâmetros passados estão preenchidos corretamente', 400);
                }

            } else {

                throw new \Exception('Verifique os parâmetros passados', 400);
            }

        } catch (\Exception $e) {

            $response = $response->withJson([
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'data' => $data
            ]);

            return $response;
        }
    }

    public function deleteContato(int $id)
    {

    }
}
