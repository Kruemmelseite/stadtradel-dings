<?php
require_once("/etc/mysql_zugriff/zugriff.inc.php");
session_start();
if(isset($_SESSION['perms']) and $_SESSION['perms'] > 0 and $_SESSION['perms'] !=4) {
    if(!empty($_POST['title']) and !empty($_POST['content']) and !empty($_GET['id'])) {
        $title=mysqli_real_escape_string($db, $_POST['title']);
        $content=mysqli_real_escape_string($db, $_POST['content']);
        $id=mysqli_real_escape_string($db, $_GET['id']);
        mysqli_query($db, "UPDATE entries SET title='$title', content='$content', author=$_SESSION[id] WHERE id=$id;");
        header("Location: .");
    } else if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($db, $_GET['id']);
        $entries=mysqli_query($db, "SELECT * FROM entries WHERE id=$id");
        $entry=mysqli_fetch_assoc($entries);
        $title=$entry['title'];
        $content=$entry['content'];
        echo <<<FORM
                <form action="edit.php?id=$_GET[id]" method="post">
                    <input type="text" name="title" placeholder="Überschrift" value='$title'></input><a href=".">Home</a><br>
                    <textarea id="editor" cols="65" rows="15" name="content">$content</textarea><br>
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
    FORM;
    }
}
?>