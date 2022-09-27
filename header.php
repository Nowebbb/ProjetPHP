 <div class="col-12">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark nav-pills nav-fill justify-content-centernav nav-pills flex-column flex-sm-row" style="color:#343A40">
      <a class="navbar-brand" href="index.php">AgenceTourix</a>
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="nosOffres.php">Nos offres</a></li>
        </ul>
        <div class="navbar-collapse justify-content-end" id="navbarCollapse">
          <ul class="navbar-nav">
                <?php
                    session_start();
                    if (!isset($_SESSION["login"])) {
                        echo '<li class="nav-item"><a class="nav-link" href="identification.php">Se connecter</a></li>';
                    }
                    else {
                        $prenom = $_SESSION["prenom"];
                        ?> <li class="nav-item"><a class="nav-link" href="mesReservations.php"><?php echo $prenom; ?> </a></li><?php
                        echo '<li class="nav-item"><a class="nav-link" href="mesReservations.php"><img src="images\logoMonCompteBlanc.png" alt="Logo Mon compte" style="height: 30px; width: 30px;"></a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="traitement_deconnexion.php"><img src="images\logoDeconnexionBlanc.png" alt="Logo deconnexion" style="height: 30px; width: 30px;"></a></li>';
                    }
                ?>
          </ul>
        </div>
      </nav>
    </div>
    <link rel="icon" type="image/png" sizes="250x250" href="images\logo.png">