<?php

namespace App\Models\DAO\MySQL;

use App\Models\DAO\MySQL\Conexao;
use App\Models\ContatoModel;

class ContatoDAO
{
    public function insertContato(ContatoModel $contato)
    {
        try {

            $sql = "INSERT INTO contato (nome, numero, fk_codigo_area) VALUES (:nome, :numero, :fk_codigo_area)";
            $conn = Conexao::getConexao();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $contato->getNome());
            $stmt->bindValue(':numero', $contato->getNumero());
            $stmt->bindValue(':fk_codigo_area', $contato->getFkCodigoArea());

            $result = $stmt->execute();

            if (!$result) {
                throw new \Exception('Erro na inserção do registro');
            }

            return $conn->lastInsertId();

        } catch (\Exception $e) {

            return $e;
        }
    }

    public function getContatos(): array
    {
        $conn = Conexao::getConexao();
        $stmt = $conn->query('SELECT * FROM contato;');

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateContato(ContatoModel $contato)
    {
        try {

            $sql = "UPDATE contato SET nome = :nome, numero = :numero WHERE id = :id";
            $conn = Conexao::getConexao();
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $contato->getNome());
            $stmt->bindValue(':numero', $contato->getNumero());
            $stmt->bindValue(':id', $contato->getId());

            $result = $stmt->execute();

            if (!$result) {
                throw new \Exception('Erro na inserção do registro');
            }

            return $result;

        } catch (\Exception $e) {

            return $e;
        }
    }

    public function deleteContato($id)
    {
        $sql = "DELETE FROM contato WHERE id = :id";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        $result = $stmt->execute();
        return $result;
    }
}