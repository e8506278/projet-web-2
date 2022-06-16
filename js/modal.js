(() => {

/* MODAL */

let elModal = document.querySelector('[data-js-modal]'),

// BOUTON ET TITRE
elBoutonModal = document.querySelector('[data-js-boutonmodal]'),
elTitreModal = document.querySelector('[data-js-titremodal]'),



/********************************************************************************************************** */
/*                          GESTION DU CELLIER      *GM                                                     */
/********************************************************************************************************** */
// AJOUTER CELLIER
    elNouveauCellier = document.querySelector('[data-js-nouveaucellier]'),

// MODIFIER CELLIER
    elModifierCellier = document.querySelectorAll('[data-js-modifiercellier]'),

// SUPPRIMER CELLIER
    elSupprimerCellier = document.querySelectorAll('[data-js-supprimercellier]'),

// ANNULER
    elAnnulercellier = document.querySelector('[data-js-annulercellier]'),
    elContenu = document.querySelector('[data-js-modalcontenu]')

  
// AJOUTER UN CELLIER
    //ouvre
if(elNouveauCellier){
    elNouveauCellier.addEventListener('click', (e)=>{
        e.preventDefault();
        ouvre() 
        //Ajout titre
        elTitreModal.innerHTML = "Ajouter un cellier"
        //Ajout du bouton ajouter
        elBoutonModal.insertAdjacentHTML("afterbegin",'<button  class="bouton-secondaire" data-js-boutonAjouterCellier>Ajouter</button>')
    
    })
}
//FERMER MODAL
if(elAnnulercellier){
    elAnnulercellier.addEventListener('click', (e) => {
        
        e.preventDefault();
        ferme()
        elBoutonModal.firstElementChild.remove()
    });
    
}

// MODIFIER CELLIER
    //ouvre
    elModifierCellier.forEach(btnModifier=>{
        if(btnModifier){
            btnModifier.addEventListener('click', (e)=>{
                e.preventDefault();
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

// SUPPRIMER CELLIER
    // ouvre    
    elSupprimerCellier.forEach(btnSupprimer=>{
        if(btnSupprimer){
            btnSupprimer.addEventListener('click', (e)=>{
                e.preventDefault();
                ouvre()
      
                //Récupérer le nom du cellier
                let nomCellier = btnSupprimer.parentNode.dataset.jsNomcellier
       
        
                elContenu.innerHTML = `<h4 class=""><span class="carte__erreur">Supprimer le cellier</span> "${nomCellier}" ?</h4>
                <p class="modal__texte">Cette action entraînera la suppression du cellier et de toutes ces bouteilles</p>
                
                <div>
                    <h4 class="carte__entete carte--haut">Déplacer les bouteilles dans un autre cellier?</h4>
                    <label class="modal__texte" for="celliers">Choisir un cellier :
                        <select data-js-selectcellier >
                            <option>Aucun cellier</option>
                        </select>
                    </label>
                </div>
                
                <div class="formulaire__champs" data-js-boutonmodal>
                    <button  class="bouton-secondaire" data-js-supprimerdeplacer>Déplacer et supprimer</button>
                    <button  class="bouton-secondaire" data-js-supprimeruncellier>Supprimer</button>
                    <button data-js-annulercellier class="bouton-secondaire">Annuler</button>
                </div> 
                `

                // Fermer le modal
                let annulerSupression = document.querySelector('[data-js-annulercellier]')
                annulerSupression.addEventListener('click', (e) => {
                    e.preventDefault();
                    ferme()  
                });
            })
        }
    })

/********************************************************************************************************** */



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