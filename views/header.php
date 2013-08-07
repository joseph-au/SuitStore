<html>
<head>
<title>
<?php echo URL::base()?>
</title>
<?php echo HTML::style('media/css/main.css'); ?>
</head>
<body>
	<ul id="navlist">
	<li><a href=<?php echo URL::base()?>>Home</a></li>
	<li><?php 
			$suit_route = Route::get('suit')->uri();
			echo HTML::anchor($suit_route,'Suit');?></li>					
	<li>
		<?php	
			$item = 0;
			$session = Session::instance();
			if($session->get("total_num"))
			{
				$item = $session->get("total_num");
			}
			$cart_route = Route::get('cart')->uri();
			echo HTML::anchor($cart_route,'Cart'.' ('.$item.')');
		?>
	</li>
	<li>
		<?php	
			$cart_route = Route::get('contactus')->uri();
			echo HTML::anchor($cart_route,'Contact Us');?>
	</li>
	</ul>
