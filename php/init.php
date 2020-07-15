<?php include "classes/session-sadmin.class.php"?>
<?php include "includes.php"?>
<?php

  $database = db_connect();
  DatabaseObject::set_database($database);

  $session_SAdmin= new SessionSAdmin;
   ?>
