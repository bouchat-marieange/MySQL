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

## Tutoriel OpenClassrooms

Source: [Tutoriel OpenClassrooms] (https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/lire-des-donnees-2)





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


#### Tester si un variable existe

Pour tester si un variable existe ou non on utilise la fonction native isset() dans un if...else. On peut également tester avec !isset() qui signifie si la variable n'existe pas.
La fonction isset() retourne true sur la variable existe et a une valeur autre que NULL et retourne FALSE si la variable n'existe pas ou à une valeur NULL.

````php

<?php

$var = ''; //Dans ce cas la variable existe mais son contenu est vide

// Ceci est vrai, alors le texte est affiché
if (isset($var)) {
    echo 'Cette variable existe, donc je peux l\'afficher.'; // la variable existe même si elle ne contient rien pour l'instant
}

// Dans les exemples suivants, nous utilisons var_dump() pour afficher 
// le retour de la fonction isset().
//var_dump()permet est une fonction native de PHP qui permet d'afficher les informations structurées d'une variable.
//unset() est une fonction native de PHP qui permet de détruire une variable. Après l'avoir utilisé sur une variable, celle-ci n'existe plus.


$a = 'test';
$b = 'anothertest';

var_dump(isset($a));      // TRUE 
var_dump(isset($a, $b)); // TRUE

unset ($a);

var_dump(isset($a));     // FALSE
var_dump(isset($a, $b)); // FALSE

$foo = NULL;
var_dump(isset($foo));   // FALSE

?>

````

Cela fonctionne aussi pour les tableaux

````php
<?php

$a = array ('test' => 1, 'bonjour' => NULL, 'pie' => array('a' => 'apple'));

var_dump(isset($a['test']));            // TRUE
var_dump(isset($a['foo']));             // FALSE
var_dump(isset($a['bonjour']));           // FALSE

// La clé 'bonjour' vaut NULL et est considérée comme non existante
// Si vous voulez vérifier l'existence de cette clé, utilisez cette fonction
var_dump(array_key_exists('bonjour', $a) ); // TRUE

// Vérification des valeurs en profondeur
var_dump(isset($a['pie']['a']));        // TRUE
var_dump(isset($a['pie']['b']));        // FALSE
var_dump(isset($a['cake']['a']['b']));  // FALSE
?>
````


### Théorie PHP - MySQL  - OpenClassrooms

**Se connecter à la base de données**

PHP est l'intermédiaire entre vous et MySQL. Cependant PHP ne peut pas envoyé directment des instructions à MySQL du type "Récupère-moi ces valeurs" sans fournir au préalable un nom d'utilisateur et mot de passe (sinon tout le monde pourrait accéder à la DB et lire les infos parfois confidentielles qu'elle contient)

Pour établir la connexion entre PHP et la DB il faut donc que PHP s'authentifie, on pourra ensuite réaliser des opérations sur la DB.

On utilise l'extension PDO (PHP Data Objects) pour établir cette connexion. Il s'agit d'un outil complet qui permet d'accéder à n'importe quelle base de données (MySQL, PostgreSQL, Oracle).

4 Renseignements sont nécessaires pour se connecter à la db avec PDO:

1. Le nom de l'hôte où MySQL est installé (localhost ou autre valeur renseignée par votre hébergeur type sql.hebergeur.com lorsque le site est en ligne)
2. Le nom de la base de données à laquelle on veut se connecter (ex: test). Nous l'avons créer avec PHPmyAdmin préalablement
3. Le login en local le plus souvent root ou si site en ligne login utiliser pour FTP
4. Le mot de passe , en local root ou autre (user) ou mot de passe utiliser pour FTP si site en ligne.Si pas de mot de passe laisser l'espace vide entouré de ''.

Voici le code pour se connecter à la DB avec PDO

````php
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'user');
?>
````

Cette ligne de code crée un objet $bdd, ce n'est pas une variable mais un objet qui représente la connexion avec la base de données.

Note: N'oubliez pas de changer votre login et mot de passe lorsque vous passerez du développement en local (localhost) à la mise en ligne de votre site sur internet avec login et mot de passe fournir par votre hébergeur.
Le premier paramètre (qui commence parmysql) s'appelle le DSN : Data Source Name. C'est généralement le seul qui change en fonction du type de base de données auquel on se connecte.

