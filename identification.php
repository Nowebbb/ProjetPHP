<html>
<head>
    <title>Connexion — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
	        include('header.php');
    ?>
</head>
<body>
    <form action="traitement_verif.php" method="POST">
        <center>
            <br/><br/>
           <font size="50"><font class="text-decoration-underline">Connexion</font> :</font>
           <br/><br/>
           <table>
                <tr>
                    <td><b>Saisir votre adresse mail : </b></td><td><input type="text" name="mail"> <br/></td>
                </tr>
                <tr>
                    <td><b>Saisir votre mot de passe : </b></td><td><input type="password" maxlength="40" name="mdp"> <br/></td>
                </tr>
           <table>
           <br/><br/>
           <input type="submit" value="Se connecter" class = "btn btn-dark"/>&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="inscription.php">Créer un compte</a>
       </center>
    </form>
<?php
    if (isset($_SESSION["info"])) {
        if ($_SESSION["info"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-warning'>
                            <strong>Erreur !</strong> Identifiant ou mot de passe incorrect.
                        </div>
                    </center>";
            $_SESSION["info"] = false;
        }
    }
    if (isset($_SESSION["suppr"])) {
        if ($_SESSION["suppr"]) {
            echo "  <center>
                        <br/><br/>
                        <div class='alert alert-success'>
                            <strong>Supprimé !</strong> Votre compte à bien été supprimé.
                        </div>
                    </center>";
            $_SESSION["suppr"] = false;
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