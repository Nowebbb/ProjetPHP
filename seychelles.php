<!DOCTYPE html>
<html>
<head>
	<title>Seychelles — Agencetourisques</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<?php
	    include('header.php');
		include('fonctions.php');
    	$pays = "Seychelles";
    ?>
</head>
<body>
	<center>
		<font size="50"><font class="text-decoration-underline">Seychelles</font> :</font>
		<br/><br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-2">
				</div>
				<div class="col-12 col-md-8">
					<p>
					Cent quinze terres émergées au milieu de l’océan Indien forment l’archipel des Seychelles. Les premières sont accrochées sous l’équateur, les plus lointaines s’approchent des côtes de Madagascar. Chacune a son identité et son charme. Presque toutes les îles des Seychelles possèdent des baies idylliques et des plages piquées de palmiers entourées de rochers polis dans diverses teintes de granit, que l’on croirait sculptés pour servir de décor de cinéma.
					Près de 50 % du territoire des Seychelles est protégé dans des réserves naturelles, ce qui permet d’observer à loisir des tortues, d’innombrables poissons colorés et des oiseaux qui ne craignent pas la présence de l’homme. Chaque île mériterait une visite, mais la plupart des voyageurs ne découvrent qu’une petite partie du vaste archipel.
					Un tour à Mahé, Praslin ou La Digue suffit à faire un beau voyage, mais n’oublions pas que les Seychelles possèdent bien d’autres horizons, qui portent les noms de Bird, Frégate, Poivre, Denis, Thérèse ou Alphonse...</p>
					<br/><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\fregate.png" alt="" class="img-fluid card-img-top" style="height: 200px; width: 500px;">
					Île de frégate
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\anse.png" alt="" class="img-fluid card-img-top" style="height: 200px; width: 500px;">
					Anse source d'argent
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\digue.png" alt="" class="img-fluid card-img-top" style="height: 200px; width: 500px;">
					La digue
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="bg-white rounded shadow-sm"><img src="images\nord.png" alt="" class="img-fluid card-img-top" style="height: 200px; width: 500px;">
					Île du nord
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
		<br/><br/><br/><br/>
	</center>
</body>
<?php
    include('footer.php')
?>
</html>