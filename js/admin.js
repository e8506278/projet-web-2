var $baseUrl_without_parameters = window.location.href.split('?');//[0];
$baseUrl_without_parameters = $baseUrl_without_parameters.length > 0 ? $baseUrl_without_parameters[0] : $baseUrl_without_parameters;

var elTableBody;
var tableData = [];

var tableSelectionnee = {
    id: "",
    table: "",
    donnees: []
};

const nbMaxLignesTable = 5;
const caretUpClassName = 'fa fa-caret-up';
const caretDownClassName = 'fa fa-caret-down';

const elCartes = document.querySelectorAll('.card');

const elTablesVino = document.querySelector('.carte-vino');
const elBouteilles = document.querySelector('.carte-bouteille');
const elCelliers = document.querySelector('.carte-cellier');
const elUsagers = document.querySelector('.carte-usager');

const elVinoWrapper = document.querySelector('.vino-wrapper');
const elTableWrapper = document.querySelector('.table-wrapper');
const elDetailWrapper = document.querySelector('.detail-wrapper');

const elNbBouteilles = document.querySelector('.nb-bouteilles');
const elNbCelliers = document.querySelector('.nb-celliers');
const elNbUsagers = document.querySelector('.nb-usagers');

const elNomTableVino = document.querySelector('[data-js-selection-nom-table]');
const elSelectionVino = document.querySelector('#selection-table-vino');
const elbtnAfficherVino = document.querySelector('.btn-afficher-vino');

const trier_par = (champ, inverse, primer) => {
    const key = primer ?
        function (x) {
            return primer(x[champ]);
        } :
        function (x) {
            return x[champ];
        };

    inverse = !inverse ? 1 : -1;

    return function (a, b) {
        return a = key(a), b = key(b), inverse * ((a > b) - (b > a));
    };
};


/**
 * Les événements quand on clique sur une des 4 boîtes du haut.
 * Ça génère la liste des enregistrements associés à la table de la boîte
 */
elBouteilles.addEventListener('click', () => {
    tableSelectionnee['nomTable'] = 'bouteille';
    construireListeBouteilles();
    selectionnerCarte(elBouteilles);
});

elCelliers.addEventListener('click', () => {
    tableSelectionnee['nomTable'] = 'cellier';
    construireListeCelliers();
    selectionnerCarte(elCelliers);
});

elUsagers.addEventListener('click', () => {
    tableSelectionnee['nomTable'] = 'usager';
    construireListeUsagers();
    selectionnerCarte(elUsagers);
});

/**
 * Quand on clique sur la boîte Vino, on affiche dabord la liste des tables
 */
elTablesVino.addEventListener('click', () => {
    tableSelectionnee['nomTable'] = '';
    afficherListeVino();
    selectionnerCarte(elTablesVino);
});

/**
 * Puis quand on demande d'afficher une table Vino, là on montre ses enregistrements
 */
elbtnAfficherVino.addEventListener('click', () => {
    tableSelectionnee['nomTable'] = elSelectionVino.value;
    elNomTableVino.innerHTML = "Table: " + tableSelectionnee['nomTable'];
    construireListeVino();
});


/**
 * Fonction qui affiche le détail de l'enregistrement sélectionné
 * @param donnees : Les données lues de la BD et qui sont à afficher
 */
