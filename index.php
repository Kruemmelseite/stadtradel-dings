<?php
if ($_SERVER['REQUEST_URI'] == "/index.php") {
    header("Location: .");
}
?>

<html>
    <head>
        <meta name="google-site-verification" content="RapvCHY2cGnvXUFpTALBVs2e-r6FyaOxGrglcjLnOdU" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <!---->
        <title>Stadtradeln DHG</title>
    </head>
    <body class="container">
        <div id="title">Stadtradeln DHG</div>
        <div id="login"><?php include "loginform.php"?></div>
        <div id="content"><?php include "entries.php"?></div>
</a>
    </body>
    <script src="entries.js"></script>
</html>
