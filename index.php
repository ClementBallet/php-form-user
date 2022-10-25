<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Votre compte</h1>
    <h2>Inscription</h2>

    <form action="register.php" method="post">
      <p>
          <label for="pseudo">Votre peudo</label>
          <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];}?>">
          <?php
          if ( isset($_GET["register_same_pseudo"]) && $_GET["register_same_pseudo"] == 1 ) :
          ?>
          <p class="error">Pseudo déjà existant.</p>
          <?php
          endif
          ?>
      </p>
      <p>
          <label for="password">Votre mot de passe</label>
          <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">
          <?php
          if ( isset($_GET["register_pseudo_errors"]) && $_GET["register_pseudo_errors"] == 1 ) :
          ?>
          <p class="error">Votre mot de passe doit comporter 8 caractères et au moins une majuscule</p>
          <?php
          endif
          ?>
      </p>
      <?php
      if ( isset($_GET["register_empty_pseudo_or_password"]) && $_GET["register_empty_pseudo_or_password"] == 1 ) :
      ?>
      <p class="error">Vous devez remplir tous les champs.</p>
      <?php
      endif
      ?>
      <input type="submit" name="submit">
    </form>

    <h2>Connexion</h2>

    <form action="login.php" method="post">
        <p>
            <label for="pseudo">Votre peudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];}?>">
        </p>
        <p>
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">
        </p>
        <?php
        if ( isset($_GET["login_empty_pseudo_or_password"]) && $_GET["login_empty_pseudo_or_password"] == 1 ) :
        ?>
        <p class="error">Vous devez remplir tous les champs.</p>
        <?php
        elseif ( isset($_GET["login_incorrect_pseudo"]) && $_GET["login_incorrect_pseudo"] == 1 ) :
        ?>
        <p class="error">Le pseudo n'existe pas.</p>
        <?php
        elseif ( isset($_GET["login_incorrect_password"]) && $_GET["login_incorrect_password"] == 1 ) :
        ?>
        <p class="error">Le pseudo et le password ne correspondent pas.</p>
        <?php
        endif;
        ?>
        <input type="submit" name="submit">
    </form>
</body>
</html>