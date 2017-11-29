<?php
namespace GoLaw\Model\Entities;

class Cliente
{
    private $id;
	private $nome;
    private $email;
    private $formaPagamento;
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
        
    }

    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
        return $this;
    }


}