# Exercice sur les formulaires et PDO

Vous êtes sur ma version de l'exercice. 
Cette version est réalisée en code "spaghetti" et sans fonctions ni classes.

## Installation

1. Cloner ce dépôt 
2. En local, se placer sur cette branche avec la commande `git checkout solutions`. 
3. Créer un virtual host pointant vers le dossier cloné ou lancer la commande `php -S localhost:8080` à sa racine 
4. Installer la base de données `bdd.sql`. 
5. Exécuter également tous les scripts SQL se trouvant dans le README de la branche master. 
6. Se rendre sur l'adresse du virtual host ou `localhost:8080` suivant ce que vous avez choisi pour le point 2 
7. Naviguez dans le projet !
8. Pour tester un administrateur, créer un nouvel utilisateur dans l'application, puis dans PHPMyAdmin lancer la commande suivante (remplacer la valeur de <code>\`user\`.\`pseudo\`</code> dans la clause `WHERE` par le pseudo de l'utilisateur que vous venez de créer) : 
```
UPDATE `user` 
SET `role` = 'admin' 
WHERE `user`.`pseudo` = 'admin';
```