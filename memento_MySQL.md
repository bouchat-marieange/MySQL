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

[https://camo.githubusercontent.com/e65fedefdb7303b53c80d9e0959086f1aad92fe4/68747470733a2f2f676d6b722e696f2f732f3539343435336161656663383563356532613531303533382f30]

Chaque rangée (donc, ici, ville) est décrite par autant de colonnes que nécessaire par l'application (en anglais: column).

[https://camo.githubusercontent.com/1c26b23b9ab46b6a16f367d3d885f09fefe152c2/68747470733a2f2f676d6b722e696f2f732f3539343435333764353435363839323730646361393433312f30]

La donnée en elle-même se trouve dans une cellule (en anglais: cell).
La cellule

[https://github.com/becodeorg/Lovelace-promo-2/blob/master/Parcours/MySQL/assets/exemple-cellule.png?raw=true]