Test: Si la connexion s'est bien passé en allant sur la page localhost/ de votre projet,rien ne devrait s'afficher à l'écran. Si un message d'erreur s'affiche c'est qu'il y a une erreur dans les informations ou la syntaxe des informations fournies.

**Tester la présence d'erreurs**

Test: Si la connexion s'est bien passé en allant sur la page localhost/ de votre projet,rien ne devrait s'afficher à l'écran. Si un message d'erreur s'affiche c'est qu'il y a une erreur dans les informations ou la syntaxe des informations fournies. Hors PHP risque d'afficher toute la ligne qui pose erreur, ce qui inclust le mot de passe! Pour éviter que vos visiteurs puissent voir le mot de passe si une erreur survient, on écrit un code pour traiter cette éventuelle erreur. En cas d'erreur PDO renvoie ce qu'on appelle une exception qui permet de "capturer" l'erreur. Voici le code à  indiqué pour traiter l'erreur.

````php
<?php
try 
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
````

PHP essaie d'exécuter les instructions à l'intérieur du bloc try (connexion à la DB). Si il y a une erreur, il rentre dans le bloc catch et fait ce qu'on lui demande (ici: on arrête l'exécution de l apage en affichant un message décrivant l'erreur).

Si au contraire tout se passe bien, PHP poursuit l'exécution du code et ne lit pas ce qu'il y a dans le bloc catch. La page PHP ne devrait donc rien afficher pour le moment.

**Récupérer les données**

On peut soit créer une base de données directement dans PHPMyAdmin, ou importer une base de données déja toute faite au format .sql via PHPMyAdmin grâce à l'onglet importer en se positionnant préalablement sur la DB que l'on aura créer pour acceuillir la nouvelle table.

Ici on a créer une nouvelle base de données appellée Tuto_OpenClassrooms et nous avons impor$reponse = $bdd->query('Tapez votre requête SQL ici');ter le fichier fournis sur le site à l'adresse :https://static.oc-static.com/prod/courses/files/concevez-votre-site-web-avec-php-et-mysql/jeux_video.zip (dezipper le fichier puis importer avec les options par défaut dans l'onglet impoter de phpmyadmin en veillant à selectionner la bonne base de données auparavant). Voilà la table est importée. Nous allons maintenant en afficher le contenu.

**Récupéré le contenu d'une table contenue dans une DB**

Pour afficher une table, il faut faire une requête (query) en language MySQL pour demander à MySQL d'afficher ce que contient la table.

Pour cela nous avons besoin tout d'abord de notre objet représentant la connexion à la base de données ($bdd) que nous avons définit auparavant. 

````SQL
$reponse = $bdd->query('Tapez votre requête SQL ici');
````

On récupère avec la requête MySQL ce que la base de données va nous renvoyé dans une autre objet appelé ici $reponse.

````MySQL
SELECT * FROM jeux_video
````

* Select indique le type d'opération,select demande à MySQL d'afficher le contenu de la table
* "l'étoile" indique à MySQL d'afficher la totalité de la table (toutes les colonnes), on peut également indiqué des noms de certaines colonnes si on ne veut pas afficher toutes la table
* FROM signifie "dans" et fait la liaison entre le nom des champs et le nom de la table (ici: jeux_video)
* jeux_video: c'est le nom de la table dans laquelle il faut aller piocher.

Voici donc le code complet de la requête :

````php
<?php
$reponse = $bdd->query('SELECT * FROM jeux_video');
?>
````


**Afficher le contenu complet d'une table contenue dans une DB**

Voilà, maintenant réponse contient la réponse de MySQL et donc la totalité du contenu de la table jeux_video. Le problème c'est que $reponse contient quelque chose d'inseploitage. MySQL renvoie beaucoup d'informations qu'il faut organiser. Imaginer une table de 10 champs avec 200 entrées représente plus de 2000 informations. Pour ne pas tout traiter d'un coup, on extrait cette réponse ligne apr ligne, c'est à dire entrée par entrée.

Pour récupérer une entrée, on prend la réponse de MySQL et on y exécute fetch(), ce qui nous renvoie la première ligne. fetch en anglais veut dire "va chercher".

