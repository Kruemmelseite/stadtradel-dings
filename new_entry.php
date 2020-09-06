<?php
require_once "/etc/mysql_zugriff/zugriff.inc.php";
session_start();
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['perms']) and $_SESSION['perms'] & 1) {
    if (!empty($_POST['title']) and !empty($_POST['content'])) {
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $content = mysqli_real_escape_string($db, $_POST['content']);
        $published = (($_SESSION['perms'] & 8 ? true : false) && isset($_POST["publish"]) ? 1 : 0) ? 1 : 0;
        mysqli_query($db, "INSERT INTO entries (title, content, author, published) VALUES ('$title','$content','$_SESSION[id]', $published);");
        header("Location: .");
    } else {
        ?>
<form id="content" action="new_entry.php" method="post">
<input type="text" name="title" placeholder="Überschrift"> <a href="index.php">Home</a><br>⁴
<textarea id="editor" cols="65" rows="15" name="content"></textarea><br>
<label for="publish">Publish</label>
<input type="checkbox" id="publish" name="publish" value="true" checked="checked">
<input type="submit" value="Posten" id="submit">
</form>

<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.config.height='70%';
    CKEDITOR.replace('editor');
</script>
<?php
}
} else {
    header("Location: .");
}
?>
