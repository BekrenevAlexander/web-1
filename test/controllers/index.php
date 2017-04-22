<?php
// контролер
Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "general_layouts";
	
	// главный экшен
	// если в url нет явно указанного экшена, то по дефолту вызывается index
	function index() 
	{
		//if (!isset($_SESSION['token']))
		$this->template->view('index');
		//else
		//{
		//$this->layouts = "first_lyyouts";
	}
	
}


