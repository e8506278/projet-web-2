<?php
$oVino = new Vino();

if (isset($id) && $id > 0) {
    $bte = new Bouteille();
    $aBouteilles = $bte->getAdminUneBouteille($id);

    if (isset($aBouteilles)) {
        $usagerBouteille = $aBouteilles[0];
    }
}

$vinoAppellations = $oVino->lireAppellations();
// $vinoBouteilles = $oVino->lireBouteilles();
$vinoCepages = $oVino->lireCepages();
$vinoClassifications = $oVino->lireClassifications();
$vinoDegresAlcool = $oVino->lireDegresAlcool();
$vinoDesignations = $oVino->lireDesignations();
$vinoFormats = $oVino->lireFormats();
$vinoPays = $oVino->lirePays();
$vinoProduitsQc = $oVino->lireProduitsQc();
$vinoRegions = $oVino->lireRegions();
$vinoTauxDeSucre = $oVino->lireTauxDeSucre();
$vinoTypesVin = $oVino->lireTypesVin();

if (!isset($mode)) {
    $mode = "lire";
}

$readonly = ($mode == "lire") ? "readonly" : "";
$disabled = ($mode == "lire") ? "disabled" : "";
?>

<div class="groupe-action">
    <div class="action-texte">
    </div>
    <div class="action-boutons">
        <div class="btn-modifier" title="Modifier" data-js-btn-modifier>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z" />
            </svg>
        </div>

        <div class="btn-confirmer hide" title="Confirmer" data-js-btn-confirmer>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
            </svg>
        </div>

        <div class="btn-annuler hide" title="Annuler" data-js-btn-annuler>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z" />
            </svg>
        </div>
    </div>
</div>

