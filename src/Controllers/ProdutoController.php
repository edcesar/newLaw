<?php
namespace GoLaw\Controllers;

use GoLaw\Controller\Controller;
use GoLaw\Model\Entities\Produto;
use GoLaw\Model\Repositories\ProdutoRepository;
use GoLaw\Model\Validators\ValidaProduto;
use GoLaw\Model\Upload;

class ProdutoController extends Controller
{
	/**
	 * public render();
	 */

	private $produto;
	private $produtoRepository;

	public function __construct()
	{
		$this->produto = new Produto;
		$this->produtoRepository = new ProdutoRepository;
	}

	public function index()
	{
		$this->render('home');
	}

	public function cadastrarProduto()
	{
		$this->render('produto/cadastrarProduto');
	}

	public function criarProduto()
	{
	     
	    Upload::execute('fotoProduto');
	    
	    $produto = ValidaProduto::cadastro($_POST['produto']);

		$this->produto->setNome($produto->nome);
		$this->produto->setValor($produto->valor);
		$this->produto->setDescricao($produto->descricao);
		$this->produto->setFoto($produto->foto);
		
		$this->produtoRepository->save($this->produto);
	}
	
	public function alterarProduto()
	{
	    $produto = ValidaProduto::cadastro($_POST['produto']);
	    
	    $this->produto->setId($produto->id);
	    $this->produto->setNome($produto->nome);
	    $this->produto->setValor($produto->valor);
	    $this->produto->setDescricao($produto->descricao);
	    $this->produto->setFoto($produto->foto);
	    
	    $this->produtoRepository->update($this->produto);
	}
	
	public function localizar($id)
	{
	    $this->render('produto/editarProduto', $this->produtoRepository->find($id));
	}
	
	public function listarProdutos()
	{
	    $this->render('home', $this->produtoRepository->findAll());
	}
	
}