
<html>
<head>
    <title>Modifier le mot de passe — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
	        include('header.php');
    ?>
    <?php
    include('fonctions.php');
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        $id = $_SESSION["login"];
        $prenom = $_SESSION["prenom"];
        $utilisateur = rechercherUtilisateur($id);
    }
?>
</head>
<body>
    <center><font size="50"><font class="text-decoration-underline">Modifier le mot de passe</font> :</font></center>
    <br/><br/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="list-group">
                    <?php 
                    if (isset($_SESSION["admin"])) {
                        if ($_SESSION["admin"] == true) {
                            echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoReservation.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Réservations</a>';
                            echo '<a href="clients.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoMonCompte.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Comptes clients</a>';
                        }
                    }
                    else {
                        echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoReservation.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Mes réservations</a>';
                    } 
                    ?>
                    <a href="modifier.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoModifierCompte.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Modifier le compte</a>
                    <a href="modifierMotDePasse.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoModifierMDPBlanc.png" alt="Logo modifier mot de passe" style="height: 25px; width: 25px;">&nbsp;Modifier le mot de passe</a>
                    <a href="supprimer.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoSupprimer.png" alt="Logo supprimer le compte" style="height: 25px; width: 25px;">&nbsp;Supprimer le compte</a>
                    <a href="traitement_deconnexion.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoDeconnexion.png" alt="Logo déconnexion" style="height: 25px; width: 25px;">&nbsp;Se deconnecter</a>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <center>
                    <br/><br/>
                    Pour modifier votre mot de passe, vous devez d'abord entrer votre mot de passe actuel.
                    <br/><br/><br/>
                    <form action='traitement_modifierMotDePasse.php' method='POST'>
                        <table>
                                <tr>
                                    <td><b>Mot de passe actuel : </b></td><td><input type="password" maxlength="40" name="passwordActuel"> <br/></td>
                                </tr>
                                <tr>
                                    <td><b>Nouveau mot de passe : </b></td><td><input type="password" maxlength="40" name="passwordNouveau"> <br/></td>
                                </tr>
                                <tr>
                                    <td><b>Confirmer le nouveau mot de passe : </b></td><td><input type="password" maxlength="40" name="passwordNouveau2"> <br/></td>
                                </tr>
                        </table>
                        <br/><br/>
                        <input type="submit" value="Modifier" class = "btn btn-dark"/>&nbsp;&nbsp;&nbsp;&nbsp;
                    </form>
                </center>
            </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION["idUtilise"])) {
            if ($_SESSION["idUtilise"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> Vous ne pouvez pas mettre le même mot de passe que précédemment.
                            </div>
                        </center>";
                $_SESSION["idUtilise"] = false;
            }
        }
        if (isset($_SESSION["impossibleModif"])) {
            if ($_SESSION["impossibleModif"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> La modification n'a pas eu lieu pour des raisons inconnus.
                            </div>
                        </center>";
                $_SESSION["impossibleModif"] = false;
            }
        }
        if (isset($_SESSION["mdpIncorrect"])) {
            if ($_SESSION["mdpIncorrect"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> Le mot de passe actuel est incorrect.
                            </div>
                        </center>";
                $_SESSION["mdpIncorrect"] = false;
            }
        }
        if (isset($_SESSION["mdpNonIdentique"])) {
            if ($_SESSION["mdpNonIdentique"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> Vos mots de passe ne correspondent pas.
                            </div>
                        </center>";
                $_SESSION["mdpNonIdentique"] = false;
            }
        }
        if (isset($_SESSION["mdpIdentifique"])) {
            if ($_SESSION["mdpIdentifique"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> Votre mot de passe actuel est incorrect.
                            </div>
                        </center>";
                $_SESSION["mdpIdentifique"] = false;
            }
        }
        if (isset($_SESSION["mdpTropCourt"])) {
            if ($_SESSION["mdpTropCourt"]) {
                echo "  <center>
                            <br/><br/>
                            <div class='alert alert-warning'>
                                <strong>Erreur !</strong> Vous devez accepter les conditions d'utilisations pour créer un compte.
                            </div>
                        </center>";
                $_SESSION["mdpTropCourt"] = false;
            }
        }
    ?>
<br/><br/><br/>
</body>
<?php
    include('footer.php')
?>
</html>