<div class="detail-container">
    <table>
        <thead>
            <tr>
                <th><span>Nom du champ</span></th>
                <th><span>Valeur</span></th>
            </tr>
        </thead>
        <tbody id="detail-body">
            <tr>
                <td class="pa-8">bouteille SAQ</td>
                <td class="pa-8">
                    <!-- <select name="bouteille_saq" id="bouteille_saq" <?= $readonly ?>>
                        <option value="-1">Choisir une bouteille pour faire afficher ses informations</option>

                        <?php
                        $id_bouteille = (isset($usagerBouteille) && isset($usagerBouteille['id_bouteille'])) ? $usagerBouteille['id_bouteille'] : "";
                        $trouve = false;

                        foreach ($vinoBouteilles as $uneBouteille) {
                        ?>
                            <option value="<?= $uneBouteille['id_bouteille']; ?>" <?php if ($id_bouteille == $uneBouteille['id_bouteille']) {
                                                                                        echo ' selected="selected"';
                                                                                        $trouve = true;
                                                                                    } ?>>
                                <?= $uneBouteille['nom_bouteille'] ?> </option>
                            <?php
                        }

                        if (isset($usagerBouteille) && isset($usagerBouteille['id_bouteille'])) {
                            if ($trouve == false) {
                                $nom_bouteille = (isset($usagerBouteille) && isset($usagerBouteille['nom_bouteille'])) ? "** " . $usagerBouteille['nom_bouteille'] . " **" : "** Valeur non définie **";
                            ?>
                                <option value="-1" selected="selected"><?= $nom_bouteille ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select> -->
                </td>
            </tr>
            <tr>
                <td class="pa-8 non-modifiable">Id bouteille</td>
                <td class="pa-8" name="id_bouteille"><?php echo (isset($usagerBouteille) && isset($usagerBouteille['id_bouteille'])) ? $usagerBouteille['id_bouteille'] : "** valeur auto-générée **"; ?></td>
            </tr>
            <tr>
                <td class="pa-8">Id cellier</td>
                <td>
                    <input type="text" name="id_cellier" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['id_cellier'])) echo $usagerBouteille['id_cellier']; ?>"></input>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Nom de la bouteille</td>
                <td>
                    <input type="text" name="nom_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['nom_bouteille'])) echo $usagerBouteille['nom_bouteille']; ?>"></input>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Quantité</td>
                <td>
                    <input type="text" name="quantite_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['quantite_bouteille'])) echo $usagerBouteille['quantite_bouteille']; ?>"></input>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Prix</td>
                <td>
                    <input type="text" name="prix_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['prix_bouteille'])) echo $usagerBouteille['prix_bouteille']; ?>"></input>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Description</td>
                <td>
                    <input type="text" name="description_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['description_bouteille'])) echo $usagerBouteille['description_bouteille']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Date d'achat</td>
                <td>
                    <input type="text" name="date_achat" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['date_achat'])) echo $usagerBouteille['date_achat']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Gardé jusqu'à</td>
                <td>
                    <input type="text" name="garde_jusqua" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['garde_jusqua'])) echo $usagerBouteille['garde_jusqua']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Note</td>
                <td>
                    <input type="text" name="note" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['note'])) echo $usagerBouteille['note']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Commentaires</td>
                <td>
                    <input type="text" name="commentaires" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['commentaires'])) echo $usagerBouteille['commentaires']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Millesime</td>
                <td>
                    <input type="text" name="millesime" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['millesime'])) echo $usagerBouteille['millesime']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Favori</td>
                <td>
                    <input type="text" name="favori_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['favori_bouteille'])) echo $usagerBouteille['favori_bouteille']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">À essayer</td>
                <td>
                    <input type="text" name="essayer_bouteille" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['essayer_bouteille'])) echo $usagerBouteille['essayer_bouteille']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Code saq</td>
                <td>
                    <input type="text" name="code_saq" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['code_saq'])) echo $usagerBouteille['code_saq']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Code cup</td>
                <td>
                    <input type="text" name="code_cup" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['code_cup'])) echo $usagerBouteille['code_cup']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Pays</td>
                <td class="pa-8">
                    <select name="pays_nom" id="pays_nom" <?= $readonly ?>>
                        <option value="">Aucun pays</option>

                        <?php
                        $pays_nom = (isset($usagerBouteille) && isset($usagerBouteille['pays_nom'])) ? $usagerBouteille['pays_nom'] : "";

                        foreach ($vinoPays as $unPays) {
                        ?>
                            <option value="<?= $unPays['nom']; ?>" <?php if ($pays_nom == $unPays['nom']) {
                                                                        echo ' selected="selected"';
                                                                    } ?>>
                                <?= $unPays['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Région</td>
                <td class="pa-8">
                    <select name="region_nom" id="region_nom" <?= $readonly ?>>
                        <option value="">Aucune région</option>

                        <?php
                        $region_nom = (isset($usagerBouteille) && isset($usagerBouteille['region_nom'])) ? $usagerBouteille['region_nom'] : "";

                        foreach ($vinoRegions as $uneRegion) {
                        ?>
                            <option value="<?= $uneRegion['nom']; ?>" <?php if ($region_nom == $uneRegion['nom']) {
                                                                            echo ' selected="selected"';
                                                                        } ?>>
                                <?= $uneRegion['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Type de vin</td>
                <td class="pa-8">
                    <select name="type_de_vin_nom" id="type_de_vin_nom" <?= $readonly ?>>
                        <option value="">Aucun type de vin</option>

                        <?php
                        $type_nom = (isset($usagerBouteille) && isset($usagerBouteille['type_de_vin_nom'])) ? $usagerBouteille['type_de_vin_nom'] : "";

                        foreach ($vinoTypesVin as $unType) {
                        ?>
                            <option value="<?= $unType['nom']; ?>" <?php if ($type_nom == $unType['nom']) {
                                                                        echo ' selected="selected"';
                                                                    } ?>>
                                <?= $unType['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Producteur</td>
                <td>
                    <input type="text" name="producteur" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['producteur'])) echo $usagerBouteille['producteur']; ?>"></input>
                </td>

            </tr>
            <tr>
                <td class="pa-8">Url SAQ</td>
                <?php if ($mode == "lire") { ?>
                    <td class="pa-8">
                        <div class="lien-externe">
                            <span><?= $usagerBouteille['url_saq']; ?></span>
                            <div class="lien-externe pa-8">
                                <a href="<?= $usagerBouteille['url_saq']; ?>" target="_blank" title="Ouvre le document lié dans une nouvelle fenêtre ou un nouvel onglet">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                <?php } else { ?>
                    <td>
                        <input type="text" name="url_saq" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['url_saq'])) echo $usagerBouteille['url_saq']; ?>"></input>
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td class="pa-8">Url de l'image</td>
                <?php if ($mode == "lire") { ?>
                    <td class="pa-8">
                        <div class="lien-externe">
                            <span><?= $usagerBouteille['url_img']; ?></span>
                            <div class="lien-externe pa-8">
                                <a href="<?= $usagerBouteille['url_img']; ?>" target="_blank" title="Ouvre le document lié dans une nouvelle fenêtre ou un nouvel onglet">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                <?php } else { ?>
                    <td>
                        <input type="text" name="url_img" <?= $disabled ?> value="<?php if (isset($usagerBouteille) && isset($usagerBouteille['url_img'])) echo $usagerBouteille['url_img']; ?>"></input>
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td class="pa-8">Format</td>
                <td class="pa-8">
                    <select name="format_nom" id="format_nom" <?= $readonly ?>>
                        <option value="">Aucun format</option>

                        <?php
                        $format_nom = (isset($usagerBouteille) && isset($usagerBouteille['format_nom'])) ? $usagerBouteille['format_nom'] : "";

                        foreach ($vinoFormats as $unFormat) {
                        ?>
                            <option value="<?= $unFormat['nom']; ?>" <?php if ($format_nom == $unFormat['nom']) {
                                                                            echo ' selected="selected"';
                                                                        } ?>>
                                <?= $unFormat['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Appellation</td>
                <td class="pa-8">
                    <select name="appellation_nom" id="appellation_nom" <?= $readonly ?>>
                        <option value="">Aucune appellation</option>

                        <?php
                        $vinoppellation_nom = (isset($usagerBouteille) && isset($usagerBouteille['appellation_nom'])) ? $usagerBouteille['appellation_nom'] : "";

                        foreach ($vinoAppellations as $uneAppellation) {
                        ?>
                            <option value="<?= $uneAppellation['nom']; ?>" <?php if ($vinoppellation_nom == $uneAppellation['nom']) {
                                                                                echo ' selected="selected"';
                                                                            } ?>>
                                <?= $uneAppellation['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Designation</td>
                <td class="pa-8">
                    <select name="designation_nom" id="designation_nom" <?= $readonly ?>>
                        <option value="">Aucune designation</option>

                        <?php
                        $designation_nom = (isset($usagerBouteille) && isset($usagerBouteille['designation_nom'])) ? $usagerBouteille['designation_nom'] : "";

                        foreach ($vinoDesignations as $uneDesignation) {
                        ?>
                            <option value="<?= $uneDesignation['nom']; ?>" <?php if ($designation_nom == $uneDesignation['nom']) {
                                                                                echo ' selected="selected"';
                                                                            } ?>>
                                <?= $uneDesignation['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td <?= $disabled ?>>
            </tr>
            <tr>
                <td class="pa-8">Classification</td>
                <td class="pa-8">
                    <select name="classification_nom" id="classification_nom" <?= $readonly ?>>
                        <option value="">Aucune classification</option>

                        <?php
                        $classification_nom = (isset($usagerBouteille) && isset($usagerBouteille['classification_nom'])) ? $usagerBouteille['classification_nom'] : "";

                        foreach ($vinoClassifications as $uneClassification) {
                        ?>
                            <option value="<?= $uneClassification['nom']; ?>" <?php if ($classification_nom == $uneClassification['nom']) {
                                                                                    echo ' selected="selected"';
                                                                                } ?>>
                                <?= $uneClassification['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Cépage</td>
                <td class="pa-8">
                    <select name="cepage_nom" id="cepage_nom" <?= $readonly ?>>
                        <option value="">Aucun cepage</option>

                        <?php
                        $cepage_nom = (isset($usagerBouteille) && isset($usagerBouteille['cepage_nom'])) ? $usagerBouteille['cepage_nom'] : "";

                        foreach ($vinoCepages as $unCepage) {
                        ?>
                            <option value="<?= $unCepage['nom']; ?>" <?php if ($cepage_nom == $unCepage['nom']) {
                                                                            echo ' selected="selected"';
                                                                        } ?>>
                                <?= $unCepage['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Taux de sucre</td>
                <td class="pa-8">
                    <select name="taux_de_sucre_nom" id="taux_de_sucre_nom" <?= $readonly ?>>
                        <option value="">Aucun taux de sucre</option>

                        <?php
                        $taux_de_sucre_nom = (isset($usagerBouteille) && isset($usagerBouteille['taux_de_sucre_nom'])) ? $usagerBouteille['taux_de_sucre_nom'] : "";

                        foreach ($vinoTauxDeSucre as $unTauxDeSucre) {
                        ?>
                            <option value="<?= $unTauxDeSucre['nom']; ?>" <?php if ($taux_de_sucre_nom == $unTauxDeSucre['nom']) {
                                                                                echo ' selected="selected"';
                                                                            } ?>>
                                <?= $unTauxDeSucre['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Degré d'alcool</td>
                <td class="pa-8">
                    <select name="degre_alcool_nom" id="degre_alcool_nom" <?= $readonly ?>>
                        <option value="">Aucun degré d'alcool</option>

                        <?php
                        $degre_alcool_nom = (isset($usagerBouteille) && isset($usagerBouteille['degre_alcool_nom'])) ? $usagerBouteille['degre_alcool_nom'] : "";

                        foreach ($vinoDegresAlcool as $unDegreAlcool) {
                        ?>
                            <option value="<?= $unDegreAlcool['nom']; ?>" <?php if ($degre_alcool_nom == $unDegreAlcool['nom']) {
                                                                                echo ' selected="selected"';
                                                                            } ?>>
                                <?= $unDegreAlcool['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Produit du Québec</td>
                <td class="pa-8">
                    <select name="produit_du_quebec_nom" id="produit_du_quebec_nom" <?= $readonly ?>>
                        <option value="">Aucun produit du Québec</option>

                        <?php
                        $produit_du_quebec_nom = (isset($usagerBouteille) && isset($usagerBouteille['produit_du_quebec_nom'])) ? $usagerBouteille['produit_du_quebec_nom'] : "";

                        foreach ($vinoProduitsQc as $unProduitQc) {
                        ?>
                            <option value="<?= $unProduitQc['nom']; ?>" <?php if ($produit_du_quebec_nom == $unProduitQc['nom']) {
                                                                            echo ' selected="selected"';
                                                                        } ?>>
                                <?= $unProduitQc['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Biodynamique</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="biodynamique" id="biodynamique" <?php if (isset($usagerBouteille) && isset($usagerBouteille['biodynamique'])) echo "value=" . $usagerBouteille['biodynamique']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Casher</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="casher" id="casher" <?php if (isset($usagerBouteille) && isset($usagerBouteille['casher'])) echo "value=" . $usagerBouteille['casher']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Désalcoolisé</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="desalcoolise" id="desalcoolise" <?php if (isset($usagerBouteille) && isset($usagerBouteille['desalcoolise'])) echo "value=" . $usagerBouteille['desalcoolise']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Équitable</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="equitable" id="equitable" <?php if (isset($usagerBouteille) && isset($usagerBouteille['equitable'])) echo "value=" . $usagerBouteille['equitable']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Faible taux d'alcool</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="faible_taux_alcool" id="faible_taux_alcool" <?php if (isset($usagerBouteille) && isset($usagerBouteille['faible_taux_alcool'])) echo "value=" . $usagerBouteille['faible_taux_alcool']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Produit bio</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="produit_bio" id="produit_bio" <?php if (isset($usagerBouteille) && isset($usagerBouteille['produit_bio'])) echo "value=" . $usagerBouteille['produit_bio']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Vin nature</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="vin_nature" id="vin_nature" <?php if (isset($usagerBouteille) && isset($usagerBouteille['vin_nature'])) echo "value=" . $usagerBouteille['vin_nature']; ?>>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="pa-8">Vin orange</td>
                <td class="pa-8">
                    <label>
                        <input type="checkbox" <?= $disabled ?> class="plus-gros" name="vin_orange" id="vin_orange" <?php if (isset($usagerBouteille) && isset($usagerBouteille['vin_orange'])) echo "value=" . $usagerBouteille['vin_orange']; ?>>
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!--MODAL-->
<div class="modal modal--ferme">
    <div class="modal__contenu">
        <h4 class="text-center" data-js-modal-message></h4>

        <div class="submit-bloc">
            <button data-js-bouton-danger class="bouton-danger"></button>
            <button data-js-bouton-secondaire class="bouton-secondaire"></button>
        </div>
    </div>
</div>