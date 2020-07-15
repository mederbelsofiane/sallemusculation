<?php include "session-secretaire.class.php"?>
<?php

  $database = db_connect();
  DatabaseObject::set_database($database);

  $session_secretaire = new SessionSecretaire;
   ?>
