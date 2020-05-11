<?php
require_once("/etc/mysql_zugriff/zugriff.inc.php");

echo "Anzahl der Einträge: ".mysqli_num_rows(mysqli_query($db, "SELECT * FROM entries"));
$entries=mysqli_query($db, "SELECT * FROM entries ORDER BY id DESC");

while($row = mysqli_fetch_array($entries)){
    $content = nl2br($row["content"]);
    if(isset($_SESSION['perms']) and $_SESSION['perms'] & 2){
        $delete =  "<a href='delete.php?id=".$row["id"]."'> Delete</a>";
        $edit=" <a href='edit.php?id=$row[id]'>Edit</a>";
    } else if(isset($_SESSION['perms']) and $_SESSION['perms'] & 1) {
        $delete =  "<a href='delete.php?id=".$row["id"]."'> Delete</a>";
        $edit=" <a href='edit.php?id=$row[id]'>Edit</a>";
    } else {
        $delete="";
        $edit="";
    }
    echo "<div style='border: 1px solid;padding:1%;margin:0.5%'><h3>$row[title]</h3>\n<p>$content</p><div><small>eingetragen <strong>$row[upload_time]</strong></small>$edit $delete</div></div><br>\n";
    //$i++;
}/*
Write
Write others
edit members
upload files
*/
?>