function afficherDonnees(donnees) {
    let html = `
                <div class="col-md-12 groupe-action hide">
                    <div class="btn-confirmer" title="Confirmer" data-js-btn-confirmer>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                        </svg>
                    </div>

                    <div class="btn-annuler" title="Annuler" data-js-btn-annuler>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z"/>
                        </svg>
                    </div>
                </div>

                <div class="col-md-12 groupe-modifier">
                    <div class="btn-modifier" title="Modifier" data-js-btn-modifier>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z" />
                        </svg>
                    </div>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th><span>Nom du champ</span></th>
                                <th><span>Valeur</span></th>
                            </tr>
                        </thead>
                        <tbody id="detail-body"></tbody>
                    </table>
                </div>`;

    elDetailWrapper.innerHTML = "";
    elDetailWrapper.insertAdjacentHTML('beforeend', html);

    let elDetail = document.getElementById('detail-body');
    elDetail.innerHTML = "";

    for (let i = 0, l = Object.keys(donnees).length; i < l; i++) {
        // tr
        let row = elDetail.insertRow(-1);

        // td
        let elem = row.insertCell(-1);
        let cle = Object.keys(donnees)[i];

        elem.innerHTML = cle;

        // td
        elem = row.insertCell(-1);
        let donnee = Object.values(donnees)[i];

        if (donnee) {
            if (donnee.startsWith("http")) {
                donnee = `
                        <div class="lien-externe">
                            <span>${donnee}</span>
                            <a href="${donnee}" target="_blank"
                                title="Ouvre le document lié dans une nouvelle fenêtre ou un nouvel onglet">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"/></svg>
                            </a>
                        </div>`;
            }
        } else {
            donnee = "** Valeur non définie **"
        }

        elem.innerHTML = donnee;
    }


    const elGroupeAction = document.querySelector('.groupe-action');
    const elGroupeAjouter = document.querySelector('.groupe-ajouter');
    const elGroupeModifier = document.querySelector('.groupe-modifier');

    const elBtnAjouter = document.querySelector('[data-js-btn-ajouter]');
    const elBtnModifier = document.querySelector('[data-js-btn-modifier]');
    const elBtnConfirmer = document.querySelector('[data-js-btn-confirmer]');
    const elBtnAnnuler = document.querySelector('[data-js-btn-annuler]');


    // Quand on clique sur le bouton pour confirmer les derniers changements.
    elBtnConfirmer.addEventListener("click", () => {
        const elDetail = document.getElementById('detail-body');
        const elTRs = elDetail.getElementsByTagName("tr");

        for (let i = 0, l = elTRs.length; i < l; i++) {
            const cells = elTRs[i].getElementsByTagName('td');
            cells[1].setAttribute("contenteditable", false);
        }

        elGroupeAjouter.classList.remove("hide");
        elGroupeModifier.classList.remove("hide");

        if (!elGroupeAction.classList.contains("hide")) {
            elGroupeAction.classList.add("hide");
        }

        basculerEdition(elTableWrapper);
    });


    // Quand on clique sur le bouton pour annuler les derniers changements.
    elBtnAnnuler.addEventListener("click", () => {
        const elDetail = document.getElementById('detail-body');
        const elTRs = elDetail.getElementsByTagName("tr");

        for (let i = 0, l = elTRs.length; i < l; i++) {
            const cells = elTRs[i].getElementsByTagName('td');
            cells[1].setAttribute("contenteditable", false);
        }

        elGroupeAjouter.classList.remove("hide");
        elGroupeModifier.classList.remove("hide");

        if (!elGroupeAction.classList.contains("hide")) {
            elGroupeAction.classList.add("hide");
        }

        basculerEdition(elTableWrapper);
    });


    function afficherFormulaire(nomTable, body = null) {
        switch (nomTable) {
            case "bouteille":
                lireHtml('lireFormulaireBouteille', body)
                    .then(formulaire => {
                        const elDetail = document.getElementById('detail-body');
                        elDetail.innerHTML = "";
                        elDetail.insertAdjacentHTML("beforeend", formulaire);
                    });
                break;

            case "cellier":
                lireHtml('lireFormulaireCellier', body)
                    .then(formulaire => {
                        const elDetail = document.getElementById('detail-body');
                        elDetail.innerHTML = "";
                        elDetail.insertAdjacentHTML("beforeend", formulaire);
                    });
                break;

            case "usager":
                lireHtml('lireFormulaireUsager', body)
                    .then(formulaire => {
                        const elDetail = document.getElementById('detail-body');
                        elDetail.innerHTML = "";
                        elDetail.insertAdjacentHTML("beforeend", formulaire);
                    });
                break;

            case "vino__appellation":
            case "vino__cepage":
            case "vino__classification":
            case "vino__degre_alcool":
            case "vino__designation":
            case "vino__format":
            case "generique__pays":
            case "vino__produit_du_quebec":
            case "vino__region":
            case "vino__taux_de_sucre":
            case "vino__type_cellier":
            case "vino__type":
                const elDetail = document.getElementById('detail-body');
                const elTRs = elDetail.getElementsByTagName("tr");

                for (let i = 0, l = elTRs.length; i < l; i++) {
                    const cells = elTRs[i].getElementsByTagName('td');
                    cells[1].setAttribute("contenteditable", true);

                    if (!body) {
                        cells[1].innerHTML = "";
                    }
                }

                break;

            case "vino__bouteille":
                break;

            default:
                break;
        }
    }


    // Quand on clique sur le bouton pour ajouter un nouvel enregistrement.
    elBtnAjouter.addEventListener("click", () => {
        afficherFormulaire(tableSelectionnee['nomTable']);
        elGroupeAction.classList.remove("hide");

        if (!elGroupeAjouter.classList.contains("hide")) {
            elGroupeAjouter.classList.add("hide");
        }

        if (!elGroupeModifier.classList.contains("hide")) {
            elGroupeModifier.classList.add("hide");
        }

        basculerEdition(elTableWrapper);
    });


    // Quand on clique sur le bouton pour modifier un enregistrement existant.
    elBtnModifier.addEventListener("click", () => {
        afficherFormulaire(tableSelectionnee['nomTable'], tableSelectionnee["donnees"]);
        elGroupeAction.classList.remove("hide");

        if (!elGroupeAjouter.classList.contains("hide")) {
            elGroupeAjouter.classList.add("hide");
        }

        if (!elGroupeModifier.classList.contains("hide")) {
            elGroupeModifier.classList.add("hide");
        }

        basculerEdition(elTableWrapper);
    });
}


