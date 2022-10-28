<?php
session_start();

$username = "";

if ( !isset($_SESSION["username"]) )
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
    <script src="script.js" async></script>
</head>
<body>
    <h1>Dashboard - Bonjour <?php echo $username ?></h1>

    <?php
    if ( isset($_SESSION["role"]) && $_SESSION["role"] === 'admin' ) :
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

        $getUsers = $connexion->prepare("SELECT * FROM user WHERE role = 'subscriber'");
        $getUsers->execute();
        $users = $getUsers->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h2>Tableau des utilisateurs</h2>
        <?php
        if (isset($_GET["isDeleteComplete"]) && $_GET["isDeleteComplete"] == "success") :
        ?>
        <p class="success">L'utilisateur <?php echo $_GET["pseudo"] ?> a bien été supprimé.</p>
        <?php
        elseif ( isset($_GET["isDeleteComplete"]) && $_GET["isDeleteComplete"] == "fail" ) :
        ?>
        <p class="error">L'utilisateur <?php echo $_GET["pseudo"] ?> n'a pas pu être supprimé. Une erreur est survenue.</p>
            <?php
            if ( isset($_GET["errorMessage"]) && !empty($_GET["errorMessage"]) ) :
            ?>
            <pre><?php echo $_GET["errorMessage"]; ?></pre>
            <?php
            endif;
            ?>
        <?php
        endif;
        ?>
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Rôle</th>
                    <th>Créé le</th>
                    <th>Modifié le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) :
                ?>
                <tr>
                    <td><?php echo $user->pseudo ?></td>
                    <td><?php echo $user->role ?></td>
                    <td><?php echo $user->created_at ?></td>
                    <td><?php echo $user->modified_at ?></td>
                    <td>
                        <button
                           class="delete-user-button"
                           id="delete-user-button"
                           data-username="<?php echo $user->pseudo ?>"
                           data-delete-user-url="/delete-user.php?pseudo=<?php echo $user->pseudo ?>"
                        >
                            Supprimer l'utilisateur
                        </button>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    <?php
    endif;
    ?>

    <a href="/logout.php">Se déconnecter</a>
</body>
