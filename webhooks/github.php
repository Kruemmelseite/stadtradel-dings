<?php
if($_SERVER["REQUEST_METHOD"]==="POST") {
    $entityBody = file_get_contents('php://input');
    echo shell_exec("./github.sh; python3 github.py \"$entityBody\"");
} else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>
