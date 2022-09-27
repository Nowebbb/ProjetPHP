<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        include ('fonctions.php');
        $mail = $_SESSION['login'];
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
                $_SESSION['login'] = $mailModifier;
                $_SESSION['prenom'] = $prenomModifier;
                header('location:mesReservations.php');
            }
            else {
                $_SESSION["impossibleModif"] = true;
                header('location:modifier.php');
            }
        }
        else {
            $_SESSION["idUtilise"] = true;
            header('location:modifier.php');
        }
    }
?>