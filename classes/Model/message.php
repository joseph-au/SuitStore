<?php defined('SYSPATH') or die('No direct script access.');

class Model_Message extends Model {
	
	public function save_message($name, $email, $message)
	{
		$couchhostname =  Kohana::$config->load('couch.default.hostname');
		$json_ready = json_encode(array("name" => $name,
										"email" => $email,
										"message" => $message));
		$request = Request::factory($couchhostname.'messages')->method("POST")
		->body($json_ready)
		->headers('Content-Type', 'application/json')
		->execute();
		//return json_decode($request, true);
	}
}