<?php defined('SYSPATH') or die('No direct script access.');

class Model_Cart extends Model {
	
	public function save_order($name, $email, $phone)
	{
		$couchhostname =  Kohana::$config->load('couch.default.hostname');
		$data_array = array("name" => $name,
				 			"email" => $email,
							"phone" => $phone);
		$session = Session::instance();
		if($session->get("items"))
		{
			$items = $session->get("items");
			foreach($items as $key => $value)
			{
				$data_array[$key] = $value;
			}
		}
		$json_ready = json_encode($data_array);
		$request = Request::factory($couchhostname.'orders')->method("POST")
		->body($json_ready)
		->headers('Content-Type', 'application/json')
		->execute();
		//return json_decode($request, true);
	}
}