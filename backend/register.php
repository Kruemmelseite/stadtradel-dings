<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    session_start();
    echo "<button onclick=\"window.location.replace('..')\">Home</button><button onclick=\"window.location.replace('.')\">Backend</button>";
}
require_once("/etc/mysql_zugriff/zugriff.inc.php");
if(isset($_SESSION['perms']) and $_SESSION['perms'] & 4) {
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
        <input type="checkbox" id="1" name="perms1" value="1">
        <label for="1">Hinzufügen/bearbeiten/löschen von eigenen</label>
        <input type="checkbox" id="2" name="perms2" value="2">
        <label for="2">Bearbeiten/Löschen von anderen</label>
        <input type="checkbox" id="3" name="perms3" value="4">
        <label for="3">Benutzer verwalten</label>
        <input type="checkbox" id="4" name="perms4" value="8">
        <label for="4">Bilder hochladen</label>
    <input type="submit" value="Hinzufügen"></input>
</form>

<?php
    } else {
        $username=mysqli_real_escape_string($db, $_POST['user']);
        $pwd1=md5($_POST['pwd1']);
        $pwd2=md5($_POST['pwd2']);

        $perms = intval($_POST["perms1"]) | intval($_POST["perms2"]) | intval($_POST["perms3"]) | intval($_POST["perms4"]);

        if($pwd1 != $pwd2){
            echo "<script>alert('The passwords don't match')";
            header("Location: register.php");
        }
        mysqli_query($db, "INSERT INTO users (username, pwd, perms) VALUES ('$username', '$pwd1', '$perms');");
        header("Location: register.php");
    }
}
?>
