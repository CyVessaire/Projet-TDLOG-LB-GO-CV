<html>
	<head>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" href="trouverlivre3.css" />
		<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	</head>
	<header>
		<h1 class="Titre_General"> Trouve ton Livre All Rights Reserved</h1>
		<h3 class="Projet"> Projet TDLOG 2016 Lady Ouggourni, Sir Vessaire, Sir Bandelier</h3>
	</header>
	<body>

		<br><br><div id="test" class="prev_book"></div>

<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
  catch(Exception $e)
  {
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
  }

// initialise pour obtenir score 0 si probleme de GET.
	$th = 0;
	$ep = 0;
	$np = 0;
	$cr = 0;
	$di = 0;
	$ta = 0;

	if(isset($_GET['th'])){
  $th = 6-$_GET['th'];}
	if(isset($_GET['ep'])){
  $ep = 6-$_GET['ep'];}
	if(isset($_GET['np'])){
  $np = 6-$_GET['np'];}
	if(isset($_GET['di'])){
  $di = 6-$_GET['di'];}
	if(isset($_GET['ta'])){
  $ta = 6-$_GET['ta'];}
	if(isset($_GET['cr'])){
  $cr = 6-$_GET['cr'];}


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


// initialise pour obtenir défault si probleme de POST.
	$epoque = 20;
	$complexite = 20;
	$page = 20;
	$poche = false;

	if(isset($_POST['epoque'])){
  $epoque = $_POST['epoque'];}
	if(isset($_POST['complexe'])){
  $complexite = $_POST['complexe'];}
	if(isset($_POST['nombre'])){
  $page = $_POST['nombre'];}
	if(isset($_POST['LivredePoche'])){
  $poche = ($_POST['LivredePoche']<2) ? true : false;}

// scores les plus élevés
  $sc_1 = 0;
  $sc_2 = 0;
  $sc_3 = 0;

