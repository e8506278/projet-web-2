const aHauteurs = {
    'ferme': 77,
    'select-1': 134,
    'select-2': 174
};

const hauteurListe = 110;

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
        const elAccContainer = this.closest(".acc-container");

        /*close any already open lists of autocompleted values*/
        closeAllLists();

        if (!val) {
            elAccContainer.dataset.jsHauteur = Number(elAccContainer.dataset.jsHauteur) - hauteurListe;
            elAccContainer.style.height = elAccContainer.dataset.jsHauteur + "px";

            return false;
        }

        if (elAccContainer.dataset.jsHauteur <= aHauteurs['select-2']) {
            elAccContainer.dataset.jsHauteur = Number(elAccContainer.dataset.jsHauteur) + hauteurListe;
            elAccContainer.style.height = elAccContainer.dataset.jsHauteur + "px";
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
            if (arr[i].disponible && arr[i].nom.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.dataset.jsId = arr[i].id;
                b.title = arr[i].nom;

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

                    elAccContainer.dataset.jsHauteur = Number(elAccContainer.dataset.jsHauteur) - hauteurListe;
                    elAccContainer.style.height = elAccContainer.dataset.jsHauteur + "px";
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
 * Traiter les bouteilles
 */
function traiterBouteille() {
    autocomplete('bouteille', aBouteille);

    const elNbSelectionnes = document.querySelector('.nb-bouteille');
    const elContainer = document.querySelector('.bouteille-container');
    const elGroupe = document.querySelector('.bouteille-groupe');
    const elBtnAjouter = document.querySelector('[data-js-ajouter-bouteille]');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'bouteille', aBouteille, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aBouteille, elNbSelectionnes, elContainer);
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
 * Traiter les cellier de l'utilisateur
 */
function traiterMesCelliers() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-mes-celliers');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elMesCelliers.length; i < l; i++) {
        if (elMesCelliers[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elMesCelliersTous.checked = (nbSelections === elMesCelliers.length);
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
    const elAccContainer = elContainer.closest('.acc-container');

    elBtnAjouter.addEventListener("click", (e) => {
        ajouterSelection(e, 'pays', aPays, elNbSelectionnes, elContainer, elGroupe);
    });

    elGroupe.addEventListener("click", (e) => {
        supprimerSelection(e, aPays, elNbSelectionnes, elContainer);
    });
}


/**
 * Traiter le produit du Québec
 */
function traiterProduitQc() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-produit-qc');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elProduitsQc.length; i < l; i++) {
        if (elProduitsQc[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elProduitsQcTous.checked = (nbSelections === elProduitsQc.length);

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
 * Traiter le type de cellier
 */
function traiterTypeCellier() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-type-cellier');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elTypeCelliers.length; i < l; i++) {
        if (elTypeCelliers[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elTypeCellierTous.checked = (nbSelections === elTypeCelliers.length);
}


/**
 * Traiter le type de vin
 */
function traiterTypeVin() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-type-vin');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elTypeVins.length; i < l; i++) {
        if (elTypeVins[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elTypeVinTous.checked = (nbSelections === elTypeVins.length);
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
 * @param e                 : event
 * @param section           : Section sur laquelle la sélection est faite
 * @param aDonnees          : Tableau qui contient toutes les sélections possibles
 * @param elNbSelections    : Identifiant du nombre de choix sélectionnées
 * @param elChoixContainer  : Container autours du groupe
 * @param elChoixGroupe     : Groupe qui contient toutes les sélections
 */
function ajouterSelection(e, section, aDonnees, elNbSelections, elChoixContainer, elChoixGroupe) {
    e.preventDefault();

    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    let nbSelections = elInnerSelection.innerHTML;
    nbSelections++;

    const sectionMaj = section[0].toUpperCase() + section.slice(1);
    const elChampTexte = document.querySelector("[data-js-" + sectionMaj + "]");
    const elInputId = elChampTexte.dataset['js' + sectionMaj];
    const elParent = elChampTexte.closest('.autocomplete');

    let elSection = uneSelection.replaceAll("{{id}}", elInputId).replaceAll("{{titre}}", elChampTexte.value);
    elChoixGroupe.insertAdjacentHTML("beforeend", elSection);

    elChampTexte.value = "";
    changerVisibilite(elInputId, 0, aDonnees);

    elInnerSelection.innerHTML = nbSelections;
    elInnerSelection.classList.remove("hide");
    elChoixContainer.classList.remove("hide");

    const elAccContainer = elChoixContainer.closest(".acc-container");
    elAccContainer.style.height = elAccContainer.scrollHeight + "px";
    elAccContainer.dataset.jsHauteur = elAccContainer.scrollHeight;

    elParent.classList.add("disabled");
    ajusterHauteur(nbSelections, elChoixContainer);
}


/**
 * Changer la visibilité d'un élément dans la liste générale
 * selon le fait qu'il ait été sélectionné ou pas
 * @param id        : identifiant de l'élément
 * @param nouvValeur: 0: rendre invisible; 1: rendre visible
 * @param aDonnees  : Tableau qui contient tous les éléments sur lesquelles travailler
 */
function changerVisibilite(id, nouvValeur, aDonnees) {
    for (i = 0; i < aDonnees.length; i++) {
        if (aDonnees[i].id === id) {
            aDonnees[i].disponible = nouvValeur;
        }
    }
}

/**
 * Remet visible tous les éléments de toutes les listes générales
 */
function reinitVisibilite() {
    aDonnees = [aAppellation, aBouteille, aCepage, aClassification, aDesignation, aPays, aRegion];

    for (i = 0; i < aDonnees.length; i++) {
        for (j = 0; j < aDonnees[i].length; j++) {
            aDonnees[i][j].disponible = 1;
        }
    }
}


/**
 * Supprime l'élément de la sélection
 * @param  e                : event
 * @param aDonnees          : Tableau contenant toutes les données pour un groupe particulier
 * @param elNbSelections    : Identifiant du nombre de choix sélectionnées
 * @param elChoixContainer  : Container autours du groupe
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

        const elInnerSelection = elNbSelections.querySelector('.nb-selections');

        let nbSelections = elInnerSelection.innerHTML;
        nbSelections--;

        if (nbSelections < 0) {
            nbSelections = 0;
        }

        elInnerSelection.innerHTML = nbSelections;

        if (nbSelections === 0) {
            elInnerSelection.classList.add("hide");
            elChoixContainer.classList.add("hide");
        }

        ajusterHauteur(nbSelections, elChoixContainer);
    };
}


/**
 * Ajuste la hauteur visible d'un accordéon selon son contenu dynamique
 * @param nbSelections      : Est utilisé pour déterminer la hauteur dynamique
 * @param elChoixContainer  : Identifie l'élément principal sur lequel il faut ajuster la hauteur
 */
function ajusterHauteur(nbSelections, elChoixContainer) {
    const elAccContainer = elChoixContainer.closest(".acc-container");

    if (nbSelections === 0) {
        elAccContainer.dataset.jsHauteur = aHauteurs['ferme'];
    } else if (nbSelections === 1) {
        elAccContainer.dataset.jsHauteur = aHauteurs['select-1'];
    } else {
        elAccContainer.dataset.jsHauteur = aHauteurs['select-2'];
    }

    elAccContainer.style.height = elAccContainer.dataset.jsHauteur + "px";
}


/**
 * Lancer le traitement des listes semi-automatiques
 */
traiterAppellation();
traiterBouteille();
traiterCepage();
traiterClassification();
traiterDesignation();
traiterPays();
traiterRegion();


/**
 * Lancer le traitement des listes de checkbox
 */

/**
 * Traiter la liste de checkboxes des types de vin
 */
let elTypeVins = document.querySelectorAll('[data-js-type-vin]');
let elTypeVinTous = document.querySelector('[data-js-type-vin-tous]');

elTypeVins.forEach(typeVin => {
    typeVin.addEventListener('change', traiterTypeVin);
});

elTypeVinTous.addEventListener('change', () => {
    elTypeVins.forEach(typeVin => {
        typeVin.checked = elTypeVinTous.checked;
    });

    traiterTypeVin();
});


/**
 * Traiter la liste de checkboxes des celliers
 */
let elMesCelliers = document.querySelectorAll('[data-js-mes-celliers]');
let elMesCelliersTous = document.querySelector('[data-js-mes-celliers-tous]');

elMesCelliers.forEach(monCellier => {
    monCellier.addEventListener('change', traiterMesCelliers);
});

elMesCelliersTous.addEventListener('change', () => {
    elMesCelliers.forEach(monCellier => {
        monCellier.checked = elMesCelliersTous.checked;
    });

    traiterMesCelliers();
});


/**
 * Traiter les types de cellier
 */
let elTypeCelliers = document.querySelectorAll('[data-js-type-cellier]');
let elTypeCellierTous = document.querySelector('[data-js-type-cellier-tous]');

elTypeCelliers.forEach(typeCellier => {
    typeCellier.addEventListener('change', traiterTypeCellier);
});

elTypeCellierTous.addEventListener('change', () => {
    elTypeCelliers.forEach(typeCellier => {
        typeCellier.checked = elTypeCellierTous.checked;
    });

    traiterTypeCellier();
});


/**
 * Trairer les produits du Québec
 */
let elProduitsQc = document.querySelectorAll('[data-js-produit-qc]');
let elProduitsQcTous = document.querySelector('[data-js-produit-qc-tous]');

elProduitsQc.forEach(produitsQc => {
    produitsQc.addEventListener('change', traiterProduitQc);
});

elProduitsQcTous.addEventListener('change', () => {
    elProduitsQc.forEach(produitQc => {
        produitQc.checked = elProduitsQcTous.checked;
    });

    traiterProduitQc();
});


/**
 * Lancer le traitement des sliders
 */
function traiterSlider(elInput, elValeurs) {
    elValeurs.forEach(elValeur => {
        elValeur.addEventListener('change', (e) => {
            elInput.value = e.target.value;
        });
    });

}


/**
 * Traitement du slider format_min
 */
let elInput = document.querySelector('[data-js-format-val-min]');
let elValeurs = document.querySelectorAll('input[name="format_min"]');

traiterSlider(elInput, elValeurs);


/**
 * Traitement du slider format_max
 */
elInput = document.querySelector('[data-js-format-val-max]');
elValeurs = document.querySelectorAll('input[name="format_max"]');

traiterSlider(elInput, elValeurs);


/**
 * Traitement du slider ts-min
 */
elInput = document.querySelector('[data-js-ts-val-min]');
elValeurs = document.querySelectorAll('input[name="ts_min"]');

traiterSlider(elInput, elValeurs);


/**
 * Traitement du slider ts-max
 */
elInput = document.querySelector('[data-js-ts-val-max]');
elValeurs = document.querySelectorAll('input[name="ts_max"]');

traiterSlider(elInput, elValeurs);


/**
 * Traitement du slider da-min
 */
elInput = document.querySelector('[data-js-da-val-min]');
elValeurs = document.querySelectorAll('input[name="da_min"]');

traiterSlider(elInput, elValeurs);


/**
 * Traitement du slider da-max
 */
elInput = document.querySelector('[data-js-da-val-max]');
elValeurs = document.querySelectorAll('input[name="da_max"]');

traiterSlider(elInput, elValeurs);


/**
 * On limite les champs numériques à 2 décimales
 */
let elSliderInputs = document.querySelectorAll('[data-js-slider-input]');

elSliderInputs.forEach(unSlider => {
    unSlider.addEventListener('input', (e) => {
        contenirDecimales(e);
    });
});

const contenirDecimales = (e) => {
    let nombre = e.target.value;

    if (nombre.indexOf(".") >= 0) {
        if ((nombre.substr(nombre.indexOf("."))).length > 3) {
            const pos = nombre.indexOf(".");

            nombre = nombre.substr(0, nombre.indexOf(".")) + nombre.substr(pos, pos + 2);
            e.target.value = nombre;
        }
    }
}


/**
 * Gestion des sections de recherche en accordéon
 */
let acc = document.querySelectorAll(".accordeon");

for (let i = 0, l = acc.length; i < l; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;

        if (panel.style.height) {
            panel.style.height = null;
        } else {
            panel.style.height = panel.scrollHeight + "px";
        }
    });
}


/**
 * Réinitialisation des données
 */
elBtnReinit = document.querySelector('[data-js-reinit]');

elBtnReinit.addEventListener("click", (e) => {
    e.preventDefault();
    initDonnees();
});


function initDonnees() {
    elRechercheWrapper = document.querySelector('.recherche-wrapper');
    let elCheckboxes = elRechercheWrapper.querySelectorAll('input[type="checkbox"]');
    let elBtnsRadio = elRechercheWrapper.querySelectorAll('input[type="radio"]');
    let elChoixGroupe = elRechercheWrapper.querySelectorAll('.choix-groupe');
    let elChoixContainer = elRechercheWrapper.querySelectorAll('.choix-container');

    // les checkbox
    elCheckboxes.forEach(unCheckbox => {
        if (unCheckbox.checked) unCheckbox.click();

    });

    // les boutons radio
    elBtnsRadio.forEach(unBtnRadion => {
        unBtnRadion.checked = false;
    });

    // les listes
    elChoixGroupe.forEach(unGroupe => {
        unGroupe.innerHTML = "";

    });

    elChoixContainer.forEach(unContainer => {
        if (!unContainer.classList.contains('hide')) {
            unContainer.classList.add('hide');
        }
    });

    reinitVisibilite();

    //
    let elNbSelections = elRechercheWrapper.querySelectorAll('.nb-selections');

    elNbSelections.forEach(uneSelection => {
        uneSelection.innerHTML = "";

        if (!uneSelection.classList.contains('hide')) {
            uneSelection.classList.add('hide');
        }
    });

    //
    let elSliderInputs = document.querySelectorAll('[data-js-slider-input]');

    elSliderInputs.forEach(unSlider => {
        unSlider.value = "";
    });


    // Fermer les accordéons
    let elAccordeons = elRechercheWrapper.querySelectorAll('.accordeon');

    elAccordeons.forEach(unAccordeon => {
        const panel = unAccordeon.nextElementSibling;
        panel.dataset.jsHauteur = aHauteurs['ferme'];

        if (panel.style.height) {
            unAccordeon.click();
        }
    });
}


/**
 * custom select
 */
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "select-container":*/
x = document.getElementsByClassName("select-container");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
