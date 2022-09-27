<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        include ('fonctions.php');
        $NumReserv = $_SESSION['NumReserv'];
        $ok = supprimerReservation($NumReserv);
        if (!$ok) {
            $_SESSION["suppr"] = true;
            header('location:mesReservations.php');
        }
        else {
            ?>
                <center>Erreur d'annulation ! Veuillez réessayer plus tard.
                <button href="identification.php" class="btn btn-dark">Retour</button></center>
            <?php
        }
    }
?>