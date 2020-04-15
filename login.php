<title>Döner-Blog: Login</title>
<button onclick="window.location.replace('.')">Home</button>
<?php
require_once("/etc/mysql_zugriff/zugriff.inc.php");
session_start();

if(isset($_POST["user"]) and isset($_POST["pwd"])){
    $user=trim(mysqli_real_escape_string($db, $_POST['user']));
    $entries=mysqli_query($db, "SELECT * FROM users WHERE username='".$user."';");
    $entry=mysqli_fetch_assoc($entries);
    if(empty($entry)) {
        echo "No user named ".$_POST['user']."!";;
        include("loginform.php");
        die();
    }
    $pwd=md5($_POST['pwd']);
    if($pwd===$entry['pwd']){
        $_SESSION['id']=$entry['id'];
        $_SESSION['login']=true;
        $_SESSION['perms']=$entry['perms'];
        header("Location: .");
    } else {
        echo "<script>\nalert('Wrong password');\nwindow.location.replace('index.php');\n</script>";
    }

} else {
    if($_SERVER["REQUEST_METHOD"]==="POST") {
        echo "Miep moop!";
    }
    if(isset($_SESSION['login']) and $_SESSION['login']===true) {
        header("Location: .");
    }
    include("loginform.php");
}
?>
