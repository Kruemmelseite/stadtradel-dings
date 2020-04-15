<?php
if($_SERVER["REQUEST_METHOD"]==="POST") {
    $entityBody = stream_get_contents(STDIN);
    echo shell_exec("./github.sh; python3 github.py \"$entityBody\"");
} else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>
