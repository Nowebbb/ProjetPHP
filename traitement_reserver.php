<?php
    session_start();
    include('fonctions.php');
    $mail = $_SESSION['login'];
    $dateResrv  = $_POST['dateResrv'];
    $NbPersonne = $_POST['NbPersonne'];
    $numPays = $_SESSION['pays'];
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        if (empty($dateResrv) or empty($NbPersonne)) {
            $_SESSION["pasRempli"] = true;
            if ($_SESSION['pays'] == 1) {
                header('location:maldives.php');
            }
            else if ($_SESSION['pays'] == 2) {
                header('location:canada.php');
            }
            else if ($_SESSION['pays'] == 3) {
                header('location:seychelles.php');
            }
        }
        else {
            $numClient = recupererNumeroUtilisateur($mail);
            unset($numClient[0]);
            $ok = ajouterReservation($dateResrv, $NbPersonne, implode($numClient), $numPays);
            if (!$ok) {
                header('location:mesReservations.php');
            }
            else {
                header('location:index.php');
            }
        }
    }
?>