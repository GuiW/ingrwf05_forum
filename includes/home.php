<?php 
   $sql = "SELECT * FROM questions ORDER BY `date` DESC";
   $q_questions = $connect -> query($sql);

   echo $connect -> error;

   $nb_questions = $q_questions -> num_rows;
?>

<main>
    <section>
      <?php if ( isset($nb_questions) AND $nb_questions > 0 ) : 
        while ( $row = $q_questions -> fetch_object() ) : ?>

        <article class="question">
          <h2 class="question-title"><a href="question-<?php echo $row -> id_questions ?>.html"><?php echo $row -> titre ?></a></h2>
          <div class="question-infos">
            <p>Auteur : <?php echo $row -> mail ?></p>
            <time><?php echo date('d/m/y - H:i:s',strtotime($row -> date)); ?></time>
          </div>
        </article>

      <?php endwhile;
      endif; ?>
    </section>

<?php include('insert_question.php') ?>

</main>
