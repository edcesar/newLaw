<?php
namespace GoLaw\Routing;

class Router
{
	private $config = [];
    private $uri;
    private $param;
    
    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            
            $request = explode('/', $uri);

            $this->uri = '/' . $request[1];
            $this->param = $request[2] ?? null;
        }
    }

    public function route($route, $callback)
    {
        $this->config[$route] = $callback;
    }

    public function run()
    {
       
       if (array_key_exists($this->uri, $this->config)) {
            if ( is_callable($this->config[$this->uri]) ) {
                return $this->config[$this->uri]($this->param);        
            }             
        }
    
        http_response_code(404);
    }
}