<?php
    session_start();
    include('fonctions.php');
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $dateDeNaissance = $_POST['dateDeNaissance'];  
    $CP = $_POST['CP'];
    if (isset($_SESSION['admin'])) {
        if ($_SESSION["admin"] == true) {
            if (empty($_POST['mail']) or empty($_POST['mdp']) or empty($_POST['mdp2']) or empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['tel']) or empty($_POST['dateDeNaissance']) or empty($_POST['CP'])) {
                $_SESSION["pasRempli"] = true;
                header('location:ajouterCompte.php');
            }
            else {
                if (strlen($mdp) > 7) {
                    if ($mdp == $mdp2) {
                        if ($mail != $mdp) {
                            $mdph = password_hash($mdp, PASSWORD_DEFAULT);
                            $ok = verifLogin($mail);
                            if (!$ok) {
                                ajouterUtilisateur($nom, $prenom, $tel, $mail, $dateDeNaissance, $CP, $mdph);
                                $_SESSION["confirmer"] = true;
                                header('location:clients.php');
                            }
                            else {
                                $_SESSION["idUtilise"] = true;
                                header('location:ajouterCompte.php');
                            }
                        }
                        else {
                            $_SESSION["idmdp"] = true;
                            header('location:ajouterCompte.php');
                        }
                    }
                    else {
                        $_SESSION["mdpIncorrect"] = true;
                        header('location:ajouterCompte.php');
                    }
                }
                else {
                    $_SESSION["mdpTropCourt"] = true;
                    header('location:ajouterCompte.php');
                }
            }
        }
    }
    else {
        if (empty($_POST['mail']) or empty($_POST['mdp']) or empty($_POST['mdp2']) or empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['tel']) or empty($_POST['dateDeNaissance']) or empty($_POST['CP'])) {
            $_SESSION["pasRempli"] = true;
            header('location:inscription.php');
        }
        else {
            if (strlen($mdp) > 7) {
                if ($_POST['accepter']) {
                    if ($mdp == $mdp2) {
                        if ($mail != $mdp) {
                            $mdph = password_hash($mdp, PASSWORD_DEFAULT);
                            $ok = verifLogin($mail);
                            if (!$ok) {
                                ajouterUtilisateur($nom, $prenom, $tel, $mail, $dateDeNaissance, $CP, $mdph);
                                $_SESSION["login"] = $mail;
                                $_SESSION["prenom"] = $prenom;
                                header('location:clients.php');
                            }
                            else {
                                $_SESSION["idUtilise"] = true;
                                header('location:inscription.php');
                            }
                        }
                        else {
                            $_SESSION["idmdp"] = true;
                            header('location:inscription.php');
                        }
                    }
                    else {
                        $_SESSION["mdpIncorrect"] = true;
                        header('location:inscription.php');
                    }
                }
                else {
                    $_SESSION["pasCoche"] = true;
                    header('location:inscription.php');
                }
            }
            else {
                $_SESSION["mdpTropCourt"] = true;
                header('location:inscription.php');
            }
        }
    }
?>