/**
 * Fonction qui affiche le premier niveau de sélection des tables Vino
 */
function afficherListeVino() {
    reinitialiserListes();
    elVinoWrapper.classList.remove("hide");
}


/**
 * Active ou désactive une section à l'écran quand on entre/sort d'un mode d'édition du formulaire.
 * @param el Le parent qui contient les éléments à activer/désactiver
 */
function basculerEdition(el) {
    if (el.classList.contains("edition")) {
        el.classList.remove("edition");
    } else {
        el.classList.add("edition");
    }
}


/**
 * Fonction qui ajuste la flèche qui indique le sens du tri d'une colonne
 * @param event 
 */
function basculerFleche(event) {
    let element = event.target;
    let caret, champ, inverse;
    if (element.tagName === 'span') {
        caret = element.getElementsByClassName('caret')[0];
        champ = element.id
    } else {
        caret = element;
        champ = element.parentElement.id
    }

    let iconClassName = caret.className;
    effacerFleche();
    if (iconClassName.includes(caretUpClassName)) {
        caret.className = `caret ${caretDownClassName}`;
        inverse = false;
    } else {
        inverse = true;
        caret.className = `caret ${caretUpClassName}`;
    }

    tableData.sort(trier_par(champ, inverse));
    injecterDonnees();
}


/**
 * Fonction qui construit la liste qui contient toutes les bouteilles
 */
