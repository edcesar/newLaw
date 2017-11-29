<?php
namespace GoLaw\Model\Validators;

class ValidaPedido
{
	public static function cadastro($dados)
	{
	    $pedido = new \stdClass;
	    $pedido->quantidade = filter_var($dados['valor'], FILTER_VALIDATE_INT);
	    $pedido->valor = filter_var($dados['valor'], FILTER_VALIDATE_FLOAT);
	    
	    return $pedido;
	}
}  