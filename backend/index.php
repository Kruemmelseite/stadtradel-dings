<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION['perms'] & 4) {
?>
<button onclick="window.location.replace('..')">Home</button>
<?php
include('register.php');
echo "<p style='width: 100%; background-color: black; height: 1%'></p>";
include('edit.php');
}
?>