function construireListeBouteilles() {
    let html = `
                <div>
                    <div class="col-md-12 groupe-ajouter">
                        <div class="btn-ajouter-bouteille" title="Ajouter" data-js-btn-ajouter>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                            </svg>
                        </div>
                    </div>

                    <div class="filtre-wrapper filtre-bouteille">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <div class="table-container">
                        <table class="table-bouteille">
                            <thead>
                                <tr id="table-entete">
                                    <th><span id="id_bouteille" class="w3-button table-colonne">Id bouteille <i class="caret"></span></th>
                                    <th><span id="id_cellier" class="w3-button table-colonne">Id Cellier <i class="caret"></span></th>
                                    <th><span id="nom_bouteille" class="w3-button table-colonne">Nom de la bouteille <i class="caret"></span></th>
                                    <th><span id="url_saq" class="w3-button table-colonne">Lien vers la SAQ <i class="caret"></span></th>
                                </tr>
                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                    </div>
                </div>`;

    lireJson('lireAdminBouteilles')
        .then(donnees => {
            reinitialiserListes();

            // Création de la nouvelle table, si il y a des données
            let nbTrouve = donnees.length;

            elNbBouteilles.innerHTML = nbTrouve;
            elNbBouteilles.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-bouteille">
                        Aucune bouteille trouvée
                    </div>
                </div>`;

                elTableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                elTableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-colonne');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                // On ajuste l'entête de la liste pour tenir compte de la barre de défilement
                let elTableEntete = document.getElementById('table-entete');

                if (donnees.length > nbMaxLignesTable) {
                    let scrollbarWidth = getScrollbarWidth();
                    elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
                }

                // Injection des données
                elTableBody = document.getElementById('table-body');

                tableData = [...donnees];
                injecterDonnees();

                // On ajoute des événements à certains éléments (tr) nouvellement créés
                let rows = elTableBody.getElementsByTagName("tr");

                for (let row of rows) {
                    let cells = row.getElementsByTagName("td");

                    for (let cell of cells) {
                        cell.addEventListener("click", () => {
                            selectionnerLigne(row);
                        });
                    }

                    row.addEventListener("click", () => {
                        const idBouteille = row.firstElementChild.innerHTML;
                        const body = { 'id_bouteille': idBouteille };
                        const requete = "lireAdminUneBouteille";

                        lireJson(requete, body)
                            .then(donnees => {
                                tableSelectionnee["donnees"] = donnees[0];
                                afficherDonnees(donnees[0]);
                            });
                    });
                }
            }
        });
}


/**
 * Fonction qui construit la liste qui contient tous les celliers
 */
function construireListeCelliers() {
    let html = `
                <div>
                    <div class="col-md-12 groupe-ajouter">
                        <div class="btn-ajouter-cellier" title="Ajouter" data-js-btn-ajouter>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                            </svg>
                        </div>
                    </div>

                    <div class="filtre-wrapper filtre-cellier">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <div class="table-container">
                        <table class="table-cellier">
                            <thead>
                                <tr id="table-entete">
                                    <th><span id="id_cellier" class="w3-button table-colonne">Id cellier <i class="caret"></span></th>
                                    <th><span id="id_usager" class="w3-button table-colonne">Id usager <i class="caret"></span></th>
                                    <th><span id="nom_cellier" class="w3-button table-colonne">Nom du cellier <i class="caret"></span></th>
                                    <th><span id="type_cellier" class="w3-button table-colonne">type de cellier <i class="caret"></span></th>
                                </tr>
                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                    </div>
                </div>`;

    lireJson('lireAdminCelliers')
        .then(donnees => {
            reinitialiserListes();

            // Création de la nouvelle table, si il y a des données
            let nbTrouve = donnees.length;

            elNbCelliers.innerHTML = nbTrouve;
            elNbCelliers.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-cellier">
                        Aucun cellier trouvé
                    </div>
                </div>`;

                elTableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                elTableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-colonne');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                // On ajuste l'entête de la liste pour tenir compte de la barre de défilement
                let elTableEntete = document.getElementById('table-entete');

                if (donnees.length > nbMaxLignesTable) {
                    let scrollbarWidth = getScrollbarWidth();
                    elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
                }

                // Injection des données
                elTableBody = document.getElementById('table-body');

                tableData = [...donnees];
                injecterDonnees();

                // On ajoute des événements à certains éléments (tr) nouvellement créés
                let rows = elTableBody.getElementsByTagName("tr");

                for (let row of rows) {
                    let cells = row.getElementsByTagName("td");

                    for (let cell of cells) {
                        cell.addEventListener("click", () => {
                            selectionnerLigne(row);
                        });
                    }

                    row.addEventListener("click", () => {
                        const idCellier = row.firstElementChild.innerHTML;
                        const body = { 'id_cellier': idCellier };
                        const requete = "lireAdminUnCellier";

                        lireJson(requete, body)
                            .then(donnees => {
                                tableSelectionnee["donnees"] = donnees[0];
                                afficherDonnees(donnees[0]);
                            });

                    });
                }
            }
        });
}


