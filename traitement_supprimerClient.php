<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        include ('fonctions.php');
        if (isset($_SESSION["admin"])) {
            if ($_SESSION["admin"] == true) {
                $email = $_SESSION['email'];
                $ok = supprimerUtilisateur($email);
                if (!$ok) {
                    $_SESSION["suppr"] = true;
                    header('location:clients.php');
                }
                else {
                    ?>
                        <center>Erreur de suppression ! Veuillez réessayer plus tard.
                        <button href="clients.php" class="btn btn-dark">Retour</button></center>
                    <?php
                }
            }
            else {
                header('location:mesReservations.php');
            }
        }
        else {
            header('location:mesReservations.php');
        }
    }
?>