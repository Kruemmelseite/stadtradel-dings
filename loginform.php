<?php if(!isset($_SESSION['login']) or $_SESSION['login']===false) {?>
<form action="login.php" method="post" id="loginform">
<input type="text" name="user" placeholder="Benutzername"><br>
<input type="password" name="pwd" placeholder="Passwort"><br>
<input type="submit" value="Log in" id="submit">
</form>
<?php } else {?>
<button id="li_button" onclick="window.location.replace('logoff.php')">Ausloggen</button>
<?php if($_SESSION['perms'] != 0) {?>
<button id="li_button" onclick="window.location.replace('new_entry.php')">Neuer Eintrag</button>
<?php
if($_SESSION['perms'] > 2 and $_SESSION['perms'] != 4){?><button id="li_button" onclick="window.location.replace('backend')">Backend</button>
<?php
}}}
?>