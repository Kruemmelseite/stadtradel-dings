<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    session_start();
    echo "<button onclick=\"window.location.replace('..')\">Home</button><button onclick=\"window.location.replace('.')\">Backend</button>";
}
require_once("/etc/mysql_zugriff/zugriff.inc.php");
if(isset($_SESSION['perms']) and $_SESSION['perms'] == 3) {
    if(empty($_POST['user']) or empty($_POST['pwd1']) or empty($_POST['pwd2']) or !isset($_POST['perms'])) {
?>
<form action="register.php" method="post">
    Benutzername:<br>
    <input type="text" name="user"></input><br>
    Passwort:<br>
    <input type="password" name="pwd1"></input><br>
    Passwort erneut eingeben:<br>
    <input type="password" name="pwd2"></input><br>
    Rechte:<br>
    <fieldset>
        <input type="radio" id="0" name="perms" value="0">
        <label for="0">Keine Rechte</label>
        <input type="radio" id="1" name="perms" value="1">
        <label for="1">Hinzufügen/bearbeiten/löschen von eigenen</label>
        <input type="radio" id="2" name="perms" value="2">
        <label for="2">Bearbeiten/Löschen von anderen</label>
        <input type="radio" id="3" name="perms" value="3">
        <label for="3">Benutzer verwalten</label>
        <input type="radio" id="4" name="perms" value="3">
        <label for="4">nur Benutzer verwalten</label>
    </fieldset>
    <input type="submit" value="Hinzufügen"></input>
</form>

<?php
    } else {
        $username=mysqli_real_escape_string($db, $_POST['user']);
        $pwd1=md5($_POST['pwd1']);
        $pwd2=md5($_POST['pwd2']);
        $perms=mysqli_real_escape_string($db, $_POST['perms']);
        if($pwd1 != $pwd2){
            echo "<script>alert('The passwords don't match')";
            header("Location: register.php");
        }
        mysqli_query($db, "INSERT INTO users (username, pwd, perms) VALUES ('$username', '$pwd1', '$perms');");
        header("Location: register.php");
    }
}
?>
