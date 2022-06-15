<?php
include('./controller/recherche.php');
$oRecherche = new Recherche();

$lesAppellations = $oRecherche->lireLesAppellations();
$lesBouteilles = $oRecherche->lireLesBouteilles();
$lesCelliers = $oRecherche->lireLesCelliers();
$lesCepages = $oRecherche->lireLesCepages();
$lesClassifications = $oRecherche->lireLesClassifications();
$lesDesignations = $oRecherche->lireLesDesignations();
$lesRegions = $oRecherche->lireLesRegions();
$lesPays = $oRecherche->lireLesPays();
$lesProduitDuQc = $oRecherche->lireLesProduitDuQc();
$lesTypeDeVin = $oRecherche->lireLesTypeDeVin();
$lesTypeDeCellier = $oRecherche->lireLesTypeDeCellier();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de bouteilles</title>
    <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        var aAppellation = <?php echo json_encode($lesAppellations); ?>;
        var aBouteille = <?php echo json_encode($lesBouteilles); ?>;
        var aCepage = <?php echo json_encode($lesCepages); ?>;
        var aClassification = <?php echo json_encode($lesClassifications); ?>;
        var aDesignation = <?php echo json_encode($lesDesignations); ?>;
        var aPays = <?php echo json_encode($lesPays); ?>;
        var aRegion = <?php echo json_encode($lesRegions); ?>;
    </script>

    <script src="./js/recherche.js" defer></script>
</head>

