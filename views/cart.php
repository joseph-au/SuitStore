<?php defined('SYSPATH') or die('No direct script access.');
include "header.php";?>
<p>

<?php  
	   if(isset($success))
	   {
	   		echo "Thank you for your order!";
	   }
	   else if(!isset($items))
	   {
			echo "No items in cart";	   		
	   }
	   
	   else
	   {
	   		echo "<table>";
			echo "<tr>";
	   		echo "<tr>";
	   		echo "<td>";
	   		echo "Item No.";
	   		echo "</td>";
	   		echo "<td>";
	   		echo "Quantity";
			echo "</td>";
	   		foreach($items as $key => $value)
			{
			echo "<tr>";
			echo "<td>";
				echo $key;		
			echo "</td>";
			echo "<td>";
				echo $value;		
			echo "</td>";
			echo "<td>";
				$cart_route = Route::get('cart')->uri(array('action' => 'remove','id' => $key));
				echo HTML::anchor($cart_route, "Remove Item");
			echo "</td>";
			echo "</tr>";
			}
			echo "</table>";
			
			echo "<p>";
			echo "<H1>Submit Order</H1>";
			if(isset($error))
	   		{
	   			echo "<ul>";
	   			foreach($error as $err)
	   			{	
	   				echo "<li>";
	   				echo $err;
					echo "</li>";
	   			}
	   			echo "</ul>";
	  		}
			echo Form::open();
			echo Form::label("Name", "Name*");
			echo Form::input("name");
			echo "</br>";
			echo Form::label("Email", "Email*");
			echo Form::input("email");
			echo "</br>";
			echo Form::label("Phone", "Phone*");
			echo Form::input("phone");
			echo "</br>";
			echo Form::button('Submit Order', 'Submit Order', array('type' => 'submit',
											'action' => 'post',));	
			echo Form::close();
			
			echo "<p>";
	   }
?>

</p>
<?php include "footer.php";?>