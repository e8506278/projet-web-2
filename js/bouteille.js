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

var $baseUrl_without_parameters =  window.location.href.split('?');//[0];
$baseUrl_without_parameters = $baseUrl_without_parameters.length>0 ? $baseUrl_without_parameters[0] : $baseUrl_without_parameters;

let etatModification = true;
console.log('hello bouteille', etatModification);
window.addEventListener('load', function () {
    console.log("load bouteille.js");

    /*AJOUT D'UN BOUTEILLE*/
    const selectBouteilleInput = document.querySelector('[data-js-bouteille-select]');
    if(selectBouteilleInput){
        selectBouteilleInput.addEventListener('input', (e) => {
            console.log('selectBouteilleInput', e.target.value);

            const requete = new Request($baseUrl_without_parameters + "index.php?requete=getBouteille", { method: 'POST', body: JSON.stringify({nom:  e.target.value}) });
            fetch(requete)
                .then(response => {
                    // if (response.status === 200) {
                    //     console.log('got result', response.json());
                    // }
                    return response.json();
                }).then(function (data) {
                console.log('data', data);
                Object.keys(data).forEach(key => {

                    if(key === 'image_bouteille'){
                        const image_bouteille = document.getElementById(key);
                        if(data['image_bouteille']){
                            image_bouteille.src = data['image_bouteille'];
                        }else if( data['image_url'] ){
                            image_bouteille.src = data['image_url'];
                        }else {
                            image_bouteille.src = $baseUrl_without_parameters+'/assets/img/default_bouteille.png';
                        }
                    }
                    const elements = document.getElementsByName(key);
                    if( elements && elements.length>0){
                        elements[0].value = data[key];
                    }else{
                        console.log('not found inn form', key);
                    }
                });
            });
        })
    }

    /*AJOUT D'UN CELLIER*/

    // Swicher entre les vue selon si c'est modification ou bien just le mode view
    // document.querySelectorAll(".input-state").forEach(element => {
    //     element.style.display = "none";
    // });

    submit_btns = document.getElementById("submit_btns");
    if(submit_btns){
        submit_btns.style.display = 'none';
    }

    document.getElementById('ouvrirFormulaire').addEventListener('click', function (e){
        etatModification  = true;
        document.querySelectorAll(".input-state").forEach(element => {
            element.style.display = "block";
        });
        document.querySelectorAll(".label-state").forEach(element => {
            element.style.display = "none";
        });
        modifier_bouton = document.getElementById("ouvrirFormulaire");
        if(modifier_bouton){
            modifier_bouton.style.display = "none";
        }

        if(submit_btns){
            submit_btns.style.display = 'unset';
        }
    });

    document.getElementById('fermerFormulaire').addEventListener('click', function (e){
        etatModification = false;
        document.querySelectorAll(".input-state").forEach(element => {
            element.style.display = "none";
        });
        document.querySelectorAll(".label-state").forEach(element => {
            element.style.display = "block";
        });
        modifier_bouton = document.getElementById("ouvrirFormulaire");
        if(modifier_bouton){
            modifier_bouton.style.display = 'unset';
        }
        if(submit_btns){
            submit_btns.style.display = 'none';
        }
    });
});
