<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Suit extends Controller {
	
	public function action_index()
	{
		//echo "here";
		$model = Model::factory("Suit")->get_all_suit();
		$view = View::factory("suit");
		$view->set("models", $model["values"]);
		$this->response->body($view);		
	}
	
	public function action_get_suit()
	{
		$id = $this->request->param('id');
		if($_POST)
		{
			//save order
			$model = Model::factory("Suit")->add_cart($id);
			
			//show cart
			$cart_route = Route::get('cart')->uri();
			$this->redirect($cart_route);
		}
		else
		{
			
			$detail = Model::factory("Suit")->get_suit($id);
			$view = View::factory("suit_detail");
			$view->set("id", $detail["_id"]);
			$view->set("title", $detail["title"]);
			$view->set("description", $detail["description"]);
			$this->response->body($view);
		}
	}
}