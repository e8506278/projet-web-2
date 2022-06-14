/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */


const BaseURL = document.baseURI;

window.addEventListener('load', function () {

// RÉDUIRE LA QTÉ D'UNE BOUTEILLE DANS UN CELLIER

    document.querySelectorAll(".btnBoire").forEach(function (element) {
       
       // Au click du bouton diminué (-)
        element.addEventListener("click", function (evt) {
            // id_bouteille
            let id =element.parentElement.dataset.jsId;

            
            let requete = new Request(BaseURL + "?requete=reduireQteBouteille", { method: 'POST', body: '{"id": ' + id + '}' });

            // Requête fetch
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                        return response;
                    } else {
                        throw new Error('Erreur');
                    }
                })
                .then(response => {
                    // Récuperation des cartes bouteille
                    let carteBouteille = document.querySelectorAll('[data-js-bouteille]')

                    // Récupération du nombre de bouteille dans le <span></span>
                    nombreBouteille = element.previousElementSibling.textContent

                    // Pour chaque carte bouteille
                    for (let i = 0, l = carteBouteille.length; i < l; i++){
                        // Si le dataset de l'id_bouteille correspond au id_bouteille du  click
                        if(carteBouteille[i].dataset.jsBouteille == id){
                            // Si le nombre de bouteille est égal à 1
                            if(nombreBouteille == 1){
                                // Suppression à l'écran de la carte bouteille car le nombre de bouteille tombe à zéro
                                carteBouteille[i].remove();
                            }
                        }
                    }
                    // Si le nombre de bouteille est supérieur ou égal à 1
                    if(nombreBouteille >= 1){
                        // Insertion dans le DOM de la nouvelle quantité
                        element.previousElementSibling.innerHTML = `<span data-js-quantite>${nombreBouteille-1}</span>`; 
                    }
                }).catch(error => {
                    console.error(error);
                });  
        })
    })

// AJOUTER LA QTÉ D'UNE BOUTEILLE DANS UN CELLIER
    document.querySelectorAll(".btnAjouter").forEach(function (element) {
        
        // Au click du bouton ajouter (+)
        element.addEventListener("click", function (evt) {
            // id_bouteille
            let id =element.parentElement.dataset.jsId;

            let requete = new Request(BaseURL + "?requete=ajouterQteBouteille", { method: 'POST', body: '{"id": ' + id + '}' });

            // Requête fetch
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                        return response;
                    } else {
                        throw new Error('Erreur');
                    }
                })
                .then(response => {

                    // Récupération de l'id_bouteille dans le <span></span>
                    nombreBouteille = parseInt(element.nextElementSibling.textContent);
                     // Insertion dans le DOM de la nouvelle quantité
                    element.nextElementSibling.innerHTML = `<span data-js-quantite>${(nombreBouteille)+1}</span>`
        
                }).catch(error => {
                    console.error(error);
                });
        })

    });


    let inputNomBouteille = document.querySelector("[name='nom_bouteille']");

    let liste = document.querySelector('.listeAutoComplete');

    if (inputNomBouteille) {
        inputNomBouteille.addEventListener("keyup", function (evt) {
            console.log(evt);
            let nom = inputNomBouteille.value;
            liste.innerHTML = "";
            if (nom) {
                let requete = new Request(BaseURL + "index.php?requete=autocompleteBouteille", { method: 'POST', body: '{"nom": "' + nom + '"}' });
                fetch(requete)
                    .then(response => {
                        if (response.status === 200) {
                            return response.json();
                        } else {
                            throw new Error('Erreur');
                        }
                    })
                    .then(response => {
                        console.log(response);


                        response.forEach(function (element) {
                            liste.innerHTML += "<li data-id='" + element.id + "'>" + element.nom + "</li>";
                        })
                    }).catch(error => {
                        console.error(error);
                    });
            }


        });

        let bouteille = {
            nom: document.querySelector(".nom_bouteille"),
            millesime: document.querySelector("[name='millesime']"),
            quantite: document.querySelector("[name='quantite']"),
            date_achat: document.querySelector("[name='date_achat']"),
            prix: document.querySelector("[name='prix']"),
            garde_jusqua: document.querySelector("[name='garde_jusqua']"),
            notes: document.querySelector("[name='notes']"),
        };


        liste.addEventListener("click", function (evt) {
            console.dir(evt.target)
            if (evt.target.tagName == "LI") {
                bouteille.nom.dataset.id = evt.target.dataset.id;
                bouteille.nom.innerHTML = evt.target.innerHTML;

                liste.innerHTML = "";
                inputNomBouteille.value = "";

            }
        });

        let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
        if (btnAjouter) {
            btnAjouter.addEventListener("click", function (evt) {
                var param = {
                    "id_bouteille": bouteille.nom.dataset.id,
                    "date_achat": bouteille.date_achat.value,
                    "garde_jusqua": bouteille.garde_jusqua.value,
                    "notes": bouteille.date_achat.value,
                    "prix": bouteille.prix.value,
                    "quantite": bouteille.quantite.value,
                    "millesime": bouteille.millesime.value,
                };
                let requete = new Request(BaseURL + "index.php?requete=ajouterNouvelleBouteilleCellier", { method: 'POST', body: JSON.stringify(param) });
                fetch(requete)
                    .then(response => {
                        if (response.status === 200) {
                            return response.json();
                        } else {
                            throw new Error('Erreur');
                        }
                    })
                    .then(response => {
                        console.log(response);

                    }).catch(error => {
                        console.error(error);
                    });

            });
        }

    }


