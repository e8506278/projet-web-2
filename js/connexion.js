// Le formulaire qui contient les champs à valider
const elFormulaire = document.querySelector('.formulaire');

// Pour afficher les messages d'erreur
const elMessages = document.querySelector('.wrapper-message');

// Pour les validations
const elUtilisateur = document.querySelector('[data-js-utilisateur]');
const elUsagerMdp = document.querySelector('[data-js-mdp]');

elFormulaire.addEventListener('submit', (e) => {
    // Nous inclurons toutes les erreurs dans cette chaîne
    let lesErreurs = '';

    if (elUtilisateur.value.length > 0) {
        if (elUtilisateur.value !== "Toto9") {
            lesErreurs = "<li>Échec de la connexion! Identifiant ou mot de passe invalide!</li>";
        }
    } else {
        lesErreurs += "<li>Vous devez indiquer le nom d'utilisateur.</li>";
    }

    if (elUsagerMdp.value.length > 0) {
        if (elUsagerMdp.value !== "password9") {
            lesErreurs = "<li>Échec de la connexion! Identifiant ou mot de passe invalide!</li>";
        }
    } else {
        lesErreurs += "<li>Vous devez indiquer un mot de passe.</li>";
    }

    if (lesErreurs !== "") {
        // Modifiez la balise ul d'erreur pour afficher le(s) message(s) d'erreur
        elMessages.innerHTML = lesErreurs;

        // Afficher les messages
        elMessages.classList.remove("hidden");

        // Empêcher le bouton de soumettre le formulaire, tany qu'il y a des erreurs
        e.preventDefault();
    } else if (!elMessages.classList.contains("hidden")) {
        elMessages.classList.add("hidden");
    }
});