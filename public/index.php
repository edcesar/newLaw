<?php

require_once __DIR__ . '/../bootstrap.php';

use GoLaw\Routing\Router;
use GoLaw\Controllers\ClienteController;
use GoLaw\Controllers\ProdutoController;

$cliente = new ClienteController;
$produto = new ProdutoController;

$app = new Router();


/** Rotas Clientes */
    
    /* Views  */

        $app->route('/clientes', function() use($cliente){
            $cliente->listarClientes();
        });
            
        $app->route('/cliente', function($idCliente) use($cliente){
            $cliente->localizar($idCliente);
        });
        
        $app->route('/cadastrar-cliente', function() use($cliente){
            $cliente->cadastrarClientes();
        });

    /* GRUD  */    
        
        $app->route('/criar-cliente', function() use($cliente){
        	$cliente->criarCliente();
        });
        
        $app->route('/alterarCliente', function($idCliente) use($cliente){
            $cliente->alterarCliente($idCliente);
        });


/**  Rotas Produtos  */
    
        /* Views  */
            $app->route('/produto', function($idProduto) use($produto){
                $produto->localizar($idProduto);
            });
                
            $app->route('/produtos', function() use($produto){
                $produto->listarProdutos();
            });
            
            $app->route('/cadastrar-produto', function() use($produto){
                $produto->cadastrarProduto();
            });
            
            $app->route('/', function() use($produto){
                $produto->listarProdutos();
            });
                        
            
       /*  GRUD */
            
            $app->route('/criarProduto', function() use($produto){
                $produto->criarProduto();
            });
            
            $app->route('/alterarProduto', function() use($produto){
                $produto->alterarProduto();
            });

$app->run();