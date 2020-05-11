<?php


if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    session_start();
}

function show_users() {
    require_once("/etc/mysql_zugriff/zugriff.inc.php");
    echo <<<TABLE
    <table border=1 style="width: 100%;">
    <tr>
        <th style="width:65%;">Benutzername</th>
        <th style="width:10%;">Rechte</th>
        <th style="width:25%;">Optionen</th>
    </tr>
    TABLE;
    $users=mysqli_query($db, 'SELECT * FROM users;');
    while($user=mysqli_fetch_array($users)){
        echo <<<ROW
        <tr>
            <td>$user[username]</td>
            <td>$user[perms]</td>
            <td style="align-items: center;"><button style="float:left;"onclick="window.location.replace('edit.php?id=$user[id]')">Edit</button> <form action="delete.php" method="post"><input type="hidden" value="$user[id]"name="id"></input><input type="submit" value="Delete"></input></form></td>
        </tr>
        ROW;
    }
}

function show_form($id) {
    echo <<<FORM
    <form action="edit.php" method="post">
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
        <input type="hidden" value="$id" name="id"></input>
        <input type="submit" value="Edit"></input>
    </form>
    FORM;
}

function handle_request() {
    require_once("/etc/mysql_zugriff/zugriff.inc.php");
    if($_SERVER["REQUEST_METHOD"]==="GET") {//bei GET
        echo "<button onclick=\"window.location.replace('..')\">Home</button><button onclick=\"window.location.replace('.')\">Backend</button>";
        if(isset($_GET['id'])) {
            show_form($_GET['id']);
        } else {
            show_users();
        }
    } else {//bei POST
        if(isset($_POST['id'])){//id wäre die ID des zu editierenden Eintrags
            $id=mysqli_real_escape_string($db, $_POST['id']);
            if(!empty($_POST['user'])) {
                $user=mysqli_real_escape_string($db, $_POST['user']);
                mysqli_query($db, "UPDATE users SET username='$user' WHERE id=$id");
                echo "UPDATE users SET username='$user' WHERE id=$id<br>";
            }
            if(!empty($_POST['pwd1']) and !empty($_POST['pwd2'])) {
                $pwd1=md5($_POST['pwd1']);
                $pwd2=md5($_POST['pwd2']);
                if($pwd1 != $pwd2) {
                    echo "<script>alert('Die beiden Passwörter stimmen nicht überein');</script>";
                    header("Location: .");
                    die();
                }
                mysqli_query($db, "UPDATE users SET pwd='$pwd1' WHERE id=$id");
                echo "UPDATE users SET pwd='$pwd1' WHERE id=$id<br>";
            }
            if(isset($_POST['perms1']) or isset($_POST['perms2']) or isset($_POST['perms3'])) {
                $perms = intval($_POST["perms1"]) | intval($_POST["perms2"]) | intval($_POST["perms3"]) | intval($_POST["perms4"]);
                mysqli_query($db, "UPDATE users SET perms='$perms' WHERE id=$id");
                echo "UPDATE users SET perms='$perms' WHERE id=$id";
            }
        }
        header('Location: .');
    }
}


if(isset($_SESSION['perms']) and $_SESSION['perms'] & 4) {
    handle_request();
}
?>
