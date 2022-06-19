(() => {

    // Le formulaire qui contient les champs à valider
    const elFormulaire = document.querySelector('.formulaire');

    // Pour les validations
    const elUtilisateur = document.querySelector('[data-js-utilisateur]');
    const elUsagerMdp = document.querySelector('[data-js-mdp]');

    let erreur;
    if(elFormulaire){ 
        elFormulaire.addEventListener('submit', (e) => {
            // Pour afficher les messages d'erreur
            let erreursTrouvees = false;
            let elErreur;

            // On efface les erreurs précédentes venues de PHP
            elErreur = document.querySelector('[data-js-connexion-err]');
            elErreur.innerHTML = "";

            // Utilisateur
            erreur = "";

            if (elUtilisateur.value.length === 0) {
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

            if (elUsagerMdp.value.length === 0) {
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

            if (erreursTrouvees) {
                e.preventDefault();
            }
        });
    }    
})();