<?php

  // MODE DEBUG

  //On définit une constante. Par convention, on la met en majuscule.
  //On peut activer et désactiver le mode debug à souhait en passant la constante DEBUG en true ou false.
  define("DEBUG", false);

  //Par défaut, on affiche toutes les erreurs sauf les notices
  error_reporting(E_ALL & ~E_NOTICE);

  //Si on passe en mode debug, on affiche tout, notices y compris
  if (DEBUG == true) :
    error_reporting(E_ALL);
  endif;

  function debug() {
    if (DEBUG == true) :
      echo '<div id="debug">';
      echo "<pre>";

        echo '<strong>$_POST :</strong><br>';
        print_r($_POST);

        echo '<strong>$_GET :</strong><br>';
        print_r($_GET);

        echo '<strong>$_SESSION :</strong><br>';
        print_r($_SESSION);

      echo "</pre>";
      echo '</div>';
    
    endif;
  }