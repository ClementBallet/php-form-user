<?php
session_start();

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
    try
    {
        $checkPseudo = $connexion->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $checkPseudo->execute(["pseudo" => $pseudo]);

        if ( $checkPseudo->rowCount() > 0 )
        {
            // PDO::FETCH_OBJ renvoie la réponse sous forme d'une classe
            $user = $checkPseudo->fetch(PDO::FETCH_OBJ);

            if ( password_verify($password, $user->password) )
            {
                $_SESSION["username"] = $pseudo;
                $_SESSION["role"] = $user->role;
                header('Location: /dashboard.php');
            }
            else
            {
                $url  = $_SERVER["HTTP_ORIGIN"];
                $url .= "?login_incorrect_password=1";

                header('Location: ' . $url);
            }
        }
        else
        {
            $url  = $_SERVER["HTTP_ORIGIN"];
            $url .= "?login_incorrect_pseudo=1";

            header('Location: ' . $url);
        }
    }
    catch ( PDOException $e )
    {
        throw new PDOException( $e->getMessage() , (int)$e->getCode() );
    }
}
else
{
    $url  = $_SERVER["HTTP_ORIGIN"];
    $url .= "?login_empty_pseudo_or_password=1";

    header('Location: ' . $url);
}