````php
<?php
$donnees = $reponse->fetch();
?>
````

$donnees est un array qui contient champ par champ les valeur de la premiere entrée.
Par exemple, si on s'intéresse au champ console, on utilisera l'array $donnees['console']

Il faut faire une boucle pour parcourir les entrées une par une. Chaque fois que l'on appelle $reponse->fetch(); on passe à l'entrée suivante. La boucle est donc répétée autaut de fois qu'il y a d'entrée dans la table.


**Code complet d'affichage du contenu de toute la table contenue dans la DB et résultat**

````php
<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM jeux_video');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
````

Affichera ceci:

![résultat affichage](https://sdz-upload.s3.amazonaws.com/prod/upload/0163.png)



**Différence entre $reponse et $données**

**$reponse** contient toute la réponse de MYSQL en frac sous forme d'objet, mais pas encore exploitable directement

**$donnees** est un array renvoyé par le fetch(). Chaque fois qu'on fait une boucle, fetch va chercher dans $reponse l'entrée suivant et organise les champs dans l'array $donnees.


**Explication de la ligne while ($donnees = $reponse->fetch())**

La ligne while ($donnees = $reponse->fetch()) fait deux choses à la fois: 

* Elle récupère uen nouvelle entrée et place son contenu dans $donnees
* Elle vérifie si $donnees vaut vrai ou faux.

Le fetch renvoie faux (false) dans $donnees lorsqu'il est arrivé à la fin des données, c'est à dire que toutes les entrées ont été passées en revue. Dans ce cas, la condition while vaut faux et la boucle s'arrête. 

Attention:

A la fin de la ligne on note la présence de ce code:

````php
<?php $reponse->closeCursor(); ?>
````

Ce code doit être appelé à chaque fois que l'on a fini de traiter le retour d'une requête pour éviter d'avoir des problèmes à la requête suivante. Elle provoque la "fermeture du curseur d'analyse de résultats". Cela veut dire que l'on a terminé le travail sur la requête.


**Afficher seulement le contenu de quelques champs**

On n'est pas obliger d'afficher tout les champs, si on veut juste lister le nom des jeux on utilise la requête suivante:

````MySQL
SELECT nom FROM jeux_video
````

Et donc le code complet sera:

````php
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom FROM jeux_video');

while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

?>
````

Cela affichera uniquement la liste des noms de tous les jeux contenu dasns la table jeux_video.


**Important - A retenir**

* La connexion à la base de données n'a besoin d'être faite qu'une seule fois, au début de la page.
* Il faut fermer les résultats de recherche avec closeCursor() après avoir traité chaque requête.



**Les critères de sélection**

On peut également filtrer les résultats qui seront affiché grâce aux mots clés:

* WHERE
* ORDER BY
* LIMIT

WHERE: permet de trier les données. Par exemple: SELECT * FROM jeux_video WHERE possesseur='Patrick'
Cela signifie "Selectionner tous les champs de la table jeux_video lorsuque le champ possesseur est égal à Patrick". Il faut délimiter les chaînes de caractères entre apostrophes(ex: 'Patrick') mais pas nécessaire pour les nombres. (ex: 5)


````php
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Patrick\'');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
}

$reponse->closeCursor();

?>
````

Affichera ceci:

Sonic appartient à Patrick
Dead or Alive appartient à Patrick
Dead or Alive Xtreme Beack Volley Ball appartient à Patrick
....

Il est également paossible de combinner plusieurs conditions. Par exemple si on veut lister les jeux de Patrick qui'il vend à moins de 20€. On combine alors les critères de selection à l'aide du mot-clé AND (et) ou OR (ou)

````php
SELECT * FROM jeux_video WHERE possesseur='Patrick' AND prix < 20
````

**Order By**

ORDER BY permet d'ordonner les résultats par ordre ascendant **ASC** (du plus petit au plus grand ou A à Z) ou descendant **DESC** (du plus grand au plus petit ou de Z à A)


````php
SELECT * FROM jeux_video WHERE possesseur='Patrick' AND prix < 20
````
Ce qui signifie : « Sélectionner tous les champs de jeux_video et ordonner les résultats par prix croissants ».

Code complet:

````php
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY prix');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' coûte ' . $donnees['prix'] . ' EUR<br />';
}

$reponse->closeCursor();

?>
````

Affichera ceci:

Sonic coûte 2.0 EUR
The Rocketeer coûte 2.0 EUR
Super Mario Bros coûte 4.0 EUR
...

POur classer par ordre décroissant on utilisera le code: 

````php
SELECT * FROM jeux_video ORDER BY prix DESC
````

Ce qui signifie: « Sélectionner tous les champs de jeux_video, et ordonner les résultats par prix décroissants »

Si on avait utiliser ORDER BY sur le champ contenant du texte, le classement aurait été fait par ordre alphabétique.

**LIMIT**

LIMIT permet de ne selectionner qu'une partie des résultat (par exemple les 20 premiers), c'est très utiles lorsque l'on a beaucoup de résultat et que l'on souhaite les paginez (ex: afficher les 30 premier résultats sur la page 1, les 30 suivants sur la page 2,...)

A la fin de la requête, il faut ajouter le mot-clé LIMIT suivi de deux nombres séparés par une virgule.

````php
SELECT * FROM jeux_video LIMIT 0, 20
````

Ces deux nombres ont un sens bien précis:

* Le premier chiffre indique à partir de quelle entrée on commence à lire la table. Si on met "0" cela correspond à la première entrée. Exemple: Pour une requête qui renvoie 100 resultats, LIMIT tronquera à partir du premier resultat sui on indique 0, à partir du 21e resultat si on indique 20, etc..
* Le 2e nombre indique combien d'entrée doivent être seletionnée. 
Par exemple:

* LIMIT 0, 20 : affiche les vingt premières entrées ;
* LIMIT 5, 10 : affiche de la sixième à la quinzième entrée ;
* LIMIT 10, 2 : affiche la onzième et la douzième entrée.

Voici le code complet pour afficher les noms des 10 premiers jeux de la tables : 

````php
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom FROM jeux_video LIMIT 0, 10');

echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';
while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

?>
````

**Toutes les requêtes SQL cumulées**

Attention lorsque l'on cumule différentes requêtes SQL, il faut respecter les mots clefs dans l'ordre suivant: WHERE, ORDER BY puis LIMIT

Exemple:

````php
SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0,10
````

Cette requête affichera le nom du jeux, son possesseur, le type de console, et le prix de la table jeux_video uniquement pour le type de console Xbox ou PS2 en les classant par ordre de prix décroissant (du plus cher au moins cher) et n'affichera que les 10 premiers résultats.


**Construire des requêtes en fonction de variables**

Il faut éviter de concaténer une variable dans une requête. Ici on affiche les jeux appartenant à Patrick. 

Note: Il est nécessaire d'entourer la chaîne de caractères d'apostrophes comme indiqué d'où la présence d'antislashs pour insérer les apostrophe \'

````php
<?php
$reponse = $bdd->query('SELECT nom FROM jeux_video WHERE possesseur=\'Patrick\'');
?>
````
 
Si on veut par exemple afficher les jeux appartenant à un possesseur récupérer en GET, il faut éviter de faire ceci:

````php
<?php
$reponse = $bdd->query('SELECT nom FROM jeux_video WHERE possesseur=\'' . $_GET['possesseur'] . '\'');
?>
````

Ce code fonctionne mais est la parfaite représentation de ce qu'il ne faut pas faire. Pourquoi?
Parce que si la variable $_GET['possesseur'] a été modifie par un visiteur (qui peut être mal intentionné) il y a un gros risque de faille de sécurité appellée injection SQL. Ainsi un visiteur pourrait s'amuser à insérer une requête SQL au milieur de la vôtre et potentiellement lire tout le contenu de votre base de données, comme par exemple la liste des motes de passe de vos utilisateurs.

Pour éviter ce problème, nous allons utiliser un moyen plus sûr d'adapter nos requêtes en fonctions de variables: Les requêtes préparées

**Les requêtes préparées**

Les requêtes préparées sont plsu sûr mais aussi plus rapides pour la base de données si la requête est exécutée plusieurs fois. C'est ce qui est préconiser si on veut adapter une requête en fonction d'une ou plusieurs variables (récupérée via un formulaire en get ou en post par exemple)