<body>
    <section class="section-wrapper">
        <div class="barre-tri">
            <div class="burger-rechercher">
                <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                <label for="openSidebarMenu" class="sidebarIconToggle" title="ouvrir/fermer le menu de recherche">
                    <div class="spinner diagonal part-1"></div>
                    <div class="spinner horizontal"></div>
                    <div class="spinner diagonal part-2"></div>
                </label>
                <div id="sidebarMenu">
                    <div class="recherche-wrapper">
                        <div class="rechercher-action">
                            <button class="bouton bouton-primaire" title="Lancer la recherche">Rechercher</button>
                            <button class="bouton bouton-secondaire" data-js-reinit title="Vider tous les champs">Réinitialiser</button>
                        </div>

                        <div class="rechercher-detail">
                            <button class="accordeon accordeon-flex">
                                <div class="nb-mes-celliers nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Mes celliers</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-listbox">
                                    <div class="filtre-entete">
                                        <div class="filtre-entete-checkbox">
                                            <input type="checkbox" id="mes-celliers-tous" data-js-mes-celliers-tous data-js-type-tous />
                                            <label class="libelle-tous" for="mes-celliers-tous">Tous</label>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <div class="liste-choix">
                                            <?php for ($i = 0, $l = count($lesCelliers); $i < $l; $i++) {
                                                $id = $lesCelliers[$i]['id'];
                                                $nom = $lesCelliers[$i]['nom'];
                                                $titre = $lesCelliers[$i]['description'];
                                                $nomChamp = "mes-celliers-" . $id;

                                                echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-mes-celliers="' . $id . '" />
                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                            </div>
                        ';
                                            } ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-bouteille nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Bouteilles</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="bouteille-container choix-container hide">
                                        <div class="bouteille-groupe choix-groupe"></div>
                                    </div>
                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="bouteille" type="text" name="bouteille" data-js-bouteille placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-bouteille>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-pays nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Pays</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="pays-container choix-container hide">
                                        <div class="pays-groupe choix-groupe"></div>
                                    </div>
                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="pays" type="text" name="pays" data-js-pays placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-pays>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-region nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Régions</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="region-container choix-container hide">
                                        <div class="region-groupe choix-groupe"></div>
                                    </div>
                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input id="region" type="text" name="region" data-js-region placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter" data-js-ajouter-region>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-appellation nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Appellations</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="appellation-container choix-container hide">
                                        <div class="appellation-groupe choix-groupe"></div>
                                    </div>
                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="appellation" type="text" name="appellation" data-js-appellation placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-appellation>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-cepage nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Cépages</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="cepage-container choix-container hide">
                                        <div class="cepage-groupe choix-groupe"></div>
                                    </div>

                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="cepage" type="text" name="cepage" data-js-cepage placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-cepage>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-classification nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Classifications</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="classification-container choix-container hide">
                                        <div class="classification-groupe choix-groupe"></div>
                                    </div>

                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="classification" type="text" name="classification" data-js-classification placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-classification>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-designation nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Désignations</div>
                            </button>
                            <div class="acc-container" data-js-hauteur="77">
                                <div class="filtre-autocomplete">
                                    <div class="designation-container choix-container hide">
                                        <div class="designation-groupe choix-groupe"></div>
                                    </div>

                                    <form autocomplete="off" action="/action_page.php">
                                        <div class="autocomplete disabled">
                                            <input class="item-desc" id="designation" type="text" name="designation" data-js-designation placeholder="Commencez à taper" />
                                            <div class="item-action">
                                                <button class="btn-ajouter disabled" data-js-ajouter-designation>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-type-vin nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Types de vin</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-listbox">
                                    <div class="filtre-entete">
                                        <div class="filtre-entete-checkbox">
                                            <input type="checkbox" id="type-vin-tous" data-js-type-vin-tous data-js-type-tous />
                                            <label class="libelle-tous" for="type-vin-tous">Tous</label>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <div class="liste-choix">
                                            <?php for ($i = 0, $l = count($lesTypeDeVin); $i < $l; $i++) {
                                                $id = $lesTypeDeVin[$i]['id'];
                                                $nom = $lesTypeDeVin[$i]['nom'];
                                                $nomChamp = "type-vin-" . $id;

                                                echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-type-vin="' . $id . '" />
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                                            } ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-type-cellier nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Types de cellier</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-listbox">
                                    <div class="filtre-entete">
                                        <div class="filtre-entete-checkbox">
                                            <input type="checkbox" id="type-cellier-tous" data-js-type-cellier-tous data-js-type-tous />
                                            <label class="libelle-tous" for="type-cellier-tous">Tous</label>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <div class="liste-choix">
                                            <?php for ($i = 0, $l = count($lesTypeDeCellier); $i < $l; $i++) {
                                                $id = $lesTypeDeCellier[$i]['id_type_cellier'];
                                                $nom = $lesTypeDeCellier[$i]['nom_type_cellier'];
                                                $nomChamp = "type-cellier-" . $id;

                                                echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-type-cellier="' . $id . '" />
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                                            } ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="nb-produit-qc nb-selectionnes"><span class="nb-selections hide"></span></div>
                                <div>Produits du Québec</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-listbox">
                                    <div class="filtre-entete">
                                        <div class="filtre-entete-checkbox">
                                            <input type="checkbox" id="produit-qc-tous" data-js-produit-qc-tous data-js-type-tous />
                                            <label class="libelle-tous" for="produit-qc-tous">Tous</label>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <div class="liste-choix">
                                            <?php for ($i = 0, $l = count($lesProduitDuQc); $i < $l; $i++) {
                                                $id = $lesProduitDuQc[$i]['id'];
                                                $nom = $lesProduitDuQc[$i]['nom'];
                                                $nomChamp = "produit-qc-" . $id;

                                                echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-produit-qc="' . $id . '" />
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                                            } ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="accordeon-icon hide">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z" />
                                    </svg>
                                </div>
                                <div>Format de la bouteille</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-slider">
                                    <div class="slider-container">
                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="format_val_min">Min: </label>
                                                <input class="slider-input" type="number" min="0" name="format_val_min" id="format_val_min" data-js-slider-input data-js-format-val-min>
                                            </div>
                                            <div id="format-unite">
                                                <span>ml</span>
                                            </div>
                                            <div class="slider-item">
                                                <input type="radio" name="format_min" id="format_min_1" value="0" required>
                                                <label for="format_min_1" data-slider-value="0"></label>
                                                <input type="radio" name="format_min" id="format_min_2" value="375" required>
                                                <label for="format_min_2" data-slider-value="375"></label>
                                                <input type="radio" name="format_min" id="format_min_3" value="750" required>
                                                <label for="format_min_3" data-slider-value="750"></label>
                                                <input type="radio" name="format_min" id="format_min_4" value="1000" required>
                                                <label for="format_min_4" data-slider-value="1000"></label>
                                                <input type="radio" name="format_min" id="format_min_5" value="3000" required>
                                                <label for="format_min_5" data-slider-value="3000"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>

                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="format_val_max">Max: </label>
                                                <input class="slider-input" type="number" min="0" name="format_val_max" id="format_val_max" data-js-slider-input data-js-format-val-max>
                                            </div>
                                            <div id="format-unite">
                                                <span>ml</span>
                                            </div>
                                            <div class="slider-item">
                                                <input type="radio" name="format_max" id="format_max_1" value="0" required>
                                                <label for="format_max_1" data-slider-value="0"></label>
                                                <input type="radio" name="format_max" id="format_max_2" value="375" required>
                                                <label for="format_max_2" data-slider-value="375"></label>
                                                <input type="radio" name="format_max" id="format_max_3" value="750" required>
                                                <label for="format_max_3" data-slider-value="750"></label>
                                                <input type="radio" name="format_max" id="format_max_4" value="1000" required>
                                                <label for="format_max_4" data-slider-value="1000"></label>
                                                <input type="radio" name="format_max" id="format_max_5" value="3000" required>
                                                <label for="format_max_5" data-slider-value="3000"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="accordeon-icon hide">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z" />
                                    </svg>
                                </div>
                                <div>Taux de sucre</div>
                            </button>

                            <div class="acc-container">
                                <div class="filtre-slider">
                                    <div class="slider-container">
                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="ts_val_min">Min: </label>
                                                <input class="slider-input" type="number" min="0" name="ts_val_min" id="ts_val_min" data-js-slider-input data-js-ts-val-min>
                                            </div>
                                            <div id="ts-unite">
                                                <span>g/L</span>
                                            </div>
                                            <div class="slider-item slider-item-ts-min">
                                                <input type="radio" class="ts-min" name="ts_min" id="ts_min_1" value="0" required>
                                                <label for="ts_min_1" data-slider-value="0"></label>
                                                <input type="radio" class="ts-min" name="ts_min" id="ts_min_2" value="1.5" required>
                                                <label for="ts_min_2" data-slider-value="1.5"></label>
                                                <input type="radio" class="ts-min" name="ts_min" id="ts_min_3" value="3" required>
                                                <label for="ts_min_3" data-slider-value="3"></label>
                                                <input type="radio" class="ts-min" name="ts_min" id="ts_min_4" value="10" required>
                                                <label for="ts_min_4" data-slider-value="10"></label>
                                                <input type="radio" class="ts-min" name="ts_min" id="ts_min_5" value="25" required>
                                                <label for="ts_min_5" data-slider-value="25"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>

                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="ts_val_max">Max: </label>
                                                <input class="slider-input" type="number" min="0" name="ts_val_max" id="ts_val_max" data-js-slider-input data-js-ts-val-max>
                                            </div>
                                            <div id="ts-unite">
                                                <span>g/L</span>
                                            </div>
                                            <div class="slider-item">
                                                <input type="radio" name="ts_max" id="ts_max_1" value="0" required>
                                                <label for="ts_max_1" data-slider-value="0"></label>
                                                <input type="radio" name="ts_max" id="ts_max_2" value="1.5" required>
                                                <label for="ts_max_2" data-slider-value="1.5"></label>
                                                <input type="radio" name="ts_max" id="ts_max_3" value="3" required>
                                                <label for="ts_max_3" data-slider-value="3"></label>
                                                <input type="radio" name="ts_max" id="ts_max_4" value="10" required>
                                                <label for="ts_max_4" data-slider-value="10"></label>
                                                <input type="radio" name="ts_max" id="ts_max_5" value="25" required>
                                                <label for="ts_max_5" data-slider-value="25"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="accordeon accordeon-flex">
                                <div class="accordeon-icon hide">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z" />
                                    </svg>
                                </div>
                                <div>Degré d'alcool</div>
                            </button>
                            <div class="acc-container">
                                <div class="filtre-slider">
                                    <div class="slider-container">
                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="da_val_min">Min: </label>
                                                <input class="slider-input" type="number" min="0" name="da_val_min" id="da_val_min" data-js-slider-input data-js-da-val-min>
                                            </div>
                                            <div id="da-unite">
                                                <span>%</span>
                                            </div>
                                            <div class="slider-item">
                                                <input type="radio" name="da_min" id="da_min_1" value="0" required>
                                                <label for="da_min_1" data-slider-value="0"></label>
                                                <input type="radio" name="da_min" id="da_min_2" value="10" required>
                                                <label for="da_min_2" data-slider-value="10"></label>
                                                <input type="radio" name="da_min" id="da_min_3" value="12" required>
                                                <label for="da_min_3" data-slider-value="12"></label>
                                                <input type="radio" name="da_min" id="da_min_4" value="14" required>
                                                <label for="da_min_4" data-slider-value="14"></label>
                                                <input type="radio" name="da_min" id="da_min_5" value="16" required>
                                                <label for="da_min_5" data-slider-value="16"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>

                                        <div class="slider-groupe">
                                            <div class="slider-input-container">
                                                <label for="da_val_max">Max: </label>
                                                <input class="slider-input" type="number" min="0" name="da_val_max" id="da_val_max" data-js-slider-input data-js-da-val-max>
                                            </div>
                                            <div id="da-unite">
                                                <span>%</span>
                                            </div>
                                            <div class="slider-item">
                                                <input type="radio" name="da_max" id="da_max_1" value="0" required>
                                                <label for="da_max_1" data-slider-value="0"></label>
                                                <input type="radio" name="da_max" id="da_max_2" value="10" required>
                                                <label for="da_max_2" data-slider-value="10"></label>
                                                <input type="radio" name="da_max" id="da_max_3" value="12" required>
                                                <label for="da_max_3" data-slider-value="12"></label>
                                                <input type="radio" name="da_max" id="da_max_4" value="14" required>
                                                <label for="da_max_4" data-slider-value="14"></label>
                                                <input type="radio" name="da_max" id="da_max_5" value="16" required>
                                                <label for="da_max_5" data-slider-value="16"></label>
                                                <div class="slider-pos"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resultats">
                <div class="resultat-total">Résultats 1-12 sur 3790</div>
                <div class="limiter-wrapper">
                    <label class="limiter-label" for="limiter-options">
                        <span>Afficher</span>
                    </label>
                    <div class="limiter-container select-container">
                        <select id="limiter-options" class="limiter-options">
                            <option value="12"> 12 </option>
                            <option value="12"> 12 </option>
                            <option value="24"> 24 </option>
                            <option value="48"> 48 </option>
                        </select>
                    </div>
                    <div class="limiter-text">
                        <span class="limiter-text">par page</span>
                    </div>
                </div>
            </div>
            <div class="tri-select-wrapper">
                <div>Triée par:</div>
                <div class="tri-container select-container">
                    <select id="tri-select" class="tri-select-options">
                        <option value="nom_asc" selected="selected">Nom de la bouteille (croissant)</option>
                        <option value="nom_asc">Nom de la bouteille (croissant)</option>
                        <option value="nom_desc">Nom de la bouteille (décroissant)</option>
                        <option value="data_achat_asc">Date d'achat (croissant)</option>
                        <option value="data_achat_desc">Date d'achat (décroissant)</option>
                        <option value="prix_asc">Prix (croissant)</option>
                        <option value="prix_desc">Prix (décroissant)</option>
                        <option value="prix_asc">Cote (croissant)</option>
                        <option value="prix_desc">Cote (décroissant)</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
</body>

</html>