<?php session_start()?>

<html>
    <head>
        <meta name="google-site-verification" content="RapvCHY2cGnvXUFpTALBVs2e-r6FyaOxGrglcjLnOdU" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Der Döner-Blog</title>
    </head>
    <body>
        <div id="login"><?php include("loginform.php")?></div>
        <div id="title">Der Döner-Blog</div>
        <div id="content"><?php include("entries.php")?></div>
    </body>
</html>
