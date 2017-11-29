<?php
namespace GoLaw\Model\Validators;

class ValidaCliente
{
	public static function valida($dados)
	{

	    $cliente = new \stdClass;
	    
	    $cliente->id = filter_var($dados['id'], FILTER_SANITIZE_NUMBER_INT);
	    
	    $cliente->nome = filter_var($dados['nome'], FILTER_SANITIZE_STRING);
	    
	    $cliente->email = filter_var($dados['email'], FILTER_VALIDATE_EMAIL);
	    
	    $cliente->tipoPagamento = filter_var($dados['tipoPagamento'], FILTER_SANITIZE_STRING);
	    
	    return $cliente;
	}
}  