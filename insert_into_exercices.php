<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mysql.css">
    <title>MySQL - INSERT INTO</title>
  </head>

  <body>
    <h1>MySQL</h1>

    <h2>Exercices INSERT INTO</h2>

    <p>Exercice réalisé dans le bac à sable à l'adresse : http://sqlfiddle.com/#!9/6ddfd/2. <br/>
      Utilise le champ éditable de gauche (celui de droite ne permet que les SELECT).</p>



    <p class ="enonce">
      Ajoute ensuite ta ville natale et ses températures min et max. <br/>
      Tape à chaque fois la commande (pas de copier/coller), <br/>
      pour que la syntaxe rentre dans tes doigts. <br/>
      Il n'y a rien d'autre de spécial à savoir à ce sujet et tu peux passer au sujet suivant.
    </p>

    <p class="reponse">


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
        ('Bruges', 28, 16),
        ('Chênée', 26, 14)
      ;

      <h4>La réquête SQL</h4>

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
          ('Bruges', 28, 16),
          ('Chênée', 26, 14)
        ;


          SELECT
          ville,
          haut,
          bas
          FROM
          Météo
          ;

      <h4>Le résultat</h4>

      |     ville | haut | bas |
      |-----------|------|-----|
      | Bruxelles |   27 |  13 |
      |     Liège |   25 |  15 |
      |     Namur |   26 |  15 |
      | Charleroi |   25 |  12 |
      |    Bruges |   28 |  16 |
      |    Chênée |   26 |  14 |

    </p>

  </body>

</html>
