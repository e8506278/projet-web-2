(() => {

/* MODAL */

/*
*   GESTION DU CELLIER
*/
// AJOUTER CELLIER
let elNouveauCellier = document.querySelector('[data-js-nouveaucellier]'),

// MODIFIER CELLIER
    elModifierCellier = document.querySelectorAll('[data-js-modifiercellier]'),

// ANNULER
    elAnnulercellier = document.querySelector('[data-js-annulercellier]'),

// MODAL
    elModal = document.querySelector('[data-js-modal]'),

// BOUTON ET TITRE
    elBoutonModal = document.querySelector('[data-js-boutonmodal]'),
    elTitreModal = document.querySelector('[data-js-titremodal]')



// AJOUTER UN CELLIER
    //ouvre
if(elNouveauCellier){
    elNouveauCellier.addEventListener('click', ()=>{
        ouvre() 
        //Ajout titre
        elTitreModal.innerHTML = "Ajouter un cellier"
        //Ajout du bouton ajouter
        elBoutonModal.insertAdjacentHTML("afterbegin",'<button  class="bouton-secondaire" data-js-boutonAjouterCellier>Ajouter</button>')
    
    })
}
//FERMER MODAL
if(elAnnulercellier){
    elAnnulercellier.addEventListener('click', () => {
        ferme()
        elBoutonModal.firstElementChild.remove()
    });
}

// MODIFIER CELLIER
    //ouvre
    elModifierCellier.forEach(btnModifier=>{
        if(btnModifier){
            btnModifier.addEventListener('click', ()=>{
                ouvre() 
                //Récupérer le nom du cellier
                let nomCellier = btnModifier.parentNode.dataset.jsNomcellier
                 //Ajout titre
                elTitreModal.innerHTML = `Modifier le cellier "${nomCellier}"`;
                //Ajout du bouton modifier
                elBoutonModal.insertAdjacentHTML("afterbegin",`<button  class="bouton-secondaire" data-js-modifierInfosCellier>Modifier</button>`)
            })
        }
    })
    
 /*
 *  FIN DU CELLIER
 */  


// Comportement du modal
function ouvre(){
    if (elModal.classList.contains('modal--ferme')) {
        elModal.classList.replace('modal--ferme', 'modal--ouvre');
    
        // Ajoute la propriété overflow-y: hidden; sur les éléments html et body afin d'enlever le scroll en Y lorsque le modal est ouvert
        document.documentElement.classList.add('overflow-y--hidden');
        document.body.classList.add('overflow-y--hidden');
    }
}

function ferme(){
    if (elModal.classList.contains('modal--ouvre')) {
        elModal.classList.replace('modal--ouvre', 'modal--ferme');
        
        // Enlève la propriété overflow-y: hidden; sur les éléments html et body afin de rendre de nouveau possible le scroll en Y lorsque le modal est fermé
        document.documentElement.classList.remove('overflow-y--hidden');
        document.body.classList.remove('overflow-y--hidden');
    }
}
})();