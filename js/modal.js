(() => {

/* MODAL */

// AJOUTER CELLIER
let elNouveauCellier = document.querySelector('[data-js-nouveaucellier]'),
elAnnulercellier = document.querySelector('[data-js-annulercellier]'),

// MODIFIER CELLIER
elModifierCellier = document.querySelector('[data-js-modifiercellier]'),
elAnnulerModifcellier = document.querySelector('[data-js-annulermodifcellier]'),


// MODAL
elModal = document.querySelector('[data-js-modal]')



// AJOUTER UN CELLIER
    //ouvre
if(elNouveauCellier){
    elNouveauCellier.addEventListener('click', ()=>{
        ouvre() 
    })
}
    //ferme
if(elAnnulercellier){
    elAnnulercellier.addEventListener('click', () => {
        ferme()
    });
}

// MODIFIER CELLIER
    //ouvre
    if(elModifierCellier){
        elModifierCellier.addEventListener('click', ()=>{
            ouvre() 
        })
    }
        //ferme
    if(elAnnulerModifcellier){
        elAnnulerModifcellier.addEventListener('click', () => {
            ferme()
        });
    }


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