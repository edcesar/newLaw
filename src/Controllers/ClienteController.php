<?php
namespace GoLaw\Controllers;

use GoLaw\Controller\Controller;
use GoLaw\Model\Entities\Cliente;
use GoLaw\Model\Repositories\ClienteRepository;
use GoLaw\Model\Validators\ValidaCliente;

class ClienteController extends Controller
{
	/**
	 * public render();
	 */

	private $cliente;
	private $clienteRepository;

	public function __construct()
	{
		$this->cliente = new Cliente;
		$this->clienteRepository = new ClienteRepository;
	}

	public function criarCliente()
	{
	   $cliente = ValidaCliente::valida($_POST['cliente']);
	    
	   $this->cliente->setNome($cliente->nome);
	   $this->cliente->setEmail($cliente->email);
	   $this->cliente->setFormaPagamento($cliente->tipoPagamento);
	  
	   $this->clienteRepository->save($this->cliente);
	}
	
	public function alterarCliente()
	{
	    $cliente = ValidaCliente::valida($_POST['cliente']);
	    
	    $this->cliente->setId($cliente->id);
	    $this->cliente->setNome($cliente->nome);
	    $this->cliente->setEmail($cliente->email);
	    $this->cliente->setFormaPagamento($cliente->tipoPagamento);
	    
	    $this->clienteRepository->update($this->cliente);
	    
	}
	
	public function listarClientes()
	{
	    $this->render('cliente/listarClientes', $this->clienteRepository->findAll());
	}
	
	public function localizar($idCliente)
	{
	    $this->render('cliente/editarClientes', $this->clienteRepository->find($idCliente));
	}

	
	public function cadastrarClientes()
	{
		$this->render('cliente/cadastrarClientes');
	}


}