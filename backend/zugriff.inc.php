<?php
$db = @mysqli_connect("localhost", "root", "") or die("Verbindung zu MySQL gescheitert!");
mysqli_set_charset($db,"utf8");
@mysqli_select_db($db, "blog");
?>