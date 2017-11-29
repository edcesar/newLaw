<?php
namespace GoLaw\Model\Repositories;

use GoLaw\Model\Connection;
use GoLaw\Model\Entities\Produto;

class ProdutoRepository
{
    private $db;
    private $table = 'produtos';
    
    public function __construct()
    {
        $this->db = Connection::getConnection();
    }
    
    public function save(Produto $produto)
    {
        $query = sprintf(
            'insert into produtos
            (nome, valor, descricao, foto)
             values
            (:nome, :valor, :descricao, :foto)'
            );
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':valor', $produto->getValor());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':foto', $produto->getFoto());
        
        $stmt->execute();
        
        header('Location: /');
    }
    
    public function update(Produto $produto)
    {
        $query = sprintf(
            'UPDATE produtos
             SET nome = :nome,
                 valor = :valor,
                 descricao = :descricao,
                 foto = :foto   
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':id', $produto->getId());
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':valor', $produto->getValor());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':foto', $produto->getFoto());
        
        $stmt->execute();
        
        header('Location: /');
    }
    
    public function delete(Produto $produto)
    {
        $query = sprintf(
            'UPDATE produtos
             SET ativo = 0
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $produto->getId());
        $stmt->execute();
        
        header('Location: /');
    }
    
    public function find($idProduto)
    {
        
        $query = sprintf(
            'SELECT id, nome, valor, descricao, foto
             FROM produtos
             WHERE id = :id
             AND ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $idProduto);
        $stmt->execute();
        $result =  $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function findAll()
    {
        $query = sprintf(
            'SELECT id, nome, valor, descricao, foto
             FROM produtos
             WHERE ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $result;
    }
    
}