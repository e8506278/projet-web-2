/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

//const BaseURL = "https://jmartel.webdev.cmaisonneuve.qc.ca/n61/vino/";
const BaseURL = document.baseURI;
console.log(BaseURL);
window.addEventListener('load', function () {
    console.log("load");
    document.querySelectorAll(".btnBoire").forEach(function (element) {
        console.log(element);
        element.addEventListener("click", function (evt) {
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request(BaseURL + "index.php?requete=boireBouteilleCellier", { method: 'POST', body: '{"id": ' + id + '}' });

            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Erreur');
                    }
                })
                .then(response => {
                    console.debug(response);
                    //reload page
                    location.reload();
                }).catch(error => {
                    console.error(error);
                });
        })

    });

    document.querySelectorAll(".btnAjouter").forEach(function (element) {
        console.log(element);
        element.addEventListener("click", function (evt) {
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request(BaseURL + "index.php?requete=ajouterBouteilleCellier", { method: 'POST', body: '{"id": ' + id + '}' });

            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Erreur');
                    }
                })
                .then(response => {
                    console.debug(response);
                    //reload page
                    location.reload();
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

    /*CELLIER*/

    let elBtnAjouterCellier =  document.querySelector('[data-js-boutonAjouterCellier]'),
        usager =  document.querySelector("[data-js-usager]"),    
        erreurnom =  document.querySelector("[data-js-erreurNom]"),
        erreurradio =  document.querySelector("[data-js-erreurRadio]") 
       
    if(elBtnAjouterCellier){

        elBtnAjouterCellier.addEventListener('click', (e) => {

            e.preventDefault();

            let nom_cellier = document.querySelector("[name='nom_cellier']"),
                type_cellier_id = document.querySelectorAll("[name='type_cellier_id']"),
                description_cellier = document.querySelector("[name='description_cellier']").value,
                radio = false,
                estValide = true

                if(nom_cellier.value !== ""){
                
                    erreurnom.textContent = '';
                    nom_cellier = nom_cellier.value
                }
                else{
                
                    erreurnom.textContent = "Ce champs est obligatoire";
                    estValide = false;
                }

                type_cellier_id.forEach(element => {
                    
                    if(element.checked){
                        radio = true;
                    }
                    
                });

                if(radio){
                    
                        erreurradio.textContent = '';
                        type_cellier_id = document.querySelector('input[name="type_cellier_id"]:checked').value;
                }
                else{
                
                    erreurradio.textContent = 'Choisir un type.';
                    estValide = false;
                }
                

                if(estValide){
                    let cellier = {
        
                        "id_usager": usager.dataset.jsUsager,
                        "nom_cellier": nom_cellier,
                        "type_cellier_id": type_cellier_id,
                        "description_cellier": description_cellier
                    };  
        
                    let requete = new Request(BaseURL + "?requete=ajouterNouveauCellier", { method: 'POST', body: JSON.stringify(cellier) });
                    console.log(requete)
                            fetch(requete)
                                .then(response => {
                                    if (response.status === 200) {
                                        
                                        elModal = document.querySelector('[data-js-modal]')
                                        if (elModal.classList.contains('modal--ouvre')) {
                                            elModal.classList.replace('modal--ouvre', 'modal--ferme');
                                            
                                            document.documentElement.classList.remove('overflow-y--hidden');
                                            document.body.classList.remove('overflow-y--hidden');
                                        }
                                        return response.json();
                                    } else {
                                        throw new Error('Erreur');
                                    }
                                })
                                .then(response => {
                                    console.log(response);
                                    location.reload();
                                }).catch(error => {
                                    console.error(error);
                                });
                }

            });

    }
});
