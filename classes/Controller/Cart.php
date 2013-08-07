<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cart extends Controller {

	public function action_index()
	{
		$view = View::factory("cart");
		if($_POST)
		{
			//submit order
			$post = Validation::factory($_POST)
			->rule("name", "not_empty")
			->rule("email", "not_empty")
			->rule("email", "email")
			->rule("phone", "not_empty")
			->rule("phone", "phone");
			if($post->check())
			{
				//save order
				$model = Model::factory("cart")->save_order($_POST["name"],
															$_POST["email"],
															$_POST["phone"]);
				//clear session
				$session = Session::instance();
				$session->destroy();
				$view->set("success", "true");
			}
			else
			{
				//display error
				$error = $post->errors("order");
				$view->set("error", $error);
				
			}
		}
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