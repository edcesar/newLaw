<?php
namespace GoLaw\Model\Validators;

class ValidaProduto
{
	public static function cadastro($dados)
	{
	    
	  //  var_dump($_FILES); exit;

	    $produto = new \stdClass;
	    
	    $produto->id = filter_var($dados['id'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
	    
	    $produto->nome = filter_var($dados['nome'], FILTER_SANITIZE_STRING);
	    
	    $produto->valor = filter_var($dados['valor'], FILTER_VALIDATE_FLOAT);
	    
	    $produto->descricao = filter_var($dados['descricao'], FILTER_SANITIZE_STRING);
	    
	    $produto->foto = filter_var($_FILES['fotoProduto']['tmp_name'], FILTER_SANITIZE_STRING);
	    
	    return $produto;
	}
}  