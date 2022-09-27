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
                            echo '<a href="mesReservations.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoReservationBlanc.png" alt="Logo réservation" style="height: 25px; width: 25px;">&nbsp;Mes réservations</a>';
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
                        if (isset($_SESSION["suppr"])) {
                            if ($_SESSION["suppr"]) {
                                echo "  <center>
                                            <br/><br/>
                                            <div class='alert alert-success'>
                                                <strong>Supprimé !</strong> La réservation a bien été supprimé.
                                            </div>
                                        </center>";
                                $_SESSION["suppr"] = false;
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
                        if (isset($_SESSION["ajoutReservation"])) {
                            if ($_SESSION["ajoutReservation"]) {
                                echo "  <center>
                                            <br/><br/>
                                            <div class='alert alert-success'>
                                                <strong>Ajouté !</strong> Laréservation a bien été ajouté.
                                            </div>
                                        </center>";
                                $_SESSION["ajoutReservation"] = false;
                            }
                        }
                        if (isset($_SESSION["admin"])) {
                            if ($_SESSION["admin"] == true) {
                                echo '<div style="text-align: right;"><a href="ajouterReservation.php" class = "btn btn-success"><img src="images\logoPlus.png" alt="Logo ajouter" style="height: 25px; width: 25px;">&nbsp;Ajouter</a></div><br/>';
                                $reservations = voirToutesLesReservations();
                                if ($reservations) {
                                    foreach ($reservations as $reservation) {
                                        $NumReserv = $reservation['NumReserv'];
                                        $dateResrv = $reservation['dateResrv'];
                                        $Nbpersonne = $reservation['NbPersonne'];
                                        $numProd = $reservation['numProd'];
                                        $numClient = $reservation['numClient'];
                                        $infosProd = recupererInfosProduit($numProd);
                                        foreach ($infosProd as $lesInfosProd) {
                                            $duree = $lesInfosProd['duree'];
                                            $destination = $lesInfosProd['libelle'];
                                            $prix = $lesInfosProd['prix'];
                                            $prixSepare = prixMill($prix);
                                            ?>
                                            <div class="card mb-3 py-2" style="max-width: 10000px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a href="<?php echo $destination . '.php'; ?>"><img src="<?php echo 'images/' . $destination . '.jpg'; ?>" class="card-img" alt="Image d'illustration"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h1 class="card-title"><strong><?php echo $destination . ' | Numéro du client : ' . $numClient; ?></strong></h1>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p class="card-text"><strong>• Numéro de réservation</strong> : <?php echo $NumReserv; ?></p>
                                                                            <p class="card-text"><strong>• Durée</strong> : <?php echo $duree; ?> jours</p>
                                                                            <p class="card-text"><strong>• Prix par personne</strong> : <?php echo $prixSepare; ?> €</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="card-text"><strong>• Date de départ</strong> : <?php echo $dateResrv; ?></p>
                                                                            <p class="card-text"><strong>• Nombre de personnes</strong> : <?php echo $Nbpersonne; ?></p>
                                                                            <p class="card-text"><strong>• Prix total</strong> : <?php echo $prix*$Nbpersonne; ?> €</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <center>
                                                                        <a href="<?php echo $destination . '.php'; ?>" class="btn btn-dark">Plus d'infos</a><br/><br/>
                                                                        <form action="modifierReservation.php" method="POST">
                                                                            <input type="submit" class="btn btn-dark" value ="Modifier"/>
                                                                            <input type="hidden" name="NumReserv" class="btn btn-dark" value ="<?php echo $NumReserv; ?>"/>
                                                                        </form>
                                                                        <form action="annuler.php" method="POST">
                                                                            <input type="submit" class="btn btn-danger" value ="Annuler"/>
                                                                            <input type="hidden" name="NumReserv" class="btn btn-dark" value ="<?php echo $NumReserv; ?>"/>
                                                                        </form>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                else {
                                    echo"<center><br/><br/>Aucune réservation n'a été prise sur votre site.</center>";
                                }
                            }
                        }
                        else {
                            $numClient = recupererNumeroClient($mail);
                            $reservations = recupererLesReservations($numClient['numClient']);
                            if ($reservations) {
                                foreach ($reservations as $reservation) {
                                    $NumReserv = $reservation['NumReserv'];
                                    $dateResrv = $reservation['dateResrv'];
                                    $Nbpersonne = $reservation['NbPersonne'];
                                    $numProd = $reservation['numProd'];
                                    $infosProd = recupererInfosProduit($numProd);
                                    foreach ($infosProd as $lesInfosProd) {
                                        $duree = $lesInfosProd['duree'];
                                        $destination = $lesInfosProd['libelle'];
                                        $prix = $lesInfosProd['prix'];
                                        $prixSepare = prixMill($prix);
                                        ?>
                                        <div class="card mb-3 py-2" style="max-width: 10000px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <a href="<?php echo $destination . '.php'; ?>"><img src="<?php echo 'images/' . $destination . '.jpg'; ?>" class="card-img" alt="Image d'illustration"></a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h1 class="card-title"><strong><?php echo $destination; ?></strong></h1>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p class="card-text"><strong>• Numéro de réservation</strong> : <?php echo $NumReserv; ?></p>
                                                                        <p class="card-text"><strong>• Durée</strong> : <?php echo $duree; ?> jours</p>
                                                                        <p class="card-text"><strong>• Prix par personne</strong> : <?php echo $prixSepare; ?> €</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p class="card-text"><strong>• Date de départ</strong> : <?php echo $dateResrv; ?></p>
                                                                        <p class="card-text"><strong>• Nombre de personnes</strong> : <?php echo $Nbpersonne; ?></p>
                                                                        <p class="card-text"><strong>• Prix total</strong> : <?php echo $prix*$Nbpersonne; ?> €</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <center>
                                                                    <a href="<?php echo $destination . '.php'; ?>" class="btn btn-dark">Plus d'infos</a><br/><br/>
                                                                    <form action="modifierReservation.php" method="POST">
                                                                        <input type="submit" class="btn btn-dark" value ="Modifier"/>
                                                                        <input type="hidden" name="NumReserv" class="btn btn-dark" value ="<?php echo $NumReserv; ?>"/>
                                                                    </form>
                                                                    <form action="annuler.php" method="POST">
                                                                        <input type="submit" class="btn btn-danger" value ="Annuler"/>
                                                                        <input type="hidden" name="NumReserv" class="btn btn-dark" value ="<?php echo $NumReserv; ?>"/>
                                                                    </form>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            else {
                                echo"<center><br/><br/>Vos réservations s'afficheront ici<br/><br/><a href='nosOffres.php' class='btn btn-dark'>Voir nos offres</a></center>";
                            }
                        }
                        
                    ?>
                </div>
            </div>
        </div>
        <br/><br/><br/>
</body>
<?php
	include('footer.php')
?>
</html> 