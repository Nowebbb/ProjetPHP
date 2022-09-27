<?php
    session_start();
	include ('fonctions.php');
    if (isset($_POST['mail']) and isset($_POST['mdp'])) {
        if (strlen($_POST['mdp']) > 7) {
            $mail = $_POST['mail'];
            $_SESSION["mail"] = $mail;
            $mdp = $_POST['mdp'];
            $mdph = recupereMDP($mail);
            if (password_verify($mdp,$mdph)) {
                $prenom = recupererNomUtilisateur($mail);
                if ($prenom) {
                    $_SESSION["prenom"] = $prenom['PrenomClient'];
                }
                else {
                    $_SESSION["prenom"] = "Prénom inconnu";
                }
                $admin = verifAdminUtilisateur($mail);
                if ($admin ==1) {
                    $_SESSION["admin"] = true;
                }
                $_SESSION["login"] = $mail;
                header('location:index.php');
            }
            else {
                $_SESSION["info"] = true;
                header('location:identification.php');
            }
        }
        else {
            $_SESSION["mdpTropCourt"] = true;
            header('location:identification.php');
        }
    }
    else {
        header('location:identification.php');
    }
?>