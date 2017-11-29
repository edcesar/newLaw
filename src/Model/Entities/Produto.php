<?php
namespace GoLaw\Model\Entities;

class Produto
{
    private $id;
    private $nome;
    private $valor;
    private $descricao;
    private $foto;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;    
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

}