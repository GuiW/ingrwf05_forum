<?php

  if ( isset($_POST['insert_reponse']) ) :
  echo 'Alert';

    require("../config.php");

    $sql = sprintf("INSERT INTO reponses SET mail = '%s', titre = '%s', texte = '%s', id_questions = '%s'",

    addslashes($_POST['mail']),
    addslashes($_POST['titre']),
    addslashes($_POST['texte']),
    addslashes($_POST['id_questions'])

    );

    $connect -> query($sql);
    echo $connect -> error;

    header("location:../question-".$_POST['id_questions'].".html");
    exit;
  endif;
?>

<form action="includes/insert_reponse.php" method="post">
  <h2>Répondez à la question :</h2>

  <label for="reponse_mail">Email :</label>
  <input type="email" name="mail" id="reponse_mail" required>

  <label for="reponse_title">Titre :</label>
  <input type="text" name="titre" id="reponse_title" required>

  <label for="reponse_content">Votre réponse :</label>
  <textarea name="texte" id="reponse_content" cols="30" rows="10"></textarea>

  <input type="hidden" name="id_questions" value="<?php echo $_GET['question']?>">
  <input type="hidden" name="insert_reponse">

  <button>Envoyer</button>
</form>