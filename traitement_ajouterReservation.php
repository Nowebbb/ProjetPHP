<?php
    session_start();
    include('fonctions.php');
    $mail = $_SESSION['login'];
    $dateResrv  = $_POST['dateResrv'];
    $numClient = $_POST['NumClient'];
    $NbPersonne = $_POST['NbPersonne'];
    $numPays = $_POST['numPays'];
    if (empty($_POST['dateResrv']) or empty($_POST['NbPersonne'])) {
        $_SESSION["pasRempli"] = true;
        header('location:ajouterReservation.php');
    }
    else {
        $ok = ajouterReservation($dateResrv, $NbPersonne, $numClient, $numPays);
        if (!$ok) {
            $_SESSION["ajoutReservation"] = true;
            header('location:mesReservations.php');
        }
        else {
            header('location:index.php');
        }
    }
?>