<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Checkout extends Controller {

	public function action_index()
	{
		//check if logged in
	
		
		$view = View::factory("cart");
		$session = Session::instance();
		if($session->get("items"))
		{
			$items = $session->get("items");
			$view->set("items", $items);
		}
		$this->response->body($view);
	}
	
	public function action_remove()
	{

		$id = $this->request->param("id");
		$view = View::factory("cart");
		$model = Model::factory('suit')->remove_cart($id);
		$session = Session::instance();
		if($session->get("items"))
		{
			$items = $session->get("items");
			$view->set("items", $items);
		}
		$this->response->body($view);
	}
}