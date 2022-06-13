<?php
include('./controller/recherche.php');
$oRecherche = new Recherche();

$lesAppellations = $oRecherche->lireLesAppellations();
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
        var aCepage = <?php echo json_encode($lesCepages); ?>;
        var aClassification = <?php echo json_encode($lesClassifications); ?>;
        var aDesignation = <?php echo json_encode($lesDesignations); ?>;
        var aRegion = <?php echo json_encode($lesRegions); ?>;
        var aPays = <?php echo json_encode($lesPays); ?>;
    </script>

    <script src="./js/recherche.js" defer></script>
</head>

<body>
    <section class="section-wrapper carte carte--bg-couleur">
        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Pays sélectionnés : <span class="nb-pays">0</span></p>
            </div>
            <div class="pays-container choix-container hide">
                <div class="pays-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input class="item-desc" id="pays" type="text" name="pays" data-js-pays placeholder="Commencez à taper">
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

        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Régions sélectionnées : <span class="nb-region">0</span></p>
            </div>
            <div class="region-container choix-container hide">
                <div class="region-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input id="region" type="text" name="region" data-js-region placeholder="Commencez à taper">
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

        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Appellations sélectionnées : <span class="nb-appellation">0</span></p>
            </div>
            <div class="appellation-container choix-container hide">
                <div class="appellation-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input class="item-desc" id="appellation" type="text" name="appellation" data-js-appellation placeholder="Commencez à taper">
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

        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Cépages sélectionnés : <span class="nb-cepage">0</span></p>
            </div>
            <div class="cepage-container choix-container hide">
                <div class="cepage-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input class="item-desc" id="cepage" type="text" name="cepage" data-js-cepage placeholder="Commencez à taper">
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

        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Classifications sélectionnées : <span class="nb-classification">0</span></p>
            </div>
            <div class="classification-container choix-container hide">
                <div class="classification-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input class="item-desc" id="classification" type="text" name="classification" data-js-classification placeholder="Commencez à taper">
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

        <div class="filtre-autocomplete">
            <div class="nb-total-container">
                <p>Désignations sélectionnées : <span class="nb-designation">0</span></p>
            </div>
            <div class="designation-container choix-container hide">
                <div class="designation-groupe choix-groupe"></div>
            </div>
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete disabled">
                    <input class="item-desc" id="designation" type="text" name="designation" data-js-designation placeholder="Commencez à taper">
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

        <div class="filtre-listbox">
            <div class="nb-total-container">
                <p>Types de vin sélectionnés : <span class="nb-type-vin">0</span></p>
            </div>

            <fieldset>
                <div class="liste-choix">
                    <?php for ($i = 0, $l = count($lesTypeDeVin); $i < $l; $i++) {
                        $id = $lesTypeDeVin[$i]['id'];
                        $nom = $lesTypeDeVin[$i]['nom'];
                        $nomChamp = "type-vin-" . $id;

                        echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-type-vin="' . $id . '">
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                    } ?>
                </div>
            </fieldset>
        </div>

        <div class="filtre-listbox">
            <div class="nb-total-container">
                <p>Types de cellier sélectionnés : <span class="nb-type-cellier">0</span></p>
            </div>

            <fieldset>
                <div class="liste-choix">
                    <?php for ($i = 0, $l = count($lesTypeDeCellier); $i < $l; $i++) {
                        $id = $lesTypeDeCellier[$i]['id_type_cellier'];
                        $nom = $lesTypeDeCellier[$i]['nom_type_cellier'];
                        $nomChamp = "type-cellier-" . $id;

                        echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-type-cellier="' . $id . '">
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                    } ?>
                </div>
            </fieldset>
        </div>

        <div class="filtre-listbox">
            <div class="nb-total-container">
                <p>Produits du Québec sélectionnés : <span class="nb-produit-qc">0</span></p>
            </div>

            <fieldset>
                <div class="liste-choix">
                    <?php for ($i = 0, $l = count($lesProduitDuQc); $i < $l; $i++) {
                        $id = $lesProduitDuQc[$i]['id'];
                        $nom = $lesProduitDuQc[$i]['nom'];
                        $nomChamp = "produit-qc-" . $id;

                        echo '
                            <div class="choix-item">
                                <input name="' . $nomChamp . '" type="checkbox" id="' . $nomChamp . '" data-js-produit-qc="' . $id . '">
                                <label for="' . $nomChamp . '">' .  $nom . '</label>
                            </div>
                        ';
                    } ?>
                </div>
            </fieldset>
        </div>

        <div class="filtre-slider">
            <div class="slider-container">
                <div class="slider-groupe">
                    <div class="slider-input-container">
                        <label for="taux_sucre_min">Min: </label>
                        <input class="slider-input" type="text" name="taux_sucre_min" id="taux_sucre_min" data-js-taux-sucre-min>
                    </div>
                    <div id="taux-de-sucre-unite">
                        <span>g/L</span>
                    </div>
                    <div class="slider-item">
                        <input type="radio" name="taux-de-sucre-min" id="1" value="0" required>
                        <label for="1" data-taux-de-sucre-min="0"></label>
                        <input type="radio" name="taux-de-sucre-min" id="2" value="25" required>
                        <label for="2" data-taux-de-sucre-min="25"></label>
                        <input type="radio" name="taux-de-sucre-min" id="3" value="50" required>
                        <label for="3" data-taux-de-sucre-min="50"></label>
                        <input type="radio" name="taux-de-sucre-min" id="4" value="75" required>
                        <label for="4" data-taux-de-sucre-min="75"></label>
                        <input type="radio" name="taux-de-sucre-min" id="5" value="100" required>
                        <label for="5" data-taux-de-sucre-min="100"></label>
                        <div id="taux-de-sucre-min-pos"></div>
                    </div>
                </div>

                <div class="slider-groupe">
                    <div class="slider-input-container">
                        <label for="taux_sucre_max">Max: </label>
                        <input class="slider-input" type="text" name="taux_sucre_max" id="taux_sucre_max" data-js-taux-sucre-max>
                    </div>
                    <div id="taux-de-sucre-unite">
                        <span>g/L</span>
                    </div>
                    <div class="slider-item">
                        <input type="radio" name="taux-de-sucre-max" id="1" value="0" required>
                        <label for="1" data-taux-de-sucre-max="0"></label>
                        <input type="radio" name="taux-de-sucre-max" id="2" value="25" required>
                        <label for="2" data-taux-de-sucre-max="25"></label>
                        <input type="radio" name="taux-de-sucre-max" id="3" value="50" required>
                        <label for="3" data-taux-de-sucre-max="50"></label>
                        <input type="radio" name="taux-de-sucre-max" id="4" value="75" required>
                        <label for="4" data-taux-de-sucre-max="75"></label>
                        <input type="radio" name="taux-de-sucre-max" id="5" value="100" required>
                        <label for="5" data-taux-de-sucre-max="100"></label>
                        <div id="taux-de-sucre-max-pos"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>