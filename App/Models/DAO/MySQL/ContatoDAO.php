<?php

namespace App\Models\DAO\MySQL;

use App\Models\DAO\MySQL\Conexao;
use App\Models\ContatoModel;

class ContatoDAO
{
    public function insertContato(ContatoModel $contato): int
    {
        $sql = "INSERT INTO contato (nome) VALUES (:nome)";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nome', $contato->getNome());

        $stmt->execute();

        return $conn->lastInsertId();
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
        $sql = "UPDATE contato SET nome = :nome WHERE id = :id";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nome', $contato->getNome());
        $stmt->bindValue(':id', $contato->getId());

        $result = $stmt->execute();
        return $result;
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