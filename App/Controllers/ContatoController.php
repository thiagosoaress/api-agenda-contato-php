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

        try {

            $data = $request->getParsedBody();

            if (array_key_exists('nome', $data) && count($data) == 1) {

                if (isset($data['nome']) && !empty($data['nome'])) {

                    $contato = new ContatoModel();
                    $contato->setNome($data['nome']);

                    $contatoDao = new ContatoDAO;
                    $result = $contatoDao->insertContato($contato);

                    $response = $response->withJson([
                        'id' => $result,
                        'data' => $data
                    ], 201);

                    return $response;
                } else {

                    throw new \Exception('Verifique se o parâmetro foi passado corretamente', 400);
                }
            } else {

                throw new \Exception('Apenas o parâmetro nome é aceito', 400);
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

    public function updateContato(Request $request, Response $response)
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
}
