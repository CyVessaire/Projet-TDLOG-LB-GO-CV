<?php

function database()
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
  catch(Exception $e)
  {
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
  }

      // variables:
      $ISBN = intval($_COOKIE['isbn']);
      if ($ISBN > 1000000000000)
        {
          $reponse = $bdd->query("SELECT id, ISBN FROM Livre_a");
          $present = false;
          while ($donnees = $reponse->fetch())
          {
            if ($ISBN == $donnees['ISBN'])
            {
              $present = true;
              $id = $donnees['id'];
              break;

            }

          }
          $reponse->closeCursor();

          if (!$present)
          {
            $Titre = $_COOKIE['Titre'];
            $Auteurs = $_COOKIE['Auteurs'];
            $editeur = $_COOKIE['editeur'];
            $nbr_pages = intval($_COOKIE['nbrpages']);
            $dateparution = $_COOKIE['datepublication'];
            $bdd->exec("INSERT INTO Livre_a (id, ISBN, Titre, Auteur) VALUES ('',$ISBN,'$Titre','$Auteurs')");
            $bdd->exec("INSERT INTO Livre_b (id, Editeur, nbr_pages, dateparution) VALUES ('','$editeur',$nbr_pages,'$dateparution')");
            $bdd->exec("INSERT INTO Livre_themes (id) VALUES ('')");
            $id = $bdd->lastInsertId();
          }

          $policier = (isset($_POST['policier'])) ? true : false;
          $fantaisie = (isset($_POST['fantaisie'])) ? true : false;
          $amour = (isset($_POST['amour'])) ? true : false;
          $humour = (isset($_POST['humour'])) ? true : false;
          $aventure = (isset($_POST['aventure'])) ? true : false;
          $espionnage = (isset($_POST['espionnage'])) ? true : false;
          $conte = (isset($_POST['conte'])) ? true : false;
          $absurde = (isset($_POST['absurde'])) ? true : false;
          $historique = (isset($_POST['historique'])) ? true : false;
          $memoires = (isset($_POST['memoires'])) ? true : false;
          $antihero = (isset($_POST['antiheros'])) ? true : false;
          $inspire = (isset($_POST['inspire'])) ? true : false;
          $reflexion = (isset($_POST['reflexion'])) ? true : false;
          $surprise = (isset($_POST['surprise'])) ? true : false;
          $reve = (isset($_POST['reve'])) ? true : false;
          $rire = (isset($_POST['rire'])) ? true : false;
          $peur = (isset($_POST['peur'])) ? true : false;
          $emotion = (isset($_POST['emotion'])) ? true : false;
          $meh = (isset($_POST['meh'])) ? true : false;

          $epoque = $_POST['epoque'];

          $taille = $_POST['taille'];

          $complexite = $_POST['complexe'];

          print ($id);

          //incrémente les tags dans la base de données
          $bdd->exec("UPDATE Livre_themes SET Total = Total + 1 WHERE id = $id");

          if ($policier){$bdd->exec("UPDATE Livre_themes SET policier = policier + 1 WHERE id = $id");}
          if ($fantaisie){$bdd->exec("UPDATE Livre_themes SET fantaisie = fantaisie + 1 WHERE id = $id");}
          if ($amour){$bdd->exec("UPDATE Livre_themes SET amour = amour + 1 WHERE id = $id");}
          if ($humour){$bdd->exec("UPDATE Livre_themes SET humour = humour + 1 WHERE id = $id");}
          if ($espionnage){$bdd->exec("UPDATE Livre_themes SET aventure = aventure + 1 WHERE id = $id");}
          if ($conte){$bdd->exec("UPDATE Livre_themes SET conte = conte + 1 WHERE id = $id");}
          if ($absurde){$bdd->exec("UPDATE Livre_themes SET absurde = absurde + 1 WHERE id = $id");}
          if ($memoires){$bdd->exec("UPDATE Livre_themes SET historique = historique + 1 WHERE id = $id");}
          if ($antihero){$bdd->exec("UPDATE Livre_themes SET antihero = antihero + 1 WHERE id = $id");}
          if ($inspire){$bdd->exec("UPDATE Livre_themes SET inspire = inspire + 1 WHERE id = $id");}
          if ($reflexion){$bdd->exec("UPDATE Livre_themes SET reflexion = reflexion + 1 WHERE id = $id");}
          if ($surprise){$bdd->exec("UPDATE Livre_themes SET surprise = surprise + 1 WHERE id = $id");}
          if ($reve){$bdd->exec("UPDATE Livre_themes SET reve = reve + 1 WHERE id = $id");}
          if ($rire){$bdd->exec("UPDATE Livre_themes SET rire = rire + 1 WHERE id = $id");}
          if ($peur){$bdd->exec("UPDATE Livre_themes SET peur = peur + 1 WHERE id = $id");}
          if ($emotion){$bdd->exec("UPDATE Livre_themes SET emotion = emotion + 1 WHERE id = $id");}
          if ($meh){$bdd->exec("UPDATE Livre_themes SET meh = meh + 1 WHERE id = $id");}

          switch($epoque)
          {
            case 1:
              $bdd->exec("UPDATE Livre_themes SET antiquite = antiquite + 1 WHERE id = $id");
              break;

            case 2:
              $bdd->exec("UPDATE Livre_themes SET moyen_age = moyen_age + 1 WHERE id = $id");
              break;

            case 3:
              $bdd->exec("UPDATE Livre_themes SET renaissance = renaissance + 1 WHERE id = $id");
              break;

              case 4:
              $bdd->exec("UPDATE Livre_themes SET tempsmoderne = tempsmoderne + 1 WHERE id = $id");
              break;

            case 5:
              $bdd->exec("UPDATE Livre_themes SET lumiere = lumiere + 1 WHERE id = $id");
              break;

            case 6:
              $bdd->exec("UPDATE Livre_themes SET debut_XIX = debut_XIX + 1 WHERE id = $id");
              break;

            case 7:
              $bdd->exec("UPDATE Livre_themes SET fin_XIX = fin_XIX + 1 WHERE id = $id");
              break;

            case 8:
              $bdd->exec("UPDATE Livre_themes SET debutXX = debutXX + 1 WHERE id = $id");
              break;

            case 9:
              $bdd->exec("UPDATE Livre_themes SET milieu_XX = milieu_XX + 1 WHERE id = $id");
              break;

            case 10:
              $bdd->exec("UPDATE Livre_themes SET moderne = moderne + 1 WHERE id = $id");
              break;

            case 11:
              $bdd->exec("UPDATE Livre_themes SET futur = futur + 1 WHERE id = $id");
              break;

            default:
              $bdd->exec("UPDATE Livre_themes SET epoque_autre = epoque_autre + 1 WHERE id = $id");
              break;
          }

          switch ($complexite) {
            case 1:
              $bdd->exec("UPDATE Livre_themes SET facile = facile + 1 WHERE id = $id");
              break;

            case 2:
              $bdd->exec("UPDATE Livre_themes SET moyen = moyen + 1 WHERE id = $id");
              break;

            case 3:
              $bdd->exec("UPDATE Livre_themes SET morceau = morceau + 1 WHERE id = $id");
              break;

            default:
              $bdd->exec("UPDATE Livre_themes SET difficile = difficile + 1 WHERE id = $id");
              break;
          }

          switch ($taille) {
            case 1:
              $bdd->exec("UPDATE Livre_themes SET poche = poche + 1 WHERE id = $id");
              break;

            default:
              $bdd->exec("UPDATE Livre_themes SET valise = valise + 1 WHERE id = $id");
              break;
          }

        }



}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" href="ajout3.css" />
		<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
				<title>Rajouter un livre</title>
	</head>
	<header>
		<h1 class="Titre_General"> Trouve ton Livre All Rights Reserved</h1>
		<h3 class="Projet"> Projet TDLOG 2016 Lady Ouggourni, Sir Vessaire, Sir Bandelier</h3>
	</header>
	<body>
		<section class="espace">
		<h1>Espace partage</h1>
		<h3>Aide nous à construire notre base de données</h3>
		<p>
      Un livre t'a plu et tu veux le partager aux autres utilisateurs ?
      <br> Tu trouves ça scandaleux qu'on ne propose pas l'oeuvre entière de Dostoïevski ?
      <br> Participe à la construction du site !
    </p>

		<h1>Instructions</h1>

		<p>
      Pour rajouter un livre qui t'a plu, c'est très simple.<br>
      Il te suffit de rentrer quelques informations sur le livre en question selon les tags qui suivent. <br>
      Tu peux remplir les critères selon ton propre avis. <br>
      N'hésite pas à ajouter des commentaires pour plus de précisions pour les autres utilisateurs.<br>
      À toi de jouer !
    </p>
      Merci de ton aide !
    </section>

		<form method="post" action"ajout3.php">

		<section class="theme">

        <h2>Thème</h2>

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

        <br>

        <section class="critere">

        <h2>Critères</h2>


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

        <br>

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

    	<br>

        <section class="nombre">

        <h2>Nombre de pages</h2>


        <span class="tagspage">
            <br/><input type="radio" name="nombre" value="0">0-30
            <br/><input type="radio" name="nombre" value="30">30-80
            <br/><input type="radio" name="nombre" value="80">80-120
            <br/><input type="radio" name="nombre" value="120">120-180
            <br/><input type="radio" name="nombre" value="180">180-250
            <br/><input type="radio" name="nombre" value="250">250-350
            <br/><input type="radio" name="nombre" value="350">350-500
            <br/><input type="radio" name="nombre" value="500">>500
        </span>

        </section>

        <br>

        <section class="complexite">

        <h2>Niveau Difficulté</h2>


        <span class="tagscomplexe">
            <input type="radio" name="complexe" value=1 checked="checked">Petit Lait
            <br/><input type="radio" name="complexe" value=2>Ça va
            <br/><input type="radio" name="complexe" value=3>J'ai sauté des passages mais j'ai quand même compris l'histoire
            <br/><input type="radio" name="complexe" value=4>J'ai rien compris mais c'est un incontournable
        </span>

        </section>

    <br>
    <section class="poche">
    <h2>Taille</h2>


    <span class="tagstaille">
            <input type="radio" name="taille" value=1 checked="checked">J'ai pu l'emporter dans le bus pour faire le malin
            <br/><input type="radio" name="taille" value=2>Il donne une forme carrée à mon sac à dos

    </span>
    </section>

		<br>

		<section class="phrases">
		<p>
        <span class="MotItalique">Pour toute confession intime sur ton expérience avec ce livre, n'hésite pas à tout nous avouer.
        </span>

		<br><br>
        <input class="commentaires" type="text" name="commentaires">


		<p>Si vraiment ce livre t'a troublé, sache que ce n'est pas grave<br> et que toute l'équipe de TrouverUnLivre est de tout coeur avec toi :<br> clique sur ce lien, c'est pas grave <a href="https://www.lepsychologue.org/accueil/sos-amitie.php">Besoin d'aide ?</a></p>


		Maintenant, ajoute le livre !

		</section>

		<p>
    	<div class="boutonajout">
        	<input type="submit" name="submit" value="Valider">
    	</div>
    </p>

		</form>

    <?php
    if(isset($_POST['submit']))
    {
      database();
      echo "<script language='javascript'>";
      echo "alert('Merci de ta contribution, tu vas être redirigé vers l\'accueil');";
      echo "window.location.href = \"http://localhost/trouverunlivre/accueil.html\";";
      echo "</script>";
    }
    ?>

		<section class="phrases2">
		<h2> Merci beaucoup !</h2>
		<p> Ce livre était certainement très bien, mais ne t'arrête pas en si bon chemin !
			<br>Retourne à la page d'accueil pour soit ajouter un nouveau livre,
			<br>soit trouver ton nouveau compagnon de chevet :
		</p>

		</section>
			<br>
			<br>
    	<div class="bouton">
        	<a href="trouverpage1.php">Je me sens seul !</a>
    	</div>

		<p> Pour retourner à la page d'accueil, c'est là :
    	<div class="boutonaccueil">
        	<a href="accueil.html">Accueil</a>
    	</div>
    </p>

		<h5 id="ISBN">L'ISBN est un numéro unique pour chaque édition d'un livre qui te permet non seulement de distinguer les oeuvres entre elles (comme les titres) mais également les différentes éditions d'une même oeuvre. Il se situe sur la quatrième de couverture du livre, à côté du code barre.</h5>


			<script type="text/javascript" src="includes/ajout_livre.js"></script>

</html>
