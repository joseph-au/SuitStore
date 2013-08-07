<?php defined('SYSPATH') or die('No direct script access.');
include "header.php";
		$imageATT = array("width" => "100", 
						  "height" => "100");
		echo "<p>".HTML::image('media/Suit/'.$id.".jpg",$imageATT);
?>
</p>
<p>
<?php echo "Item No. ".$id;?>
</p>
<p>
<?php echo $title;?>
</p>
<p>
<?php echo $description;?>
</p>

<?php 
echo Form::open();
echo Form::button('Buy', 'Buy Suit', array('type' => 'submit',
											'action' => 'post',));
echo Form::close();
?>



<?php include "footer.php"?>