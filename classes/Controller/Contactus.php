<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contactus extends Controller {

	public function action_index()
	{
		$view = View::factory("contactus");
		$message = "";
		if($_POST)
		{
			// call model
			$model = Model::factory("message");
			$model->save_message($_POST["name"],
								 $_POST["email"],
								 $_POST["message"]);
			$message = "Thank you for your message.";
			
		}
		$view->set("message", $message);
		$this->response->body($view);
	}
}