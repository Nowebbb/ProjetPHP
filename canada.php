<!DOCTYPE html>
<html>
<head>
	<title>Canada — AgenceTourix</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<?php
	    include('header.php');
		include('fonctions.php');
    	$pays = "Canada";
    ?>
</head>
<body>
	<center>
		<font size="50"><font class="text-decoration-underline">Canada</font> :</font>
		<br/><br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-2">
				</div>
				<div class="col-12 col-md-8">
					<p>
					Nation de nos cousins les québécois, étendu entre les océans Atlantique et Pacifique, le Canada en impose. Sa grandeur et ses paysages impressionnent : il n’est autre que le deuxième plus grand pays du monde après la Russie. Certains clichés canadiens ne sont pas infondés : les lacs, les forêts, les montagnes et les paysages enneigés sont bien réels.
					La rencontre avec les ours, les baleines, et les castors aussi. Votre séjour au Canada sera rempli d’émotions et de souvenirs. Tout le monde sera conquis par ses atouts : les amoureux de la nature n’auront que l’embarras du choix face à son immensité; en hiver, les sentiers se parcourent à chiens de traîneaux, en moto-neige, ou en raquettes. Les stations de ski, elles, ne manquent pas.
					En été, place aux randonnées à pied ou à VTT, au rafting, kayak, mais aussi et bien sûr à la pêche. Et les inconditionnels des grandes villes reconnaîtront le style très américain des métropoles canadiennes. Les grands espaces naturels contrastent donc avec les gratte-ciel.
					Ici, deux langues officielles sont parlées : majoritairement l’anglais, et le français dans la région du Quebec.</p>
					<br/><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\chateau.png" alt="" class="img-fluid card-img-top">
					Fairmont le Château Frontenac
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\musee.png" alt="" class="img-fluid card-img-top">
					Musée royale de l'Ontanrio
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\stanleypark.png" alt="" class="img-fluid card-img-top">
					Stanley park
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\tour.png" alt="" class="img-fluid card-img-top">
					Tour du CN
					</div>
				</div>
			</div>
			<br/><br/><br/><br/>
			<?php
				$produits = recupererInfosProduitLibelle($pays);
				$_SESSION['pays'] = $produits['numProd'];
				$prixSepare = prixMill($produits['prix']);
				?>
			<div class="row">
				<div class="col-12 col-md-6">
					<img src="images\logoEuro.png" style="height: 100px; width: 100px;" alt="Logo euro">&emsp;<b><?php echo $prixSepare; ?> €</b><br/>
				</div>
				<div class="col-12 col-md-6">
					<img src="images\logoDuree.png" style="height: 85px; width: 85px;" alt="Logo durée">&emsp;<b><?php echo $produits['duree']; ?> jours</b><br/>
				</div>
			</div>
			<br/><br/><br/>
			<form action="traitement_reserver.php" method="POST">
				<font size="6"><font class="text-decoration-underline">Prendre une reservation</font> :</font>
				<br/><br/><br/>
				<div class="row">
					<div class="col-12 col-md-4">
					</div>
					<div class="col-12 col-md-4">
						<table>
							<tr>
								<td><b>Date de départ : </b></td><td><input type="date" name="dateResrv"> <br/></td>
							</tr>
							<tr>
								<td><b>Nombre de personne : </b></td><td><input type="text" maxlength="2" name="NbPersonne"><br/></td>
							</tr>
						</table>
						<br/><br/><br/>
						<input type="submit" value="Réserver" class = "btn btn-dark"/>
					</div>
					<?php
					if (isset($_SESSION["pasRempli"])) {
						if ($_SESSION["pasRempli"]) {
							echo "  <center>
										<br/><br/>
										<div class='alert alert-warning'>
											<strong>Erreur !</strong> Vous n'avez pas rempli les informations.
										</div>
									</center>";
							$_SESSION["pasRempli"] = false;
						}
					}
					?>
				</div>
				<br/><br/><br/>
			</form>
		</div>
	</center>
</body>
<?php
    include('footer.php')
?>
</html>