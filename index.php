
<?php include "php/classes/sadmin.class.php" ?>
<?php require('php/init.php') ?>
<?php require_login(); ?>
<?php $idsa = $session_SAdmin->get_id(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="ressources/css/style_admin.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="ressources/fontawesome/js/all.js"></script>
    <title>Admin</title>
    <style media="screen">

    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
      }

      .top-navbar {
        position: static;
      }
    }
    </style>

  </head>
  <body>
    <?php
    include'html/navbar.php'
      ?>
      <section>
        <div class="container-fluid ">
          <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row pt-md-5 mt-md-3 mb-5">
                <div class="col ml-3">
                  super admin id : <?php echo $idsa; ?>

               </div>
            </div>
          </div>
        </div>
      </div>
    </section>






       <script src="bootstrap/js/jquery.min.js" ></script>
       <script src="bootstrap/js/popper.min.js"></script>
       <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
