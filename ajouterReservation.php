<html>
<head>
    <title>Mes réservations — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    include('header.php');
    include('fonctions.php');
    ?>
    <?php
    if (!isset($_SESSION["login"])) {
        header('location:identification.php');
    }
    else {
        $mail = $_SESSION["login"];
        $prenom = $_SESSION["prenom"];
    }
    ?>
</head>
<body>
    <center>
        <?php
            if (isset($_SESSION["admin"])) {
                if ($_SESSION["admin"] == true) {
                    echo '<font size="50"><font class="text-decoration-underline">Réservations des clients</font> :</font>';
                }
                else {
                    echo '<font size="50"><font class="text-decoration-underline">Mes réservations</font> :</font>';
                }
            }
            else {
                echo '<font size="50"><font class="text-decoration-underline">Mes réservations</font> :</font>';
            }
        ?>
    </center>
        <br/><br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-2">
                    <div class="list-group">
                        <?php 
                        if (isset($_SESSION["admin"])) {
                            if ($_SESSION["admin"] == true) {
                                echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoReservationBlanc.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Réservations</a>';
                                echo '<a href="clients.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoMonCompte.png" alt="Logo modifier le compte" style="height: 25px; width: 25px;">&nbsp;Comptes clients</a>';
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
                    <?php
                        if (isset($_SESSION["admin"])) {
                            if ($_SESSION["admin"] == true) {
                                if (isset($_SESSION["pasRempli"])) {
                                    if ($_SESSION["pasRempli"]) {
                                        echo "  <center>
                                                    <br/><br/>
                                                    <div class='alert alert-warning'>
                                                        <strong>Erreur !</strong> Les informations doivent être remplie.
                                                    </div>
                                                </center>";
                                        $_SESSION["pasRempli"] = false;
                                    }
                                }
                                ?>
                                <form action="traitement_ajouterReservation.php" method="POST">
                                    <center>
                                    <br/><br/>
                                    <table>
                                            <tr>
                                                <td><b>Numéro client : </b></td><td><input type="number" name="NumClient"><br/></td>
                                            </tr>
                                            <tr>
                                                <td><b>Date de départ : </b></td><td><input type="date" name="dateResrv"> <br/></td>
                                            </tr>
                                            <tr>
                                                <td><b>Nombre de personne : </b></td><td><input type="text" maxlength="2" name="NbPersonne"><br/></td>
                                            </tr>
                                            <tr>
                                            <td><b>Destination : </b></td>
                                                <td>
                                                    <select name="numPays">
                                                        <?php
                                                        $produits = recupererTousLesProduits();
                                                        foreach ($produits as $produit) {
                                                            ?>
                                                            <option value="<?php echo $produit['numProd']; ?>"> <?php echo $produit['libelle']; ?></option>
                                                        <?php } ?>
                                                    </select><br/>
                                                </td>
                                            </tr>
                                        </table>
                                        <br/><br/>
                                    <input type="submit" value="Réserver" class = "btn btn-dark"/>&emsp;
                                    <a class = "btn btn-dark" href='mesReservations.php'>Retour</a>
                                    <br/><br/><br/>
                                </center>
                                </form>
                                <?php
                            }
                        }
                        
                    ?>
                </div>
            </div>
        </div>
</body>
<?php
	include('footer.php')
?>
</html> 