<?php session_start();
if ($_SERVER['REQUEST_URI'] == "/index.php") {
    header("Location: .");
}
?>

<html>
    <head>
        <meta name="google-site-verification" content="RapvCHY2cGnvXUFpTALBVs2e-r6FyaOxGrglcjLnOdU" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Stadtradeln Würzburg</title>
    </head>
    <body class="container">
        <div id="title">Stadtradeln Würzburg</div>
        <div id="login"><?php include "loginform.php"?></div>
        <div id="content"><?php include "entries.php"?></div>
    </body>
</html>
