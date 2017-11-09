<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mysql.css">
    <title>MySQL</title>
  </head>

  <body>

    <h1>MySQL</h1>

    <h2>Exercices SELECT</h2>

    <p>Exercice réalisé dans le bac à sable à l'adresse : http://sqlfiddle.com/#!9/6ddfd/2</p>

    <p class ="enonce">
      Rends-toi sur notre premier bac à sable d'apprentissage.

      Utilise la zone éditable à droite pour écrire tes premières requêtes SQL.

      Trouve la syntaxe pour effectuer chacune des requêtes suivantes (lis bien la formulation, chaque mot a son importance!). Vérifie

      Retourne un tableau contenant

      uniquement les villes
      toutes les villes et leur température maximum
      toutes les villes et leur température minimum
      La ou les villes dont la température maximale dépasse 27 degrés
      La ou les villes dont la température minimale sera inférieure ou égale à 15 degrés
      La ou les villes dont la température minimale sera égale à 15 degrés
      La ou les villes dont la température minimale ne sera PAS égale à 15 degrés
      La ou les villes dont le nom commence par "Br"
      La ou les villes dont la température maximale se situe entre 26 et 28 degrés
      La ou les villes dont la température minimale est égale à 14 ou est égale à 16 degrés
      La ou les villes dont la température maximale est supérieure ou égale à 26 et la température minimale est inférieure à 14
      Fait? Tu as tout réussi? Alors passe à notre second Drill.
    </p>

    <p class="reponse">
      1. Retourne un tableau contenant uniquement les villes

      <h4>Le tableau</h4>

      CREATE TABLE Météo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO Météo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;

      <h4>La réquête SQL</h4>

      SELECT
      ville
      FROM
      Météo
      WHERE
      ;

      <h4>Le résultat</h4>

     |     ville |
     |-----------|
     | Bruxelles |
     |     Liège |
     |     Namur |
     | Charleroi |
     |    Bruges |
    </p>


    <p class="reponse">
      2. toutes les villes et leur température maximum

      <h4>Le tableau</h4>

      CREATE TABLE Météo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO Météo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;

      <h4>La réquête SQL</h4>

      SELECT
      ville,
      haut
      FROM
      Météo
      ;

      <h4>Le résultat</h4>

      |     ville | haut |
      |-----------|------|
      | Bruxelles |   27 |
      |     Liège |   25 |
      |     Namur |   26 |
      | Charleroi |   25 |
      |    Bruges |   28 |
    </p>



    <p class="reponse">
      3. toutes les villes et leur température minimum

      <h4>Le tableau</h4>

      CREATE TABLE Météo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO Météo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;

      <h4>La réquête SQL</h4>

      SELECT
      ville,
      bas
      FROM
      Météo
      ;

      <h4>Le résultat</h4>

      |     ville | bas |
      |-----------|-----|
      | Bruxelles |  13 |
      |     Liège |  15 |
      |     Namur |  15 |
      | Charleroi |  12 |
      |    Bruges |  16 |
    </p>

    <p class="reponse">
      4. La ou les villes dont la température maximale dépasse 27 degrés

      <h4>Le tableau</h4>

      CREATE TABLE Météo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO Météo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;

      <h4>La réquête SQL</h4>

      SELECT
      ville
      FROM
      Météo
      WHERE
      haut>27
      ;

      <h4>Le résultat</h4>

      |  ville |
      |--------|
      | Bruges |
    </p>


    <p class="reponse">
      5. La ou les villes dont la température minimale sera inférieure ou égale à 15 degrés

      <h4>Le tableau</h4>

      CREATE TABLE Météo
      (`ville` varchar(9), `haut` int, `bas` int)
      ;

      INSERT INTO Météo
        (`ville`, `haut`, `bas`)
      VALUES
        ('Bruxelles', 27, 13),
        ('Liège', 25, 15),
        ('Namur', 26, 15),
        ('Charleroi', 25, 12),
        ('Bruges', 28, 16)
      ;

      <h4>La réquête SQL</h4>

      SELECT
      ville,
      bas
      FROM
      Météo
      WHERE
      bas<=15
      ;

      <h4>Le résultat</h4>

      |     ville |
      |-----------|
      | Bruxelles |
      |     Liège |
      |     Namur |
      | Charleroi |
    </p>

  </body>

</html>
