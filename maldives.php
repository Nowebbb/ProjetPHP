<!DOCTYPE html>
<html>
<head>
	<title>Maldives — Agencetourisques</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<?php
	    include('header.php');
		include('fonctions.php');
    	$pays = "Maldives";
    ?>
</head>
<body>
	<center>
		<font size="50"><font class="text-decoration-underline">Maldives</font> :</font>
		<br/><br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-2">
				</div>
				<div class="col-12 col-md-8">
				<p>
				Les Maldives sont un État insulaire de la mer des Laquedives situé à 612 kilomètres (jusqu'à Malé) au sud-ouest de l'État du Kerala, en Inde, et à 755 kilomètres à l'ouest-sud-ouest du Sri Lanka. Le pays, constitué de 26 atolls et trois îles isolées divisés en 20 régions administratives soit 1 199 îles au total (dont à peine plus de 200 habitées en permanence), s'étire du nord au sud entre le Lakshadweep et le territoire britannique de l'océan Indien (Archipel des Chagos). Les atolls occidentaux ont leur côte ouest baignant la mer d'Arabie tandis que les atolls orientaux appartiennent en totalité à la mer des Laquedives.</p>
				<p>
				Cette myriade d'îles et d'îlots est disséminée sur une superficie extrêmement vaste (presque 90 000 km2) s'étendant sur plus de 800 kilomètres dans le sens latitudinal et 130 kilomètres dans le sens longitudinal. Nombre de ces îles constituent des îles-hôtel. Pour éviter de trop grandes conséquences pour l'environnement et limiter la construction d'établissements trop modernes et élitaires (clubs, résidences, etc.), le gouvernement impose de très sévères taxes sur leur réalisation dans les îles non habitées en permanence.</p>
				<p>
				La capitale et plus grande ville du pays est Malé, sur l'atoll Malé du Nord. </p>
				<br/><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\atmosphere.png" alt="" class="img-fluid card-img-top">
					Atmosphere Kanifushi
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\meeru.png" alt="" class="img-fluid card-img-top">
					Meerufenfuchi
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\maalefushi.png" alt="" class="img-fluid card-img-top">
					Maalefushi
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\maleAtoll.png" alt="" class="img-fluid card-img-top">
					Malé Atoll
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