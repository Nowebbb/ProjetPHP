<html>
<head>
    <title>Comptes clients — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
	    include('header.php');
    ?>
</head>
<body>
<?php
    if (!isset($_SESSION["login"])) {
            header('location:identification.php');
        }
        else {
            if (isset($_SESSION["admin"])) {
                if ($_SESSION["admin"] == true) {
            $id = $_SESSION["login"];
            $prenom = $_SESSION["prenom"];
            ?>
            <center><font size="50"><font class="text-decoration-underline">Comptes clients</font> :</font></center>
            <br/><br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="list-group">
                            <?php 
                            if (isset($_SESSION["admin"])) {
                                if ($_SESSION["admin"] == true) {
                                    echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoReservation.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Réservations</a>';
                                    echo '<a href="clients.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoMonCompteBlanc.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Comptes clients</a>';
                                }
                            }
                            else {
                                echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoReservation.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Mes réservations</a>';
                            } 
                            ?>
                            <a href="modifier.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoModifierCompte.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Modifier le compte</a>
                            <a href="modifierMotDePasse.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoModifierMDP.png" alt="Logo modifier mot de passe" style="height: 25px; width: 25px;">&nbsp;Modifier le mot de passe</a>
                            <a href="supprimer.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoSupprimer.png" alt="Logo supprimer le compte" style="height: 25px; width: 25px;">&nbsp;Supprimer le compte</a>
                            <a href="traitement_deconnexion.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoDeconnexion.png" alt="Logo déconnexion" style="height: 25px; width: 25px;">&nbsp;Se deconnecter</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <form action="traitement_inscription.php" method="POST">
                            <br/><br/>
                            <center>
                                <table>
                                        <tr>
                                            <td><b>Saisir l'adresse mail : </b></td><td><input type="email" name="mail"> <br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir un mot de passe : </b></td><td><input type="password" name="mdp"> <br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir à nouveau le mot de passe : </b></td><td><input type="password" name="mdp2"><br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir le nom : </b></td><td><input type="text" name="nom"><br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir le prénom : </b></td><td><input type="text" name="prenom"><br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir le numéro de téléphone : </b></td><td><input type="text" name="tel" maxlength="10"><br/></td>
                                        </tr>
                                        <tr>
                                            <td><b>Saisir la date de naissance : </b></td><td><input type="date" name="dateDeNaissance" ><br/></td><!--placeholder="AAAA-MM-JJ"-->
                                        </tr>
                                        <tr>
                                            <td><b>Saisir le code postal : </b></td><td><input type="text" name="CP" maxlength="5"><br/></td>
                                        </tr>
                                </table>
                                <br/><br/>
                                <input type="submit" value="Créer un compte client" class = "btn btn-dark"/>&emsp;
                                <a href="clients.php" class = "btn btn-dark">Retour</a>
                                <br/><br/><br/>
                            </form>
                        </center>
                    </div>
                </div>
            </div>

                <?php
                }
                else {
                    header('location:mesReservations.php');
                }
            }
            else {
                header('location:mesReservations.php');
            }
        }
    
    if (isset($_SESSION["mdpIncorrect"])) {
        if ($_SESSION["mdpIncorrect"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Vos mots de passe ne correspondent pas.
                        </div>
                    </center>";
            $_SESSION["mdpIncorrect"] = false;
        }
    }
    if (isset($_SESSION["idUtilise"])) {
        if ($_SESSION["idUtilise"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> L'identifiant est déjà utilisé.
                        </div>
                    </center>";
            $_SESSION["idUtilise"] = false;
        }
    }
    if (isset($_SESSION["pasRempli"])) {
        if ($_SESSION["pasRempli"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Vous devez remplir les informations.
                        </div>
                    </center>";
            $_SESSION["pasRempli"] = false;
        }
    }
    if (isset($_SESSION["idmdp"])) {
        if ($_SESSION["idmdp"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Vous devez avoir un mot de passe différent que votre identifiant.
                        </div>
                    </center>";
            $_SESSION["idmdp"] = false;
        }
    }
    if (isset($_SESSION["pasCoche"])) {
        if ($_SESSION["pasCoche"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Vous devez accepter les conditions d'utilisations pour créer un compte.
                        </div>
                    </center>";
            $_SESSION["pasCoche"] = false;
        }
    }
    if (isset($_SESSION["mdpTropCourt"])) {
        if ($_SESSION["mdpTropCourt"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Le mot de passe entré est trop court.
                        </div>
                    </center>";
            $_SESSION["mdpTropCourt"] = false;
        }
    }
?>
</body>
<?php
    include('footer.php')
?>
</html>