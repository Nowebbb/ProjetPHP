<html>
<head>
    <title>Créer un compte — AgenceTourix</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
	        include('header.php');
    ?>
</head>
<body>
    <form action="traitement_inscription.php" method="POST">
        <center>
           <font size="50"><font class="text-decoration-underline">Créer un compte</font> :</font>
           <br/><br/>
           <table>
                <tr>
                    <td><b>Saisir votre adresse mail : </b></td><td><input type="email" id="email" name="mail"><a id="msgEmail"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir un mot de passe : </b></td><td><input type="password" maxlength="40" id="mdp"  name="mdp"><a id="msgMDP"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir à nouveau le mot de passe : </b></td><td><input type="password" maxlength="40" id="mdp2" name="mdp2"><a id="msgMDP2"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir votre nom : </b></td><td><input type="text" id="nom"  name="nom"><a id="msgNom"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir votre prénom : </b></td><td><input type="text" id="prenom"  name="prenom"><a id="msgPrenom"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir votre numéro de téléphone : </b></td><td><input type="text" id="tel"  name="tel" maxlength="10"><a id="msgTel"></a><br/></td>
                </tr>
                <tr>
                    <td><b>Saisir votre date de naissance : </b></td><td><input type="date" id="dateDeNaissance" name="dateDeNaissance" ><a id="msgDateDeNaissance"></a><br/></td><!--placeholder="AAAA-MM-JJ"-->
                </tr>
                <tr>
                    <td><b>Saisir votre code postal : </b></td><td><input type="text" id="CP" name="CP" maxlength="5"><a id="msgCP"></a><br/></td>
                </tr>
                <tr>
                    <td><br/><input type="checkbox" name="accepter" id="accepter" value="2"><label for="accepter">&nbsp;J'ai lu et j'accepte les&nbsp;</label><a href='conditionsUtilisations.php'>conditions d'utilisations</a><a id="msgAccepter"></a></td>
                </tr>
            </table>
            <br/><br/>
           <input type="submit" id="creer" value="Créer un compte" class = "btn btn-dark"/>&emsp;
           <a href='identification.php'>Connexion</a>
       </center>
    </form>
<?php
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
<script src="inscription.js">
    
</script>
</body>
<?php
    include('footer.php')
?>
</html>