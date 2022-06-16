/**
 * Traiter les appellations du vin
 */
function traiterAppellation() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-appellation');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elAppellation.length; i < l; i++) {
        if (elAppellation[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elAppellationTous.checked = (nbSelections === elAppellation.length);
}


/**
 * Traiter les bouteilles
 */
function traiterBouteille() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-bouteille');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elBouteille.length; i < l; i++) {
        if (elBouteille[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elBouteilleTous.checked = (nbSelections === elBouteille.length);
}


/**
 * Traiter les celliers
 */
function traiterCellier() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-cellier');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elCellier.length; i < l; i++) {
        if (elCellier[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elCellierTous.checked = (nbSelections === elCellier.length);
}


/**
 * Traiter les cépages de vin
 */
function traiterCepage() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-cepage');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elCepage.length; i < l; i++) {
        if (elCepage[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elCepageTous.checked = (nbSelections === elCepage.length);
}


/**
 * Traiter les classifications de vin
 */
function traiterClassification() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-classification');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elClassification.length; i < l; i++) {
        if (elClassification[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elClassificationTous.checked = (nbSelections === elClassification.length);
}


/**
 * Traiter les degrés d'alcool
 */
function traiterDegreAlcool() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-degre-alcool');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elDegreAlcool.length; i < l; i++) {
        if (elDegreAlcool[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elDegreAlcoolTous.checked = (nbSelections === elDegreAlcool.length);
}


/**
 * Traiter les désignations de vin
 */
function traiterDesignation() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-designation');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elDesignation.length; i < l; i++) {
        if (elDesignation[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elDesignationTous.checked = (nbSelections === elDesignation.length);
}


/**
 * Traiter les formats de bouteille
 */
function traiterFormat() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-format');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elFormat.length; i < l; i++) {
        if (elFormat[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elFormatTous.checked = (nbSelections === elFormat.length);
}


/**
 * Traiter les dates de garde
 */
function traiterGardeJusqua() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-garde-jusqua');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elGardeJusqua.length; i < l; i++) {
        if (elGardeJusqua[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elGardeJusquaTous.checked = (nbSelections === elGardeJusqua.length);
}


/**
 * Traiter les notes
 */
function traiterNote() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-note');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elNote.length; i < l; i++) {
        if (elNote[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elNoteTous.checked = (nbSelections === elNote.length);
}


/**
 * Traiter les millésimes
 */
function traiterMillesime() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-millesime');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elMillesime.length; i < l; i++) {
        if (elMillesime[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elMillesimeTous.checked = (nbSelections === elMillesime.length);
}


/**
 * Traiter les pays
 */
function traiterPays() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-pays');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elPays.length; i < l; i++) {
        if (elPays[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elPaysTous.checked = (nbSelections === elPays.length);
}


/**
 * Traiter les prix
 */
function traiterPrix() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-prix');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elPrix.length; i < l; i++) {
        if (elPrix[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elPrixTous.checked = (nbSelections === elPrix.length);
}


/**
 * Traiter le produit du Québec
 */
function traiterProduitsQc() {
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
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-region');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elRegion.length; i < l; i++) {
        if (elRegion[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elRegionTous.checked = (nbSelections === elRegion.length);
}


/**
 * Traiter les taux de sucre
 */
function traiterTauxSucre() {
    let nbSelections = 0;
    const elNbSelections = document.querySelector('.nb-taux-sucre');
    const elInnerSelection = elNbSelections.querySelector('.nb-selections');

    for (let i = 0, l = elTauxSucre.length; i < l; i++) {
        if (elTauxSucre[i].checked) nbSelections++;
    }

    if (nbSelections === 0) {
        if (!elInnerSelection.classList.contains("hide")) {
            elInnerSelection.classList.add("hide");
        }
    } else {
        elInnerSelection.innerHTML = nbSelections;
        elInnerSelection.classList.remove("hide");
    }

    elTauxSucreTous.checked = (nbSelections === elTauxSucre.length);
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

/*************************************************
 * Lancer le traitement des listes de checkboxes *
 *************************************************/

/**
 * Traiter la liste de checkboxes des appellations
 */
let elAppellation = document.querySelectorAll('[data-js-appellation]');
let elAppellationTous = document.querySelector('[data-js-appellation-tous]');

if (elAppellation.length > 0) {
    elAppellation.forEach(uneAppellation => {
        uneAppellation.addEventListener('change', traiterAppellation);
    });

    elAppellationTous.addEventListener('change', () => {
        elAppellation.forEach(uneAppellation => {
            uneAppellation.checked = elAppellationTous.checked;
        });

        traiterAppellation();
    });
}

/**
 * Traiter la liste de checkboxes des bouteilles
 */
let elBouteille = document.querySelectorAll('[data-js-bouteille]');
let elBouteilleTous = document.querySelector('[data-js-bouteille-tous]');

if (elBouteille.length > 0) {
    elBouteille.forEach(uneBouteille => {
        uneBouteille.addEventListener('change', traiterBouteille);
    });

    elBouteilleTous.addEventListener('change', () => {
        elBouteille.forEach(uneBouteille => {
            uneBouteille.checked = elBouteilleTous.checked;
        });

        traiterBouteille();
    });
}


/**
 * Traiter la liste de checkboxes des celliers
 */
let elCellier = document.querySelectorAll('[data-js-cellier]');
let elCellierTous = document.querySelector('[data-js-cellier-tous]');

if (elCellier.length > 0) {
    elCellier.forEach(unCellier => {
        unCellier.addEventListener('change', traiterCellier);
    });

    elCellierTous.addEventListener('change', () => {
        elCellier.forEach(unCellier => {
            unCellier.checked = elCellierTous.checked;
        });

        traiterCellier();
    });
}


/**
 * Traiter la liste de checkboxes des cepages
 */
let elCepage = document.querySelectorAll('[data-js-cepage]');
let elCepageTous = document.querySelector('[data-js-cepage-tous]');

if (elCepage.length > 0) {
    elCepage.forEach(unCepage => {
        unCepage.addEventListener('change', traiterCepage);
    });

    elCepageTous.addEventListener('change', () => {
        elCepage.forEach(unCepage => {
            unCepage.checked = elCepageTous.checked;
        });

        traiterCepage();
    });
}


/**
 * Traiter la liste de checkboxes des classifications
 */
let elClassification = document.querySelectorAll('[data-js-classification]');
let elClassificationTous = document.querySelector('[data-js-classification-tous]');

if (elClassification.length > 0) {
    elClassification.forEach(uneClassification => {
        uneClassification.addEventListener('change', traiterClassification);
    });

    elClassificationTous.addEventListener('change', () => {
        elClassification.forEach(uneClassification => {
            uneClassification.checked = elClassificationTous.checked;
        });

        traiterClassification();
    });
}


/**
 * Traiter la liste de checkboxes des degrés d'alcool
 */
let elDegreAlcool = document.querySelectorAll('[data-js-degre-alcool]');
let elDegreAlcoolTous = document.querySelector('[data-js-degre-alcool-tous]');

if (elDegreAlcool.length > 0) {
    elDegreAlcool.forEach(unDegreAlcool => {
        unDegreAlcool.addEventListener('change', traiterDegreAlcool);
    });

    elDegreAlcoolTous.addEventListener('change', () => {
        elDegreAlcool.forEach(unDegreAlcool => {
            unDegreAlcool.checked = elDegreAlcoolTous.checked;
        });

        traiterDegreAlcool();
    });
}


/**
 * Traiter la liste de checkboxes des designations
 */
let elDesignation = document.querySelectorAll('[data-js-designation]');
let elDesignationTous = document.querySelector('[data-js-designation-tous]');

if (elDesignation.length > 0) {
    elDesignation.forEach(uneDesignation => {
        uneDesignation.addEventListener('change', traiterDesignation);
    });

    elDesignationTous.addEventListener('change', () => {
        elDesignation.forEach(uneDesignation => {
            uneDesignation.checked = elDesignationTous.checked;
        });

        traiterDesignation();
    });
}


/**
 * Traiter la liste de checkboxes des formats
 */
let elFormat = document.querySelectorAll('[data-js-format]');
let elFormatTous = document.querySelector('[data-js-format-tous]');

if (elFormat.length > 0) {
    elFormat.forEach(uneFormat => {
        uneFormat.addEventListener('change', traiterFormat);
    });

    elFormatTous.addEventListener('change', () => {
        elFormat.forEach(uneFormat => {
            uneFormat.checked = elFormatTous.checked;
        });

        traiterFormat();
    });
}


/**
 * Traiter la liste de checkboxes des dates de garde
 */
let elGardeJusqua = document.querySelectorAll('[data-js-garde-jusqua]');
let elGardeJusquaTous = document.querySelector('[data-js-garde-jusqua-tous]');

if (elGardeJusqua.length > 0) {
    elGardeJusqua.forEach(uneGarde => {
        uneGarde.addEventListener('change', traiterGardeJusqua);
    });

    elGardeJusquaTous.addEventListener('change', () => {
        elGardeJusqua.forEach(uneGarde => {
            uneGarde.checked = elGardeJusquaTous.checked;
        });

        traiterGardeJusqua();
    });
}


/**
 * Traiter la liste de checkboxes des notes
 */
let elNote = document.querySelectorAll('[data-js-note]');
let elNoteTous = document.querySelector('[data-js-note-tous]');

if (elNote.length > 0) {
    elNote.forEach(uneGarde => {
        uneGarde.addEventListener('change', traiterNote);
    });

    elNoteTous.addEventListener('change', () => {
        elNote.forEach(uneGarde => {
            uneGarde.checked = elNoteTous.checked;
        });

        traiterNote();
    });
}


/**
 * Traiter la liste de checkboxes des millésimes
 */
let elMillesime = document.querySelectorAll('[data-js-millesime]');
let elMillesimeTous = document.querySelector('[data-js-millesime-tous]');

if (elMillesime.length > 0) {
    elMillesime.forEach(uneGarde => {
        uneGarde.addEventListener('change', traiterMillesime);
    });

    elMillesimeTous.addEventListener('change', () => {
        elMillesime.forEach(uneGarde => {
            uneGarde.checked = elMillesimeTous.checked;
        });

        traiterMillesime();
    });
}


/**
 * Traiter la liste de checkboxes des pays
 */
let elPays = document.querySelectorAll('[data-js-pays]');
let elPaysTous = document.querySelector('[data-js-pays-tous]');

if (elPays.length > 0) {
    elPays.forEach(unPays => {
        unPays.addEventListener('change', traiterPays);
    });

    elPaysTous.addEventListener('change', () => {
        elPays.forEach(unPays => {
            unPays.checked = elPaysTous.checked;
        });

        traiterPays();
    });
}


/**
 * Traiter la liste de checkboxes des prix
 */
let elPrix = document.querySelectorAll('[data-js-prix]');
let elPrixTous = document.querySelector('[data-js-prix-tous]');

if (elPrix.length > 0) {
    elPrix.forEach(unPrix => {
        unPrix.addEventListener('change', traiterPrix);
    });

    elPrixTous.addEventListener('change', () => {
        elPrix.forEach(unPrix => {
            unPrix.checked = elPrixTous.checked;
        });

        traiterPrix();
    });
}


/**
 * Trairer la liste de checkboxes des produits du Québec
 */
let elProduitsQc = document.querySelectorAll('[data-js-produit-qc]');
let elProduitsQcTous = document.querySelector('[data-js-produit-qc-tous]');

if (elProduitsQc.length > 0) {
    elProduitsQc.forEach(produitsQc => {
        produitsQc.addEventListener('change', traiterProduitsQc);
    });

    elProduitsQcTous.addEventListener('change', () => {
        elProduitsQc.forEach(produitQc => {
            produitQc.checked = elProduitsQcTous.checked;
        });

        traiterProduitsQc();
    });
}


/**
 * Traiter la liste de checkboxes des regions
 */
let elRegion = document.querySelectorAll('[data-js-region]');
let elRegionTous = document.querySelector('[data-js-region-tous]');

if (elRegion.length > 0) {
    elRegion.forEach(uneRegion => {
        uneRegion.addEventListener('change', traiterRegion);
    });

    elRegionTous.addEventListener('change', () => {
        elRegion.forEach(uneRegion => {
            uneRegion.checked = elRegionTous.checked;
        });

        traiterRegion();
    });
}


/**
 * Traiter la liste de checkboxes des taux de sucre
 */
let elTauxSucre = document.querySelectorAll('[data-js-taux-sucre]');
let elTauxSucreTous = document.querySelector('[data-js-taux-sucre-tous]');

if (elTauxSucre.length > 0) {
    elTauxSucre.forEach(unTauxSucre => {
        unTauxSucre.addEventListener('change', traiterTauxSucre);
    });

    elTauxSucreTous.addEventListener('change', () => {
        elTauxSucre.forEach(unTauxSucre => {
            unTauxSucre.checked = elTauxSucreTous.checked;
        });

        traiterTauxSucre();
    });
}

/**
 * Traiter la liste de checkboxes des types de cellier
 */
let elTypeCelliers = document.querySelectorAll('[data-js-type-cellier]');
let elTypeCellierTous = document.querySelector('[data-js-type-cellier-tous]');

if (elTypeCelliers.length > 0) {
    elTypeCelliers.forEach(typeCellier => {
        typeCellier.addEventListener('change', traiterTypeCellier);
    });

    elTypeCellierTous.addEventListener('change', () => {
        elTypeCelliers.forEach(typeCellier => {
            typeCellier.checked = elTypeCellierTous.checked;
        });

        traiterTypeCellier();
    });
}


/**
 * Traiter la liste de checkboxes des types de vin
 */
let elTypeVins = document.querySelectorAll('[data-js-type-vin]');
let elTypeVinTous = document.querySelector('[data-js-type-vin-tous]');

if (elTypeVins.length > 0) {
    elTypeVins.forEach(typeVin => {
        typeVin.addEventListener('change', traiterTypeVin);
    });

    elTypeVinTous.addEventListener('change', () => {
        elTypeVins.forEach(typeVin => {
            typeVin.checked = elTypeVinTous.checked;
        });

        traiterTypeVin();
    });
}


/**************************************************
 * Gestion des sections de recherche en accordéon *
 **************************************************/
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


/*********************************
 *  Réinitialisation des données *
 *********************************/

/**
 * 
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
