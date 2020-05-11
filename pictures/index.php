<?php
if(isset($_GET["id"])){
	if(intval($_GET["id"])){
		$remoteImage = "/var/www/pictures/".$_GET["id"];
	} else {
		die();
	}
	$imginfo = getimagesize($remoteImage);
	header("Content-type: {$imginfo['mime']}");
	readfile($remoteImage);
}
?>
