<?php
require('../edit/zugriff.inc.php');
if(basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    session_start();
}
if(isset($_SESSION['login']) and $_SESSION['login']===true and isset($_SESSION['perms']) and $_SESSION['perms'] & 4) {
    if(isset($_POST['id'])) {
        $id=mysqli_real_escape_string($db, $_POST['id']);
        mysqli_query($db, "DELETE FROM users WHERE id=$id");
    }
}
header("Location: .");