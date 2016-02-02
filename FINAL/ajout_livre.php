<?php

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }

  if ($_POST['validation livre']=='oui')
  {
    // variables:
    $ISBN = $_POST['ISBN'];
    if ($ISBN > 1000000000000)
    {
      $reponse = $bdd->query(SELECT `id`, `ISBN` FROM `Livre 1`);
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
        $Titre = $_POST['Titre'];
        $Auteurs = $_POST['Auteur(s)'];
        $Editeur = $_POST['Editeur'];
        $nbr_pages = $_POST['nbr_pages'];
        $dateparution = $_POST['dateparution'];
        $bdd->exec(INSERT INTO `Livre 1`(`id`, `ISBN`, `Titre`, `Auteur(s)`) VALUES ('',$ISBN,$Titre,$Auteurs));
        $bdd->exec(INSERT INTO `Livre 2`(`id`, `Editeur`, `nbr_pages`, `dateparution`) VALUES ('',$Editeur,$nbr_pages,$dateparution));
        $id = $bdd->lastInsertId();
      }


    }


  }

?>
