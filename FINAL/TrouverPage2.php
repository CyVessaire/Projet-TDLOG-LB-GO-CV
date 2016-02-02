<!DOCTYPE html>

<html>

    <head>
        <link rel="stylesheet" href="TrouverPage2.css"/>
            <meta charset="utf-8" />
            <title>Trouve ton Livre</title>
    </head>
    <header>
        <h1 class="Titre_General"> Trouve ton Livre All Rights Reserved</h1>
        <h3 class="Projet"> Projet TDLOG 2016 Lady Ouggourni, Sir Vessaire, Sir Bandelier</h3>
    </header>
    <body>
        <section class="espace">
        <h1>Espace plaisir</h1>
        <p>Un peu de temps à perdre? <br>Envie de t'évader dans des aventures fabuleuses? <br>Pour ce voyage de quelques heures, le livre qu'il te faut se trouve sur ce site. <br>À toi de le trouver !</p>
        <h1>Choisis le livre qui te convient</h1>
        <p>Pour comprendre ce dont tu as besoin dans l'immédiat, ce site te propose différentes critères de sélection. <br>
        Nous espérons que cela pourra cibler tes attentes. Bon voyage !</p>
        </section>
        <br>

        <?php
          $th = 6;
          $ep = 6;
          $np = 6;
          $cr = 6;
          $di = 6;
          $ta = 6;
          if(isset($_POST['theme'])){
          $th = $_POST['theme'];}
          if(isset($_POST['epoque'])){
          $ep = $_POST['epoque'];}
          if(isset($_POST['nombre'])){
          $np = $_POST['nombre'];}
          if(isset($_POST['critere'])){
          $cr = $_POST['critere'];}
          if(isset($_POST['critere'])){
          $di = $_POST['complexite'];}
          if(isset($_POST['taille'])){
          $ta = $_POST['taille'];}

          echo("<form method = \"post\" action = \"trouverpage3.php?th=$th&cr=$cr&ep=$ep&np=$np&di=$di&ta=$ta\">");
        ?>
        <section class="theme">
        <h2>Thème</h2>
          <p>Frissonne, sanglote, enquête, souris ... Choisis les thèmes qui te conviennent !</p>
            <span class="tagstheme">
              <input class="check" type="checkbox" name="policier" value="th1">Policier
              <br/><input class="check" type="checkbox" name="fantaisie" value="th2">Fantaisie
              <br/><input class="check" type="checkbox" name="amour" value="th3">Amour
              <br/><input class="check" type="checkbox" name="humour" value="th4">Humour
              <br/><input class="check" type="checkbox" name="horreur" value="th5">Horreur
              <br/><input class="check" type="checkbox" name="aventure" value="th6">Aventure
              <br/><input class="check" type="checkbox" name="espionnage" value="th7">Espionnage
              <br/><input class="check" type="checkbox" name="conte" value="th8">Conte
              <br/><input class="check" type="checkbox" name="absurde" value="th9">Absurde
              <br/><input class="check" type="checkbox" name="historique" value="th10">Historique
              <br/><input class="check" type="checkbox" name="memoires" value="th11">Mémoires
              <br/><input class="check" type="checkbox" name="antiheros" value="th12">Anti-Héros
            </span>
        </section>

        <section class="critere">
        <h2>Critères</h2>
        <p>Envie d'émotion? Ou de réflexion? Choisis le critère qui te plait!</p>
        <span class="tagscritere">
          <br/><input type="checkbox" name="inspiration" value="se1">Qui inspire
          <br/><input type="checkbox" name="reflexion" value="se2">Qui fait réfléchir
          <br/><input type="checkbox" name="surprise" value="se3">Qui surprend
          <br/><input type="checkbox" name="reve" value="se4">Qui fait rêver
          <br/><input type="checkbox" name="rire" value="se5">Qui fait rire
          <br/><input type="checkbox" name="peur" value="se6">Qui fait peur
          <br/><input type="checkbox" name="emotion" value="se7">Qui émeut
          <br/><input type="checkbox" name="meh" value="se8">Peu Importe
        </span>
        </section>

        <section class="epoque">
        <h2>Epoque à laquelle se déroule l'histoire</h2>
        <span class="tagsepoque">
          <br/><input type="radio" name="epoque" value=1>César envahissait la Gaule
          <br/><input type="radio" name="epoque" value=2>On brûlait les sorcières
          <br/><input type="radio" name="epoque" value=3>On découvrait des continents
          <br/><input type="radio" name="epoque" value=4>On dépensait l'argent du contribuable dans des jardins royaux
          <br/><input type="radio" name="epoque" value=5>On décapitait des rois
          <br/><input type="radio" name="epoque" value=6>THUG Napoléon
          <br/><input type="radio" name="epoque" value=7>THUG Moustache
          <br/><input type="radio" name="epoque" value=8>Guerres Mondiales
          <br/><input type="radio" name="epoque" value=9>Trentes Glorieuses
          <br/><input type="radio" name="epoque" value=10>De nos jours
          <br/><input type="radio" name="epoque" value=11>La Terre n'existe plus
          <br/><input type="radio" name="epoque" value=12 checked="checked">Peu importe
        </span>
        </section>

        <section class="nombre">
        <h2>Nombre de page</h2>
          <span class="tagspage">
            <br/><input type="radio" name="nombre" value="1">0-30
            <br/><input type="radio" name="nombre" value="2">30-80
            <br/><input type="radio" name="nombre" value="3">80-120
            <br/><input type="radio" name="nombre" value="4">120-180
            <br/><input type="radio" name="nombre" value="5">180-250
            <br/><input type="radio" name="nombre" value="6">250-350
            <br/><input type="radio" name="nombre" value="7">350-500
            <br/><input type="radio" name="nombre" value="8">>500
            <br/><input type="radio" name="nombre" value="9" checked="checked">peu importe
          </span>
        </section>

        <section class="difficulte">
        <h2>Niveau Difficulté</h2>
        <span class="tagscomplexe">
          <input type="radio" name="complexe" value=1>Petit Lait
          <br/><input type="radio" name="complexe" value=2 checked="checked">Ça va
          <br/><input type="radio" name="complexe" value=3>J'ai sauté des passages mais j'ai quand même compris l'histoire
          <br/><input type="radio" name="complexe" value=4>J'ai rien compris mais c'est un incontournable
        </span>
    </section>


    <section class="poche">
      <h2>Livre de Poche ?</h2>
      <span class="taille">
        <input class="check" type="radio" name="LivredePoche" value= 1>Oui
        <br/><input class="check" type="radio" name="LivredePoche" value= 2 checked = "checked">Peu importe
      </span>
    </section>

    <p>C'est le moment de te lancer, découvre le livre qui te convient :
      <div class="boutonlivre">
          <input type="submit" value="Abracadabra !">
      </div>
    </p>

    </form>

    <p>Une erreur au moment de classer tes critères ? Clique ici :
      <div class="bouton">
        <a href="trouverpage1.php">J'ai fait une connerie !</a>
      </div>
    </p>
    <p>Pour retourner à la page d'accueil, c'est là :
      <div class="boutonaccueil">
        <a href="accueil.html">Accueil</a>
      </div>
    </p>

    </body>
    <br>
    <br>
    <br>
<footer>
    Contact: gaelle.ouggourni@eleves.enpc.fr
</footer>

</html>

<link rel="stylesheet" href="testga.css" />
