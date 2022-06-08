(() => {

/* MODAL */
let elBoutonOuvre = document.querySelector('[data-js-boutonOuvre]'),
elModal = document.querySelector('[data-js-modal]'),
elBoutonFerme = document.querySelector('[data-js-boutonFerme]')

if(elBoutonOuvre){
    elBoutonOuvre.addEventListener('click', ()=>{
        if (elModal.classList.contains('modal--ferme')) {
            elModal.classList.replace('modal--ferme', 'modal--ouvre');
        
            // Ajoute la propriété overflow-y: hidden; sur les éléments html et body afin d'enlever le scroll en Y lorsque le modal est ouvert
            document.documentElement.classList.add('overflow-y--hidden');
            document.body.classList.add('overflow-y--hidden');
        }
        
        })
}

/* Fermeture du modal */
if(elBoutonFerme){
    elBoutonFerme.addEventListener('click', () => {
        if (elModal.classList.contains('modal--ouvre')) {
            elModal.classList.replace('modal--ouvre', 'modal--ferme');
            
            // Enlève la propriété overflow-y: hidden; sur les éléments html et body afin de rendre de nouveau possible le scroll en Y lorsque le modal est fermé
            document.documentElement.classList.remove('overflow-y--hidden');
            document.body.classList.remove('overflow-y--hidden');
        }
        });
}

})();