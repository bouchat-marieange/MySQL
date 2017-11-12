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

    <h2>Exercices SELECT - Drill 2</h2>

    <p>Exercice réalisé dans le bac à sable à l'adresse : http://sqlfiddle.com/#!9/3c37f/1</p>

    <p class ="enonce">
      Rends-toi sur le second bac à sable d'apprentissage.

Familiarise toi d'abord avec cette table. Que contient-elle? quelles sont les colonnes? Ensuite, même principe que ci-dessus:

Trouve la syntaxe pour effectuer chacune des requêtes suivantes:

Affiche tous les octocats et leurs données
Affiche uniquement les prénoms
Affiche les prénoms, noms et age de chaque octocat
Affiche les octocats dont le nom commence par 'N'
Affiche le prénom et le nom des octocats de la promo "promo1-central"
Affiche le prénom, le nom et l'année de naissance des octocats de la promo "promo1-anderlecht"
    </p>

    <p class="reponse">
      1. Affiche tous les octocats et leurs données

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
        promo,
        firstname,
        lastname,
        gender,
        birthdate,
        age,
        github
        FROM
        octocats
        ;

      <h4>Le résultat</h4>

        |             promo |    firstname |            lastname | gender |  birthdate | age |          github |
        |-------------------|--------------|---------------------|--------|------------|-----|-----------------|
        |    promo1-central |        Safia |             Bihmedn |      F | 17/11/1990 |  26 |         Safia54 |
        |    promo1-central |    salvatore |                saia |      M | 20/06/1978 |  38 |         salv236 |
        |    promo1-central |       Thomas |            Demilito |      M | 10/03/1989 |  28 |         Blutshy |
        |    promo1-central |      Estelle |            Desmeurs |      F | 28/08/1991 |  25 | EstelleDesmeurs |
        |    promo1-central |     geoffrey |             marique |      M | 09/11/1990 |  26 |         creageo |
        |    promo1-central |       Khaled |           Nzisabira |      M | 26/01/1995 |  22 |     THEBUNICORN |
        |    promo1-central |        Jimmy |            Riguelle |      M | 05/09/1977 |  39 |   jimmyriguelle |
        |    promo1-central |      Daniela |              Santos |      F | 29/05/1984 |  33 |       dnllromao |
        |    promo1-central |     Gabriele |               Virga |      M | 09/10/1994 |  22 |     GabrieleVir |
        |    promo1-central |     Kreshnik |           Ibërdemaj |      M | 30/07/1985 |  31 |          beThek |
        |    promo1-central |          Dan |            Jansoone |      M | 18/10/1993 |  23 |          DanJsn |
        |    promo1-central | Jayce Marcel |      Kaje Banziziki |      M | 01/03/1992 |  25 |          KJayce |
        |    promo1-central |         Eric | Nsukami Zaki Mbambu |      M | 16/05/1978 |  39 |         zakysun |
        |    promo1-central |        David |        Vandervaeren |      M | 22/11/1988 |  28 |           ddvdv |
        |    promo1-central |        Habib |      El Maaza Gomez |      M | 27/01/1972 |  45 |        ModjoInc |
        |    promo1-central |      Ludovic |               Patho |      M | 24/06/1984 |  32 |    LudovicPatho |
        |    promo1-central |     Santiago |              Astete |      M | 24/04/2017 |  49 |        GitSanty |
        |    promo1-central |        Nadia |              Nachit |      F | 30/03/1982 |  35 |        Nadia098 |
        |    promo1-central |         Hugo |           Barcelona |      M | 31/05/1989 |  27 |         kvalrie |
        | promo1-anderlecht |       Miriam |              Azzouz |      F | 03/01/1980 |  37 |        soyouz21 |
        | promo1-anderlecht |        Nadia |            Benazouz |      F | 25/08/1981 |  35 |       nadiabena |
        | promo1-anderlecht |        Hania |              Doumer |      F | 03/08/1973 |  43 |          anya75 |
        | promo1-anderlecht |       Victor |           Lanckriet |      M | 09/05/1996 |  21 | lanckrietvictor |
        | promo1-anderlecht |         Gary |            Luypaert |      M | 21/07/1989 |  27 |    GaryLuypaert |
        | promo1-anderlecht |      Michael |           Mesmeaker |      M | 07/04/1993 |  24 |         Rivanos |
        | promo1-anderlecht |       Japhet |             Nkouayi |      M | 04/04/1992 |  25 |   JaphetNkouayi |
        | promo1-anderlecht |   Juan Pablo |     Quintero Torres |      M | 25/01/1991 |  26 |      Jqu1nteroT |
        | promo1-anderlecht |       Thomas |             Tonneau |      M | 03/10/1993 |  23 |  Thomas-Tonneau |
        | promo1-anderlecht |       Claudy |                 Via |      M | 29/11/1960 |  56 |           ezaho |
        | promo1-anderlecht |       Gilles |              Youtou |      M | 28/12/1978 |  38 |         bbycode |
        | promo1-anderlecht |       Adrian |           Zochowski |      M | 18/03/1996 |  21 |       Zochowski |
        | promo1-anderlecht |        Maria |         Pedro Miala |      F | 23/08/1980 |  36 |          JOVITQ |
            </p>


    <p class="reponse">
      1. Affiche tous les octocats et leurs données

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



      <p class="reponse">
        2. Affiche uniquement les prénoms

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
            ;

        <h4>Le résultat</h4>
          |    firstname |
          |--------------|
          |        Safia |
          |    salvatore |
          |       Thomas |
          |      Estelle |
          |     geoffrey |
          |       Khaled |
          |        Jimmy |
          |      Daniela |
          |     Gabriele |
          |     Kreshnik |
          |          Dan |
          | Jayce Marcel |
          |         Eric |
          |        David |
          |        Habib |
          |      Ludovic |
          |     Santiago |
          |        Nadia |
          |         Hugo |
          |       Miriam |
          |        Nadia |
          |        Hania |
          |       Victor |
          |         Gary |
          |      Michael |
          |       Japhet |
          |   Juan Pablo |
          |       Thomas |
          |       Claudy |
          |       Gilles |
          |       Adrian |
          |        Maria |

    </p>

    <p class="reponse">
      3. Affiche les prénoms, noms et age de chaque octocat

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
          age
          FROM
          octocats
          ;

      <h4>Le résultat</h4>

        |    firstname |            lastname | age |
        |--------------|---------------------|-----|
        |        Safia |             Bihmedn |  26 |
        |    salvatore |                saia |  38 |
        |       Thomas |            Demilito |  28 |
        |      Estelle |            Desmeurs |  25 |
        |     geoffrey |             marique |  26 |
        |       Khaled |           Nzisabira |  22 |
        |        Jimmy |            Riguelle |  39 |
        |      Daniela |              Santos |  33 |
        |     Gabriele |               Virga |  22 |
        |     Kreshnik |           Ibërdemaj |  31 |
        |          Dan |            Jansoone |  23 |
        | Jayce Marcel |      Kaje Banziziki |  25 |
        |         Eric | Nsukami Zaki Mbambu |  39 |
        |        David |        Vandervaeren |  28 |
        |        Habib |      El Maaza Gomez |  45 |
        |      Ludovic |               Patho |  32 |
        |     Santiago |              Astete |  49 |
        |        Nadia |              Nachit |  35 |
        |         Hugo |           Barcelona |  27 |
        |       Miriam |              Azzouz |  37 |
        |        Nadia |            Benazouz |  35 |
        |        Hania |              Doumer |  43 |
        |       Victor |           Lanckriet |  21 |
        |         Gary |            Luypaert |  27 |
        |      Michael |           Mesmeaker |  24 |
        |       Japhet |             Nkouayi |  25 |
        |   Juan Pablo |     Quintero Torres |  26 |
        |       Thomas |             Tonneau |  23 |
        |       Claudy |                 Via |  56 |
        |       Gilles |              Youtou |  38 |
        |       Adrian |           Zochowski |  21 |
        |        Maria |         Pedro Miala |  36 |

        <p class="reponse">
          4. Affiche les octocats dont le nom commence par 'N'

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
            lastname
            FROM
            octocats
            WHERE
            lastname LIKE 'N%'
            ;

          <h4>Le résultat</h4>

          |            lastname |
          |---------------------|
          |           Nzisabira |
          | Nsukami Zaki Mbambu |
          |              Nachit |
          |             Nkouayi |

          <p class="reponse">
            5. Affiche le prénom et le nom des octocats de la promo "promo1-central"

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
              WHERE
              promo = 'promo1-central'
              ;

            <h4>Le résultat</h4>

              |    firstname |            lastname |
              |--------------|---------------------|
              |        Safia |             Bihmedn |
              |    salvatore |                saia |
              |       Thomas |            Demilito |
              |      Estelle |            Desmeurs |
              |     geoffrey |             marique |
              |       Khaled |           Nzisabira |
              |        Jimmy |            Riguelle |
              |      Daniela |              Santos |
              |     Gabriele |               Virga |
              |     Kreshnik |           Ibërdemaj |
              |          Dan |            Jansoone |
              | Jayce Marcel |      Kaje Banziziki |
              |         Eric | Nsukami Zaki Mbambu |
              |        David |        Vandervaeren |
              |        Habib |      El Maaza Gomez |
              |      Ludovic |               Patho |
              |     Santiago |              Astete |
              |        Nadia |              Nachit |
              |         Hugo |           Barcelona |


        <p class="reponse">
          5. Affiche le prénom, le nom et l'année de naissance des octocats de la promo "promo1-anderlecht"

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
              birthdate
              FROM
              octocats
              WHERE
              promo = 'promo1-anderlecht'
              ;


          <h4>Le résultat</h4>

            |  firstname |        lastname |  birthdate |
            |------------|-----------------|------------|
            |     Miriam |          Azzouz | 03/01/1980 |
            |      Nadia |        Benazouz | 25/08/1981 |
            |      Hania |          Doumer | 03/08/1973 |
            |     Victor |       Lanckriet | 09/05/1996 |
            |       Gary |        Luypaert | 21/07/1989 |
            |    Michael |       Mesmeaker | 07/04/1993 |
            |     Japhet |         Nkouayi | 04/04/1992 |
            | Juan Pablo | Quintero Torres | 25/01/1991 |
            |     Thomas |         Tonneau | 03/10/1993 |
            |     Claudy |             Via | 29/11/1960 |
            |     Gilles |          Youtou | 28/12/1978 |
            |     Adrian |       Zochowski | 18/03/1996 |
            |      Maria |     Pedro Miala | 23/08/1980 |


  </p>
  </body>

</html>
