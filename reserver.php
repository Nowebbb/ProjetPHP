<?php
	include('header.php');
    include('fonctions.php');
    $pays = "Canada";
?>
<html>
<head>
    <title>Réserver — AgenceTourix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
    <form action="traitement_reserver.php" method="POST">
        <center>
           <font size="50"><font class="text-decoration-underline">Reserver</font> :</font>
           <br/><br/>
           <table>
                <tr>
                    <td><b>Date de départ : </b></td><td><input type="date" name="dateResrv"> <br/></td>
                </tr>
                <tr>
                    <td><b>Nombre de personne : </b></td><td><input type="text" maxlength="2" name="NbPersonne"><br/></td>
                </tr>
            </table>
            <?php
            $produits = recupererInfosProduitLibelle($pays);
            echo $produits['numProd'];
            echo $produits['duree'];
            echo $produits['prix'];
            $_SESSION['pays'] = $produits['numProd'];
            ?>
            <br/><br/>
           <input type="submit" value="Réserver" class = "btn btn-dark"/>&emsp;
           <a class = "btn btn-dark" href='nosOffres.php'>Retour</a>
           <br/><br/><br/>
       </center>
    </form>
<?php
	include('footer.php')
?>
</html>
