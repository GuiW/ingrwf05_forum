<?php

  require("config.php");

  $sql = "SELECT * FROM questions ORDER BY date DESC";
  $list_Q = $connect -> query($sql);
  echo $connect -> error;
  $nb_Q = $list_Q -> num_rows;

  if ($nb_Q > 0) :
    $myArray_Q = array();

    while ($row = $list_Q -> fetch_object()) :
      $myArray_Q[] = $row;
    endwhile;
    // Content-type décrit le type de contenu
    header("Content-type:application/json");
    echo json_encode($myArray_Q);
    // echo "<pre>";
    // print_r($myArray_Q);
  endif;

?>