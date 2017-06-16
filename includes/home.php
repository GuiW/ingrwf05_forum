<?php 
   $sql = "SELECT * FROM questions";
   $q_questions = $connect -> query($sql);

   echo $connect -> error;

   $nb_questions = $q_questions -> num_rows;
?>

<main>
    <section>
      <?php if ( isset($nb_questions) AND $nb_questions > 0 ) : 
        while ( $row = $q_questions -> fetch_object() ) : ?>
        <article class="question">
          <h2><?php echo $row -> titre ?></h2>
          <div class="question_info">
            <p>Auteur : <?php echo $row -> mail ?></p>
            <time><?php echo $row -> date ?></time>
          </div>
        </article>
      <?php endwhile;
      endif; ?>
    </section>

<?php include('insert_question.php') ?>

</main>