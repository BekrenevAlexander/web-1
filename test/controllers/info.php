<?php
include('C:\xampp\htdocs\test\classes\Authorization.php');
include('C:\xampp\htdocs\test\classes\api_functions.php');
			
			
Class Controller_Info Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	// главный экшен
	// если в url нет явно указанного экшена, то по дефолту вызывается index
	function index() 
	{
		session_start();
		$token = new Connection(APP_ID,APP_SECRET,APP_MASK);
		$_SESSION['token'] = $token;						
		$token->get_code();	
		
		//$this->template->view('index');
	}
	
	function view1 ()
	{
		
		session_start ();
		$token = $_SESSION['token'];
		$token->set_code($_GET['code']);
		$token->get_token();
		
		$_SESSION['token'] = $token;
		$methods = new API_FUNCTIONS();
		$obj = $methods->get_object('users.get','&user_ids='.$token->user_id.'&fields='.USER_INFO.'&access_token ='.$token->get_token_true());
		
		//print_r($obj);
		//print_r(json_decode($obj));
		
		$this->template->vars('var', $obj->response[0]);	
		$this->template->view('index');
	}
	
	
}