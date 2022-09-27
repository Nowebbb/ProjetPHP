<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        include ('fonctions.php');
        $mail = $_SESSION['login'];
        $NumReserv = $_SESSION['NumReserv'];
        $dateResrvModifier = $_POST['dateResrv'];
        $NbPersonneModifier = $_POST['Nbpersonne'];
        if (empty($_POST['dateResrv']) or empty($_POST['Nbpersonne'])) {
            $_SESSION["pasRempli"] = true;
            header('location:modifierReservation.php?NumReserv=' . $NumReserv);
        }
        else {
            $ok = modifierReservation($dateResrvModifier, $NbPersonneModifier, $NumReserv);
            if (!$ok) {
                header('location:mesReservations.php');
            }
            else {
                $_SESSION["impossibleModif"] = true;
                header('location:modifierReservation.php?NumReserv=' . $NumReserv);
            }
        }
    }
?>