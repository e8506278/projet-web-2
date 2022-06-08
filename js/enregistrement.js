// Le formulaire qui contient les champs à valider
const elFormulaire = document.querySelector('.formulaire');

// Pour afficher les messages d'erreur
const elMessages = document.querySelector('.wrapper-message');

// Pour les validations
const elNom = document.querySelector('[data-js-nom]');
const elAdresse = document.querySelector('[data-js-adresse]');
const elVille = document.querySelector('[data-js-ville]');
const elUtilisateur = document.querySelector('[data-js-utilisateur]');
const elUsagerMdp = document.querySelector('[data-js-mdp]');
const elConfirmerMdp = document.querySelector('[data-js-confirmer]');
const elPays = document.querySelector('[data-js-pays]');
const elTelephone = document.querySelector('[data-js-telephone]');
const elJour = document.querySelector('[data-js-ddn-jour]');
const elMois = document.querySelector('[data-js-ddn-mois]');
const elAnnee = document.querySelector('[data-js-ddn-annee]');
const elCourriel = document.querySelector('[data-js-courriel]');
const elConditions = document.querySelector('[data-js-conditions]');

elFormulaire.addEventListener('submit', (e) => {
    // Nous inclurons toutes les erreurs dans cette chaîne
    let lesErreurs = '';

    if (elNom.value.length === 0) {
        lesErreurs += "<li>Vous devez indiquer votre nom.</li>";
    }

    if (elAdresse.value.length === 0) {
        lesErreurs += "<li>Vous devez indiquer votre adresse.</li>";
    }

    if (elVille.value.length === 0) {
        lesErreurs += "<li>Vous devez indiquer votre ville.</li>";
    }

    const valeurPays = elPays.options[elPays.selectedIndex].value;

    if (valeurPays <= 0) {
        lesErreurs += "<li>Vous devez indiquer votre pays.</li>";
    }

    if (elTelephone.value.length === 0) {
        lesErreurs += "<li>Vous devez indiquer votre numéro de téléphone.</li>";
    }

    if (elJour.value <= 0) {
        lesErreurs += "<li>Vous devez indiquer le jour de votre naissance.</li>";
    }

    if (elMois.value <= 0) {
        lesErreurs += "<li>Vous devez indiquer le mois de votre naissance.</li>";
    }

    if (elAnnee.value <= 0) {
        lesErreurs += "<li>Vous devez indiquer l'année de votre naissance.</li>";
    }

    if (elCourriel.value.length === 0) {
        lesErreurs += "<li>Vous devez indiquer votre courriel.</li>";
    }

    if (elUtilisateur.value.length > 0) {
        const premiereLettre = elUtilisateur.value[0];

        // Valide si 1ere lettre en majuscule
        const premiereLettreEnMajuscule = (premiereLettre === premiereLettre.toUpperCase());

        if (!premiereLettreEnMajuscule) {
            lesErreurs += "<li>La première lettre du nom d'utilisateur doit être en majuscule.</li>";
        }

        // Regex pour valider si un nombre est inclut
        const utilisateurAvecChiffre = /\d/.test(elUtilisateur.value);

        if (!utilisateurAvecChiffre) {
            lesErreurs += "<li>Le nom d'utilisateur doit inclure au moins un chiffre.</li>";
        }
    } else {
        lesErreurs += "<li>Vous devez indiquer le nom d'utilisateur.</li>";
    }

    if (elUsagerMdp.value.length > 0) {
        const mdpMauvaiseLongueur = (elUsagerMdp.value.length < 8 || elUsagerMdp.value.length > 20);

        if (mdpMauvaiseLongueur) {
            lesErreurs += "<li>Le mot de passe doit contenir entre 8 et 20 caractères.</li>";
        } else if (elUsagerMdp.value.length === 0) {
            lesErreurs += "<li>Vous devez confirmer le mot de passe.</li>";
        } else if (elUsagerMdp.value !== elConfirmerMdp.value) {
            lesErreurs += "<li>Le mot de passe ne correspond pas.</li>";
        }
    } else {
        lesErreurs += "<li>Vous devez indiquer un mot de passe.</li>";
    }

    if (!elConditions.checked) {
        lesErreurs += "<li>Vous devez accepter les termes et conditions.</li>";

        const erreur = "Vous devez accepter les termes et conditions.";
        const elErreur = document.querySelector('[data-js-conditions-err]');
        elErreur.innerHTML = erreur;
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