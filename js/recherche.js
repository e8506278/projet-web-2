function autocomplete(section, arr) {
    /* 
        Le code provient de w3schools: https://www.w3schools.com/howto/howto_js_autocomplete.asp
        J'ai fais des ajustements pour satisfaire mes besoins.
        C'est le même code peu importe la liste.
     */

    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    let currentFocus;

    const inp = document.querySelector("[data-js-" + section + "]");

    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        let a, b, i, val = this.value;

        /*close any already open lists of autocompleted values*/
        closeAllLists();

        if (!val) {
            return false;
        }

        currentFocus = -1;

        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "-autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);

        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].actif && arr[i].nom.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.dataset.jsId = arr[i].id;

                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].nom.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].nom.substr(val.length);

                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value=\"" + arr[i].nom + "\">";

                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    const elInput = this.getElementsByTagName("input")[0];
                    inp.value = elInput.value;

                    const elParent = inp.closest('.autocomplete');
                    elParent.classList.remove("disabled");

                    const sectionMaj = section[0].toUpperCase() + section.slice(1);
                    inp.dataset['js' + sectionMaj] = this.dataset.jsId;

                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });

                a.appendChild(b);
            }
        }
    });

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        let x = document.getElementById(this.id + "-autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
            x[currentFocus].scrollIntoView();

        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
            x[currentFocus].scrollIntoView();
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = x.length - 1;
        if (currentFocus < 0) currentFocus = 0;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (let i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        let x = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /* execute a function when someone clicks in the document */
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

/**
 * Traiter les appellations du vin
 */
function traiterAppellation() {
    autocomplete('appellation', aAppellation);

    const elNbSelectionnes = document.querySelector('.nb-appellation');
    const elContainer = document.querySelector('.appellation-container');
    const elGroupe = document.querySelector('.appellation-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-appellation]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'appellation', aAppellation, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aAppellation, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter les cépages de vin
 */
function traiterCepage() {
    autocomplete('cepage', aCepage);

    const elNbSelectionnes = document.querySelector('.nb-cepage');
    const elContainer = document.querySelector('.cepage-container');
    const elGroupe = document.querySelector('.cepage-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-cepage]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'cepage', aCepage, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aCepage, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter les classifications de vin
 */
function traiterClassification() {
    autocomplete('classification', aClassification);

    const elNbSelectionnes = document.querySelector('.nb-classification');
    const elContainer = document.querySelector('.classification-container');
    const elGroupe = document.querySelector('.classification-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-classification]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'classification', aClassification, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aClassification, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter les désignations de vin
 */
function traiterDesignation() {
    autocomplete('designation', aDesignation);

    const elNbSelectionnes = document.querySelector('.nb-designation');
    const elContainer = document.querySelector('.designation-container');
    const elGroupe = document.querySelector('.designation-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-designation]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'designation', aDesignation, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aDesignation, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter les pays
 */
function traiterPays() {
    autocomplete('pays', aPays);

    const elNbSelectionnes = document.querySelector('.nb-pays');
    const elContainer = document.querySelector('.pays-container');
    const elGroupe = document.querySelector('.pays-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-pays]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'pays', aPays, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aPays, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter les régions
 */
function traiterRegion() {
    autocomplete('region', aRegion);

    const elNbSelectionnes = document.querySelector('.nb-region');
    const elContainer = document.querySelector('.region-container');
    const elGroupe = document.querySelector('.region-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-region]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'region', aRegion, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aRegion, elNbSelectionnes, elContainer);
    });
}

/**
 * Traiter le type de vin
 */
function traiterTypeVin() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-type-vin');

    for (let i = 0, l = elTypeVins.length; i < l; i++) {
        if (elTypeVins[i].checked) nbSelections++;
    }

    elNbSelections.innerHTML = nbSelections;
}

/**
 * Traiter le type de vin
 */
function traiterTypeCellier() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-type-cellier');

    for (let i = 0, l = elTypeCelliers.length; i < l; i++) {
        if (elTypeCelliers[i].checked) nbSelections++;
    }

    elNbSelections.innerHTML = nbSelections;
}

/**
 * Traiter le type de vin
 */
function traiterProduitQc() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-produit-qc');

    for (let i = 0, l = elProduitsQc.length; i < l; i++) {
        if (elProduitsQc[i].checked) nbSelections++;
    }

    elNbSelections.innerHTML = nbSelections;
}

/**
 * Html qui est ajouté lorsqu'une nouvelle sélection est faite.
 */
let uneSelection = `
            <div class="choix-item" data-js-id="{{id}}">
                <div class="item-texte" title="{{titre}}">{{titre}}</div>
                <div class="item-action">
                    <button class="btn-enlever">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                        </svg>
                    </button>
                </div>
            </div>
        `;

/**
 *  Ajoute l'élément dans la sélection 
 * @param e : event
 */
function ajouterSelection(e, section, aDonnees, elNbSelections, elChoixContainer, elChoixGroupe) {
    e.preventDefault();

    let nbSelections = elNbSelections.innerHTML;
    nbSelections++;

    const sectionMaj = section[0].toUpperCase() + section.slice(1);
    const elChampTexte = document.querySelector("[data-js-" + sectionMaj + "]");
    const elInputId = elChampTexte.dataset['js' + sectionMaj];
    const elParent = elChampTexte.closest('.autocomplete');

    let elSection = uneSelection.replaceAll("{{id}}", elInputId).replaceAll("{{titre}}", elChampTexte.value);
    elChoixGroupe.insertAdjacentHTML("beforeend", elSection);

    elChampTexte.value = "";
    changerVisibilite(elInputId, 0, aDonnees);

    elNbSelections.innerHTML = nbSelections;
    elChoixContainer.classList.remove("hide");

    elParent.classList.add("disabled");
}

/**
 * Changer la visibilité d'un élément dans la liste générale
 * selon le fait qu'il ait été sélectionné ou pas
 * @param id : identifiant de l'élément
 * @param nouvValeur: 0: rendre invisible; 1: rendre visible
 */
function changerVisibilite(id, nouvValeur, aDonnees) {
    for (i = 0; i < aDonnees.length; i++) {
        if (aDonnees[i].id === id) {
            aDonnees[i].actif = nouvValeur;
        }
    }
}

/**
 * Supprime l'élément de la sélection
 * @param  e : event
 */
function supprimerSelection(e, aDonnees, elNbSelections, elChoixContainer) {
    e.preventDefault();
    if (e.target.closest('.btn-enlever')) {
        elBtn = e.target.closest('.btn-enlever');

        const elParent = elBtn.closest('.choix-item');
        id = elParent.dataset.jsId;

        // On enlève l'élément de la sélection 
        // et on le rend disponible dans la liste de toutes les régions.
        elParent.remove();
        changerVisibilite(id, 1, aDonnees);

        let nbSelections = elNbSelections.innerHTML;
        nbSelections--;

        if (nbSelections < 0) {
            nbSelections = 0;
        }

        elNbSelections.innerHTML = nbSelections;

        if (nbSelections === 0) {
            elChoixContainer.classList.add("hide");
        }
    };
}

/**
 * Lancer le traitement des listes semi-automatiques
 */
traiterPays();
traiterRegion();
traiterAppellation();
traiterCepage();
traiterClassification();
traiterDesignation();

/**
 * Lancer le traitement des listes de checkbox
 */
let elTypeVins = document.querySelectorAll('[data-js-type-vin]');

elTypeVins.forEach(typeVin => {
    typeVin.addEventListener('change', traiterTypeVin);
});

let elTypeCelliers = document.querySelectorAll('[data-js-type-cellier]');

elTypeCelliers.forEach(typeCellier => {
    typeCellier.addEventListener('change', traiterTypeCellier);
});

let elProduitsQc = document.querySelectorAll('[data-js-produit-qc]');

elProduitsQc.forEach(produitsQc => {
    produitsQc.addEventListener('change', traiterProduitQc);
});


/**
 * Lancer le traitement des sliders
 */
// let lesSliders = document.querySelectorAll('input[name="taux-de-sucre-min"]');

// lesSliders.forEach(unSlider => {
//     unSlider.addEventListener('change', traiterTypeVin);
// });


// let elTauxSucreMin = document.querySelector('[data-js-taux-sucre-min]');

// function traiterTypeVin(e) {
//     e.preventDefault();

//     elTauxSucreMin.value = e.target.value;

// }
