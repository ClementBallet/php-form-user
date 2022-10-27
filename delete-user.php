<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "account";
$path = "mysql:host=$host;dbname=$dbname;charset=utf8";

try
{
    $connexion = new PDO($path, $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch ( PDOException $e )
{
    throw new PDOException($e->getMessage() , (int)$e->getCode());
}

try
{
    $getUsers = $connexion->prepare("DELETE FROM user WHERE pseudo = :pseudo");
    $getUsers->execute( ["pseudo" => $_GET["pseudo"]] );
    header("Location: /dashboard.php?isDeleteComplete=success&pseudo=" . $_GET["pseudo"]);
}
catch (PDOException $e)
{
    header("Location: /dashboard.php?isDeleteComplete=fail&pseudo=" . $_GET["pseudo"] . "&errorMessage=" . $e->getMessage());
}
