export default class ModalCellier{
    constructor(){
        this._elModal = document.querySelector('[data-js-modal]')
        this._elAnnulercellier = document.querySelector('[data-js-annulercellier]')
    }
    

     ouvre = () =>{
        if (this._elModal.classList.contains('modal--ferme')) {
            this._elModal.classList.replace('modal--ferme', 'modal--ouvre');
        
            // Ajoute la propriété overflow-y: hidden; sur les éléments html et body afin d'enlever le scroll en Y lorsque le modal est ouvert
            document.documentElement.classList.add('overflow-y--hidden');
            document.body.classList.add('overflow-y--hidden');
        }
    }
    
    ferme = () =>{
        if (this._elModal.classList.contains('modal--ouvre')) {
            this._elModal.classList.replace('modal--ouvre', 'modal--ferme');
            
            // Enlève la propriété overflow-y: hidden; sur les éléments html et body afin de rendre de nouveau possible le scroll en Y lorsque le modal est fermé
            document.documentElement.classList.remove('overflow-y--hidden');
            document.body.classList.remove('overflow-y--hidden');
        }
    }
    annule = (bouton) =>{
        this._elAnnulercellier.addEventListener('click', (e) => {
            e.preventDefault();
            this.ferme()
            if(bouton)
                bouton.remove()
        });
    }
 
}