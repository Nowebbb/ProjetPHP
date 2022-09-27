<?php

function connexionBDD() { //Fonction qui permet de se connecter à la base de donnée. C'est ici que les identifiants de la base de donnée sont mise
	$bdd = new PDO('mysql:host=37.187.37.19:3306;dbname=agencedevoyage', 'root', 'root')
		or die('Erreur connexion à la base de données');
	return $bdd;
}


//\\ ---------------- Fonctions pour les comptes clients ----------------//\\

function recupereMDP($mail){
	$retour = false;
	$bdd = connexionBDD();
	$requete="SELECT mdp FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchColumn(); 
	return $retour;
}
function ajouterUtilisateur($nom, $prenom, $tel, $mail, $dateDeNaissance, $CP, $mdp){
	$retour = false;
	$bdd = connexionBDD();
	$requete="INSERT INTO client (NomClient, PrenomClient, tel, email, DateDeNaissance, CP, mdp)
	VALUES ('$nom', '$prenom', '$tel', '$mail', '$dateDeNaissance', '$CP', '$mdp');";
	$resultat= $bdd->query($requete);
	return $retour;
}
function verifLogin($mail){
	$retour = false;
	$bdd = connexionBDD();
	$requete="SELECT * FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch(); 
	return $retour;
}
function supprimerUtilisateur($mail){
	$retour = false;
	$bdd = connexionBDD();
	$requete="DELETE FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch(); 
	return $retour;
}
function modifierUtilisateur($mail, $nomModifie, $prenomModifie, $telModifie, $mailModifie, $dateDeNaissanceModifie, $CPModifie){
	$retour = false;
	$bdd = connexionBDD();
	$requete="UPDATE client SET NomClient='$nomModifie', PrenomClient='$prenomModifie', tel='$telModifie', email='$mailModifie', DateDeNaissance='$dateDeNaissanceModifie', CP='$CPModifie' WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	return $retour;
}
function modifierMDP($mail, $mdp){
	$retour = false;
	$bdd = connexionBDD();
	$requete="UPDATE client SET mdp='$mdp' WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	return $retour;
}
function rechercherUtilisateur($mail){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch(); 
	return $retour;
}
function recupererNomUtilisateur($mail){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT PrenomClient FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch(); 
	return $retour;
}
function recupererNumeroUtilisateur($mail){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT numClient FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch(); 
	return $retour;
}
function verifAdminUtilisateur($mail){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT admin FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchColumn(); 
	return $retour;
}
function listerTousLesClients(){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM client;";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchAll();
	return $retour;
}

//\\ ---------------- Fonctions pour les réservations ----------------//\\

function recupererNumeroClient($mail){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT numClient FROM client WHERE email='$mail';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch();
	return $retour;
}
function recupererLesReservations($numClient){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM reservation WHERE numClient = '$numClient';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchAll();
	return $retour;
}
function recupererReservation($NumReserv){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM reservation WHERE NumReserv = '$NumReserv';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch();
	return $retour;
}
function ajouterReservation($dateResrv, $NbPersonne, $numClient, $numProd){
	$retour = null;
	$bdd = connexionBDD();
	$requete="INSERT INTO reservation (dateResrv, NbPersonne, numClient, numProd)
	VALUES ('$dateResrv', '$NbPersonne', '$numClient', '$numProd');";
	$resultat= $bdd->query($requete);
	return $retour;
}
function modifierReservation($dateResrvModifier, $NbPersonneModifier, $NumReserv){
	$retour = false;
	$bdd = connexionBDD();
	$requete="UPDATE reservation SET dateResrv='$dateResrvModifier', NbPersonne='$NbPersonneModifier' WHERE numReserv=$NumReserv;";
	$resultat= $bdd->query($requete);
	return $retour;
}
function supprimerReservation($NumReserv){
	$retour = false;
	$bdd = connexionBDD();
	$requete="DELETE FROM reservation WHERE NumReserv='$NumReserv';";
	$resultat= $bdd->query($requete);
	return $retour;
}
function voirToutesLesReservations(){
	$retour = false;
	$bdd = connexionBDD();
	$requete="SELECT * FROM reservation;";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchAll();
	return $retour;
}


//\\ ---------------- Fonctions divers ----------------//\\

function prixMill($prix) { //Fonction qui permet de mettre un espace entre les milliers
	$str= null;
	$long = strlen($prix)-1;
	for($i = $long ; $i>=0; $i--) {
		$j=$long -$i;
		if( ($j%3 == 0) && $j!=0) {
			$str= " ".$str;  
		}
		$p= $prix[$i];
		$str = $p.$str;
	}
	return($str);
}
function recupererInfosProduitLibelle($libelle){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM produit WHERE libelle='$libelle';";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetch();
	return $retour;
}
function recupererInfosProduit($numProd){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM produit WHERE numProd = $numProd;";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchAll();
	return $retour;
}
function recupererTousLesProduits(){
	$retour = null;
	$bdd = connexionBDD();
	$requete="SELECT * FROM produit;";
	$resultat= $bdd->query($requete);
	$retour=$resultat->fetchAll();
	return $retour;
}
?>