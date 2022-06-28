import { orders } from './orders.js';

var $baseUrl_without_parameters = window.location.href.split('?');//[0];
$baseUrl_without_parameters = $baseUrl_without_parameters.length > 0 ? $baseUrl_without_parameters[0] : $baseUrl_without_parameters;

var tableData;
var table = document.getElementById('la-table');
var input = document.getElementById('la-recherche');

const elTableWrapper = document.querySelector('.table-wrapper');
const tbody = document.querySelector('tbody');

// FILTER
// let filterInput = document.querySelector('.filter-input');
// const order = document.querySelectorAll('.order');

// filterInput.addEventListener('keyup', () => {
//     let criteria = filterInput.value.toUpperCase().trim();
//     let j = 0;

//     order.forEach((data) => {
//         thead.style.opacity = '1'
//         err.style.display = '';

//         if (data.innerText.toUpperCase().indexOf(criteria) > -1) {
//             data.style.display = '';
//         } else {
//             data.style.display = 'none';
//             j++;
//             if (j === order.length) {
//                 thead.style.opacity = '0.2'
//                 err.style.display = 'flex';
//             }
//         }
//     });
// });

// function construireTri() {
//     let sortDirection;
//     const elGroupes = document.querySelectorAll('.bte-groupe');
//     const th = document.querySelectorAll('thead th');

//     th.forEach((col, idx) => {
//         col.addEventListener('click', () => {
//             sortDirection = !sortDirection;
//             const rowsArrFromNodeList = Array.from(elGroupes);
//             const filteredRows = rowsArrFromNodeList.filter(item => item.style.display != 'none');

//             filteredRows.sort((a, b) => {
//                 let vraiePos = -1;

//                 for (let i = 0, l = a.childNodes.length; i < l; i++) {
//                     if (a.childNodes[i].nodeType != Node.TEXT_NODE) {
//                         vraiePos++;

//                         if (vraiePos == idx) {
//                             return a.childNodes[i].innerHTML.localeCompare(b.childNodes[i].innerHTML, 'en', { numeric: true, sensitivity: 'base' });
//                         }
//                     }
//                 }
//             }).forEach((row) => {
//                 sortDirection ? tbody.insertBefore(row, tbody.childNodes[tbody.length]) : tbody.insertBefore(row, tbody.childNodes[0]);
//             });

//         });
//     });
// }

function construireGroupeBouteilles() {
    let html = `
                <div>
                    <h2>Les bouteilles</h2>
                    <p>Key in your input to filter the table:</p>
                    <input type="text" id="la-recherche" placeholder="Rechercher..." title="Commencez à taper">

                    <table>
                        <thead>
                            <tr>
                                <th><span id="name" class="w3-button table-column">Name <i class="caret"></span></th>
                                <th><span id="quantity" class="w3-button table-column">Quantity <i class="caret"></span></th>
                                <th><span id="price" class="w3-button table-column">Price <i class="caret"></span></th>
                                <th><span id="expiry" class="w3-button table-column">Expiry Date <i class="caret"></span></th>
                            </tr>
                        </thead>
                        <tbody id="la-table"></tbody>
                    </table>
                </div>`;

    lireDonnees('lireAdminBouteilles')
        .then(listeBouteilles => {
            let tableWrapper = document.getElementsByClassName('table-wrapper');
            tableWrapper.innerHTML = html;


            tableData = [...listeBouteilles];
            populateTable();

            let tableColumns = document.getElementsByClassName('table-column');

            for (let column of tableColumns) {
                column.addEventListener('click', function (event) {
                    toggleArrow(event);
                });
            }

            input.addEventListener('keyup', function (event) {
                filterTable();
            });
        });
}

async function lireDonnees(nomRequete) {
    const entete = new Headers();
    entete.append("Content-Type", "application/json");
    entete.append("Accept", "application/json");

    const reqOptions = {
        method: "POST",
        headers: entete
    };

    const requete = new Request($baseUrl_without_parameters + "?requete=" + nomRequete, reqOptions);
    const reponse = await fetch(requete);

    if (!reponse.ok) {
        throw new Error(`Erreur HTTP : statut = ${reponse.status}`);
    }

    const data = await reponse.json();
    return data;
}

construireGroupeBouteilles();

var caretUpClassName = 'fa fa-caret-up';
var caretDownClassName = 'fa fa-caret-down';

const sort_by = (field, reverse, primer) => {
    const key = primer ?
        function (x) {
            return primer(x[field]);
        } :
        function (x) {
            return x[field];
        };

    reverse = !reverse ? 1 : -1;

    return function (a, b) {
        return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
    };
};


function clearArrow() {
    let carets = document.getElementsByClassName('caret');
    for (let caret of carets) {
        caret.className = "caret";
    }
}


function toggleArrow(event) {
    let element = event.target;
    let caret, field, reverse;
    if (element.tagName === 'SPAN') {
        caret = element.getElementsByClassName('caret')[0];
        field = element.id
    } else {
        caret = element;
        field = element.parentElement.id
    }

    let iconClassName = caret.className;
    clearArrow();
    if (iconClassName.includes(caretUpClassName)) {
        caret.className = `caret ${caretDownClassName}`;
        reverse = false;
    } else {
        reverse = true;
        caret.className = `caret ${caretUpClassName}`;
    }

    tableData.sort(sort_by(field, reverse));
    populateTable();
}


function populateTable() {
    table.innerHTML = '';

    for (let data of tableData) {
        let row = table.insertRow(-1);
        let name = row.insertCell(0);
        name.innerHTML = data.id_bouteille;

        let quantity = row.insertCell(1);
        quantity.innerHTML = data.id_cellier;

        let price = row.insertCell(2);
        price.innerHTML = data.nom_bouteille;

        let expiry = row.insertCell(3);
        expiry.innerHTML = data.url_saq;
    }

    filterTable();
}


function filterTable() {
    let filter = input.value.toUpperCase();
    rows = table.getElementsByTagName("TR");
    let flag = false;

    for (let row of rows) {
        let cells = row.getElementsByTagName("TD");
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
