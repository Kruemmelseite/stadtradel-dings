<?php
if($_SERVER["REQUEST_METHOD"]==="POST") {
    $entityBody = file_get_contents('php://input');
    echo shell_exec("./github.sh;");
    echo shell_exec("python3 github.py \"$entityBody \"");
    echo "python3 github.py \"$entityBody \"";
} else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>
