<?php defined('SYSPATH') or die('No direct script access.');

class Model_Suit extends Model {
	
	public function get_all_suit()
	{
		$couchhostname =  Kohana::$config->load('couch.default.hostname');
		$request = Request::factory($couchhostname.'indochino/suits')->execute();
		return json_decode($request, true);
	}
	
	public function get_suit($id)
	{
		$couchhostname =  Kohana::$config->load('couch.default.hostname');
		$request = Request::factory($couchhostname.'indochino/'.$id)->execute();
		return json_decode($request, true);
	}
	
	public function add_cart($id)
	{
		$session = Session::instance();
		$total_num = 1;
		if($session->get("total_num"))
		{
			$total_num = $session->get("total_num");
			$total_num = $total_num + 1;
		}
		$session->set("total_num", $total_num);
		$items = "";
		if($session->get("items"))
		{
			$items = $session->get("items");
			if(array_key_exists($id, $items))
			{
				$items[$id] = $items[$id] + 1;
			}
			else
			{
				$items[$id] = 1;
			}
		}
		else
		{
			$items[$id] = 1;
		}
		$session->set("items", $items);
	}
	
	public function remove_cart($id)
	{
		$session = Session::instance();
		if($session->get("total_num"))
		{
			$total_num = $session->get("total_num");
			$total_num = $total_num - 1;
			$session->set("total_num", $total_num);
		}
		if($session->get("items"))
		{
			$items = $session->get("items");
			if(array_key_exists($id, $items))
			{
				$items[$id] = $items[$id] - 1;
				if($items[$id] == 0)
				{
					unset($items[$id]);
				}
			}			
			$session->set("items", $items);
		}
		
	}
}