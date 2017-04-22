<?php

include('C:\xampp\htdocs\test\classes\api_functions.php');
include('C:\xampp\htdocs\test\classes\Authorization.php');

Class Controller_Photos Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	// главный экшен
	// если в url нет явно указанного экшена, то по дефолту вызывается index
	
	function index() 
	{
		session_start();
		//echo $_SESSION['token']->user_id;
		//echo $_SESSION['token']->get_token_true();
		
		$tt = new API_FUNCTIONS();
		$this->template->vars('var',$tt->get_object("photos.getAll","owner_id=".$_SESSION['token']->user_id."&access_token=".$_SESSION['token']->token)->response);		
			
		$this->template->view('index');
	}
	
}
