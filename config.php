<?php

define("DB_HOST","localhost");
define("DB_NAME","forum");
define("DB_USER","root");
define("DB_PASSWORD","root");

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($connect->error) :
  echo "erreur de connexion : ".$connect->error;
  exit;

else :
  $connect -> set_charset("utf8");

endif;

session_start();

?>