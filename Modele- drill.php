<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mysql.css">
    <title>MySQL - SELECT - Drill3</title>
  </head>

  <body>
    <h1>MySQL</h1>

    <h2>Exercices SELECT - Drill 2</h2>

    <p>Exercice réalisé dans le bac à sable à l'adresse : http://sqlfiddle.com/#!9/3c37f/1</p>

    <p class ="enonce">
      <ol>
        <li>Affiche le prénom et nom de tous les octocats, par ordre alphabétique ascendant du prénom.</li>
        <li>Affiche le prénom et nom de tous les octocats, par ordre alphabétique descendant du nom de famille.</li>
        <li>Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé.</li>
        <li>Affiche le prénom, nom et âge de tous les octocats, du plus âgé au plus jeune.</li>
        <li>Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé, de la promo "promo1-central".</li>
        <li>Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé, de la promo "promo1-central" et dont l'âge se situe entre 23 et 28 ans.</li>
        <li>Affiche le prénom, nom, âge et genre de tous les octocats, du plus jeune au plus âgé, de la promo "promo1-central" et dont l'âge se situe entre 25 et 35 ans.</li>
        <li>Affiche le prénom, nom, âge et genre de tous les octocats, du plus jeune au plus âgé, de la promo "promo1-central", dont l'âge se situe entre 25 et 35 ans et dont le genre est masculin.</li>
        <li>Affiche le prénom, nom, âge de l'octocat le plus âgé de Becode/Central. Donc tu dois obtenir un tableau avec une seule rangée.</li>
      </ol>
    </p>

    <p class="reponse">

      1. Affiche le prénom et nom de tous les octocats, par ordre alphabétique ascendant du prénom.

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
        firstname
        FROM
        octocats
        ORDER BY
        firstname ASC;
        ;

      <h4>Le résultat</h4>

        |    firstname |
        |--------------|
        |       Adrian |
        |       Claudy |
        |          Dan |
        |      Daniela |
        |        David |
        |         Eric |
        |      Estelle |
        |     Gabriele |
        |         Gary |
        |     geoffrey |
        |       Gilles |
        |        Habib |
        |        Hania |
        |         Hugo |
        |       Japhet |
        | Jayce Marcel |
        |        Jimmy |
        |   Juan Pablo |
        |       Khaled |
        |     Kreshnik |
        |      Ludovic |
        |        Maria |
        |      Michael |
        |       Miriam |
        |        Nadia |
        |        Nadia |
        |        Safia |
        |    salvatore |
        |     Santiago |
        |       Thomas |
        |       Thomas |
        |       Victor |

    </p>

    <p class="reponse">

      2. Affiche le prénom et nom de tous les octocats, par ordre alphabétique descendant du nom de famille.

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
          lastname
          FROM
          octocats
          ORDER BY
          lastname DESC;
          ;


      <h4>Le résultat</h4>

        |    firstname |            lastname |
        |--------------|---------------------|
        |       Adrian |           Zochowski |
        |       Gilles |              Youtou |
        |     Gabriele |               Virga |
        |       Claudy |                 Via |
        |        David |        Vandervaeren |
        |       Thomas |             Tonneau |
        |      Daniela |              Santos |
        |    salvatore |                saia |
        |        Jimmy |            Riguelle |
        |   Juan Pablo |     Quintero Torres |
        |        Maria |         Pedro Miala |
        |      Ludovic |               Patho |
        |       Khaled |           Nzisabira |
        |         Eric | Nsukami Zaki Mbambu |
        |       Japhet |             Nkouayi |
        |        Nadia |              Nachit |
        |      Michael |           Mesmeaker |
        |     geoffrey |             marique |
        |         Gary |            Luypaert |
        |       Victor |           Lanckriet |
        | Jayce Marcel |      Kaje Banziziki |
        |          Dan |            Jansoone |
        |     Kreshnik |           Ibërdemaj |
        |        Habib |      El Maaza Gomez |
        |        Hania |              Doumer |
        |      Estelle |            Desmeurs |
        |       Thomas |            Demilito |
        |        Safia |             Bihmedn |
        |        Nadia |            Benazouz |
        |         Hugo |           Barcelona |
        |       Miriam |              Azzouz |
        |     Santiago |              Astete |

    </p>


    <p class="reponse">

      3. Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé.

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
          lastname,
          str_to_date(`birthdate`,'%d/%m/%Y')
          FROM
          octocats
          ORDER BY
          str_to_date(`birthdate`,'%d/%m/%Y') DESC;
          ;

      <h4>Le résultat</h4>

          |    firstname |            lastname | str_to_date(`birthdate`,'%d/%m/%Y') |
          |--------------|---------------------|-------------------------------------|
          |     Santiago |              Astete |                          2017-04-24 |
          |       Victor |           Lanckriet |                          1996-05-09 |
          |       Adrian |           Zochowski |                          1996-03-18 |
          |       Khaled |           Nzisabira |                          1995-01-26 |
          |     Gabriele |               Virga |                          1994-10-09 |
          |          Dan |            Jansoone |                          1993-10-18 |
          |       Thomas |             Tonneau |                          1993-10-03 |
          |      Michael |           Mesmeaker |                          1993-04-07 |
          |       Japhet |             Nkouayi |                          1992-04-04 |
          | Jayce Marcel |      Kaje Banziziki |                          1992-03-01 |
          |      Estelle |            Desmeurs |                          1991-08-28 |
          |   Juan Pablo |     Quintero Torres |                          1991-01-25 |
          |        Safia |             Bihmedn |                          1990-11-17 |
          |     geoffrey |             marique |                          1990-11-09 |
          |         Gary |            Luypaert |                          1989-07-21 |
          |         Hugo |           Barcelona |                          1989-05-31 |
          |       Thomas |            Demilito |                          1989-03-10 |
          |        David |        Vandervaeren |                          1988-11-22 |
          |     Kreshnik |           Ibërdemaj |                          1985-07-30 |
          |      Ludovic |               Patho |                          1984-06-24 |
          |      Daniela |              Santos |                          1984-05-29 |
          |        Nadia |              Nachit |                          1982-03-30 |
          |        Nadia |            Benazouz |                          1981-08-25 |
          |        Maria |         Pedro Miala |                          1980-08-23 |
          |       Miriam |              Azzouz |                          1980-01-03 |
          |       Gilles |              Youtou |                          1978-12-28 |
          |    salvatore |                saia |                          1978-06-20 |
          |         Eric | Nsukami Zaki Mbambu |                          1978-05-16 |
          |        Jimmy |            Riguelle |                          1977-09-05 |
          |        Hania |              Doumer |                          1973-08-03 |
          |        Habib |      El Maaza Gomez |                          1972-01-27 |
          |       Claudy |                 Via |                          1960-11-29 |

    </p>


    <p class="reponse">

      4. Affiche le prénom, nom et âge de tous les octocats, du plus âgé au plus jeune.

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
          lastname,
          str_to_date(`birthdate`,'%d/%m/%Y')
          FROM
          octocats
          ORDER BY
          str_to_date(`birthdate`,'%d/%m/%Y') ASC;
          ;

      <h4>Le résultat</h4>

          |    firstname |            lastname | str_to_date(`birthdate`,'%d/%m/%Y') |
          |--------------|---------------------|-------------------------------------|
          |       Claudy |                 Via |                          1960-11-29 |
          |        Habib |      El Maaza Gomez |                          1972-01-27 |
          |        Hania |              Doumer |                          1973-08-03 |
          |        Jimmy |            Riguelle |                          1977-09-05 |
          |         Eric | Nsukami Zaki Mbambu |                          1978-05-16 |
          |    salvatore |                saia |                          1978-06-20 |
          |       Gilles |              Youtou |                          1978-12-28 |
          |       Miriam |              Azzouz |                          1980-01-03 |
          |        Maria |         Pedro Miala |                          1980-08-23 |
          |        Nadia |            Benazouz |                          1981-08-25 |
          |        Nadia |              Nachit |                          1982-03-30 |
          |      Daniela |              Santos |                          1984-05-29 |
          |      Ludovic |               Patho |                          1984-06-24 |
          |     Kreshnik |           Ibërdemaj |                          1985-07-30 |
          |        David |        Vandervaeren |                          1988-11-22 |
          |       Thomas |            Demilito |                          1989-03-10 |
          |         Hugo |           Barcelona |                          1989-05-31 |
          |         Gary |            Luypaert |                          1989-07-21 |
          |     geoffrey |             marique |                          1990-11-09 |
          |        Safia |             Bihmedn |                          1990-11-17 |
          |   Juan Pablo |     Quintero Torres |                          1991-01-25 |
          |      Estelle |            Desmeurs |                          1991-08-28 |
          | Jayce Marcel |      Kaje Banziziki |                          1992-03-01 |
          |       Japhet |             Nkouayi |                          1992-04-04 |
          |      Michael |           Mesmeaker |                          1993-04-07 |
          |       Thomas |             Tonneau |                          1993-10-03 |
          |          Dan |            Jansoone |                          1993-10-18 |
          |     Gabriele |               Virga |                          1994-10-09 |
          |       Khaled |           Nzisabira |                          1995-01-26 |
          |       Adrian |           Zochowski |                          1996-03-18 |
          |       Victor |           Lanckriet |                          1996-05-09 |
          |     Santiago |              Astete |                          2017-04-24 |

    </p>


    <p class="reponse">

      5. Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé, de la promo "promo1-central".

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
          lastname,
          str_to_date(`birthdate`,'%d/%m/%Y')
          FROM
          octocats
          WHERE
          promo='promo1-central'
          ORDER BY
          str_to_date(`birthdate`,'%d/%m/%Y') DESC;
          ;

      <h4>Le résultat</h4>

          |    firstname |            lastname | str_to_date(`birthdate`,'%d/%m/%Y') |
          |--------------|---------------------|-------------------------------------|
          |     Santiago |              Astete |                          2017-04-24 |
          |       Khaled |           Nzisabira |                          1995-01-26 |
          |     Gabriele |               Virga |                          1994-10-09 |
          |          Dan |            Jansoone |                          1993-10-18 |
          | Jayce Marcel |      Kaje Banziziki |                          1992-03-01 |
          |      Estelle |            Desmeurs |                          1991-08-28 |
          |        Safia |             Bihmedn |                          1990-11-17 |
          |     geoffrey |             marique |                          1990-11-09 |
          |         Hugo |           Barcelona |                          1989-05-31 |
          |       Thomas |            Demilito |                          1989-03-10 |
          |        David |        Vandervaeren |                          1988-11-22 |
          |     Kreshnik |           Ibërdemaj |                          1985-07-30 |
          |      Ludovic |               Patho |                          1984-06-24 |
          |      Daniela |              Santos |                          1984-05-29 |
          |        Nadia |              Nachit |                          1982-03-30 |
          |    salvatore |                saia |                          1978-06-20 |
          |         Eric | Nsukami Zaki Mbambu |                          1978-05-16 |
          |        Jimmy |            Riguelle |                          1977-09-05 |
          |        Habib |      El Maaza Gomez |                          1972-01-27 |

    </p>


    <p class="reponse">

      6. Affiche le prénom, nom et âge de tous les octocats, du plus jeune au plus âgé, <br/>
      de la promo "promo1-central" et dont l'âge se situe entre 23 et 28 ans.

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



      <h4>Le résultat</h4>



    </p>

  </body>

</html>
