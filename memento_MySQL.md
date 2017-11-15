# MySQL et les bases de données

Les bases de données sont utilisées pour éviter certains problèmes qui se posent avec le stockage de données dans des fichiers classiques.

Un fichier classique doit à chaque modifications être ouvert, éditer, modifier, puis enregistrer, ce qui monopolise des ressources et prends du temps. Si plusieurs utilisateurs veulent accéder au même fichier en même temps cela occasionne un temps de latence élevé pouvant mener à des erreurs de type "time out". De plus, au fur et à mesure que l'on ajoute des informations à un fichier la taille de celui-ci augmente et donc les opérations d'ouverture, d'écriture, de fermeture du fichier sont de plus en plus lente.

Pour palier à ces problèmes, on associe au serveur web et à l'exécutable PHP un autre serveur (serveur de bases de données). Son rôle est de stocké des données et permet d'intéragir avec ces données en les servant très rapidement à PHP pour minimiser le risque d'erreur "time out". 

Le serveur met les données dans la RAM (Rapid Access Memory) de l'ordinateur hébergeant le serveur. Comme il est en mémoire, pas besoin d'ouvrir ou fermer des fichiers sur un disque dur, donc rapidité !!!

## Les bases de données sont partout

Les bases de données sont idéales pour manipuler rapidement une grande quantité de données. Tout les grands sites utilisant un CMS comme facebook, google, pinterest, airbnb, gmail, google drive, ... utilisent des bases de données.

## Les DBMS (Database Management Systems)

Il existent de nombreux logiciels (moteurs de gestion de bases de données - DBMS (en anglais)) qui permettent de manipuler des bases de données. 

Les principaux sont: 

* MySQL (et sa version recommandée: MariaDB)
* SQLite
* PostgreSQL
* MongoDB

MySQL est très populaire et est présent sur 99.99% des hébergeurs, c'est lui que nous utiliserons. 
Le langage pur interagir avec MySQL est le SQL qui est également utilisé par les autres DBMS. Ce que nous apprenons avec MySQL est transposable facilement si on utilise un autre logiciel.

## A quoi ressemble une base de données

Une base de données est un groupe d'une ou plusieurs tables contenant des données. Un peu comme un tableau Excel. 

Dans cet exemple, nous allons étudier la table "météo" qui contient des données permettant de présenter les prévisions météos des grandes villes belges (température minimum et maximum)

Chaque ville a sa propre rangée (en anglais: row).

