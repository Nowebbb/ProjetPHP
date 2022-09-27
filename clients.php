<html>
<head>
    <title>Comptes clients — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
	    include('header.php');
        include('fonctions.php');?>
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
        <font size="50"><font class="text-decoration-underline">Comptes clients</font> :</font>
    </center>
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
                    <?php
                     if (isset($_SESSION["admin"])) {
                        if ($_SESSION["admin"] == true) {
                            echo '<div style="text-align: right;"><a href="ajouterCompte.php" class = "btn btn-success"><img src="images\logoPlus.png" alt="Logo ajouter" style="height: 25px; width: 25px;">&nbsp;Ajouter</a></div><br/>';
                            if (isset($_SESSION["confirmer"])) {
                                if ($_SESSION["confirmer"]) {
                                    echo "  <center>
                                                <br/><br/>
                                                <div class='alert alert-success'>
                                                    <strong>Créé !</strong> Le compte a bien été créé.
                                                </div>
                                            </center>";
                                    $_SESSION["confirmer"] = false;
                                }
                            }
                            if (isset($_SESSION["suppr"])) {
                                if ($_SESSION["suppr"]) {
                                    echo "  <center>
                                                <br/><br/>
                                                <div class='alert alert-success'>
                                                    <strong>Supprimé !</strong> Le compte client a bien été supprimé.
                                                </div>
                                            </center>";
                                    $_SESSION["suppr"] = false;
                                }
                            }
                            $clients = listerTousLesClients();
                            if ($clients) {
                                foreach($clients as $client) {
                                    $numClient = $client["numClient"];
                                    $NomClient = $client["NomClient"];
                                    $PrenomClient = $client["PrenomClient"];
                                    $tel = $client["tel"];
                                    $email = $client["email"];
                                    $DateDeNaissance = $client["DateDeNaissance"];
                                    $CP = $client["CP"];
                                    ?>
                                    <div class="card mb-3 py-2" style="max-width: 10000px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h1 class="card-title"><strong><?php echo $NomClient . ' ' . $PrenomClient; ?></strong></h1>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p class="card-text"><strong>• Numéro client</strong> : <?php echo $numClient; ?></p>
                                                                    <p class="card-text"><strong>• Téléphone</strong> : <?php echo $tel; ?></p>
                                                                    <p class="card-text"><strong>• Adresse mail</strong> : <?php echo $email; ?></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="card-text"><strong>• Date de naissance</strong> : <?php echo $DateDeNaissance; ?></p>
                                                                    <p class="card-text"><strong>• Code postal</strong> : <?php echo $CP; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <center>
                                                                <form action="modifierClient.php" method="POST">
                                                                    <input type="submit" class="btn btn-dark" value ="Modifier"/>
                                                                    <input type="hidden" name="email" class="btn btn-dark" value ="<?php echo $email; ?>"/>
                                                                </form>
                                                                <form action="confirmation_suppressionClient.php" method="POST">
                                                                    <input type="submit" class="btn btn-danger" src="images\logoPlus.png" value ="Supprimer"/>
                                                                    <input type="hidden" name="email" class="btn btn-dark"  value ="<?php echo $email; ?>"/>
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
                            else {
                                echo "<center>Aucune client ne s'est inscrit sur votre site</center>";
                            }
                        }
                        else {
                            header('location:mesReservations.php');
                        }
                    }
                    else {
                        header('location:mesReservations.php');
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