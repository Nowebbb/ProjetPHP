<html>
<head>
    <title>Supprimer le compte — AgenceTourix</title>
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
        $id = $_SESSION["login"];
        $prenom = $_SESSION["prenom"];
        ?>
        <center><font size="50"><font class="text-decoration-underline">Supprimer le compte</font> :</font></center>
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
                        <a href="modifierMotDePasse.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoModifierMDP.png" alt="Logo modifier mot de passe" style="height: 25px; width: 25px;">&nbsp;Modifier le mot de passe</a>
                        <a href="supprimer.php" class="list-group-item list-group-item-action list-group-item-dark active"><img src="images\logoSupprimerBlanc.png" alt="Logo supprimer le compte" style="height: 25px; width: 25px;">&nbsp;Supprimer le compte</a>
                        <a href="traitement_deconnexion.php" class="list-group-item list-group-item-action list-group-item-dark"><img src="images\logoDeconnexion.png" alt="Logo déconnexion" style="height: 25px; width: 25px;">&nbsp;Se deconnecter</a>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <br/><br/>
                    <center>
                        <?php
                        if (isset($_SESSION["admin"])) {
                                if ($_SESSION["admin"] == true) {
                                    echo '<strong><a class="text-danger">Il est impossible de supprimer un compte administrateur !</a></strong>';
                                }
                            }
                        else {
                            echo "
                                <br/><br/>
                                Voulez-vous vraiment supprimer le compte ?<br/><br/>
                                <a href='traitement_supprimer.php' class='btn btn-danger'>Oui</a>&emsp;
                                <a href='mesReservations.php' class='btn btn-dark'>Non</a>
                                <br/><br/><br/>";
                        }
                        ?>
                        
                    </center>
                </div>
            </div>
        </div>
        <?php
    }
?>

</body>
<?php
    include('footer.php')
?>
</html>