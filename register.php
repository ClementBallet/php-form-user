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

$pseudo = $_POST["pseudo"];
$password = $_POST["password"];

if ( !empty($pseudo) && !empty($password) )
{
    // Le mot de passe doit contenir au moins 8 symboles, une minuscule, une majuscule et un chiffre.
    $regex = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/';

    if ( preg_match($regex, $password, $matches) )
    {
        try
        {
            $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);
            $insertUser = $connexion->prepare("INSERT INTO user(pseudo,password) VALUES(?,?)");
            $insertUser->execute( array($pseudo, $passwordEncrypt) );
        }
        catch ( PDOException $e )
        {
            $existingKey = "Integrity constraint violation: 1062";

            if ( strpos($e->getMessage(), $existingKey) !== FALSE )
            {
                $url  = $_SERVER["HTTP_ORIGIN"];
                $url .= "?register_same_pseudo=1";

                header('Location: ' . $url);
            }
            else
            {
                throw new PDOException( $e->getMessage() , (int)$e->getCode() );
            }
        }
    }
    else
    {
        $url  = $_SERVER["HTTP_ORIGIN"];
        $url .= "?register_pseudo_errors=1";

        header('Location: ' . $url);
    }
}
else
{
    $url  = $_SERVER["HTTP_ORIGIN"];
    $url .= "?register_empty_pseudo_or_password=1";

    header('Location: ' . $url);
}