<?php
  // SI ON A DE L'AJAX
  if (isset( $_GET['ajax']) ):
    require_once("../config.php");
  endif;

  if ( isset($_GET['del']) AND $_GET['del'] == "r" ) :

    require('../config.php');

    $sql = "DELETE FROM reponses WHERE id_reponses =".$_GET['reponse'];
    $connect -> query($sql);
    echo $connect -> error;
    header("location:../question-".$_GET['id_question'].".html");
    exit;
  endif;

// ************************************************************************** //

   $sql = "SELECT * FROM questions WHERE id_questions =".$_GET['question'];
   $q_question = $connect -> query($sql);

   echo $connect -> error;

   $nb_questions = $q_question -> num_rows;

// ************************************************************************** //

  $sql = "SELECT * FROM reponses WHERE id_questions =".$_GET['question'];
  $q_reponses = $connect -> query($sql);

  echo $connect -> error;

  $nb_reponses = $q_reponses -> num_rows;

  // SI ON A DE L'AJAX
  if ( isset($_GET['ajax']) ) : 
   if ($nb_reponses > 0) :
     $myArray_R = array();

     while ($row = $q_reponses -> fetch_object()) :
       $myArray_R[] = $row;
     endwhile;
     echo json_encode($myArray_R);

   else :
     echo "none";

   endif;
   exit;
  endif;

// ************************************************************************** //
?>

  <main>

    <a href="index.php" id="return-btn">&larr; Retour à la liste des questions</a>

    <?php if ( isset($nb_questions) AND $nb_questions > 0 ) : 
      while ( $row = $q_question -> fetch_object() ) : ?>

        <div class="question-infos">
          <p>Auteur :
            <?php echo $row -> mail ?>
          </p>
          <time>
            <?php echo date('d/m/y - H:i:s',strtotime($row -> date)); ?>
          </time>
        </div>

        <h2 class="question-title"><?php echo $row -> titre ?></h2>

      <?php endwhile; ?>

      <section id="reponses">
        <h2>Réponses :</h2>

        <?php if ( isset($nb_reponses) AND $nb_reponses > 0 ) : 
          while ($row = $q_reponses -> fetch_object() ) :?>
          
            <div class="reponse">
              <a href="includes/reponses.php?id_question=<?php echo $_GET['question'] ?>&reponse=<?php echo $row -> id_reponses ?>&del=r" class="del-btn">X</a>
              <div class="reponse-infos">
                <p><?php echo $row -> mail ?></p>
                <time><?php echo date('d/m/y - H:i:s',strtotime($row -> date)); ?></time>
              </div>
              <div class="reponse-content">
                <h3><?php echo $row -> titre ?></h3>
                <?php echo $row -> texte ?>
              </div>
            </div>

          <?php endwhile;

        else : ?>
          <h3 id="no-reponse">Il n'y a pas encore de réponse.</h3>
        <?php endif; ?>

      </section>

      <a href="index.php" id="return-btn">&larr; Retour à la liste des questions</a>

      <?php include('insert_reponse.php') ?>

    <?php else : ?>
      <h2 id="no-question">Oups, cette question n'existe pas.</h2>
    <?php endif; ?>
    
  </main>

  
