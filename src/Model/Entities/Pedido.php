<?php
namespace GoLaw\Model\Entities;

class Pedido
{
    private $id;
    private $quantidade;
    private $valor;
    
    /**
     * @var Cliente $cliente
     */
    private $cliente;
    
    /**
     * @var Produto $produto
     */
    private $produtos;
    private $dataCadastro;
    
    
    public function getId()
    {
        return $this->id;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;
        return $this;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

}