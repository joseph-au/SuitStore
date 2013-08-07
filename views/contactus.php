<?php
	include "header.php";
	
	echo "<p>";
	echo $message;
	echo "</p>";
	echo Form::open();
	echo Form::label("Name ");
	echo Form::input("name");
	echo "</br>";
	echo Form::label("Email ");
	echo Form::input("email");
	echo "</br>";
	echo Form::label("Message ");
	echo Form::input("message");
	echo "</br>";
	echo Form::button('Send', 'Send Message', array('type' => 'submit',
													'action' => 'post',));
	echo Form::close();
	include "footer.php";
?>