D'abord on prépare la requête sans sa partie variable qui sera représenté par un ?

````php
<?php
$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
?>
````

Cette fois, on n'exécute pas la requête avec query() mais on appelle prepare(). La requête est alors prête sans sa partie variable. il faut encore l'exécuter en appelant execute et lui transmettre la liste des paramètres.


````php
<?php
$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
$req->execute(array($_GET['possesseur']));
?>
````

la requête est alors exécutée à l'aide des paramètres que l'on a indiqués sous forme d'array. 

Si il y a plusieurs marqueurs, il faut indiquer les paramètres dans le bon ordre: 

````php
<?php
$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? AND prix <= ?');
$req->execute(array($_GET['possesseur'], $_GET['prix_max']));
?>
````

Le premier point d'interrogation de la requête sera remplacé par le contenue de la variable $_GET['possesseur'], et le seconde par le contenu de ]_GET['prix_max']. Le contenu de ces variables aura été automatiquement sécurisé pour prévenir les risques d'injections SQL.

Voici le code complet capable de lister les jeux appartenant à une personnes et dont le prix ne dépasse pas une certaine somme: 

````php
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'], $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

?>
````

Attention: Bien que la requête soit "sécurisée" (élimination des risques d'injection SQL), il faudra quand même vérifier que $_GET['prix_max'] contient bien un nombre et qu'il est compris dans un intervalle correct. Il faut donc effectuer des vérifications supplémentaires si cela est nécessaire.


**Une page dont le contenu change en fonction des paramètres reçus**

Si la requête contient beaucoup de parties variables, il peut être plus pratique de nommer les marqueurs plutôt que d'utiliser des points d'interrogation.

````php
<?php
$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));
?>
````

Les points d'interrogation ont étéremplacés par les marqueurs nominatifs :possesseur et :prixmax (ils doivent commencer parle symbole deux-points).

Cette fois-ci,ces marqueurs sont remplacés par les variables à l'aide d'un array associatif. Quand il y a beaucoup de paramètres, cela permet parfois d'avoir plus de clarté. De plus contrairement aux points d'interrogation, nous ne sommes cette fois plus obligés d'envoyér les variables dans le même ordre que la requête.


**Traquer les erreurs**

Lorsqu'une requête SQL plante, souvent PHP vous dira qu'il y a une erreur à la ligne fetch

Exemple: Fatal error: Call to a member function fetch() on a non-object in C:\wamp\www\tests\index.php on line 13

Ce n'est pas très précis et de plus ce n'est pas la ligne fetch qui est en cause, mais une erreur dans l'écriture de la requête SQL quelques lignes plus haut. 

Pour afficher des détails sur l'erreur, il faut activer les erreurs lors de la connexion à la la base de données via PDO. Il suffit pour cela d'ajouter un petit morceau de code à la ligne de connexion à la DB, comme ceci:

````php
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
````

Désormais, toutes vos requêtes SQL qui comportent des errreurs les afficheront avec une message beaucoup plus clair et précis.

Imaginons pas exemple que j'écrive mal le nom du champ

````php
<?php
$reponse = $bdd->query('SELECT champinconnu FROM jeux_video');
?>
````

L'erreur suivant s'affichera:

Unknown column 'champinconnu' in 'field list'

Cela indique clairement que la colonne champinconnuest introuvable dans la liste des champs. En effet, il n'y a aucun champ qui s'appelle champinconnu.

## En résumé

* Pour dialoguer avec MySQL depuis PHP, on fait appel à l'extension PDO de PHP.
* Avant de dialoguer avec MySQL, il faut s'y connecter. On a besoin de l'adresse IP de la machine où se trouve MySQL, du nom de la base de données ainsi que d'un login et d'un mot de passe.
* Les requêtes SQL commençant parSELECT permettent de récupérer des informations dans une base de données.
* Il faut faire une boucle en PHP pour récupérer ligne par ligne les données renvoyées par MySQL.
* Le langage SQL propose de nombreux outils pour préciser nos requêtes, à l'aide notamment des mots-clésWHERE(filtre),ORDER BY(tri) etLIMIT(limitation du nombre de résultats).
* Pour construire une requête en fonction de la valeur d'une variable, on passe par un système de requête préparée qui permet d'éviter les dangereuses failles d'injection SQL.

