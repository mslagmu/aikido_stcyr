<?
	$message = file_get_contents("content/message.php");
	
	if  ($message !="") {
		$tab = explode("\n",$message);
		echo '<div class="announce">';
		foreach($tab as $t){
			if ($t !="" ) echo "<p>$t</p>";
		}
		echo '</div>';
	} 

?>
<div style="text-align:center;">
<? image("image_034"); ?>
</div>



