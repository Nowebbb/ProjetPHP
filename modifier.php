
<html>
<head>
    <title>Modifier le compte — AgenceTourix</title>
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
    <center><font size="50"><font class="text-decoration-underline">Modifier le compte</font> :</font></center>
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
                    <a href="modifier.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoModifierCompteBlanc.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Modifier le compte</a>
                    <a href="modifierMotDePasse.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoModifierMDP.png" alt="Logo modifier mot de passe" style="height: 25px; width: 25px;">&nbsp;Modifier le mot de passe</a>
                    <a href="supprimer.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoSupprimer.png" alt="Logo supprimer le compte" style="height: 25px; width: 25px;">&nbsp;Supprimer le compte</a>
                    <a href="traitement_deconnexion.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoDeconnexion.png" alt="Logo déconnexion" style="height: 25px; width: 25px;">&nbsp;Se deconnecter</a>
                </div>
            </div>
            <div class="col-12 col-md-10">
                    <br/><br/><br/>
                    <center>
                        <form action='traitement_modifier.php' method='POST'>
                            <table>
                                    <tr>
                                        <td><b>Adresse mail : </b></td><td><input type="text" name="mail" value="<?php echo $utilisateur['email']; ?>"> <br/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nom : </b></td><td><input type="text" name="nom" value="<?php echo $utilisateur['NomClient']; ?>"> <br/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Prénom : </b></td><td><input type="text" name="prenom" value="<?php echo $utilisateur['PrenomClient']; ?>"> <br/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Téléphone : </b></td><td><input type="text" name="tel" maxlength="10" value="<?php echo $utilisateur['tel']; ?>"> <br/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Date de naissance : </b></td><td><input type="date" name="dateDeNaissance" value="<?php echo $utilisateur['DateDeNaissance']; ?>"> <br/></td>
                                    </tr>
                                    <tr>
                                        <td><b>Code postal : </b></td><td><input type="text" name="CP" maxlength="5" value="<?php echo $utilisateur['CP']; ?>"> <br/></td>
                                    </tr>
                            </table>
                            <br/><br/>
                            <input type="submit" value="Modifier" class = "btn btn-dark"/>
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
                            <strong>Erreur !</strong> Cette identifiant est déjà utilisé.
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
?>
<br/><br/><br/>
</body>
<?php
    include('footer.php')
?>
</html>
