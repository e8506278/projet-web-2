
(() => {

/* MODAL */

let elModal = document.querySelector('[data-js-modal]')


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