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

=	"égal à"
>	"plus grand que"
<	"plus petit que"
>=	"plus grand ou égal à"
<=	"plus petit ou égal à"
<>	"différent de"
LIKE "qui ressemble à"

Like permet de retourner des rangées qui "ressemblent à " une chaîne de caractère que tu spécifies, accompagnée du signe %, signe voulant dire "n'importe quel chaîne de caractère".

Pour un ordinateur cela signifie soit: 

* "qui commence par chaine_de_caractères". ( LIKE 'Er%' : tout mot commençant par "Er"),
* "qui termine par chaine_de_caractères" ( LIKE '%Er' : tout mot terminant par "Er"),
* ou "qui contient cette chaine_de_caractères" ( LIKE '%Er%' : tout mot contenant "Er").

C'est très utile pour ajouter une fonctionnalité de rechercher dans votre application. Pour des exemples lire plus d'infos ici: [http://www.sqlcourse.com/select.html]