/**
 * Fonction qui construit la liste qui contient tous les usagers
 */
function construireListeUsagers() {
    let html = `
                <div>
                    <div class="col-md-12 groupe-ajouter">
                        <div class="btn-ajouter-usager" title="Ajouter" data-js-btn-ajouter>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                            </svg>
                        </div>
                    </div>

                    <div class="filtre-wrapper filtre-usager">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <div class="table-container">
                        <table class="table-usager">
                            <thead>
                                <tr id="table-entete">
                                    <th><span id="id_usager" class="w3-button table-colonne">Id de l'usager <i class="caret"></span></th>
                                    <th><span id="nom_usager" class="w3-button table-colonne">Nom de l'usager <i class="caret"></span></th>
                                    <th><span id="courriel_usager" class="w3-button table-colonne">Courriel <i class="caret"></span></th>
                                    <th><span id="nom_utilisateur" class="w3-button table-colonne">Nom d'utilisateur <i class="caret"></span></th>
                                    <th><span id="type_usager" class="w3-button table-colonne">Type d'usager <i class="caret"></span></th>
                                </tr>
                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                    </div>
                </div>`;

    lireJson('lireAdminUsagers')
        .then(donnees => {
            reinitialiserListes();

            // Création de la nouvelle table, si il y a des données
            let nbTrouve = donnees.length;

            elNbUsagers.innerHTML = nbTrouve;
            elNbUsagers.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-usager">
                        Aucun usager trouvé
                    </div>
                </div>`;

                elTableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                elTableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-colonne');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                // On ajuste l'entête de la liste pour tenir compte de la barre de défilement
                let elTableEntete = document.getElementById('table-entete');

                if (donnees.length > nbMaxLignesTable) {
                    let scrollbarWidth = getScrollbarWidth();
                    elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
                }

                // Injection des données
                elTableBody = document.getElementById('table-body');

                tableData = [...donnees];
                injecterDonnees();

                // On ajoute des événements à certains éléments (tr) nouvellement créés
                let rows = elTableBody.getElementsByTagName("tr");

                for (let row of rows) {
                    let cells = row.getElementsByTagName("td");

                    for (let cell of cells) {
                        cell.addEventListener("click", () => {
                            selectionnerLigne(row);
                        });
                    }

                    row.addEventListener("click", () => {
                        const idUsager = row.firstElementChild.innerHTML;
                        const body = { 'id_usager': idUsager };
                        const requete = "lireAdminUnUsager";

                        lireJson(requete, body)
                            .then(donnees => {
                                tableSelectionnee["donnees"] = donnees[0];
                                afficherDonnees(donnees[0]);

                            });

                    });
                }
            }
        });
}


/**
 * Fonction qui construit la liste qui contient tous les enregistrements d'unt table Vino
 */
function construireListeVino() {
    let html = `
                <div>
                    <div class="col-md-12 groupe-ajouter">
                        <div class="btn-ajouter-bouteille" title="Ajouter" data-js-btn-ajouter>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                            </svg>
                        </div>
                    </div>

                    <div class="filtre-wrapper filtre-vino">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <div class="table-container">
                        <table class="table-vino entete-fixe">
                            <thead>
                                <tr id="table-entete">
                                </tr>
                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                    </div>
                </div>`;

    const body = { 'nomTable': tableSelectionnee['nomTable'] };

    lireJson('lireTableVino', body)
        .then(donnees => {
            reinitialiserListes();

            // Création de la nouvelle table, si il y a des données
            elTableWrapper.insertAdjacentHTML('beforeend', html);

            // Création de l'entête de la table
            let elTableEntete = document.getElementById('table-entete');
            elTableEntete.innerHTML = "";

            for (let i = 0, l = Object.keys(donnees[0]).length; i < l; i++) {
                const colonne = Object.keys(donnees[0])[i];
                const lesMots = colonne.split("_");

                lesMots[0] = lesMots[0].charAt(0).toUpperCase() + lesMots[0].slice(1);

                const colDesc = lesMots.join(" ");
                const th = `<th><span id="${colonne}" class="w3-button table-colonne">${colDesc} <i class="caret"></span></th>`;

                elTableEntete.insertAdjacentHTML('beforeend', th);
            }

            // On ajoute des événements à certains éléments nouvellement créés
            let tableColumns = document.getElementsByClassName('table-colonne');

            for (let column of tableColumns) {
                column.addEventListener('click', function (event) {
                    basculerFleche(event);
                });
            }

            let input = document.getElementById('filtre-table');

            input.addEventListener('keyup', function (event) {
                filtrerDonnees();
            });

            // On ajuste l'entête de la liste pour tenir compte de la barre de défilement
            if (donnees.length > nbMaxLignesTable) {
                let scrollbarWidth = getScrollbarWidth();
                elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
            }

            // Injection des données
            elTableBody = document.getElementById('table-body');

            if (donnees.length > nbMaxLignesTable) {
                let scrollbarWidth = getScrollbarWidth();
                elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
            }

            tableData = [...donnees];
            injecterDonnees();

            // On ajoute des événements à certains éléments (tr) nouvellement créés
            let rows = elTableBody.getElementsByTagName("tr");

            for (let row of rows) {
                let cells = row.getElementsByTagName("td");

                for (let cell of cells) {
                    cell.addEventListener("click", () => {
                        selectionnerLigne(row);
                    });
                }

                row.addEventListener("click", () => {
                    const id = row.firstElementChild.innerHTML;

                    const body = {
                        'nomTable': tableSelectionnee['nomTable'],
                        'id': id
                    };

                    lireJson('lireTableVino', body)
                        .then(donnees => {
                            tableSelectionnee["donnees"] = donnees[0];
                            afficherDonnees(donnees[0]);
                        });
                });
            }
        });
}


/**
 * Fonction qui efface la flèche indiquant l'ordre de tri.
 * Elle sert à réinitialiser les colonnes sans ordre de tri. 
 */
function effacerFleche() {
    let carets = document.getElementsByClassName('caret');
    for (let caret of carets) {
        caret.className = "caret";
    }
}


/**
 * Fonction qui affiche les lignes pour lesquelles une de leurs valeurs est interceptée par le filtre.
 */
function filtrerDonnees() {
    let input = document.getElementById('filtre-table');
    let filter = input.value.toUpperCase();
    let rows = elTableBody.getElementsByTagName("tr");
    let flag = false;
    let compteur = 0;

    for (let row of rows) {
        let cells = row.getElementsByTagName("td");

        for (let cell of cells) {
            if (cell.textContent.toUpperCase().indexOf(filter) > -1) {
                if (filter) {
                    cell.style.backgroundColor = 'yellow';
                } else {
                    cell.style.backgroundColor = "";
                }

                flag = true;
            } else {
                cell.style.backgroundColor = "";
            }
        }

        if (flag) {
            row.style.display = "";
            compteur++;
        } else {
            row.style.display = "none";
        }

        flag = false;
    }

    let elTableEntete = document.getElementById('table-entete');

    if (compteur > nbMaxLignesTable) {
        let scrollbarWidth = getScrollbarWidth();
        elTableEntete.style = `width: calc(100% - ${scrollbarWidth}px)`;
    } else {
        elTableEntete.style = `width: 100%)`;
    }
}


/**
 * Fonction qui identifie la valeur d'une barre de défilement dans la page.
 * Est appellée quand une table a une barre de défilement afin de faire correspondre l'entête avec le détail.
 * @returns la largeur d'une barre de défilement
 */
function getScrollbarWidth() {
    // Creating invisible container
    const outer = document.createElement('div');
    outer.style.visibility = 'hidden';
    outer.style.overflow = 'scroll'; // forcing scrollbar to appear
    outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
    document.body.appendChild(outer);

    // Creating inner element and placing it in the container
    const inner = document.createElement('div');
    outer.appendChild(inner);

    // Calculating difference between container's full width and the child width
    const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

    // Removing temporary elements from the DOM
    outer.parentNode.removeChild(outer);

    return scrollbarWidth;
}


/**
 * Fonction qui ajoute les données lues dans la table de détail d'un enregistrement.
 */
function injecterDonnees() {
    elTableBody.innerHTML = "";

    for (let data of tableData) {
        let row = elTableBody.insertRow(-1);

        for (let i = 0, l = Object.keys(data).length; i < l; i++) {
            let elem = row.insertCell(-1);
            let donnee = Object.values(data)[i];

            if (donnee.startsWith("http")) {
                donnee = `
                        <div class="lien-externe">
                            <span>${donnee}</span>
                            <a href="${donnee}" target="_blank"
                                title="Ouvre le document lié dans une nouvelle fenêtre ou un nouvel onglet">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"/></svg>
                            </a>
                        </div>`;
            }

            elem.innerHTML = donnee;

        }
    }

    filtrerDonnees();
}


/**
 * Fonction qui lit les données de la BD
 * @param reqNom    Le nom de la requête à appeller
 * @param reqBody   L'information à passer avec la requçete
 * @returns         Le contenu html généré
 */
async function lireHtml(reqNom, reqBody = null) {
    document.body.className = 'waiting';

    const entete = new Headers();
    entete.append("Content-Type", "text/html");

    const reqOptions = {
        method: "POST",
        headers: entete
    };

    if (reqBody) {
        reqOptions["body"] = JSON.stringify(reqBody);
    }

    const requete = new Request($baseUrl_without_parameters + "?requete=" + reqNom, reqOptions);
    const reponse = await fetch(requete);

    if (!reponse.ok) {
        throw new Error(`Erreur HTTP : statut = ${reponse.status}`);
    }

    const data = await reponse.text();
    document.body.className = '';

    return data;
}


/**
 * Fonction qui lit les données de la BD
 * @param reqNom    Le nom de la requête à appeller
 * @param reqBody   L'information à passer avec la requçete
 * @returns         Le contenu json généré
 */
async function lireJson(reqNom, reqBody = null) {
    document.body.className = 'waiting';

    const entete = new Headers();
    entete.append("Content-Type", "application/json");
    entete.append("Accept", "application/json");

    const reqOptions = {
        method: "POST",
        headers: entete
    };

    if (reqBody) {
        reqOptions["body"] = JSON.stringify(reqBody);
    }

    const requete = new Request($baseUrl_without_parameters + "?requete=" + reqNom, reqOptions);
    const reponse = await fetch(requete);

    if (!reponse.ok) {
        throw new Error(`Erreur HTTP : statut = ${reponse.status}`);
    }

    const data = await reponse.json();
    document.body.className = '';

    return data;
}


/**
 * Supprime les listes de la page quand on clique sur l'une des 4 boîtes du haut
 */
function reinitialiserListes() {
    if (!elTablesVino.classList.contains("selected") && !elVinoWrapper.classList.contains("hide")) {
        elVinoWrapper.classList.add("hide");
    }

    elTableWrapper.innerHTML = "";
    elDetailWrapper.innerHTML = "";

}

function selectionnerLigne(el) {
    let rows = elTableBody.getElementsByTagName("tr");

    for (let row of rows) {
        row.classList.remove('selected');
    }

    el.classList.add('selected');
}

/**
 * Ajoute la classe 'selected' à l'élément fourni en paramètre et l'enlève aux autres
 * @param el L'élément qui doit recevoir la classe
 */
function selectionnerCarte(el) {
    for (let i = 0, l = elCartes.length; i < l; i++) {
        elCartes[i].classList.remove("selected");

    }
    el.classList.add("selected");
}
