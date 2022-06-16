<?php
include('./controller/recherche.php');
$oRecherche = new Recherche();

$aAppellations = $oRecherche->lireAppellations();
$aBouteilles = $oRecherche->lireBouteilles();
$aCelliers = $oRecherche->lireCelliers();
$aCepages = $oRecherche->lireCepages();
$aClassifications = $oRecherche->lireClassifications();
$aDegresAlcool = $oRecherche->lireDegreAlcool();
$aDesignations = $oRecherche->lireDesignations();
$aFormats = $oRecherche->lireFormats();
$aGardeJusqua = $oRecherche->lireGardeJusqua();
$aMillesimes = $oRecherche->lireMillesimes();
$aNotes = $oRecherche->lireNotes();
$aRegions = $oRecherche->lireRegions();
$aPays = $oRecherche->lirePays();
$aPrix = $oRecherche->lirePrix();
$aProduitsQc = $oRecherche->lireProduitsQc();
$aOrdresTri = $oRecherche->lireOrdresTri();
$aTauxSucre = $oRecherche->lireTauxDeSucre();
$aTypesVin = $oRecherche->lireTypesVin();
$aTypesCellier = $oRecherche->lireTypesCellier();
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

                        <div class="rechercher-groupe">
                            <!-- Cellier -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-cellier nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Cellier</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="cellier-tous" data-js-cellier-tous data-js-type-tous />
                                                <label class="libelle-tous" for="cellier-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aCelliers); $i < $l; $i++) {
                                                    $id = $aCelliers[$i]['id'];
                                                    $nom = $aCelliers[$i]['nom'];
                                                    $titre = $aCelliers[$i]['nom'];
                                                    $nomChamp = "cellier-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-cellier="' . $id . '" />
                                                            <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Type de cellier -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-type-cellier nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Type de cellier</div>
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
                                                <?php for ($i = 0, $l = count($aTypesCellier); $i < $l; $i++) {
                                                    $id = $aTypesCellier[$i]['id'];
                                                    $nom = $aTypesCellier[$i]['nom'];
                                                    $titre = $aTypesCellier[$i]['nom'];
                                                    $nbTrouve = $aTypesCellier[$i]['nbTrouve'];
                                                    $nomChamp = "type-cellier-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-type-cellier="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Bouteille -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-bouteille nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Bouteille</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="bouteille-tous" data-js-bouteille-tous data-js-type-tous />
                                                <label class="libelle-tous" for="bouteille-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aBouteilles); $i < $l; $i++) {
                                                    $id = $i + 1;
                                                    $nom = $aBouteilles[$i]['nom'];
                                                    $titre = $aBouteilles[$i]['nom'];
                                                    $nbTrouve = $aBouteilles[$i]['nbTrouve'];
                                                    $nomChamp = 'bouteille-' . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-bouteille="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Type de vin -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-type-vin nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Type de vin</div>
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
                                                <?php for ($i = 0, $l = count($aTypesVin); $i < $l; $i++) {
                                                    $id = $aTypesVin[$i]['id'];
                                                    $nom = $aTypesVin[$i]['nom'];
                                                    $nbTrouve = $aTypesVin[$i]['nbTrouve'];
                                                    $nomChamp = "type-vin-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-type-vin="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Pays -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-pays nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Pays</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="pays-tous" data-js-pays-tous data-js-type-tous />
                                                <label class="libelle-tous" for="pays-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aPays); $i < $l; $i++) {
                                                    $id = $aPays[$i]['id'];
                                                    $nom = $aPays[$i]['nom'];
                                                    $titre = $aPays[$i]['nom'];
                                                    $nbTrouve = $aPays[$i]['nbTrouve'];
                                                    $nomChamp = "pays-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-pays="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Région -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-region nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Region</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="region-tous" data-js-region-tous data-js-type-tous />
                                                <label class="libelle-tous" for="region-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aRegions); $i < $l; $i++) {
                                                    $id = $aRegions[$i]['id'];
                                                    $nom = $aRegions[$i]['nom'];
                                                    $titre = $aRegions[$i]['nom'];
                                                    $nbTrouve = $aRegions[$i]['nbTrouve'];
                                                    $nomChamp = "region-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-region="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Prix -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-prix nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Prix</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="prix-tous" data-js-prix-tous data-js-type-tous />
                                                <label class="libelle-tous" for="prix-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aPrix); $i < $l; $i++) {
                                                    $id = $i;
                                                    $nom = $aPrix[$i]['prix'];
                                                    $titre = $aPrix[$i]['prix'];
                                                    $nbTrouve = $aPrix[$i]['nbTrouve'];
                                                    $nomChamp = "prix-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-prix="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Format de la bouteille -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-format nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Format</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="format-tous" data-js-format-tous data-js-type-tous />
                                                <label class="libelle-tous" for="format-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aFormats); $i < $l; $i++) {
                                                    $id = $aFormats[$i]['id'];
                                                    $nom = $aFormats[$i]['nom'];
                                                    $titre = $aFormats[$i]['nom'];
                                                    $nbTrouve = $aFormats[$i]['nbTrouve'];
                                                    $nomChamp = "format-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-format="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Quantité -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="accordeon-icon hide">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z" />
                                        </svg>
                                    </div>
                                    <div>Quantité</div>
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

                            <!-- Millésime -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-millesime nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Millésime</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="millesime-tous" data-js-millesime-tous data-js-type-tous />
                                                <label class="libelle-tous" for="millesime-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aMillesimes); $i < $l; $i++) {
                                                    $id = $i;
                                                    $nom = $aMillesimes[$i]['millesime'];
                                                    $titre = $aMillesimes[$i]['millesime'];
                                                    $nbTrouve = $aMillesimes[$i]['nbTrouve'];
                                                    $nomChamp = "millesime-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-millesime="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-note nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Note</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="note-tous" data-js-note-tous data-js-type-tous />
                                                <label class="libelle-tous" for="note-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aNotes); $i < $l; $i++) {
                                                    $id = $i;
                                                    $nom = $aNotes[$i]['note'] . " étoiles";
                                                    $titre = $aNotes[$i]['note'];
                                                    $nbTrouve = $aNotes[$i]['nbTrouve'];
                                                    $nomChamp = "note-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-note="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Garder jusqu'à -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-garde-jusqua nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Garder jusqu'à</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="garde-jusqua-tous" data-js-garde-jusqua-tous data-js-type-tous />
                                                <label class="libelle-tous" for="garde-jusqua-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aGardeJusqua); $i < $l; $i++) {
                                                    $id = $i;
                                                    $nom = $aGardeJusqua[$i]['garde_jusqua'];
                                                    $titre = $aGardeJusqua[$i]['garde_jusqua'];
                                                    $nbTrouve = $aGardeJusqua[$i]['nbTrouve'];
                                                    $nomChamp = "garde-jusqua-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-garde-jusqua="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Produit du Québec -->
                            <div class="rechercher-item">
                                <?php if (!$aProduitsQc) { ?>
                                    <div class="non-trouve">
                                        <p>Aucun produit du Québec trouvé</p>
                                    </div>

                                <?php } else { ?>
                                    <button class="accordeon accordeon-flex">
                                        <div class="nb-produit-qc nb-selectionnes"><span class="nb-selections hide"></span></div>
                                        <div>Produit du Québec</div>
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
                                                    <?php for ($i = 0, $l = count($aProduitsQc); $i < $l; $i++) {
                                                        $id = $aProduitsQc[$i]['id'];
                                                        $nom = $aProduitsQc[$i]['nom'];
                                                        $nbTrouve = $aProduitsQc[$i]['nbTrouve'];
                                                        $nomChamp = "produit-qc-" . $id;

                                                        echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-produit-qc="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                    } ?>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Appellation -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-appellation nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Appellation</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="appellation-tous" data-js-appellation-tous data-js-type-tous />
                                                <label class="libelle-tous" for="appellation-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aAppellations); $i < $l; $i++) {
                                                    $id = $aAppellations[$i]['id'];
                                                    $nom = $aAppellations[$i]['nom'];
                                                    $titre = $aAppellations[$i]['nom'];
                                                    $nbTrouve = $aAppellations[$i]['nbTrouve'];
                                                    $nomChamp = "appellation-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-appellation="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Cépage -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-cepage nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Cepage</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="cepage-tous" data-js-cepage-tous data-js-type-tous />
                                                <label class="libelle-tous" for="cepage-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aCepages); $i < $l; $i++) {
                                                    $id = $aCepages[$i]['id'];
                                                    $nom = $aCepages[$i]['nom'];
                                                    $titre = $aCepages[$i]['nom'];
                                                    $nbTrouve = $aCepages[$i]['nbTrouve'];
                                                    $nomChamp = "cepage-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-cepage="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Classification -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-classification nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Classification</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="classification-tous" data-js-classification-tous data-js-type-tous />
                                                <label class="libelle-tous" for="classification-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aClassifications); $i < $l; $i++) {
                                                    $id = $aClassifications[$i]['id'];
                                                    $nom = $aClassifications[$i]['nom'];
                                                    $titre = $aClassifications[$i]['nom'];
                                                    $nbTrouve = $aClassifications[$i]['nbTrouve'];
                                                    $nomChamp = "classification-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-classification="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Désignation -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-designation nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Designation</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="designation-tous" data-js-designation-tous data-js-type-tous />
                                                <label class="libelle-tous" for="designation-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aDesignations); $i < $l; $i++) {
                                                    $id = $aDesignations[$i]['id'];
                                                    $nom = $aDesignations[$i]['nom'];
                                                    $titre = $aDesignations[$i]['nom'];
                                                    $nbTrouve = $aDesignations[$i]['nbTrouve'];
                                                    $nomChamp = "designation-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-designation="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Taux de sucre -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-taux-sucre nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Taux de sucre</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="taux-sucre-tous" data-js-taux-sucre-tous data-js-type-tous />
                                                <label class="libelle-tous" for="taux-sucre-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aTauxSucre); $i < $l; $i++) {
                                                    $id = $aTauxSucre[$i]['id'];
                                                    $nom = $aTauxSucre[$i]['nom'];
                                                    $titre = $aTauxSucre[$i]['nom'];
                                                    $nbTrouve = $aTauxSucre[$i]['nbTrouve'];
                                                    $nomChamp = "taux-sucre-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-taux-sucre="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Degré d'alcool -->
                            <div class="rechercher-item">
                                <button class="accordeon accordeon-flex">
                                    <div class="nb-degre-alcool nb-selectionnes"><span class="nb-selections hide"></span></div>
                                    <div>Degré d'alcool</div>
                                </button>

                                <div class="acc-container">
                                    <div class="filtre-listbox">
                                        <div class="filtre-entete">
                                            <div class="filtre-entete-checkbox">
                                                <input type="checkbox" id="degre-alcool-tous" data-js-degre-alcool-tous data-js-type-tous />
                                                <label class="libelle-tous" for="degre-alcool-tous">Tous</label>
                                            </div>
                                        </div>

                                        <fieldset>
                                            <div class="liste-choix">
                                                <?php for ($i = 0, $l = count($aDegresAlcool); $i < $l; $i++) {
                                                    $id = $aDegresAlcool[$i]['id'];
                                                    $nom = $aDegresAlcool[$i]['nom'];
                                                    $titre = $aDegresAlcool[$i]['nom'];
                                                    $nbTrouve = $aDegresAlcool[$i]['nbTrouve'];
                                                    $nomChamp = "degre-alcool-" . $id;

                                                    echo '
                                                        <div class="choix-item">
                                                            <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" title="' . $titre . '" data-js-degre-alcool="' . $id . '" />

                                                            <div class="choix-nom">
                                                                <label for="' . $nomChamp . '" title="' . $titre . '">' .  $nom . '</label>
                                                                <div class="choix-nb-trouve">
                                                                    (' . $nbTrouve . ')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                } ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resultats">
                <div class="resultat-total">Résultats 1-12 sur 3790</div>
                <div class="qte-affichage-wrapper">
                    <label class="qte-affichage-label" for="qte-affichage-options">
                        <span>Afficher</span>
                    </label>
                    <div class="qte-affichage-container select-container">
                        <select id="qte-affichage-options" class="qte-affichage-options">
                            <option value="12"> 12 </option>
                            <option value="12"> 12 </option>
                            <option value="24"> 24 </option>
                            <option value="48"> 48 </option>
                        </select>
                    </div>
                    <div class="qte-affichage-text">
                        <span class="qte-affichage-text">par page</span>
                    </div>
                </div>
            </div>
            <div class="tri-select-wrapper">
                <div>Triée par:</div>
                <div class="tri-container select-container">
                    <select id="tri-select" class="tri-select-options">
                        <?php for ($i = 0, $l = count($aOrdresTri); $i < $l; $i++) {
                            $id = $aOrdresTri[$i]['id'];
                            $nom = $aOrdresTri[$i]['nom'];
                            $champ = $aOrdresTri[$i]['champ'];
                            $ordre = $aOrdresTri[$i]['ordre'];

                            echo '
                                <option value="' . $id . '" data-js-champ="' . $champ . '" data-js-ordre="' . $ordre . '">' . $nom . '</option>
                            ';
                        } ?>
                    </select>
                </div>
                <button class="bouton bouton-primaire" title="Lancer le tri">Trier</button>
            </div>
        </div>
    </section>
</body>

</html>