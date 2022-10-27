# Exercice sur les formulaires et PDO

Vous êtes sur ma version de l'exercice. 
Cette version est réalisée en code "spaghetti" donc sans fonction ni classe.

## Installation

1. Cloner ce dépôt 
2. Créer un virtual host pointant vers le dossier cloné ou lancer la commande `php -S localhost:8080` à sa racine 
3. Installer la base de données `bdd.sql`.
4. Exécuter également tous les scripts SQL se trouvant dans le README de la branche master. 
5. Se rendre sur l'adresse du virtual host ou `localhost:8080` suivant ce que vous avez choisi pour le point 2 
6. Naviguez dans le projet !
7. Pour tester un administrateur, créer un nouvel utilisateur dans l'application, puis dans PHPMyAdmin lancer la commande suivante (remplacer la valeur de <code>\`user\`.\`pseudo\`</code> dans la clause `WHERE` par le pseudo de l'utilisateur que vous venez de créer) : 
```
UPDATE `user` 
SET `role` = 'admin' 
WHERE `user`.`pseudo` = 'admin';
```