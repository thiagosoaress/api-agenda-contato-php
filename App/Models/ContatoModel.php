<?php

namespace App\Models;

class ContatoModel
{
    private $id;
    private $nome;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ContatoModel
    {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): ContatoModel
    {
        $this->nome = $nome;
        return $this;
    }
}