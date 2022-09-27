<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        include ('fonctions.php');
        $mail = $_SESSION["login"];
        $mdpActuel = $_POST['passwordActuel'];
        $mdphActuel = md5($mdpActuel) + 103;
        $mdp = $_POST['passwordNouveau'];
        $mdp2 = $_POST['passwordNouveau2'];
        $mdphNouveau = password_hash($mdp, PASSWORD_DEFAULT);
        if (strlen($mdp) > 7) {
            if ($mdp != $mdp2) {
                $_SESSION["mdpNonIdentique"] = true;
                header('location:modifierMotDePasse.php');
            }
            else {
                if ($mdpActuel == $mdp) {
                    $_SESSION["mdpIdentifique"] = true;
                    header('location:modifierMotDePasse.php');
                }
                else {
                    $mdph = recupereMDP($mail);
                    if (password_verify($mdpActuel,$mdph)) {
                        $ok2 = modifierMDP($mail, $mdphNouveau);
                        if (!$ok2) {
                            header('location:mesReservations.php');
                        }
                        else {
                            $_SESSION["impossibleModif"] = true;
                            header('location:modifierMotDePasse.php');
                        }
                    }
                    else {
                        $_SESSION["mdpIncorrect"] = true;
                        header('location:modifierMotDePasse.php');
                    }
                }
            }
        }
        else {
            $_SESSION["mdpTropCourt"] = true;
            header('location:modifierMotDePasse.php');
        }
    }
?>