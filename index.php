<?php 
  require("config.php");
  include("functions.php");
?>

<?php include('includes/header.php') ?>

<?php 
if ( isset($_GET['question']) ) :
  include('includes/reponses.php');

else :
  include('includes/home.php');

endif;

?>

<?php include('includes/footer.php') ?>