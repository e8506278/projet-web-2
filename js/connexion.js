// Le formulaire qui contient les champs à valider
const elFormulaire = document.querySelector('.formulaire');

// Pour les validations
const elUtilisateur = document.querySelector('[data-js-utilisateur]');
const elUsagerMdp = document.querySelector('[data-js-mdp]');

let erreur;

elFormulaire.addEventListener('soumettre', (e) => {
    // Pour afficher les messages d'erreur
    let erreursTrouvees = false;
    let elErreur;

    // Utilisateur
    erreur = "";

    if (elUtilisateur.value.length > 0) {
        if (elUtilisateur.value !== "Toto9") {
            erreursTrouvees = true;
            erreur = "Échec de la connexion! Identifiant ou mot de passe invalide!";
        }
    } else {
        erreursTrouvees = true;
        erreur = "Vous devez indiquer un nom d'utilisateur.";
    }

    elErreur = document.querySelector('[data-js-utilisateur-err]');
    elErreur.innerHTML = erreur;

    if (erreur) {
        elErreur.classList.remove('aucune-erreur');
        elErreur.classList.add('message-erreur');
    } else {
        elErreur.classList.remove('message-erreur');
        elErreur.classList.add('aucune-erreur');
    }

    // Mot de passe
    erreur = "";

    if (elUsagerMdp.value.length > 0) {
        if (elUsagerMdp.value !== "password9") {
            erreursTrouvees = true;
            erreur = "Échec de la connexion! Identifiant ou mot de passe invalide!";
        }
    } else {
        erreursTrouvees = true;
        erreur = "Vous devez indiquer un mot de passe.";

    }

    elErreur = document.querySelector('[data-js-mdp-err]');
    elErreur.innerHTML = erreur;

    if (erreur) {
        elErreur.classList.remove('aucune-erreur');
        elErreur.classList.add('message-erreur');
    } else {
        elErreur.classList.remove('message-erreur');
        elErreur.classList.add('aucune-erreur');
    }

    console.log(erreursTrouvees);

    // Empêcher le bouton de soumettre le formulaire, tant qu'il y a des erreurs
    if (erreursTrouvees) {
        e.preventDefault();
    }
});