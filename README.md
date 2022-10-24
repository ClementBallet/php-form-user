# Exercice sur les formulaires et PDO
<hr>

Consignes :
1. Créer une base de données dans PHPMyAdmin appelée `account`
2. Installer la table user contenue dans le fichier `bdd.sql`
3. A la racine du projet, créer un fichier `index.php` dans lequel il y aura un formulaire de création de compte utilisateur comprenant les `input` suivants : pseudo et password.
4. Créer un fichier `register.php` ou seront traitées les données de ce formulaire.
5. Dans le fichier `register.php`, créer la connexion à la base de donnée `account` à l'aide de PDO
6. Faire les conditions suivantes :
- les champs pseudo et password ne doivent pas être vide
- le champs password doit comporter au moins 8 caractères et 1 majuscule 
7. Si les conditions précédentes sont remplies, on enregistre en base de données l'utilisateur à l'aide de PDO et d'une requète `INSERT`
8. Si les conditions ne sont pas remplies, on renvoie vers la page du formulaire et on ajoute les messages d'erreurs suivants :
- "Vous devez remplir tous les champs"
- "Votre mot de passe doit comporter 8 caractères et au moins une majuscule"
<br>N.B.: Bien sûr, les messages d'erreurs doivent s'afficher en fonction de si les conditions sont remplies ou pas. On n'affiche pas toutes les erreurs par défaut.
9. Dans le fichier contenant le formulaire d'inscription de notre site, créer un deuxième formulaire que l'on va appeler "Connexion". Il comportera les mêmes champs que précédemment, à savoir pseudo et password avec un submit
10. Dans le projet, créer un fichier `login.php` où l'on va traiter les réponses du formulaire de connexion utilisateur
11. Faire une/des condition(s) pour comparer si l'utilisateur rentre bien un pseudo et password enregistré en BDD. Il faut également que le pseudo et le password soit correct pour le même utilisateur.
12. Aller dans PHPMyAdmin, sélectionner la base de donnée `account` et insérer le code SQL suivant : 
```
ALTER TABLE user
ADD UNIQUE (pseudo);
``` 
13. Après avoir fait cette commande, nous avons rendu unique la colonne pseudo, c'est-à-dire qu'aucun pseudo ne peut être pareil dorénavant. Il est possible maintenant que vous ayez une belle erreur PHP quand vous essayez de rentrer un nouvel utilisateur avec le même pseudo qu'un autre. Gérer cette erreur pour qu'aucun utilisateurs n'aient le même pseudo et si c'est le cas, afficher un message d'erreur "Pseudo déjà existant." dans le formulaire.
<details>
<summary>Un indice ?</summary>
Un morceau de code pourrait être intéressant ici :
<a href="https://phpdelusions.net/pdo#catch">https://phpdelusions.net/pdo#catch</a> (quelques modifications à appliquer cependant)
</details>

14. Au moment de l'inscription, le mot de passe n'est pas assez sécurisé. Ajouter la regex suivante dans votre code pour que le mot de passe contienne au moins 8 symboles, une minuscule, une majuscule et un chiffre : <code>$regex = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !"#$%&\'()*+,-.\/:;<=>?@\[\\\\\]^_`{|}~]{8,255}/';</code>

...to be continued