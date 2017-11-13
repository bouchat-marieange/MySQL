<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mysql.css">
    <title>MySQL - SELECT - Drill4</title>
  </head>

  <body>
    <h1>MySQL</h1>

    <h2>Exercices SELECT - Drill 4</h2>

    <p>Exercice réalisé dans le bac à sable à l'adresse : http://sqlfiddle.com/#!9/3c37f/1</p>

    <p class ="enonce">
      <ol>
        <li>Combien y a-t-il de garçons à Becode?</li>
        <li>Combien y a-t-il de filles à Becode/Central ?</li>
        <li>Combien y a-t-il de garçons à Becode/Central ?</li>
        <li>Combien y a-t-il d'octocats dont le prénom est 'Nadia' à becode?</li>
        <li>Sur ce nouveau SQLFiddle, trouve la fonction permettant de n'afficher que l'année de la colonne "birthdate" et affiche le prénom de tous les octocts et leur année de naissance. (indice: comment dit-on "année" en anglais?)</li>
      </ol>
    </p>

    <p class="reponse">

      1. Combien y a-t-il de garçons à Becode?

      <h4>Le tableau</h4>

      CREATE TABLE octocats
        (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
      ;

      INSERT INTO octocats
        (`promo`, `firstname`, `lastname`, `gender`, `birthdate`, `age`, `github`)
      VALUES
        ('promo1-central', 'Safia', 'Bihmedn', 'F', '17/11/1990', 26, 'Safia54'),
        ('promo1-central', 'salvatore', 'saia', 'M', '20/06/1978', 38, 'salv236'),
        ('promo1-central', 'Thomas', 'Demilito', 'M', '10/03/1989', 28, 'Blutshy'),
        ('promo1-central', 'Estelle', 'Desmeurs', 'F', '28/08/1991', 25, 'EstelleDesmeurs'),
        ('promo1-central', 'geoffrey', 'marique', 'M', '09/11/1990', 26, 'creageo'),
        ('promo1-central', 'Khaled', 'Nzisabira', 'M', '26/01/1995', 22, 'THEBUNICORN'),
        ('promo1-central', 'Jimmy', 'Riguelle', 'M', '05/09/1977', 39, 'jimmyriguelle'),
        ('promo1-central', 'Daniela', 'Santos', 'F', '29/05/1984', 33, 'dnllromao'),
        ('promo1-central', 'Gabriele', 'Virga', 'M', '09/10/1994', 22, 'GabrieleVir'),
        ('promo1-central', 'Kreshnik', 'Ibërdemaj', 'M', '30/07/1985', 31, 'beThek'),
        ('promo1-central', 'Dan', 'Jansoone', 'M', '18/10/1993', 23, 'DanJsn'),
        ('promo1-central', 'Jayce Marcel', 'Kaje Banziziki', 'M', '01/03/1992', 25, 'KJayce'),
        ('promo1-central', 'Eric', 'Nsukami Zaki Mbambu', 'M', '16/05/1978', 39, 'zakysun'),
        ('promo1-central', 'David', 'Vandervaeren', 'M', '22/11/1988', 28, 'ddvdv'),
        ('promo1-central', 'Habib', 'El Maaza Gomez', 'M', '27/01/1972', 45, 'ModjoInc'),
        ('promo1-central', 'Ludovic', 'Patho', 'M', '24/06/1984', 32, 'LudovicPatho'),
        ('promo1-central', 'Santiago', 'Astete', 'M', '24/04/2017', 49, 'GitSanty'),
        ('promo1-central', 'Nadia', 'Nachit', 'F', '30/03/1982', 35, 'Nadia098'),
        ('promo1-central', 'Hugo', 'Barcelona', 'M', '31/05/1989', 27, 'kvalrie'),
        ('promo1-anderlecht', 'Miriam', 'Azzouz', 'F', '03/01/1980', 37, 'soyouz21'),
        ('promo1-anderlecht', 'Nadia', 'Benazouz', 'F', '25/08/1981', 35, 'nadiabena'),
        ('promo1-anderlecht', 'Hania', 'Doumer', 'F', '03/08/1973', 43, 'anya75'),
        ('promo1-anderlecht', 'Victor', 'Lanckriet', 'M', '09/05/1996', 21, 'lanckrietvictor'),
        ('promo1-anderlecht', 'Gary', 'Luypaert', 'M', '21/07/1989', 27, 'GaryLuypaert'),
        ('promo1-anderlecht', 'Michael', 'Mesmeaker', 'M', '07/04/1993', 24, 'Rivanos'),
        ('promo1-anderlecht', 'Japhet', 'Nkouayi', 'M', '04/04/1992', 25, 'JaphetNkouayi'),
        ('promo1-anderlecht', 'Juan Pablo', 'Quintero Torres', 'M', '25/01/1991', 26, 'Jqu1nteroT'),
        ('promo1-anderlecht', 'Thomas', 'Tonneau', 'M', '03/10/1993', 23, 'Thomas-Tonneau'),
        ('promo1-anderlecht', 'Claudy', 'Via', 'M', '29/11/1960', 56, 'ezaho'),
        ('promo1-anderlecht', 'Gilles', 'Youtou', 'M', '28/12/1978', 38, 'bbycode'),
        ('promo1-anderlecht', 'Adrian', 'Zochowski', 'M', '18/03/1996', 21, 'Zochowski'),
        ('promo1-anderlecht', 'Maria', 'Pedro Miala', 'F', '23/08/1980', 36, 'JOVITQ')
      ;


      <h4>La réquête SQL</h4>

          SELECT COUNT(*)
          FROM
          octocats
          WHERE
          gender='M'
          ;


      <h4>Le résultat</h4>

          | COUNT(*) |
          |----------|
          |       24 |

    </p>


    <p class="reponse">

      2. Combien y a-t-il de filles à Becode/Central ?

      <h4>Le tableau</h4>

      CREATE TABLE octocats
        (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
      ;

      INSERT INTO octocats
        (`promo`, `firstname`, `lastname`, `gender`, `birthdate`, `age`, `github`)
      VALUES
        ('promo1-central', 'Safia', 'Bihmedn', 'F', '17/11/1990', 26, 'Safia54'),
        ('promo1-central', 'salvatore', 'saia', 'M', '20/06/1978', 38, 'salv236'),
        ('promo1-central', 'Thomas', 'Demilito', 'M', '10/03/1989', 28, 'Blutshy'),
        ('promo1-central', 'Estelle', 'Desmeurs', 'F', '28/08/1991', 25, 'EstelleDesmeurs'),
        ('promo1-central', 'geoffrey', 'marique', 'M', '09/11/1990', 26, 'creageo'),
        ('promo1-central', 'Khaled', 'Nzisabira', 'M', '26/01/1995', 22, 'THEBUNICORN'),
        ('promo1-central', 'Jimmy', 'Riguelle', 'M', '05/09/1977', 39, 'jimmyriguelle'),
        ('promo1-central', 'Daniela', 'Santos', 'F', '29/05/1984', 33, 'dnllromao'),
        ('promo1-central', 'Gabriele', 'Virga', 'M', '09/10/1994', 22, 'GabrieleVir'),
        ('promo1-central', 'Kreshnik', 'Ibërdemaj', 'M', '30/07/1985', 31, 'beThek'),
        ('promo1-central', 'Dan', 'Jansoone', 'M', '18/10/1993', 23, 'DanJsn'),
        ('promo1-central', 'Jayce Marcel', 'Kaje Banziziki', 'M', '01/03/1992', 25, 'KJayce'),
        ('promo1-central', 'Eric', 'Nsukami Zaki Mbambu', 'M', '16/05/1978', 39, 'zakysun'),
        ('promo1-central', 'David', 'Vandervaeren', 'M', '22/11/1988', 28, 'ddvdv'),
        ('promo1-central', 'Habib', 'El Maaza Gomez', 'M', '27/01/1972', 45, 'ModjoInc'),
        ('promo1-central', 'Ludovic', 'Patho', 'M', '24/06/1984', 32, 'LudovicPatho'),
        ('promo1-central', 'Santiago', 'Astete', 'M', '24/04/2017', 49, 'GitSanty'),
        ('promo1-central', 'Nadia', 'Nachit', 'F', '30/03/1982', 35, 'Nadia098'),
        ('promo1-central', 'Hugo', 'Barcelona', 'M', '31/05/1989', 27, 'kvalrie'),
        ('promo1-anderlecht', 'Miriam', 'Azzouz', 'F', '03/01/1980', 37, 'soyouz21'),
        ('promo1-anderlecht', 'Nadia', 'Benazouz', 'F', '25/08/1981', 35, 'nadiabena'),
        ('promo1-anderlecht', 'Hania', 'Doumer', 'F', '03/08/1973', 43, 'anya75'),
        ('promo1-anderlecht', 'Victor', 'Lanckriet', 'M', '09/05/1996', 21, 'lanckrietvictor'),
        ('promo1-anderlecht', 'Gary', 'Luypaert', 'M', '21/07/1989', 27, 'GaryLuypaert'),
        ('promo1-anderlecht', 'Michael', 'Mesmeaker', 'M', '07/04/1993', 24, 'Rivanos'),
        ('promo1-anderlecht', 'Japhet', 'Nkouayi', 'M', '04/04/1992', 25, 'JaphetNkouayi'),
        ('promo1-anderlecht', 'Juan Pablo', 'Quintero Torres', 'M', '25/01/1991', 26, 'Jqu1nteroT'),
        ('promo1-anderlecht', 'Thomas', 'Tonneau', 'M', '03/10/1993', 23, 'Thomas-Tonneau'),
        ('promo1-anderlecht', 'Claudy', 'Via', 'M', '29/11/1960', 56, 'ezaho'),
        ('promo1-anderlecht', 'Gilles', 'Youtou', 'M', '28/12/1978', 38, 'bbycode'),
        ('promo1-anderlecht', 'Adrian', 'Zochowski', 'M', '18/03/1996', 21, 'Zochowski'),
        ('promo1-anderlecht', 'Maria', 'Pedro Miala', 'F', '23/08/1980', 36, 'JOVITQ')
      ;


      <h4>La réquête SQL</h4>

          SELECT COUNT(*)
          FROM
          octocats
          WHERE
          promo='promo1-central' AND gender='F'
          ;


      <h4>Le résultat</h4>

          | COUNT(*) |
          |----------|
          |        4 |

    </p>


    <p class="reponse">

      3. Combien y a-t-il de garçons à Becode/Central ?

      <h4>Le tableau</h4>

      CREATE TABLE octocats
        (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
      ;

      INSERT INTO octocats
        (`promo`, `firstname`, `lastname`, `gender`, `birthdate`, `age`, `github`)
      VALUES
        ('promo1-central', 'Safia', 'Bihmedn', 'F', '17/11/1990', 26, 'Safia54'),
        ('promo1-central', 'salvatore', 'saia', 'M', '20/06/1978', 38, 'salv236'),
        ('promo1-central', 'Thomas', 'Demilito', 'M', '10/03/1989', 28, 'Blutshy'),
        ('promo1-central', 'Estelle', 'Desmeurs', 'F', '28/08/1991', 25, 'EstelleDesmeurs'),
        ('promo1-central', 'geoffrey', 'marique', 'M', '09/11/1990', 26, 'creageo'),
        ('promo1-central', 'Khaled', 'Nzisabira', 'M', '26/01/1995', 22, 'THEBUNICORN'),
        ('promo1-central', 'Jimmy', 'Riguelle', 'M', '05/09/1977', 39, 'jimmyriguelle'),
        ('promo1-central', 'Daniela', 'Santos', 'F', '29/05/1984', 33, 'dnllromao'),
        ('promo1-central', 'Gabriele', 'Virga', 'M', '09/10/1994', 22, 'GabrieleVir'),
        ('promo1-central', 'Kreshnik', 'Ibërdemaj', 'M', '30/07/1985', 31, 'beThek'),
        ('promo1-central', 'Dan', 'Jansoone', 'M', '18/10/1993', 23, 'DanJsn'),
        ('promo1-central', 'Jayce Marcel', 'Kaje Banziziki', 'M', '01/03/1992', 25, 'KJayce'),
        ('promo1-central', 'Eric', 'Nsukami Zaki Mbambu', 'M', '16/05/1978', 39, 'zakysun'),
        ('promo1-central', 'David', 'Vandervaeren', 'M', '22/11/1988', 28, 'ddvdv'),
        ('promo1-central', 'Habib', 'El Maaza Gomez', 'M', '27/01/1972', 45, 'ModjoInc'),
        ('promo1-central', 'Ludovic', 'Patho', 'M', '24/06/1984', 32, 'LudovicPatho'),
        ('promo1-central', 'Santiago', 'Astete', 'M', '24/04/2017', 49, 'GitSanty'),
        ('promo1-central', 'Nadia', 'Nachit', 'F', '30/03/1982', 35, 'Nadia098'),
        ('promo1-central', 'Hugo', 'Barcelona', 'M', '31/05/1989', 27, 'kvalrie'),
        ('promo1-anderlecht', 'Miriam', 'Azzouz', 'F', '03/01/1980', 37, 'soyouz21'),
        ('promo1-anderlecht', 'Nadia', 'Benazouz', 'F', '25/08/1981', 35, 'nadiabena'),
        ('promo1-anderlecht', 'Hania', 'Doumer', 'F', '03/08/1973', 43, 'anya75'),
        ('promo1-anderlecht', 'Victor', 'Lanckriet', 'M', '09/05/1996', 21, 'lanckrietvictor'),
        ('promo1-anderlecht', 'Gary', 'Luypaert', 'M', '21/07/1989', 27, 'GaryLuypaert'),
        ('promo1-anderlecht', 'Michael', 'Mesmeaker', 'M', '07/04/1993', 24, 'Rivanos'),
        ('promo1-anderlecht', 'Japhet', 'Nkouayi', 'M', '04/04/1992', 25, 'JaphetNkouayi'),
        ('promo1-anderlecht', 'Juan Pablo', 'Quintero Torres', 'M', '25/01/1991', 26, 'Jqu1nteroT'),
        ('promo1-anderlecht', 'Thomas', 'Tonneau', 'M', '03/10/1993', 23, 'Thomas-Tonneau'),
        ('promo1-anderlecht', 'Claudy', 'Via', 'M', '29/11/1960', 56, 'ezaho'),
        ('promo1-anderlecht', 'Gilles', 'Youtou', 'M', '28/12/1978', 38, 'bbycode'),
        ('promo1-anderlecht', 'Adrian', 'Zochowski', 'M', '18/03/1996', 21, 'Zochowski'),
        ('promo1-anderlecht', 'Maria', 'Pedro Miala', 'F', '23/08/1980', 36, 'JOVITQ')
      ;


      <h4>La réquête SQL</h4>

          SELECT COUNT(*)
          FROM
          octocats
          WHERE
          promo='promo1-central' AND gender='M'
          ;


      <h4>Le résultat</h4>

          | COUNT(*) |
          |----------|
          |       15 |

    </p>


    <p class="reponse">

      4. Combien y a-t-il d'octocats dont le prénom est 'Nadia' à becode?

      <h4>Le tableau</h4>

      CREATE TABLE octocats
        (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
      ;

      INSERT INTO octocats
        (`promo`, `firstname`, `lastname`, `gender`, `birthdate`, `age`, `github`)
      VALUES
        ('promo1-central', 'Safia', 'Bihmedn', 'F', '17/11/1990', 26, 'Safia54'),
        ('promo1-central', 'salvatore', 'saia', 'M', '20/06/1978', 38, 'salv236'),
        ('promo1-central', 'Thomas', 'Demilito', 'M', '10/03/1989', 28, 'Blutshy'),
        ('promo1-central', 'Estelle', 'Desmeurs', 'F', '28/08/1991', 25, 'EstelleDesmeurs'),
        ('promo1-central', 'geoffrey', 'marique', 'M', '09/11/1990', 26, 'creageo'),
        ('promo1-central', 'Khaled', 'Nzisabira', 'M', '26/01/1995', 22, 'THEBUNICORN'),
        ('promo1-central', 'Jimmy', 'Riguelle', 'M', '05/09/1977', 39, 'jimmyriguelle'),
        ('promo1-central', 'Daniela', 'Santos', 'F', '29/05/1984', 33, 'dnllromao'),
        ('promo1-central', 'Gabriele', 'Virga', 'M', '09/10/1994', 22, 'GabrieleVir'),
        ('promo1-central', 'Kreshnik', 'Ibërdemaj', 'M', '30/07/1985', 31, 'beThek'),
        ('promo1-central', 'Dan', 'Jansoone', 'M', '18/10/1993', 23, 'DanJsn'),
        ('promo1-central', 'Jayce Marcel', 'Kaje Banziziki', 'M', '01/03/1992', 25, 'KJayce'),
        ('promo1-central', 'Eric', 'Nsukami Zaki Mbambu', 'M', '16/05/1978', 39, 'zakysun'),
        ('promo1-central', 'David', 'Vandervaeren', 'M', '22/11/1988', 28, 'ddvdv'),
        ('promo1-central', 'Habib', 'El Maaza Gomez', 'M', '27/01/1972', 45, 'ModjoInc'),
        ('promo1-central', 'Ludovic', 'Patho', 'M', '24/06/1984', 32, 'LudovicPatho'),
        ('promo1-central', 'Santiago', 'Astete', 'M', '24/04/2017', 49, 'GitSanty'),
        ('promo1-central', 'Nadia', 'Nachit', 'F', '30/03/1982', 35, 'Nadia098'),
        ('promo1-central', 'Hugo', 'Barcelona', 'M', '31/05/1989', 27, 'kvalrie'),
        ('promo1-anderlecht', 'Miriam', 'Azzouz', 'F', '03/01/1980', 37, 'soyouz21'),
        ('promo1-anderlecht', 'Nadia', 'Benazouz', 'F', '25/08/1981', 35, 'nadiabena'),
        ('promo1-anderlecht', 'Hania', 'Doumer', 'F', '03/08/1973', 43, 'anya75'),
        ('promo1-anderlecht', 'Victor', 'Lanckriet', 'M', '09/05/1996', 21, 'lanckrietvictor'),
        ('promo1-anderlecht', 'Gary', 'Luypaert', 'M', '21/07/1989', 27, 'GaryLuypaert'),
        ('promo1-anderlecht', 'Michael', 'Mesmeaker', 'M', '07/04/1993', 24, 'Rivanos'),
        ('promo1-anderlecht', 'Japhet', 'Nkouayi', 'M', '04/04/1992', 25, 'JaphetNkouayi'),
        ('promo1-anderlecht', 'Juan Pablo', 'Quintero Torres', 'M', '25/01/1991', 26, 'Jqu1nteroT'),
        ('promo1-anderlecht', 'Thomas', 'Tonneau', 'M', '03/10/1993', 23, 'Thomas-Tonneau'),
        ('promo1-anderlecht', 'Claudy', 'Via', 'M', '29/11/1960', 56, 'ezaho'),
        ('promo1-anderlecht', 'Gilles', 'Youtou', 'M', '28/12/1978', 38, 'bbycode'),
        ('promo1-anderlecht', 'Adrian', 'Zochowski', 'M', '18/03/1996', 21, 'Zochowski'),
        ('promo1-anderlecht', 'Maria', 'Pedro Miala', 'F', '23/08/1980', 36, 'JOVITQ')
      ;


      <h4>La réquête SQL</h4>

          SELECT COUNT(*)
          FROM
          octocats
          WHERE
          firstname ='Nadia'
          ;


      <h4>Le résultat</h4>

          | COUNT(*) |
          |----------|
          |        2 |

    </p>


    <p class="reponse">

      5. Sur ce nouveau SQLFiddle, trouve la fonction permettant de n'afficher que <br/>
      l'année de la colonne "birthdate" et affiche le prénom de tous les octocts <br/>
      et leur année de naissance. (indice: comment dit-on "année" en anglais?)

      <h4>Le tableau</h4>

      CREATE TABLE octocats
        (`promo` varchar(17), `firstname` varchar(15), `lastname` varchar(19), `gender` varchar(1), `birthdate` varchar(10), `age` int, `mail` varchar(29), `github` varchar(15))
      ;

      INSERT INTO octocats
        (`promo`, `firstname`, `lastname`, `gender`, `birthdate`, `age`, `github`)
      VALUES
        ('promo1-central', 'Safia', 'Bihmedn', 'F', '17/11/1990', 26, 'Safia54'),
        ('promo1-central', 'salvatore', 'saia', 'M', '20/06/1978', 38, 'salv236'),
        ('promo1-central', 'Thomas', 'Demilito', 'M', '10/03/1989', 28, 'Blutshy'),
        ('promo1-central', 'Estelle', 'Desmeurs', 'F', '28/08/1991', 25, 'EstelleDesmeurs'),
        ('promo1-central', 'geoffrey', 'marique', 'M', '09/11/1990', 26, 'creageo'),
        ('promo1-central', 'Khaled', 'Nzisabira', 'M', '26/01/1995', 22, 'THEBUNICORN'),
        ('promo1-central', 'Jimmy', 'Riguelle', 'M', '05/09/1977', 39, 'jimmyriguelle'),
        ('promo1-central', 'Daniela', 'Santos', 'F', '29/05/1984', 33, 'dnllromao'),
        ('promo1-central', 'Gabriele', 'Virga', 'M', '09/10/1994', 22, 'GabrieleVir'),
        ('promo1-central', 'Kreshnik', 'Ibërdemaj', 'M', '30/07/1985', 31, 'beThek'),
        ('promo1-central', 'Dan', 'Jansoone', 'M', '18/10/1993', 23, 'DanJsn'),
        ('promo1-central', 'Jayce Marcel', 'Kaje Banziziki', 'M', '01/03/1992', 25, 'KJayce'),
        ('promo1-central', 'Eric', 'Nsukami Zaki Mbambu', 'M', '16/05/1978', 39, 'zakysun'),
        ('promo1-central', 'David', 'Vandervaeren', 'M', '22/11/1988', 28, 'ddvdv'),
        ('promo1-central', 'Habib', 'El Maaza Gomez', 'M', '27/01/1972', 45, 'ModjoInc'),
        ('promo1-central', 'Ludovic', 'Patho', 'M', '24/06/1984', 32, 'LudovicPatho'),
        ('promo1-central', 'Santiago', 'Astete', 'M', '24/04/2017', 49, 'GitSanty'),
        ('promo1-central', 'Nadia', 'Nachit', 'F', '30/03/1982', 35, 'Nadia098'),
        ('promo1-central', 'Hugo', 'Barcelona', 'M', '31/05/1989', 27, 'kvalrie'),
        ('promo1-anderlecht', 'Miriam', 'Azzouz', 'F', '03/01/1980', 37, 'soyouz21'),
        ('promo1-anderlecht', 'Nadia', 'Benazouz', 'F', '25/08/1981', 35, 'nadiabena'),
        ('promo1-anderlecht', 'Hania', 'Doumer', 'F', '03/08/1973', 43, 'anya75'),
        ('promo1-anderlecht', 'Victor', 'Lanckriet', 'M', '09/05/1996', 21, 'lanckrietvictor'),
        ('promo1-anderlecht', 'Gary', 'Luypaert', 'M', '21/07/1989', 27, 'GaryLuypaert'),
        ('promo1-anderlecht', 'Michael', 'Mesmeaker', 'M', '07/04/1993', 24, 'Rivanos'),
        ('promo1-anderlecht', 'Japhet', 'Nkouayi', 'M', '04/04/1992', 25, 'JaphetNkouayi'),
        ('promo1-anderlecht', 'Juan Pablo', 'Quintero Torres', 'M', '25/01/1991', 26, 'Jqu1nteroT'),
        ('promo1-anderlecht', 'Thomas', 'Tonneau', 'M', '03/10/1993', 23, 'Thomas-Tonneau'),
        ('promo1-anderlecht', 'Claudy', 'Via', 'M', '29/11/1960', 56, 'ezaho'),
        ('promo1-anderlecht', 'Gilles', 'Youtou', 'M', '28/12/1978', 38, 'bbycode'),
        ('promo1-anderlecht', 'Adrian', 'Zochowski', 'M', '18/03/1996', 21, 'Zochowski'),
        ('promo1-anderlecht', 'Maria', 'Pedro Miala', 'F', '23/08/1980', 36, 'JOVITQ')
      ;


      <h4>La réquête SQL</h4>

          SELECT
          firstname,
          YEAR(`birthdate`)
          FROM
          octocats
          ;


      <h4>Le résultat</h4>

          |    firstname | YEAR(`birthdate`) |
          |--------------|-------------------|
          |       Victor |              1996 |
          |       Adrian |              1996 |
          |       Khaled |              1995 |
          |     Gabriele |              1994 |
          |          Dan |              1993 |
          |       Thomas |              1993 |
          |      Michael |              1993 |
          |      Estelle |              1991 |
          | Jayce Marcel |              1992 |
          |       Japhet |              1992 |
          |        Safia |              1990 |
          |     geoffrey |              1990 |
          |   Juan Pablo |              1991 |
          |         Hugo |              1989 |
          |         Gary |              1989 |
          |       Thomas |              1989 |
          |        David |              1988 |
          |     Kreshnik |              1985 |
          |      Ludovic |              1984 |
          |      Daniela |              1984 |
          |        Nadia |              1982 |
          |        Nadia |              1981 |
          |        Maria |              1980 |
          |       Miriam |              1980 |
          |    salvatore |              1978 |
          |       Gilles |              1978 |
          |        Jimmy |              1977 |
          |         Eric |              1978 |
          |        Hania |              1973 |
          |        Habib |              1972 |
          |     Santiago |              2017 |
          |       Claudy |              1960 |

    </p>


    <p class="reponse">

      Sur le sqlfiddle bac à sable de Météo: http://sqlfiddle.com/#!9/6ddfd/2

      6. Trouve la fonction permettant de retourner un tableau contenant uniquement la température <br/>
      maximale prévue ("Demain le maxima observé en Belgique sera de ... degrés")

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
          haut
          FROM
          météo
          ORDER BY
          ville
          ASC LIMIT 0,1 ;

          ou

          SELECT
          MAX(haut)
          FROM
          Météo;

      <h4>Le résultat</h4>

          | haut |
          |------|
          |   28 |
    </p>


    <p class="reponse">

      Sur le sqlfiddle bac à sable de Météo: http://sqlfiddle.com/#!9/6ddfd/2

      7. Trouve la fonction permettant de retourner un tableau contenant uniquement <br/>
      la température minimale prévue ("Demain le minima observé en Belgique sera de ... degrés")

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
            MIN(bas)
            FROM
            Météo;

      <h4>Le résultat</h4>

          | MIN(bas) |
          |----------|
          |       12 |
    </p>

  </body>

</html>
