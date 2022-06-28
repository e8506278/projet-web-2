import { orders } from './orders.js';

var $baseUrl_without_parameters = window.location.href.split('?');//[0];
$baseUrl_without_parameters = $baseUrl_without_parameters.length > 0 ? $baseUrl_without_parameters[0] : $baseUrl_without_parameters;

var caretUpClassName = 'fa fa-caret-up';
var caretDownClassName = 'fa fa-caret-down';
var tableData = [];
var elTable;

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

const elCartes = document.querySelectorAll('.card');
const elBouteilles = document.querySelector('.carte-bouteille');
const elCelliers = document.querySelector('.carte-cellier');
const elRevisions = document.querySelector('.carte-revision');
const elUsagers = document.querySelector('.carte-usager');

elBouteilles.addEventListener('click', () => {
    construireListeBouteilles();
    selectionnerCarte(elBouteilles);
});

elCelliers.addEventListener('click', () => {
    construireListeCelliers();
    selectionnerCarte(elCelliers);
});

elRevisions.addEventListener('click', () => {
    construireListeRevisions();
    selectionnerCarte(elRevisions);
});

elUsagers.addEventListener('click', () => {
    construireListeUsagers();
    selectionnerCarte(elUsagers);
});


function basculerFleche(event) {
    let element = event.target;
    let caret, champ, inverse;
    if (element.tagName === 'SPAN') {
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


function construireListeBouteilles() {
    let html = `
                <div>
                    <div class="filtre-wrapper">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th><span id="id_bouteille" class="w3-button table-column">Id bouteille <i class="caret"></span></th>
                                <th><span id="id_cellier" class="w3-button table-column">Id Cellier <i class="caret"></span></th>
                                <th><span id="nom_bouteille" class="w3-button table-column">Nom de la bouteille <i class="caret"></span></th>
                                <th><span id="url_saq" class="w3-button table-column">Lien vers la SAQ <i class="caret"></span></th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>`;

    lireDonnees('lireAdminBouteilles')
        .then(listeBouteilles => {
            let elNbTrouve = document.querySelector('.nb-bouteilles'),
                nbTrouve = listeBouteilles.length;

            // Création de la nouvelle table, si il y a des données
            let tableWrapper = document.querySelector('.table-wrapper');
            tableWrapper.innerHTML = "";

            elNbTrouve.innerHTML = nbTrouve;
            elNbTrouve.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-bouteille">
                        Aucune bouteille trouvée
                    </div>
                </div>`;

                tableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                tableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-column');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                elTable = document.getElementById('table-body');

                // Injection des données
                tableData = [...listeBouteilles];
                injecterDonnees();

                let rows = elTable.getElementsByTagName("tr");

                for (let row of rows) {
                    row.addEventListener("click", () => {
                        let cleElem = row.firstElementChild.innerHTML;
                        lireExtraDonnees(cleElem);

                    });
                }
            }
        });
}

function lireExtraDonnees(cleElem) {

    const body = { 'id': cleElem };
    const requete = "";

    let donnees = lireDonnees(requete, body);

}


function construireListeCelliers() {
    let html = `
                <div>
                    <div class="filtre-wrapper">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th><span id="id_cellier" class="w3-button table-column">Id cellier <i class="caret"></span></th>
                                <th><span id="id_usager" class="w3-button table-column">Id usager <i class="caret"></span></th>
                                <th><span id="nom_cellier" class="w3-button table-column">Nom du cellier <i class="caret"></span></th>
                                <th><span id="type_cellier" class="w3-button table-column">type de cellier <i class="caret"></span></th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>`;

    lireDonnees('lireAdminCelliers')
        .then(listeCelliers => {
            let elNbTrouve = document.querySelector('.nb-celliers'),
                nbTrouve = listeCelliers.length;

            // Création de la nouvelle table, si il y a des données
            let tableWrapper = document.querySelector('.table-wrapper');
            tableWrapper.innerHTML = "";

            elNbTrouve.innerHTML = nbTrouve;
            elNbTrouve.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-cellier">
                        Aucun cellier trouvé
                    </div>
                </div>`;

                tableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                tableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-column');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                elTable = document.getElementById('table-body');

                // Injection des données
                tableData = [...listeCelliers];
                injecterDonnees();
            }
        });
}

function construireListeRevisions() {
    let html = `
                <div>
                    <div class="filtre-wrapper">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th><span id="id_usager" class="w3-button table-column">Id de l'usager <i class="caret"></span></th>
                                <th><span id="nom_usager" class="w3-button table-column">Nom de l'usager <i class="caret"></span></th>
                                <th><span id="courriel_usager" class="w3-button table-column">Courriel <i class="caret"></span></th>
                                <th><span id="nom_utilisateur" class="w3-button table-column">Nom d'utilisateur <i class="caret"></span></th>
                                <th><span id="type_usager" class="w3-button table-column">Type d'usager <i class="caret"></span></th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>`;

    lireDonnees('lireAdminRevisions')
        .then(listeRevisions => {
            let elNbTrouve = document.querySelector('.nb-revisions'),
                nbTrouve = listeRevisions.length;

            // Création de la nouvelle table, si il y a des données
            let tableWrapper = document.querySelector('.table-wrapper');
            tableWrapper.innerHTML = "";

            elNbTrouve.innerHTML = nbTrouve;
            elNbTrouve.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-revision">
                        Aucune révision trouvée
                    </div>
                </div>`;

                tableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                tableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-column');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                elTable = document.getElementById('table-body');

                // Injection des données
                tableData = [...listeRevisions];
                injecterDonnees();
            }
        });
}


function construireListeUsagers() {
    let html = `
                <div>
                    <div class="filtre-wrapper">
                        <label for="filtre-table">Commencez à taper pour filtrer la table</label>
                        <input type="text" id="filtre-table" class="filtre-table" placeholder="Rechercher..." title="Commencez à taper">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th><span id="id_usager" class="w3-button table-column">Id de l'usager <i class="caret"></span></th>
                                <th><span id="nom_usager" class="w3-button table-column">Nom de l'usager <i class="caret"></span></th>
                                <th><span id="courriel_usager" class="w3-button table-column">Courriel <i class="caret"></span></th>
                                <th><span id="nom_utilisateur" class="w3-button table-column">Nom d'utilisateur <i class="caret"></span></th>
                                <th><span id="type_usager" class="w3-button table-column">Type d'usager <i class="caret"></span></th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>`;

    lireDonnees('lireAdminUsagers')
        .then(listeUsagers => {
            let elNbTrouve = document.querySelector('.nb-usagers'),
                nbTrouve = listeUsagers.length;

            // Création de la nouvelle table, si il y a des données
            let tableWrapper = document.querySelector('.table-wrapper');
            tableWrapper.innerHTML = "";

            elNbTrouve.innerHTML = nbTrouve;
            elNbTrouve.classList.remove('inconnu');

            if (nbTrouve == 0) {
                let tableVide = `
                <div>
                    <div class="err err-usager">
                        Aucun usager trouvé
                    </div>
                </div>`;

                tableWrapper.insertAdjacentHTML('beforeend', tableVide);
            } else {
                tableWrapper.insertAdjacentHTML('beforeend', html);

                // On ajoute des événements à certains éléments nouvellement créés
                let tableColumns = document.getElementsByClassName('table-column');

                for (let column of tableColumns) {
                    column.addEventListener('click', function (event) {
                        basculerFleche(event);
                    });
                }

                let input = document.getElementById('filtre-table');

                input.addEventListener('keyup', function (event) {
                    filtrerDonnees();
                });

                elTable = document.getElementById('table-body');

                // Injection des données
                tableData = [...listeUsagers];
                injecterDonnees();
            }
        });
}


function effacerFleche() {
    let carets = document.getElementsByClassName('caret');
    for (let caret of carets) {
        caret.className = "caret";
    }
}


function filtrerDonnees() {
    let input = document.getElementById('filtre-table');
    let filter = input.value.toUpperCase();
    let rows = elTable.getElementsByTagName("tr");
    let flag = false;

    for (let row of rows) {
        let cells = row.getElementsByTagName("td");

        for (let cell of cells) {
            if (cell.textContent.toUpperCase().indexOf(filter) > -1) {
                if (filter) {
                    cell.style.backgroundColor = 'yellow';
                } else {
                    cell.style.backgroundColor = '';
                }

                flag = true;
            } else {
                cell.style.backgroundColor = '';
            }
        }

        if (flag) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }

        flag = false;
    }
}


function injecterDonnees() {
    elTable.innerHTML = '';

    for (let data of tableData) {
        let row = elTable.insertRow(-1);

        for (let i = 0, l = Object.keys(data).length; i < l; i++) {
            let elem = row.insertCell(i);
            let donnee = Object.values(data)[i];

            if (donnee.startsWith("http")) {
                donnee = "<a href='" + donnee + "' target='_blank'>" + donnee + "</a>";
            }

            elem.innerHTML = donnee;

        }
    }

    filtrerDonnees();
}


async function lireDonnees(reqNom, reqBody = null) {
    const entete = new Headers();
    entete.append("Content-Type", "application/json");
    entete.append("Accept", "application/json");

    const reqOptions = {
        method: "POST",
        headers: entete
    };

    if (reqBody) {
        reqOptions["body"] = reqBody;
    }

    const requete = new Request($baseUrl_without_parameters + "?requete=" + reqNom, reqOptions);
    const reponse = await fetch(requete);

    if (!reponse.ok) {
        throw new Error(`Erreur HTTP : statut = ${reponse.status}`);
    }

    const data = await reponse.json();
    return data;
}


// Ajoute la classe 'selected' à l'élément courant et l'enlève aux autres
function selectionnerCarte(el) {
    for (let i = 0, l = elCartes.length; i < l; i++) {
        elCartes[i].classList.remove("selected");

    }
    el.classList.add("selected");

}
