<?php

namespace App\Models;

class ContatoModel
{
    private $id;
    private $nome;
    private $fk_codigo_area;
    private $numero;

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

    public function getFkCodigoArea(): int
    {
        return $this->fk_codigo_area;
    }

    public function setFkCodigoArea(int $fk_codigo_area): ContatoModel
    {
        $this->fk_codigo_area = $fk_codigo_area;
        return $this;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): ContatoModel
    {
        $this->numero = $numero;
        return $this;
    }

}