<?php
if($_SERVER["REQUEST_METHOD"]==="POST") {
    echo shell_exec("./github.sh; python3 github.py");
} else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>