// GESTION D'UN CELLIER

    let elBtnAjouterCellier =  document.querySelector('[data-js-boutonAjouterCellier]'),
        elBtnModifierInfosCellier = document.querySelector('[data-js-modifierInfosCellier]'),
        
        usager =  document.querySelector("[data-js-usager]"),    
        erreurnom =  document.querySelector("[data-js-erreurNom]"),
        erreurradio =  document.querySelector("[data-js-erreurRadio]"),
        nom_cellier = document.querySelector("[name='nom_cellier']"),
        type_cellier_id = document.querySelectorAll("[name='type_cellier_id']"),
        description_cellier = document.querySelector("[name='description_cellier']"),
        radio = false,
        estValide = true,
        id_cellier = ""
        
    // Ajouter cellier    
    if(elBtnAjouterCellier){
       
        elBtnAjouterCellier.addEventListener('click', (e) => {
            e.preventDefault();
           

                
            // Validation
            let validation = validationCellier(nom_cellier, type_cellier_id)
            // Si tout est valide
            if(validation){
            
                //Assigné les données à transmettre
                let cellier = {
    
                    "id_usager": usager.dataset.jsUsager,
                    "nom_cellier": nom_cellier.value,
                    "type_cellier_id": document.querySelector('input[name="type_cellier_id"]:checked').value,
                    "description_cellier": description_cellier.value
                    
                };  
                
                // Requête fetch
                let requete = new Request(BaseURL + "?requete=ajouterNouveauCellier", { method: 'POST', body: JSON.stringify(cellier) });
                fetchCellier(requete)         
            }
        });  
    }
    

    // Modification d'un cellier
        // 1- Afficher les champs à modifier
     document.querySelectorAll('[data-js-carte]').forEach(function(carte){
        // Récupération du cellier à modifier
        carte.querySelectorAll('[data-js-modifiercellier]').forEach(function (btnModalModifier) {
           // Au click
            btnModalModifier.addEventListener("click", function (evt) {

                //Récupération des données du cellier dans le DOM
                id_cellier = btnModalModifier.dataset.jsModifiercellier
                nom_cellier.value = carte.querySelector('[data-js-nomcellier]').textContent
                description_cellier = carte.querySelector('[data-js-descriptioncellier]').textContent,
                elCellierType = carte.querySelector('[data-js-type]').firstElementChild
                // Type de cellier (Radio)
                type_cellier_id.forEach(function(element){
                    if(elCellierType.classList.contains("cave")){
                        if(element.value == "1"){
                            element.checked = true;
                        } 
                    }
                    else{
                        element.checked = true;
                    }
                })

            })
         })
    });

    
   // 2 -Modifier les informations du cellier
    if(elBtnModifierInfosCellier){
    
        // Modifier cellier
        elBtnModifierInfosCellier.addEventListener('click', (e) => {
            e.preventDefault();
          // id_cellier = elBtnModifierInfosCellier.dataset.jsModifierinfoscellier

            // Validation
            let validation = validationCellier(nom_cellier, type_cellier_id)
            // Si tout est valide
            if(validation){
                //Assigné les données à transmettre
                let cellier = {
                    "id_cellier":id_cellier,
                    "id_usager": usager.dataset.jsUsager,
                    "nom_cellier": nom_cellier.value,
                    "type_cellier_id": document.querySelector('input[name="type_cellier_id"]:checked').value,
                    "description_cellier": description_cellier.value
                    
                };  
                
               
                // Requête fetch
                let requete = new Request(BaseURL + "?requete=modifierCellier", { method: 'POST', body: JSON.stringify(cellier) });
                fetchCellier(requete)         
            }

        });
    }


    // Validation cellier
    function validationCellier(nom_cellier, type_cellier_id){
        if(nom_cellier.value !== ""){     
            erreurnom.textContent = '';
        }
        else{
            // Sinon message d'erreur
            erreurnom.textContent = "Ce champs est obligatoire";
            estValide = false;
        }
        //Pour chaque radio bouton
        type_cellier_id.forEach(element => {    
            if(element.checked){
                radio = true;
            } 
        });
        // Si un bouton a été sélectionné
        if(radio){
            erreurradio.textContent = '';
        }
        else{
            // Sinon message d'erreur
            erreurradio.textContent = 'Choisir un type.';
            estValide = false;
        }
        return estValide;
    }


    // Requête fetch cellier
    function fetchCellier(requete){
        fetch(requete)
            .then(response => {
                if (response.status === 200) {
              
                    return response.text()
                } else {
                    throw new Error('Erreur');
                }
            })
            .then(response => {

                // Fermeture du modal
                elModal = document.querySelector('[data-js-modal]')
                if (elModal.classList.contains('modal--ouvre')) {
                    elModal.classList.replace('modal--ouvre', 'modal--ferme');
                    
                    document.documentElement.classList.remove('overflow-y--hidden');
                    document.body.classList.remove('overflow-y--hidden');
                }
          
                // Rafraîchir la page
                location.reload();
    
            }).catch(error => {
                console.error(error);
            });
    }


    
    
  
});
