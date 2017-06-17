<?php
   $sql = "SELECT * FROM questions WHERE id_questions =".$_GET['question'];
   $q_question = $connect -> query($sql);

   echo $connect -> error;

   $nb_questions = $q_question -> num_rows;

// ************************************************************************** //

  $sql = "SELECT * FROM reponses WHERE id_questions =".$_GET['question'];
  $q_reponses = $connect -> query($sql);

  echo $connect -> error;

  $nb_reponses = $q_reponses -> num_rows;
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

    <section id="reponses">
      <h2>Réponses :</h2>

      <?php if ( isset($nb_reponses) AND $nb_reponses > 0 ) : 
        while ($row = $q_reponses -> fetch_object() ) :?>
      
        <div class="reponse">
          <div class="reponse-infos">
            <p><?php echo $row -> mail ?></p>
            <time><?php echo date('d/m/y - H:i:s',strtotime($row -> date)); ?></time>
          </div>
          <div class="reponse-content">
            <h3><?php echo $row -> titre ?></h3>
            <?php echo $row -> texte ?>
          </div>
        </div>

      <?php 
        endwhile;

        else : ?>
          <h3 id="no-reponse">Il n'y a pas encore de réponse.</h3>
      <?php endif;

      endwhile;
    endif; ?>
    </section>

    <a href="index.php" id="return-btn">&larr; Retour à la liste des questions</a>

    <?php include('insert_reponse.php') ?>
    
  </main>

  
