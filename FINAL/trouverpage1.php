<!DOCTYPE html>

<html>

    <head>
        <link rel="stylesheet" href="trouverpage1.css"/>
            <meta charset="utf-8" />
            <title>Trouve ton Livre</title>
    </head>
    <header>
        <h1 class="Titre_General"> Trouve ton Livre All Rights Reserved</h1>
        <h3 class="Projet"> Projet TDLOG 2016 Lady Ouggourni, Sir Vessaire, Sir Bandelier</h3>
    </header>
    <body>
        <section class="espace"><h1>Espace plaisir</h1>
        <p>Un peu de temps à perdre? <br>Envie de t'évader dans des aventures fabuleuses? <br>Pour ce voyage de quelques heures, le livre qu'il te faut se trouve sur ce site. <br>À toi de le trouver !</p>
        <h1>Choisis le livre qui te convient</h1>
        <p>Pour comprendre ce dont tu as besoin dans l'immédiat, ce site te propose différentes critères de sélection. <br>
        Nous espérons que cela pourra cibler tes attentes. <br>Bon voyage !</p>
        <p>Première étape pour cela :<br> classe les différentes catégories selon tes préférences lors du choix d'un livre .<br> Il y en a six différentes, n'aies pas honte de montrer quels sont tes vrais intérêts. <br>(Et puis on n'est pas Facebook, ça reste anonyme. Le Data Science c'est un truc de <strong> pédophile</strong>.)
        <p> 1 représente la catégorie qui t'intéresse le plus et 6 celle qui t'intéresse le moins. <br>Pour ce qui est du <strong>PORNO</strong>, n'hésite pas à t'adresser au contact en bas de la page.
        </section>

        <form action = "TrouverPage2.php" method = "post">
            <section class = "theme">
            <h2 class="categorie">Thème:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name="theme">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>

            <br><br>
            Policier, Amour, Fantaisie, Horreur, Aventure, Suspense, Réaliste, Anti-héros, Absurde.
            </section>
            <section class = "critere">
            <h2 class="categorie">Critères:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name="critere">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>
            <br><br>
            Qui fait rire, Qui émeut, Qui fait réfléchir, Qui surprend, Qui fait rêver.
            </section>
            <section class = "epoque">
            <h2 class="categorie">Epoque de l'histoire:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name = "epoque">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>
            <br><br>
            Antiquité, Moyen-Âge, XVIIème, XVIIIème, XIXème, XXème, De nos jours, Futuriste, Peu importe
            </section>
            <section class = "nombre">
            <h2 class="categorie">Nombre de Pages:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name = "nombre">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>
            <br><br>
            À lire en une heure, une soirée, une journée, un week-end, une semaine, un mois, ...
            </section>
            <section class = "complexite">
            <h2 class="categorie">Niveau de Difficulté:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name = "complexite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>
            <br><br>
            Méga Fastoche, Ne pose de Difficulté Particulière, Quelques passages ardus, Fais travailler tes méninges.
            </section>
            <section class = "poche">
            <h2 class="categorie">Livre de Poche:</h2>
            <span class="custom-dropdown--white">
            <select class="custom-dropdown__select--white" name = "taille">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </span>
            <br>
            <br>
            Oui, Peu Importe.
            </section>

            <div class="bouton">
              <p>
                <input type="submit" value="Je passe à l'étape suivante !">
              </p>
            </div>

        </form>

    </body>
<footer>
    Contact: gaelle.ouggourni@eleves.enpc.fr
</footer>

</html>

<link rel="stylesheet" href="trouverpage1.css" />
