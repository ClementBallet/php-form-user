<?php
session_start();

$username = "";

if (!isset($_SESSION["username"]))
{
    header("Location: /");
}
else
{
    $username = $_SESSION["username"];
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Dashboard - Bonjour <?php echo $username ?></h1>

    <a href="/logout.php">Se déconnecter</a>
</body>
