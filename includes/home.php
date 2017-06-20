<?php 
  // SI ON A DE L'AJAX
  if (isset( $_GET['ajax']) ):
    require_once("../config.php");
  endif;

  if ( isset($_GET['del']) AND $_GET['del'] == "r" ) :

    require('../config.php');

    $sql = "DELETE FROM reponses WHERE id_questions =".$_GET['id_question'];
    $connect -> query($sql);
    echo $connect -> error;

    $sql = "DELETE FROM questions WHERE id_questions =".$_GET['id_question'];
    $connect -> query($sql);
    echo $connect -> error;

    header("location:../index.html");
    exit;
  endif;

// ************************************************************************** //

   $sql = "SELECT * FROM questions ORDER BY `date` DESC";
   $q_questions = $connect -> query($sql);

   echo $connect -> error;

   $nb_questions = $q_questions -> num_rows;

   // SI ON A DE L'AJAX
   if ( isset($_GET['ajax']) ) : 
    if ($nb_questions > 0) :
      $myArray_R = array();

      while ($row = $q_questions -> fetch_object()) :
        $myArray_R[] = $row;
      endwhile;
      echo json_encode($myArray_R);

    else :
      echo "none";

    endif;
    exit;
   endif;
?>

<main>
    <section>
      <?php if ( isset($nb_questions) AND $nb_questions > 0 ) : 
        while ( $row = $q_questions -> fetch_object() ) : ?>

        <article class="question">
          <a href="includes/home.php?id_question=<?php echo $row -> id_questions ?>&del=r" class="del-btn">X</a>
          <h2 class="question-title"><a href="question-<?php echo $row -> id_questions ?>.html"><?php echo $row -> titre ?></a></h2>
          <div class="question-infos">
            <p>Auteur : <?php echo $row -> mail ?></p>
            <time><?php echo date('d/m/y - H:i:s',strtotime($row -> date)); ?></time>
          </div>
        </article>

        <?php endwhile;
      else : ?>
        <h2>Il n'y a pas encore de question.</h2>
      <?php endif; ?>
    </section>

<?php include('insert_question.php') ?>

</main>
