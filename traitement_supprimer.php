<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        session_start();
        include ('fonctions.php');
        $mail = $_SESSION['login'];
        session_destroy();
        $ok = supprimerUtilisateur($mail);
        if (!$ok) {
            session_start();
            $_SESSION["suppr"] = true;
            header('location:identification.php');
        }
        else {
            ?>
                <center>Erreur de suppression ! Veuillez réessayer plus tard.
                <button href="identification.php" class="btn btn-dark">Retour</button></center>
            <?php
        }
    }
    ?>