// variable stockant les id des scores les plus élevés
  $id_1 = 1;
  $id_2 = 1;
  $id_3 = 1;

  $idcurrent = 1;

  $reponse = $bdd->query("SELECT * FROM Livre_themes");
  while ($donnees = $reponse->fetch())
  {
    $nombrepagescurrent = $bdd->query("SELECT nbr_pages FROM Livre_b WHERE id = $idcurrent");
    $nombrepagescourrent = $nombrepagescurrent->fetch();
    if ($nombrepagescourrent['nbr_pages'] < 29) {$nombrepagescourent = 2;}
    elseif (29 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 80) {$nombrepagescourent = 2;}
    elseif (79 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 120) {$nombrepagescourent = 3;}
    elseif (119 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 180) {$nombrepagescourent = 4;}
    elseif (179 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 250) {$nombrepagescourent = 5;}
    elseif (249 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 350) {$nombrepagescourent = 6;}
    elseif (349 < $nombrepagescourrent['nbr_pages'] && $nombrepagescourrent['nbr_pages'] < 500) {$nombrepagescourent = 7;}
    elseif (499 < $nombrepagescourrent['nbr_pages']) {$nombrepagescourent = 8;}
    else{$nombrepagescourent = 9;} //cas ou il n y a pas de nombre de page indiqué

    //calcule du score
    //initialisation
    $score = 0;
    if ($policier && $donnees['policier']>0){$score = $score + $th * ($donnees['policier'] / $donnees['Total']);}
    if ($fantaisie && $donnees['fantaisie']>0){$score = $score + $th * ($donnees['fantaisie'] / $donnees['Total']);}
    if ($amour && $donnees['amour']>0){$score = $score + $th * ($donnees['amour'] / $donnees['Total']);}
    if ($humour && $donnees['humour']>0){$score = $score + $th * ($donnees['humour'] / $donnees['Total']);}
    if ($aventure && $donnees['aventure']>0){$score = $score + $th * ($donnees['aventure'] / $donnees['Total']);}
    if ($espionnage && $donnees['espionnage']>0){$score = $score + $th * ($donnees['espionnage'] / $donnees['Total']);}
    if ($conte && $donnees['conte']>0){$score = $score + $th * ($donnees['conte'] / $donnees['Total']);}
    if ($absurde && $donnees['absurde']>0){$score = $score + $th * ($donnees['absurde'] / $donnees['Total']);}
    if ($historique && $donnees['historique']>0){$score = $score + $th * ($donnees['historique'] / $donnees['Total']);}
    if ($memoires && $donnees['memoires']>0){$score = $score + $th * ($donnees['memoires'] / $donnees['Total']);}
    if ($antihero && $donnees['antihero']>0){$score = $score + $th * ($donnees['antihero'] / $donnees['Total']);}

    if ($inspire && $donnees['inspire']>0){$score = $score + $cr * ($donnees['inspire'] / $donnees['Total']);}
    if ($reflexion && $donnees['reflexion']>0){$score = $score + $cr * ($donnees['reflexion'] / $donnees['Total']);}
    if ($surprise && $donnees['surprise']>0){$score = $score + $cr * ($donnees['surprise'] / $donnees['Total']);}
    if ($reve && $donnees['reve']>0){$score = $score + $cr * ($donnees['reve'] / $donnees['Total']);}
    if ($rire && $donnees['rire']>0){$score = $score + $cr * ($donnees['rire'] / $donnees['Total']);}
    if ($peur && $donnees['peur']>0){$score = $score + $cr * ($donnees['peur'] / $donnees['Total']);}
    if ($emotion && $donnees['emotion']>0){$score = $score + $cr * ($donnees['emotion'] / $donnees['Total']);}
    if ($meh && $donnees['meh']>0){$score = $score + $cr * ($donnees['meh'] / $donnees['Total']);}

    if ($poche && $donnees['poche']>0){$score = $score + $ta;}

    switch($epoque)
    {
      case 1:
        $score = $score + $ep * ($donnees['antiquite'] / $donnees['Total']);
        break;

      case 2:
        $score = $score + $ep * ($donnees['moyen_age'] / $donnees['Total']);
        break;

      case 3:
        $score = $score + $ep * ($donnees['renaissance'] / $donnees['Total']);
        break;

      case 4:
        $score = $score + $ep * ($donnees['tempsmoderne'] / $donnees['Total']);
        break;

      case 5:
        $score = $score + $ep * ($donnees['lumiere'] / $donnees['Total']);
        break;

      case 6:
        $score = $score + $ep * ($donnees['debut_XIX'] / $donnees['Total']);
        break;

      case 7:
        $score = $score + $ep * ($donnees['fin_XIX'] / $donnees['Total']);
        break;

      case 8:
        $score = $score + $ep * ($donnees['debutXX'] / $donnees['Total']);
        break;

      case 9:
        $score = $score + $ep * ($donnees['milieu_XX'] / $donnees['Total']);
        break;

      case 10:
        $score = $score + $ep * ($donnees['moderne'] / $donnees['Total']);
        break;

      case 11:
        $score = $score + $ep * ($donnees['futur'] / $donnees['Total']);
        break;

      default:
        $score = $score + $ep * ($donnees['epoque_autre'] / $donnees['Total']);
        break;
    }

    switch ($complexite) {
      case 1:
        $score = $score + $di * ($donnees['facile'] / $donnees['Total']);
        break;

      case 2:
        $score = $score + $di * ($donnees['moyen'] / $donnees['Total']);
        break;

      case 3:
        $score = $score + $di * ($donnees['morceau'] / $donnees['Total']);
        break;

      default:
        $score = $score + $di * ($donnees['difficile'] / $donnees['Total']);
        break;
    }

    switch ($page) {
      case 1:
        if($nombrepagescourent == 1){$score = $score + $np ;}
        break;

      case 2:
        if($nombrepagescourent == 2){$score = $score + $np ;}
        break;

      case 3:
        if($nombrepagescourent == 3){$score = $score + $np ;}
        break;

      case 4:
        if($nombrepagescourent == 4){$score = $score + $np ;}
        break;

      case 5:
        if($nombrepagescourent == 5){$score = $score + $np ;}
        break;

      case 6:
        if($nombrepagescourent == 6){$score = $score + $np ;}
        break;

      case 7:
        if($nombrepagescourent == 7){$score = $score + $np ;}
        break;

      case 8:
        if($nombrepagescourent == 8){$score = $score + $np ;}
        break;

      default:
        break;
    }

    if ($score > $sc_3)
    {
      if ($score > $sc_2)
      {
        if ($score > $sc_1)
        {
          $id_3 = $id_2;
          $id_2 = $id_1;
          $id_1 = $idcurrent;
          $sc_3 = $sc_2;
          $sc_2 = $sc_1;
          $sc_1 = $score;
        }
        else
        {
          $id_3 = $id_2;
          $id_2 = $idcurrent;
          $sc_3 = $sc_2;
          $sc_2 = $score;
        }
      }
      else
      {
        $id_3 = $idcurrent;
        $sc_3 = $score;
      }
    }

    $idcurrent = $idcurrent + 1;
  }

  $ISBN = $bdd->query("SELECT ISBN FROM Livre_a WHERE id = $id_3");
  $ISBN_3 = $ISBN->fetch();
  $ISBN_3 = $ISBN_3['ISBN'];
  $ISBN = $bdd->query("SELECT ISBN FROM Livre_a WHERE id = $id_2");
  $ISBN_2 = $ISBN->fetch();
  $ISBN_2 = $ISBN_2['ISBN'];
  $ISBN = $bdd->query("SELECT ISBN FROM Livre_a WHERE id = $id_1");
  $ISBN_1 = $ISBN->fetch();
  $ISBN_1 = $ISBN_1['ISBN'];


echo "<input type=\"hidden\" name=\"isbn\" value=\"$ISBN_1\" id=\"isbn\">
			<script type=\"text/javascript\" src=\"includes/trouverlivre.js\">
      </script>";

 ?>

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

	</body>
</html>
