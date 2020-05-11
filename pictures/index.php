
<?php
session_start();
if($_SESSION["perms"] & 8) {
if(isset($_GET["id"])){
	if(intval($_GET["id"])){
		try {
			$remoteImage = "/var/www/pictures/".$_GET["id"];
		} catch (Exception $e) {
			die("A picture with this ID doesn't exist");
		}
	} else {
		die("A picture with this ID doesn't exist");
	}
	$imginfo = getimagesize($remoteImage);
	header("Content-type: {$imginfo['mime']}");
    readfile($remoteImage);
} else {?>
<title></title>
<style type="text/css">
	body {
		background:lightgrey;
		margin-top: 0;
		margin-bottom: 0;
	}
	#wrapper {
		background:grey;
		width: 60%;
		margin:auto;
		padding:0.5%;
		height:98%;
	}
</style>
<div id="wrapper">
	<div align=right>
		<?php include("../login.php");?>
	</div>
</div>

<?php
	}
}
?>