<?php
require_once "/etc/mysql_zugriff/zugriff.inc.php";

$entries = mysqli_query($db, "SELECT * FROM entries ORDER BY id DESC");
session_start();
while ($row = mysqli_fetch_array($entries)) {
    $id = $row["id"]
    $content = nl2br($row["content"]);
    if (isset($_SESSION['perms']) and $_SESSION['perms'] & 2) {
        $delete = "<a href='delete.php?id=" . $row["id"] . "'> Delete</a>";
        $edit = " <a href='edit.php?id=$row[id]'>Edit</a>";
    } else if (isset($_SESSION['perms']) and $_SESSION['perms'] & 1 and $row["author"] == $_SESSION["id"]) {
        $delete = "<a href='delete.php?id=" . $row["id"] . "'> Delete</a>";
        $edit = " <a href='edit.php?id=$row[id]'>Edit</a>";
    } else {
        $delete = "";
        $edit = "";
    }
    if($row["published"]) {
        echo "<div style='border: 1px solid;padding:1%;margin:0.5%'><h3>$row[title]</h3>\n<p class='content_block' id='content_$id'>$content</p><div><small>eingetragen <strong>$row[upload_time]</strong></small>$edit $delete</div></div><br>\n";
    } else {
        if(isset($_SESSION['perms']) and $_SESSION['perms'] & 8) {
            echo "<div style='border: 1px solid grey;padding:1%;margin:0.5%;color:grey;'><h3>$row[title]</h3>\n<p class='content_block' id='content_$id'>$content</p><div><small>eingetragen <strong>$row[upload_time]</strong></small>$edit $delete</div></div><br>\n";
        }
    }
} /*
1 Write
2 Write others
4 edit members
8 publish
 */
