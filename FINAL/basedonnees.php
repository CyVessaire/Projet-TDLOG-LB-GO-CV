<?php

print ('Auteur' + $_COOKIE['Auteurs']);
print ($_COOKIE['Titre']);

//initialisation des variables:
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
if ( isset( $_POST["submit"] ) ) {
    // variables:
    $ISBN = $_POST['ISBN'];
    if ($ISBN > 1000000000000)
    {
      $reponse = $bdd->query("SELECT id, ISBN FROM Livre 1");
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
        $Editeur = $_COOKIE['Editeur'];
        $nbr_pages = $_COOKIE['nbr_pages'];
        $dateparution = $_COOKIE['dateparution'];
        $bdd->exec('INSERT INTO Livre 1 (id, ISBN, Titre, Auteur(s)) VALUES (\'\',$ISBN,$Titre,$Auteurs)');
        $bdd->exec('INSERT INTO Livre 2 (id, Editeur, nbr_pages, dateparution) VALUES (\'\',$Editeur,$nbr_pages,$dateparution)');
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
      $antihero = (isset($_POST['antihero'])) ? true : false;
      $inspire = (isset($_POST['inspire'])) ? true : false;
      $reflexion = (isset($_POST['reflexion'])) ? true : false;
      $surprise = (isset($_POST['surprise'])) ? true : false;
      $reve = (isset($_POST['reve'])) ? true : false;
      $rire = (isset($_POST['rire'])) ? true : false;
      $peur = (isset($_POST['peur'])) ? true : false;
      $emotion = (isset($_POST['emotion'])) ? true : false;
      $meh = (isset($_POST['meh'])) ? true : false;

      $epoque = $_POST['Epoque'];

      $taille = $_POST['Taille'];

      $complexite = $_POST['Complexité'];

      //incrémente les tags dans la base de données
      $bdd->exec('UPDATE Livres_themes SET Total = Total + 1 WHERE id = $id');

      if ($policier){$bdd->exec('UPDATE Livres_themes SET policier = policier + 1 WHERE id = $id');}
      if ($fantaisie){$bdd->exec('UPDATE Livres_themes SET fantaisie = fantaisie + 1 WHERE id = $id');}
      if ($amour){$bdd->exec('UPDATE Livres_themes SET amour = amour + 1 WHERE id = $id');}
      if ($humour){$bdd->exec('UPDATE Livres_themes SET humour = humour + 1 WHERE id = $id');}
      if ($espionnage){$bdd->exec('UPDATE Livres_themes SET aventure = aventure + 1 WHERE id = $id');}
      if ($conte){$bdd->exec('UPDATE Livres_themes SET conte = conte + 1 WHERE id = $id');}
      if ($absurde){$bdd->exec('UPDATE Livres_themes SET absurde = absurde + 1 WHERE id = $id');}
      if ($memoires){$bdd->exec('UPDATE Livres_themes SET historique = historique + 1 WHERE id = $id');}
      if ($antihero){$bdd->exec('UPDATE Livres_themes SET antihero = antihero + 1 WHERE id = $id');}
      if ($inspire){$bdd->exec('UPDATE Livres_themes SET inspire = inspire + 1 WHERE id = $id');}
      if ($reflexion){$bdd->exec('UPDATE Livres_themes SET reflexion = reflexion + 1 WHERE id = $id');}
      if ($surprise){$bdd->exec('UPDATE Livres_themes SET surprise = surprise + 1 WHERE id = $id');}
      if ($reve){$bdd->exec('UPDATE Livres_themes SET reve = reve + 1 WHERE id = $id');}
      if ($rire){$bdd->exec('UPDATE Livres_themes SET rire = rire + 1 WHERE id = $id');}
      if ($peur){$bdd->exec('UPDATE Livres_themes SET peur = peur + 1 WHERE id = $id');}
      if ($emotion){$bdd->exec('UPDATE Livres_themes SET emotion = emotion + 1 WHERE id = $id');}
      if ($meh){$bdd->exec('UPDATE Livres_themes SET meh = meh + 1 WHERE id = $id');}

      switch($epoque)
      {
        case 1:
          $bdd->exec('UPDATE Livres_themes SET antiquite = antiquite + 1 WHERE id = $id');
          break;

        case 2:
          $bdd->exec('UPDATE Livres_themes SET moyen_age = moyen_age + 1 WHERE id = $id');
          break;

        case 3:
          $bdd->exec('UPDATE Livres_themes SET renaissance = renaissance + 1 WHERE id = $id');
          break;

          case 4:
          $bdd->exec('UPDATE Livres_themes SET tempsmoderne = tempsmoderne + 1 WHERE id = $id');
          break;

        case 5:
          $bdd->exec('UPDATE Livres_themes SET lumiere = lumiere + 1 WHERE id = $id');
          break;

        case 6:
          $bdd->exec('UPDATE Livres_themes SET debut_XIX = debut_XIX + 1 WHERE id = $id');
          break;

        case 7:
          $bdd->exec('UPDATE Livres_themes SET fin_XIX = fin_XIX + 1 WHERE id = $id');
          break;

        case 8:
          $bdd->exec('UPDATE Livres_themes SET debutXX = debutXX + 1 WHERE id = $id');
          break;

        case 9:
          $bdd->exec('UPDATE Livres_themes SET milieu_XX = milieu_XX + 1 WHERE id = $id');
          break;

        case 10:
          $bdd->exec('UPDATE Livres_themes SET moderne = moderne + 1 WHERE id = $id');
          break;

        case 11:
          $bdd->exec('UPDATE Livres_themes SET futur = futur + 1 WHERE id = $id');
          break;

        default:
          $bdd->exec('UPDATE Livres_themes SET epoque_autre = epoque_autre + 1 WHERE id = $id');
          break;
      }

      switch ($complexite) {
        case 1:
          $bdd->exec('UPDATE Livres_themes SET facile = facile + 1 WHERE id = $id');
          break;

        case 2:
          $bdd->exec('UPDATE Livres_themes SET moyen = moyen + 1 WHERE id = $id');
          break;

        case 3:
          $bdd->exec('UPDATE Livres_themes SET morceau = morceau + 1 WHERE id = $id');
          break;

        default:
          $bdd->exec('UPDATE Livres_themes SET difficile = difficile + 1 WHERE id = $id');
          break;
      }

      switch ($taille) {
        case 1:
          $bdd->exec('UPDATE Livres_themes SET poche = poche + 1 WHERE id = $id');
          break;

        default:
          $bdd->exec('UPDATE Livres_themes SET valise = valise + 1 WHERE id = $id');
          break;
      }

    }




  }else{print ("error1");}




?>
