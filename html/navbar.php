<nav class="navbar navbar-expand-md navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top  top-navbar">

          <br>
                <div class="text-center">
                  <i class="fa fa-user-shield  fa-3x text-light"></i>
                </div>
          <a href="index.php" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border font-weight-bold"><h3 class="font-weight-bold">
            <?php //if ($session_secretaire->is_logged_in()) {
              //echo $session_secretaire->username;
            //} ?>Admin</h3></a>
          <div class="" style="height:500px; overflow : auto;">

          <ul class="navbar-nav flex-column mt-4 ">
            <li class="nav-item"><a href="index.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="fas fa-home text-light fa-lg mr-3"></i>Accueil</a>
            </li>
            <li class="nav-item"> <a class="nav-link  text-white p-3 mb-2 sidebar-link text-danger" data-toggle="collapse"
               href="#collapseExample"
               role="button" aria-expanded="false" aria-controls="collapseExample">
                 <i class="fas fa-address-book text-danger fa-lg mr-3"></i>Produits<i class="ml-3 fas fa-caret-down"></i></a>

              <div class="collapse" id="collapseExample">
                <div class="">
                  <a href="produitm.php" class="nav-link text-white p-2 mb-2 ml-3 sidebar-link">
                    <i class="far fa-flag text-light fa-lg mr-3"></i>produit maison</a>
                    <a href="produiti.php" class="nav-link text-white p-2 mb-2 ml-3 sidebar-link">
                      <i class="fas fa-bug text-light fa-lg mr-3"></i>produit indus</a>
                </div>
              </div>
            </li>

            <li class="nav-item"><a href="profile.php" class="nav-link text-warning p-3 mb-2 sidebar-link">
              <i class="fas fa-user-cog text-warning fa-lg mr-3"></i>Profile</a></li>


            <li class="nav-item"><a href="abonnenement.php" class="nav-link p-3 mb-2 sidebar-link text-info">
              <i class="fas fa-globe-europe text-info fa-lg mr-3"></i>Abonnenements</a></li>

            <li class="nav-item"><a href="admin.php" class="nav-link p-3 mb-2 sidebar-link text-danger">
              <i class="fas fa-spider text-danger fa-lg mr-3"></i>Admins</a></li>

            <li class="nav-item"><a href="membre.php" class="nav-link text-warning p-3 mb-2 sidebar-link">
              <i class="fas fa-users text-warning fa-lg mr-3"></i>Membres</a></li>

            <li class="nav-item"><a href="plan.php" class="nav-link text-info p-3 mb-2 sidebar-link">
              <i class="far fa-calendar-check text-info fa-lg mr-3"></i>Plans</a></li>

            <li class="nav-item"><a href="depense.php" class="nav-link text-success p-3 mb-2 sidebar-link">
              <i class="fas fa-donate text-success fa-lg mr-3"></i>Depense</a></li>

            <li class="nav-item"><a href="items.php" class="nav-link text-primary p-3 mb-2 sidebar-link">
              <i class="fas fa-dice text-primary fa-lg mr-3"></i>Items</a></li>

            <li class="nav-item"><a href="documentation.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="fas fa-file-alt text-light fa-lg mr-3"></i>Documentation!</a></li>

          </ul>
        </div>

        </div>


        <!-- end of sidebar -->

        <!-- top-nav -->
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto  fixed-top top-navbar">
          <div class=" row align-items-center">

              <!-- <div class="col-md-3 my-2">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Search...">
                    <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-info"></i></button>
                  </div>
                </form>
              </div> -->
            <div class="col-md-8  ">
              <?php //echo display_session_message(); ?>
            </div>
              <div class="col-md-1">

              </div>
            <div class="col-md-3">
              <ul class="navbar-nav">
                <!-- <li class="nav-item ml-md-auto border border-danger rounded "><a href="#" class="nav-link text-light font-weight-bold p-2" data-toggle="modal" data-target="#sign-out">Se Déconnecter <i class="fas fa-sign-out-alt text-danger fa-lg float-right"></i></a></li> -->
                <?php //if ($session_secretaire->is_logged_in()) {
                ?>
                <li class="nav-item ml-md-auto m-2 border border-danger rounded ">

                  <a href="SAdminLogout.php"
                    class="nav-link text-light bg-dark font-weight-bold p-2">Se  Déconnecter
                  <i class="fas fa-sign-out-alt text-danger ml-2 fa-lg float-right">

                  </i></a></li>
              <?php // } ?>

              </ul>
            </div>
          </div>
        </div>
        <!-- end of top-nav -->



      </div>
      </div>
    </div>
</nav>