### Exercice

1. Crée un dossier dans lequel héberger cet exercice, par exemple: "php-pdo" quelque part dans le dossier servi par localhost. (sans doute /var/www/html)

2. À l'intérieur, crée un fichier index.php

3. Modifie ce fichier php et crée un script qui:

* se connecte à la base de données weatherapp
* lit le contenu de la table Météo
* affiche un tableau html avec une rangée par rangée du tableau retourné
* Ajoute un formulaire avec 3 champs (ville, haut, bas) permettant d'ajouter d'autres villes

4. Fais en sorte que lorsque le formulaire est envoyé, son contenu soit ajouté à la table "Météo".

5. Fait? Ajoute à présent le code html nécessaire pour ajouter une checkbox à chaque ville, et fais en sorte, en php, que lorsqu'on clique dessus, cela efface la ville en question de la table "Météo".


## Base de données relationnelles

Des tables relationnelles, sont des tables ayant des relations entre elles.

!(tables relationnelles)[https://raw.githubusercontent.com/becodeorg/Lovelace-promo-2/master/Parcours/MySQL/assets/exemple-db-model.png]

### C'est quoi une relation?

En quoi consiste une relation. Grâce à une relation on peut faire des liens par exemple entre un objet et son propriétaire (veste avec étiquette portant le nom de son propriétaire).

Dans une base de données relationnelles, l'étiquette sera une numéro d'identifiant unique (il n'y en a pas 2 qui soient identiques dans une même table, pour éviter toute confusion).

### A quoi ça sert?

Si on doit créer une application pour BECODE qui gérerait les inscriptions et la répartitions des étudiants dans les différentes classes Becode. Cette application répondrait donc à la question :Quel étudiant va dans quelle classe?

Pour cela, l'application afficherait une liste des étudiants par classe, avec leur prénom et leur nom.

Chaque année, il y a de nouvelles classes et de nouveaux étudiants, on va créer une base de données pour gérer ces informations. De quelles tables at-t-on besoin?


### Comment faire pour stocker dans tes tables à quelle classe appartient chaque étudiant?

Voici la table stockant les "classes":

<p><strong>Table: Classes</strong></p>
<table>
<thead>
<tr>
<th>Classe</th>
</tr>
</thead>
<tbody>
<tr>
<td>BXCentral</td>
</tr>
<tr>
<td>Anderlecht</td>
</tr></tbody></table>

Avec cet identifiant unique (appelé ID), la table devient:

<table>
<thead>
<tr>
<th>ID</th>
<th>Classe</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>BXCentral</td>
</tr>
<tr>
<td>2</td>
<td>Anderlecht</td>
</tr></tbody></table>

Ainsi, si dans une autre table je veux faire référence à la classe "BXCentral", je pointe vers son ID: "1".

Donc, je pourrais stocker l'information permettant d'enregistrer à quelle classe appartient l'étudiant" dans la table "students" en ajoutant une colonne à cette fin, dans laquelle mon application stocke le numéro de l' ID de la classe concernée:

<table>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>classe_id</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Habib</td>
<td>1</td>
</tr>
<tr>
<td>2</td>
<td>Daniela</td>
<td>1</td>
</tr>
<tr>
<td>3</td>
<td>Claudy</td>
<td>2</td>
</tr>
<tr>
<td>4</td>
<td>Adrian</td>
<td>2</td>
</tr></tbody></table>

**Remarque:** 
Pour se faciliter la vie, je nomme la colonne en utilisant le nom de la table associée? ("table" + "_" + "clef primaire" = classe_id. En vérité, tu nommes ta colonne comme tu veux, mais c'est toujours payant de choisir systématiquement des noms simples et explicites).


### Comment faire une jointure ?

Sur base de classe_id, on peut maintenant retrouver à quel classe appartient chaque étudiant. En SQL , l'opération consiste à faire une **jointure** (remarque le mot JOIN suivi de la table à joindre à la première suivi de ON suivi d'une équivalence spécifiant quel colonne de la table A doit matcher quelle colonne de la table B. 

````SQL
SELECT * FROM students 
LEFT JOIN classes ON classes.id=students.classe_id;
````

Ce principe de relation est extrêmement puissnat. Il permet de créer des bases de données pour tout ce qu'il est possible d'imaginer de manière rationnelle.

## Les relations

### Relation 1-to-many (ou relation 1:N)

La relation qui relie classes et étudiants dans l'exemple précédent est une relation "1-to-many": chaque classe peut avoir plusieurs étudiants, mais chaque étudiant ne peut avoir qu'une suele classe.

Voici d'autres exemples de relation 1-to-many

* écrivain/livres: un écrivain a plusieurs livres, un livre n'a qu'un seul écrivain
* équipe football / joueur : une équipe de footballa à plusieurs joueurs/ un joueur n'a qu'une équipe de football.
* être humain/ ville de naissance : un être humain à une ville de naissance/ une ville à plus d'un humain.

### Relation many-to_many

Dans une relation "many-to-many", chaque rangée de la table A peut avoir une ou plusieurs relations avec des rangées de la table B. On a dès lors besoin d'une table spécifique stockant les relations.

Par exemple:

Une équipe de vendeurs doit vendre différents produits. On doit pouvoir CRUD les vendeurs (create, read, update, delete), les produits et les ventes. Une vente correspond en fait à stocker l'information comme quoi un vendeur untel à vendu une produit untel.

<p><strong>table: Sellers</strong></p>
<table>
<thead>
<tr>
<th>id</th>
<th>Seller Name</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>jacques</td>
</tr>
<tr>
<td>2</td>
<td>Thomas</td>
</tr>
<tr>
<td>3</td>
<td>John</td>
</tr></tbody></table>
<p><strong>table: Products</strong></p>
<table>
<thead>
<tr>
<th>id</th>
<th>Product Name</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Pommes</td>
</tr>
<tr>
<td>2</td>
<td>Poires</td>
</tr>
<tr>
<td>3</td>
<td>Bananes</td>
</tr></tbody></table>
<p><strong>table: purchases</strong></p>
<table>
<thead>
<tr>
<th>product_id</th>
<th>seller_id</th>
</tr>
</thead>
<tbody>
<tr>
<td>3</td>
<td>1</td>
</tr>
<tr>
<td>3</td>
<td>1</td>
</tr>
<tr>
<td>1</td>
<td>2</td>
</tr></tbody></table>


Cette table est appellée une table de jonction (voir la doc: http://www.databaseprimer.com/pages/relationship_xtox/).

Pour avoir le détail des ventes en SQL, on utilise la syntaxe JOIN:

````sql
SELECT * FROM purchases 
LEFT JOIN products ON purchases.product_id=products.id 
LEFT JOIN sellers ON sellers.id=purchases.seller_id ;
````

### Relation 1-to-1 (ou relation 1:1)

Très peu utilisée, en général il vaut mieux les fusionner en une seule table.
Doc: http://www.databaseprimer.com/pages/relationship_1to1/


### Exercices dans un outil de modélisation

Pour faire des exercices, il faut d'abord installer un outil visuel de modélisation de bases de données.

**Modèle Conceptuel de Données (MCD)**

Un MCD te permet de concevoir de manière visuelle ta base de données et les relations entre les tables.

MCD

En général, il y a moyen de le connecter à ton serveur local et d'ainsi appliquer les changements de ton modèle à la base de données. Il peut également générer automatiquement le code SQL nécessaire pour la création de ta base de données.

**Logiciel de MCD gratuits**

* MySql Workbench est le standard: gratuit, versatile mais parfois buggy et l'interface est peu intuitive.(https://www.mysql.com/products/workbench/)
	* pour l'installer: sudo apt-get install mysql-workbench
	* pour le lancer: mysql-workbench
* QuickDB permet de concevoir sa DB via un pseudocode simple et visualisé en temps réel.(https://app.quickdatabasediagrams.com/)
* DBeaver: permet de visualiser (mais pas de modifier) une base de données existante. Nécessite d'installer le JDK (https://dbeaver.jkiss.org/) (http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)
* ER diagram designer hébergé sur Inside.Becode.org (si jamais les autres outils chient dans la colle sur vos machines)(https://inside.becode.org/tools/sql/)
* PonyORM (https://ponyorm.com/)





