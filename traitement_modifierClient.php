<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        if (isset($_SESSION["admin"])) {
            if ($_SESSION["admin"] == true) {
                include ('fonctions.php');
                $mail = $_SESSION['mailClient'];
                $mailModifier = $_POST['mail'];
                $nomModifier = $_POST['nom'];
                $prenomModifier = $_POST['prenom'];
                $telModifier = $_POST['tel'];
                $dateDeNaissanceModifier = $_POST['dateDeNaissance'];
                $CPModifier = $_POST['CP'];
                $ok1 = verifLogin($mail);
                if ($ok1) {
                    $ok2 = modifierUtilisateur($mail, $nomModifier, $prenomModifier, $telModifier, $mailModifier, $dateDeNaissanceModifier, $CPModifier);
                    if (!$ok2) {
                        header('location:clients.php');
                    }
                    else {
                        $_SESSION["impossibleModif"] = true;
                        header('location:modifierClient.php');
                    }
                }
                else {
                    $_SESSION["idUtilise"] = true;
                    header('location:modifierClient.php');
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