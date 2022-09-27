
// -------------------------> Déclaration des variables <------------------------- \\
let email = document.getElementById("email");
let mdp = document.getElementById("mdp");
let mdp2 = document.getElementById("mdp2");
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let tel = document.getElementById("tel");
let dateDeNaissance = document.getElementById("dateDeNaissance");
let CP = document.getElementById("CP");
let accepter = document.getElementById("accepter");
let creer = document.getElementById("creer");

let msgEmail = document.getElementById("msgEmail");
let msgMDP = document.getElementById("msgMDP");
let msgMDP2 = document.getElementById("msgMDP2");
let msgNom = document.getElementById("msgNom");
let msgPrenom = document.getElementById("msgPrenom");
let msgTel = document.getElementById("msgTel");
let msgDateDeNaissance = document.getElementById("msgDateDeNaissance");
let msgCP = document.getElementById("msgCP");
let msgAccepter = document.getElementById("msgAccepter");


// -------------------------> Assignement des boutons <------------------------- \\
email.addEventListener("blur", msgEmailAfficher);
email.addEventListener("keypress", msgEmailEnlever);
mdp.addEventListener("blur", msgMDPAfficher);
mdp.addEventListener("keypress", msgMDPEnlever);
mdp2.addEventListener("blur", msgMDP2DifferentAfficher);
mdp2.addEventListener("keypress", msgMDP2DifferentEnlever);
nom.addEventListener("blur", msgNomAfficher);
nom.addEventListener("keypress", msgNomEnlever);
prenom.addEventListener("blur", msgPrenomAfficher);
prenom.addEventListener("keypress", msgPrenomEnlever);
CP.addEventListener("blur", msgCPAfficher);
CP.addEventListener("keypress", msgCPEnlever);
creer.addEventListener("click", verifier);


// -------------------------> Déclaration des fonctions <------------------------- \\

//Email
function msgEmailAfficher() {
    if (email.value.length < 7) {
        msgEmail.style.color = "#FF0000";
        msgEmail.innerHTML = "&emsp;L'email est incorrect"; 
    }
}
function msgEmailEnlever () {
    if (email.value.length >= 7) {
        msgEmail.innerHTML = "";
    }
}

//MDP
function msgMDPAfficher() {
    if (mdp.value.length < 8) {
        msgMDP.style.color = "#FF0000";
        msgMDP.innerHTML = "&emsp;Le mot de passe doit contenir plus de 8 caractères"; 
    }
}
function msgMDPEnlever () {
    if (mdp.value.length >= 8) {
        msgMDP.innerHTML = "";  
    }
}


//Verifier si MDP1 et MDP2 sont égal
function msgMDP2DifferentAfficher() {
    if (mdp.value != mdp2.value) {
        msgMDP2.style.color = "#FF0000";
        msgMDP2.innerHTML = "&emsp;Les mots de passes ne sont pas identiquent"; 
    }
}
function msgMDP2DifferentEnlever () {
    if (mdp.value == mdp2.value) {
        msgMDP2.innerHTML = "";
    }
}


//Nom
function msgNomAfficher() {
    if (nom.value.length < 2) {
        msgNom.style.color = "#FF0000";
        msgNom.innerHTML = "&emsp;Le nom doit contenir plus de 2 caractères"; 
    }
}
function msgNomEnlever () {
    if (nom.value.length >= 2) {
        msgNom.innerHTML = "";
    }
}


//Prénom
function msgPrenomAfficher() {
    if (prenom.value.length < 2) {
        msgPrenom.style.color = "#FF0000";
        msgPrenom.innerHTML = "&emsp;Le prénom doit contenir plus de 2 caractères"; 
    }
}
function msgPrenomEnlever () {
    if (prenom.value.length >= 2) {
        msgPrenom.innerHTML = "";
    }
}


//Code postal
function msgCPAfficher() {
    if (CP.value.length == 0) {
        msgCP.style.color = "#FF0000";
        msgCP.innerHTML = "&emsp;Le code postal est incorrect"; 
    }
}
function msgCPEnlever () {
    if (CP.value.length != 0) {
        msgCP.innerHTML = "";
    }
}


//Vérification
function verifier () {
    if (!accepter) {
        msgCP.style.color = "#FF0000";
        msgCP.innerHTML = "&emsp;Il faut accepter"; 
    }
}