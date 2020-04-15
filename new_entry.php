<?php
require_once("/etc/mysql_zugriff/zugriff.inc.php");
session_start();
if(isset($_SESSION['perms']) and $_SESSION['perms'] > 0 and $_SESSION['perms'] !=4) {
    if(!empty($_POST['title']) and !empty($_POST['content'])) {
        $title=mysqli_real_escape_string($db, $_POST['title']);
        $content=mysqli_real_escape_string($db, $_POST['content']);
        mysqli_query($db, "INSERT INTO entries (title, content, author) VALUES ('$title','$content','$_SESSION[id]');");
        header("Location: .");
    } else {
    ?>
<form action="new_entry.php" method="post">
<input type="text" name="title" placeholder="Überschrift"> <a href="index.php">Home</a><br>
<textarea id="editor" cols="65" rows="15" name="content"></textarea><br>
<input type="submit" value="Posten" id="submit">
</form>
<style>
    #editor {
        height: 89.1%;
    }
</style>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.config.width='60%';
    CKEDITOR.config.height='70%';
    CKEDITOR.replace('editor');
</script>
<?php
    }
}
?>