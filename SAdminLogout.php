<?php include "php/classes/sadmin.class.php" ?>
<?php require('php/init.php') ?>
<?php $session_SAdmin->logout($sadmin);
redirect_to('loginsa.php') ?>
