<?php include "header.php"?>
<p>
<?php

	$arrays = explode(",",$models);
	foreach($arrays as $things)
	{
		$imageATT = array("width" => "100", 
						  "height" => "100");
		echo "<p>".HTML::anchor("/suit/get_suit/".$things, HTML::image('media/Suit/'.$things.".jpg",$imageATT));
		//echo "<p>". HTML::image('media/Suit/'.$things.".jpg");
	}
?>
</p>
<?php include "footer.php"?>