![rangée](https://camo.githubusercontent.com/e65fedefdb7303b53c80d9e0959086f1aad92fe4/68747470733a2f2f676d6b722e696f2f732f3539343435336161656663383563356532613531303533382f30)

Chaque rangée (donc, ici, ville) est décrite par autant de colonnes que nécessaire par l'application (en anglais: column).

![colonne](https://camo.githubusercontent.com/1c26b23b9ab46b6a16f367d3d885f09fefe152c2/68747470733a2f2f676d6b722e696f2f732f3539343435333764353435363839323730646361393433312f30)

La donnée en elle-même se trouve dans une cellule (en anglais: cell).

![cellule](https://github.com/becodeorg/Lovelace-promo-2/blob/master/Parcours/MySQL/assets/exemple-cellule.png?raw=true)


## La syntaxe SQL

Une fois ta db créee, ton application effectuera essentiellement 4 types d'opération, qu'on résume par "CRUD" c'est à dire:

1. **C**reate : ajouter une rangée à la table
2. **R**ead : selectionner une ou plusieurs rangées (pour les afficher par exemple)
3. **U**pdate: modifier l'information stockée sur une rangée
4. **D**elete : effacer une rangée


### Besoin d'aide

* Formate tes recherches sur google ainsi: "mysql how to ... ". 
* Forums et endroits où chercher et poser tes questions: https://dba.stackexchange.com
* SQLCourse.com est vieillot, mais son contenu est très bien expliqué et permet d'aller en détail.


## Séquences

Nous allons à présent découvrir la syntaxe SQL

### Read : SELECT - SELECT FROM

La plupart du temps dans le jargon CRUD, on veux faire du "Read" c'est à dire extraire des données depuis MySQL pour les manipuler ensuite dans un script PHP.

Comment procéder?

PHP envoie une requête formulée en SQL, et MySQL lui retourne un tableau avec les résultats de la requête.

Voici un shéma pour mieux comprendre:

![shéma](https://github.com/becodeorg/Lovelace-promo-2/blob/master/Parcours/MySQL/assets/mysql-architecture.png)

Par exemple, dans la table météo ton application veut savoir quelle sera la température maximale à Bruxelles. Pour le savoir elle doit "lire" la cellule se trouvant dans la colonne "haut" de la rangée "Bruxelles"

![météo](https://github.com/becodeorg/Lovelace-promo-2/blob/master/Parcours/MySQL/assets/exemple-table.png)


En SQL, cela signifie simplement que tu voudras chercher une ou plusieurs rangées d'une table bien définie.

Le squelette de syntaxe à respecter est :

````SQL
SELECT
colonne1, colonne2, colonne3, colonne4
FROM 
nom_de_la_table
WHERE
condition
;
````

Ce qui nous donne dans l'exemple météo, la requête suivante

````SQL
SELECT
haut
FROM 
météo
WHERE
ville='Bruxelles'
;
````

Cette requête retournera un tableau constitué d'une cellule, contenant la valeur demandée.

Attention: chaque requête doit se terminer par ; comme en PHP et en Javascript
Note: On peut aussi écrire la requête sur une seule ligne horizontale mais dans tous les cas ne pas pas oublier le ; à la fin.

Les noms de colonne qui suivent le mot-clé SELECT définissent les colonnes qui seront renvoyées dans les résultats.

````SQL
SELECT * FROM météo WHERE ville='Bruxelles';
````

Le nom de la table qui suit le mot-clé FROM spécifie la table qui sera interrogée pour récupérer les résultats souhaités

La clause "Where" est facultative. Elle permet de spécifier quelles valeurs ou lignes de données seront renvoyées ou affichées, en fonction  des critères décrits après le mot-clé WHERE.

La partie conditionnelle (juste après WHERE) peut utiliser ces opérateurs:

* =	"égal à"
* >	"plus grand que"
* <	"plus petit que"
* >=	"plus grand ou égal à"
* <=	"plus petit ou égal à"
* <>	"différent de"
* LIKE "qui ressemble à"

Like permet de retourner des rangées qui "ressemblent à " une chaîne de caractère que tu spécifies, accompagnée du signe %, signe voulant dire "n'importe quel chaîne de caractère".

Pour un ordinateur cela signifie soit: 

* "qui commence par chaine_de_caractères". ( LIKE 'Er%' : tout mot commençant par "Er"),
* "qui termine par chaine_de_caractères" ( LIKE '%Er' : tout mot terminant par "Er"),
* ou "qui contient cette chaine_de_caractères" ( LIKE '%Er%' : tout mot contenant "Er").

C'est très utile pour ajouter une fonctionnalité de rechercher dans votre application. Pour des exemples lire plus d'infos ici: [http://www.sqlcourse.com/select.html]

### TRIER : ORDER BY

On peut demander à MySQL de trier les résultats selon un ordre que l'on définit, en ajoutant à la fin de la requête ORDER BY suivi de la colonne à utiliser pour le tri, suivi soit de ASC ("ascendint order" de A à Z par exemple, ou de la plus petite valeur à la plus grande) ou de DESC ("descending order", de Z à A ou de la plus grande valeur à la plus petite)

Exemple:

````MySQL
SELECT ville FROM météo ORDER BY ville ASC;
````

### Limiter le nombre de résultats

On peut demander à MySQL de limiter le nombre de résultats, en ajoutnat le mot clef LIMIT suivi de la rangée de départ (on commence à O) puis une virgule, puis le nombre de rangées à garder.

Par exemple, pour ne garder que la rangée du dessus, on ajoute LIMIT 0,1 à la requête:

````MySQL
SELECT ville FROM météo ORDER BY ville ASC LIMIT 0,1 ;
````

### Bonus : SQL inclut des fonctions utiles

Voici 2 fonctions que l'on utilise souvent en SQL "concat" et "count", mais il en existe de nombreuses autres.

**concat**

Cette fonction permet de concaténer des colonnes pour recevoir un tableau plus facile à traiter ensuite en PHP.

````MySQL
SELECT CONCAT('ville: ', ville, ': ', bas, '/', haut ) FROM météo;
````

**count**

Tu veux savoir combien il y a de villes dans le tableau? Tu peux simplement le demander via SQL en utilisant la fonction COUNT()

````MySQL
SELECT COUNT(*) FROM météo;
````

**count + where**

Si on veut vérifier qu'il n'y a pas eu une double entrée pour Bruxelles, on utilise COUNT() et une clause WHERE pour savoir le nombre de fois que "Bruxelles' se trouve dans la table météo.

````MySQL
SELECT COUNT(*) FROM météo WHERE ville='Bruxelles';
````

Pour en savoir plus sur ces fonctions, va voir sur [openclassrooms](https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/les-fonctions-sql)


### Aller plus loin par toi-même

Si vous désirez aller plus loin dans votre connaissance de SQL ,voici quelques ressources bien faites:

* Utiliser les fonctions SQL, sur [openclassrooms](https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/les-fonctions-sql)
* Les bases du Select, expliqué par sqlcourse.com: [Basics of Select](http://www.sqlcourse.com/select.html)
* Trucs et astuces avec Select, expliqué par sqlcourse.com: [Powerful things to do with Select](http://www.sqlcourse2.com/select2.html)


## CREATE : INSERT INTO

Régulièrement, tes tables vont recevoir de nouvelles rangées. Par exemple si on reprend les infos météorologiquen un jour la ville d'Arlon peut vouloir être ajoutée à ton application. Il va donc falloir l'inscrire et créer son compte.

En SQL, cela signifie simplement que l'application aura **ajouté une rangée en bas du tableau** en lui fournissant les informations à insérer dans les colonnes.

### Syntaxe INSERT INTO

Pour insérer des enregistrements dans une table, écris INSERT INTO suivi du nom de la table, suivi d'une parenthèse ouverte, suivie d'une liste de noms de colonnes séparés par des virgules, suivi d'une parenthèse fermée suivie par VALUES, suivi de la liste des valeurs entre parenthèses dans le même ordre que l'ordre des colonnes, séparées d'une virgules entre chaque valeur. Les valeurs que vous entrez sront conservées dans les rangées et elles correspondront aux noms de colonne que vous spécifiez. Chque chaîne de caractères doit être mise entre guillemets simples.
ex: 'chaîne de caractères', mais pas les nombres. Ex: 28

````MySQL
INSERT INTO nom_de_la_table
	(colonne1, colonne2, colonne3... dernière_colonne)
VALUES
	(value_colonne_1, value_colonne2, ... value_dernière_colonne)
;
````

**Note :** Chaque chaîne de caractère doit être mise entre guillemets simples. ex 'chaine de caractères'

Donc, dans notre exemple de la météo, ajoutons une rangée pour Arlon, où le maxima est 34 et le minima est 11.

````MySQL
INSERT INTO Météo
    (ville, haut, bas)
VALUES
    ('Arlon', 34, 11)
;
````

## Update : UPDATE

UPDATE te permet de mettre à jour une ou plusieurs rangées correspondant à une condition (clause WHERE)

````MySQL
UPDATE nom_de_la_table
SET nom_de_colonne = "nouvelle valeur"
WHERE nom_de_colonne OPERATEUR "valeur" 
	[and|or nom_de_colonne OPERATEUR "value"];

[ ] = optionnel
````

**Note:** n'oublie pas la clause WHERE quand tu UPDATE, sinon TOUTES les rangées de la table seront mises à jour!


## Delete : DELETE FROM

DELETE FROM permet de supprimer des données dans la DB.

````mySQL
DELETE from nom_de_la_table
WHERE nom_de_colonne OPERATEUR "valeur" 
[and|or "nom_de_colonne" OPERATEUR "valeur"];

[ ] = optionnel
````

**Note:** n'oublie pas la clause WHERE quand tu DELETE, sinon TOUTES les rangées de la table seront effacées!


## Vole de tes propres ailes

Réalise le quizz SQL de la W3School pour vérifier tes connaissances fraîchement acquises

** Voir quizz MySQL - résultat 23/25

Si le quizz se passe bien pas à l'étape d'installation de LAMP sur ta machine en suivant cette procédure:

## Installer MySQL sur ta machine

### Installer LAMP sur Ubuntu


https://github.com/becodeorg/BeCode.wiki.git

Voici comment créer un environnement de développement complet, incluant le combo LAMP:

**L**inux (déjà là puisque Ubuntu est une distribution de Linux)
**A**pache (le serveur web)
**M**ySQL (le serveur de bases de données)
**P**HP (logiciel Middleware (comparable à python, ruby, asp, ...)

1. Vérifie que ton système est à jour
````code
sudo apt-get update
````

2. Installe le package complet
````code
sudo apt-get install lamp-server^ (n'oublie pas l'accent circonflexe!)
````

3. Il y aura une invitation à indiquer un mot de passe pour mysql. Indique "user" ou choisis-en un autre mais alors, note le quelque part où tu le retrouveras facilement en temps utile (evernote, google docs...) .

4. Teste que ton serveur Apache fonctionne en allant sur http://localhost/

5. Teste que PHP fonctionne en créant un fichier :
````code
sudo touch /var/www/html/info.php
sudo nano /var/www/html/info.php
````

6. Mets ceci dans le fichier:

````php
<?php 
/* 
Cette fonction génère une liste renseignant 
pleins d'infos utiles sur ta version de PHP et sa configuration.
*/
phpinfo();  

````
7. CTRL+X pour quitter nano

8. Teste en visitant http://localhost/info.php Tu devrais voir la page d'info de PHP. Il te permet également de voir où se trouve le fichier de configuration de php (php.ini) pour le cas où tu as besoin de le modifier.

9. Voilà! Par défaut, Apache "sert" le dossier se trouvant à /var/www/html/ . Autrement dit, quand tu tapes http://localhost/dans ton navigateur, tu accèdes à tout ce qui se trouve dans le dossier /var/www/html/. C'est pour cela que l'on parle de "serveur web": un logiciel qui sert le contenu d'un dossier via une adresse URL. Comme eux:

## Serveurs

### Gestion des permissions

1. Il faut à présent donner des droits d'écriture, de lecture et d'exécution suffisant dans le dossier servi par le serveur Apache à son utilisateur (normalement il s'appelle : www-data) sudo chown -R www-data:www-data /var/www/.
2. Spécifie les droits de lecture (R), d' écriture (W) et d'exécution (X) pour ce dossier et tous ses fichiers et sous-dossiers: sudo chmod -R 775 /var/www/.
3. Pour que tu puisses aussi écrire dans ce dossier (en tant que "user"), le plus simple est d'ajouter ton propre utilisateur dans le groupe www-data (auquel appartient aussi l'utilisateur www-data). sudo usermod -a -G www-data YOURUSERNAME
4. Déconnecte-toi, puis reconnecte-toi pour qu'Ubuntu tienne compte des changements.

### Créer sa première base de données MySQL

1. mysql -u root -p
2. Il te demande le mot de passe de l'utilisateur root. Indique "user" (ou autre, selon ce que tu as spécifié ci-dessus).
3. A partir de ce moment, le prompteur s'attend à recevoir des instructions selon la syntaxe SQL.
Créons une base de données que l'on baptise: "test": 

À ce stade, tu as une base de données "test" vide. Utilise un outil tel que HeidiSQL, PhpMyAdmin ou MySQL Workbench pour te faciliter la création des tables nécessaires.

**Source**

jackreichert.com

### Créer une base de données

Une base de données (DB) est désigne essentiellement un ensemble de tables. Donc pour créer une table:

````MySQL
CREATE DATABASE nom_de_la_db;
````
Typiquement, le nom choisi correspond au nom de l'application motivaant la création de cette de.

### Créer des tables

Créer une table consiste à lui choisir un nom (par convention, toujours au pluriels puisque une table est destinée à contenir plusieurs éléments. Ensuite , il faut définir les colonnes décrivat chaque caractéristique utile de l'objet. C'est une partie un peu laborieuse: Il faut spécifier un nom et le type de données que va conteneir la colonne.

Les types principaux sont: 

* VARCHAR(255) : pour les textes courts (de 255 caractères ou moins). Exemple: adresse mail
**Note :** Si tu es certain(e) que toutes les valeurs à stocker auront exactement le même nombrede caractères, alors utilise plutôt CHAR(x) (x étant le nombre de caractères)
* INT: pour les valeurs numériques (chiffres). Par exemple, un age, une pointure de chaussure
* TEXT : pour des textes longs (pour une biographique par exemple, Booléen, Chiffre ("Integer') , etc. 
* DATE: pour stocker des dates.

````MySQL
CREATE TABLE octocats
    (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
;
````

Pour débuter, le mieux est d'installer sur ton serveur web un outil comme PhpMyAdmin. Il va te permettre de manipuler visuellement tes bases de données, tout en affichant à chaque fois la requête SQL générée. C'et une bonne manière d'apprendre.

## SQL + PHP = la classe PDO

Effectue ce petit exercice (il y a un tuto pour t'aider).

### Se connecter à une base de données avec PDO

**Pré-requis**

* Connaître les manipulations de base d'une BD
	* SELECT FROM
	* WHERE
	* HAVING
	* ORDER BY
* Avoir créé sa première base de données
	Suivre ce lien pour créer sa BD (déja effectuer plus haut:  taper dans la console: mysql -u root -p, puis le mot de passe de l'utilisateur root et introduire la commande create database test; (une nouvelle DB test vide vient d'être créer, on peut la voir dans phpmyAdmin)
* Être familiarisé à PHPMyAdmin

#### PDO : la théorie

PDO est une méthode d'accès aux bases de données: **P**HP **D**ata **O**bjects
PDO est activé apr défaut lorsque l'on installe php5.6 ou ultérieur.

Pour vérifier, rends-toi sur le fichier info.php précédement créer (à l'adresse http://localhost/info.php) et fais uen rechercher sur PDO (Ctrl + F)

Si il 'est pas activé, vous devez le faire manuellement dans le fichier php.ini et modifier cette ligne:
````code
pdo_mysql.default_socket = /opt/lampp/var/mysql/mysql.sock
````

#### Se connecter à la BD avec PDO

Tu dois créer une nouveau fichier PHP dans un nouveau sous-dossier de var/html et utiliser ce code:

````code
<?php
try
{
	// On se connecte à MySQL
	$bBD = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'MOTDEPASSE');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>
````

Pour que cela fonctionne, il te faut ces infos:

* le nom d'hôte (localhost): généralement ceci ne change pas;
* la base de données (becode) : c'est le nom de la base e données à manipuler qu'il faudra créer préalablement via PHPMyAdmin,
* le login (root) : ton nom d'utilisateur;
* le mot de passe: sous WAMP il n'y a pas de mot de passe, sous MAMP le mot de pass est par défaut root mais il se peut que tu l'aie changé lors de la modification des droits d'écriture.

Le TRY et le CATCH servent à vérifier qu'il n'y ait pas d'erreur.

#### Récupérer les données

##### Importer les données

Tu dois importer la table météo via PHPMyAdmin (via l'onglet "import") . Et ajouter dans ton fichier PHP à la suite du code précédent:

Pour importer la table meteo via PHPMyAdmin, il faut d'abord créer dans le dossier un nouveau fichier appelé meteo.sql dans lequel on copie colle, le code suivant:

````code
      CREATE TABLE meteo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO meteo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;
````

Puis on va dans PHPMyAdmin , on vérifie que l'on est bien positionner sur la DB becode et on va sur l'onglet importer, on selectionne le fichier meteo.sql et on laisse les options par défaut et on clique sur le bouton exécuter. Une nouvelle table meteo est créer dans la DB becode.

On peut également copier, coller directement le code de la table météo dans l'onglet MySQL de PHPMyAdmin puis cliquer sur le bouton exécuter, le résultat sera le même, une nouvelle table météo sera créée dans la db becode

````code
$resultat = $BD->query('SELECT * FROM meteo');
````

Le contenu des parenthèses est à modifier selon les opérations/manipulations que tu veux faire sur la BD. Le contenu de la BD est stocké sous forme d'objet dans la variable $resultat.

##### Afficher les données de la BD

On doit faire un fetch() sur la variable déclarée $resultat ($donnees donnera un ARRAY):

````code
$donnees = $resultat->fetch();
````

Ensuite il suffit de faire un echo sur la variable que tu as déclaré, ici c'est $donnees et la mettre dans une boucle: 

````code
while ($donnees = $resultat->fetch())
{
  echo $donnees['nom_de_la_colonne'];
}
````

où ['nom_de_la_colonne'] est facultatif et te permet de récupérer le contenu d'une colonne particulière. 

Enfin, il faudra ajouter cette dernière ligne pour **terminer le traitement** de la requête:

````code
$resultat->closeCursor();
````

Plus d'infos sur [PHP.net](http://php.net/manual/fr/book.pdo.php)

Résumé:

1. On a donc créer une table becode avec PHPMyAdmin que on a appelé becode
2. On a créer un nouveau dossier dans html (dossier serveur local) et créer à l'intérieur un fichier meteo.sql contenant le code suivant:

````code
      CREATE TABLE meteo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO meteo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;
````
4. On à importer dans PHPMyAdmin le fichier meteo.sql en vérifiant que l'on est bien positionner sur la base de données becode (dans la colonne de gauche)
3. On a créer dans le même dossier un fichier test.php qui contient le code suivant :

````php
<?php
try
{
	// On se connecte à MySQL
	$BD = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'user');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// On stocke dans une variable $resultat la totalité du tableau (toutes ses cellules) (*) de la table (array) meteo
$resultat = $BD->query('SELECT * FROM meteo');

// Grâce à la fonction fetch() on récupère et on stocke dans une variable $donnees, toutes les données du tableau météo pour pouvoir les traiter
$donnees = $resultat->fetch();

// On effectue ensuite une boucle while les données stockées dans la variable $données pour les afficher. On utilise la concaténation pour afficher de manière plus élégantes les informations
while ($donnees = $resultat->fetch())
{
  echo $donnees['ville']. ' : '. $donnees['haut']. ' - ' . $donnees['bas'];
	echo "<br/>";
}

// A l'affichage la boucle précédente affichera dans http://localhost/test/test.php, le résultat suivant:
// Liège : 25 - 15
// Namur : 26 - 15
// Charleroi : 25 - 12
// Bruges : 28 - 16

// On ajoute une dernière ligne de code avec la fonction closeCursor() qui permet de terminer le traitement de la requête
$resultat->closeCursor();
?>
````

Tout fonctionne? 
Passe à l'étape suivante:

## Exercice PHP / MySQL

Le but de cette série d'exercice est de maitriser la librairie php "PDO" (PHP Data Objects) pour manipuler des bases de données via PHP.


### Pré-requis

* LAMP installé et fonctionnel
* PHPMyAdmin installé et fonctionnel

### Préparation

On va créer une application "weather-app" qui doit simplement afficher les températures du jour (minima et maxima) pour des villes belges.

1. Dans PHPMyAdmin (http://localhost/phpmyadmin/), crée une base de données:

Pour cela aller dans PHPMyAdmin, cliquer sur la petite maison dans la colonne de gauche (juste sous le titre phpMyAdmin. Cela permet d'être certain que l'on est bien à la racine de localhost et pas dans une base de donnée existante.

2. Aller dans l'onglet SQL dans la colonne de droite (en haut est afficher "Exécuter une ou des requêtes SQL sur le serveur "localhost":" (cela vérifie que l'on est bien à la racine et pas dans une base de données éxistantes.

On va taper dans le champ, le code suivant:

````sql
CREATE DATABASE weatherapp;
````
puis cliquer sur le bouton "Exécuter". On constate qu'une nouvelle base de données a été ajoutée dans la colonne de droite et qui porte le nom de weatherapp. Pour l'instant cette nouvelle DB est vide, on va lui ajouter une table.

3. Cliquer sur weatherapp dans la colonne de gauche pour ajouter une nouvelle table dans cette DB. Aller dans l'onglet SQL dans la colonne de droite. En haut il devrait être indiqué "Exécuter une ou des requêtes SQL sur la base weatherapp: "Créer dans la DB weatherapp une nouvelle table appellée Météo en tapant le code suivant dans l'ongle SQL

````code
CREATE TABLE Météo
    (`ville` varchar(9), `haut` int, `bas` int);  
````

3. Taper ensuite le code suivant puis cliquer sur "Exécuter" pour ajouter des données dans la tables

````code

INSERT INTO Météo
    (`ville`, `haut`, `bas`)
VALUES
    ('Bruxelles', 27, 13),
    ('Liège', 25, 15),
    ('Namur', 26, 15),
    ('Charleroi', 25, 12),
    ('Bruges', 28, 16)
;
````

Ce code crée une table appelée Météo (contenant une série de villes, températures maxima et minima) qui sera ajoutée dans la DB weatherapp.

### Exercice

1. Crée un dossier dans lequel héberger cet exercice, par exemple: "php-pdo" quelque part dans le dossier servi par localhost. (sans doute /var/www/html

2. À l'intérieur, crée un fichier index.php

3. Modifie ce fichier php et crée un script qui:

* se connecte à la base de données weatherapp
* lit le contenu de la table Météo
* affiche un tableau html avec une rangée par rangée du tableau retourné
* Ajoute un formulaire avec 3 champs (ville, haut, bas) permettant d'ajouter d'autres villes

4. Fais en sorte que lorsque le formulaire est envoyé, son contenu soit ajouté à la table "Météo".

5. Fait? Ajoute à présent le code html nécessaire pour ajouter une checkbox à chaque ville, et fais en sorte, en php, que lorsqu'on clique dessus, cela efface la ville en question de la table "Météo".





