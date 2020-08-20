<?php
require_once "/etc/mysql_zugriff/zugriff.inc.php";
session_start();
if (isset($_SESSION['perms']) and $_SESSION['perms'] & 2 and isset($_GET['id'])) {
    echo "DELETE FROM entries WHERE id='" . mysqli_real_escape_string($db, $_GET['id']) . "';";
    mysqli_query($db, "DELETE FROM entries WHERE id='" . mysqli_real_escape_string($db, $_GET['id']) . "';");
}
header("Location: .");
