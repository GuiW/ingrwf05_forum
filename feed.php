<?php

// ************************************************************************** //
// Au lieu d'utiliser feed.php, on va plutôt utiliser les scripts qui sont déjà    présents dans les fichers home.php et reponses.php
// ************************************************************************** //

  require("config.php");

  // Content-type décrit le type de contenu
  header("Content-type:application/json");


  if( isset($_GET['id_questions'])) :
    // 1ere REQUETE : AFFICHAGE DES REPONSES
    $sql = "SELECT * FROM reponses WHERE id_questions =".$_GET['id_questions'];
  else : 
    // 2emeREQUETE : AFFICHAGE DES QUESTIONS
    $sql = "SELECT * FROM questions ORDER BY date DESC";
  endif;

  $list_R = $connect -> query($sql);
  echo $connect -> error;
  $nb_R = $list_R -> num_rows;

  if ($nb_R > 0) :
    $myArray_R = array();

    while ($row = $list_R -> fetch_object()) :
      $myArray_R[] = $row;
    endwhile;
    echo json_encode($myArray_R);
    
  else :
    echo "none";

  endif;

?>