<?php
namespace GoLaw\Model\Repositories;

use GoLaw\Model\Connection;
use GoLaw\Model\Entities\Pedido;

class PedidoRepository
{
    private $db;
    private $table = 'pedidos';
    
    public function __construct()
    {
        $this->db = Connection::getConnection();
    }
    
    public function save(Pedido $Pedido)
    {
        $query = sprintf(
            'insert into pedidos
            (idCliente, idProduto, idFormaPagamento, quantidade, valor, dataCadastro)
             values
            (:idCliente, :idProduto, :idFormaPagamento, :quantidade, :valor, :dataCadastro)'
            );
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':idCliente', $pedido->getNome());
        $stmt->bindValue(':idProduto', $pedido->getValor());
        $stmt->bindValue(':', $pedido->getDescricao());
        $stmt->bindValue(':foto', $pedido->getFoto());
        
        $stmt->execute();
        
        return $this;
    }
    
    public function update(Pedido $Pedido)
    {
        $query = sprintf(
            'UPDATE Pedidos
             SET nome = :nome,
                 valor = :valor,
                 descricao = :descricao,
                 foro = :foto   
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $pedido->getNome());
        $stmt->bindValue(':valor', $pedido->getValor());
        $stmt->bindValue(':descricao', $pedido->getDescricao());
        $stmt->bindValue(':foto', $pedido->getFoto());
        
        $stmt->execute();
        
        return $this;
    }
    
    public function delete(Pedido $Pedido)
    {
        $query = sprintf(
            'UPDATE Pedidos
             SET ativo = 0
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $pedido->getId());
        $stmt->execute();
    }
    
    public function find($idPedido)
    {
        
        $query = sprintf(
            'SELECT id, nome, valor, descricao, foto
             FROM Pedidos
             WHERE id = :id
             AND ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $idPedido);
        $stmt->execute();
        $result =  $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function findAll()
    {
        $query = sprintf(
            'SELECT id, nome, valor, descricao, foto
             FROM pedidos
             WHERE ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result;
    }
    
}