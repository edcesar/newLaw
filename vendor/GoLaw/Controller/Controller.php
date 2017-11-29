<?php
namespace GoLaw\Controller;
use GoLaw\Db\Db;

class Controller
{
	protected $viewPath = '/../../../src/Views/';
	protected $db;
	protected $data;

	public function __construct()
	{
		$this->db = new Db;
	}

	public function render($view, $data = null)
	{
	    $this->data = $data;
		require_once __DIR__ . $this->viewPath . $view . '.phtml';
	}
}