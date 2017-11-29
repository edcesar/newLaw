<?php
namespace GoLaw\Model\Repositories;

use GoLaw\Model\Connection;
use GoLaw\Model\Entities\Cliente;

class ClienteRepository
{
	private $db;
	private $table = 'clientes';

	public function __construct()
	{
	   $this->db = Connection::getConnection();
	}
	
	public function save(Cliente $cliente)
	{
		$query = sprintf(
    		'insert into clientes 
            (nome, email, tipoPagamento) 
             values 
            (:nome, :email, :tipoPagamento)'
		);
		
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':tipoPagamento', $cliente->getFormaPagamento());
		$stmt->execute();

		header('Location: /clientes');
	}
	
    public function update(Cliente $cliente)
    {        
        $query = sprintf(
            'UPDATE clientes
             SET nome = :nome,
                 email = :email,
                 tipoPagamento = :tipoPagamento   
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':id', $cliente->getId());
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':tipoPagamento', $cliente->getFormaPagamento());
        
        $stmt->execute();
        
        header('Location: /clientes');
       
    }
    
    public function delete(Cliente $cliente)
    {
        $query = sprintf(
            'UPDATE clientes
             SET ativo = 0
             WHERE id = :id'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $cliente->getId());
        $stmt->execute();
        
        header('Location: /clientes');
    }
    
    public function find($idCliente)
    {
        
        $query = sprintf(
            'SELECT id, nome, email, tipoPagamento
             FROM clientes
             WHERE id = :id
             AND ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $idCliente);
        $stmt->execute();
        $result =  $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function findAll()
    {
        $query = sprintf(
            'SELECT id, nome, email, tipoPagamento, dataCadastro
             FROM clientes
             WHERE ativo = 1'
            );
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $result;
    }

}