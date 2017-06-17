<?php

  if ( isset($_POST['insert_question']) ) :

    require("../config.php");

    $sql = sprintf("INSERT INTO questions SET titre = '%s', mail = '%s'",

    addslashes($_POST['titre']),
    addslashes($_POST['mail'])

    );

    $connect -> query($sql);
    echo $connect -> error;

    header("location:../index.php");
    exit;
  endif;
?>

<form action="includes/insert_question.php" method="post">
  <h2>Posez votre question :</h2>

  <label for="question_mail">Email :</label>
  <input type="email" name="mail" id="question_mail" required>

  <label for="question_content">Votre question :</label>
  <input type="text" name="titre" id="question_content" required>

  <input type="hidden" name="insert_question">

  <button>Envoyer</button>
</form>