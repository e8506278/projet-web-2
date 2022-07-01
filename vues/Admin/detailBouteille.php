<?php
$oVino = new Vino();

$aAppellations = $oVino->lireAppellations();
$aBouteilles = $oVino->lireBouteilles();
$aCepages = $oVino->lireCepages();
$aClassifications = $oVino->lireClassifications();
$aDegresAlcool = $oVino->lireDegresAlcool();
$aDesignations = $oVino->lireDesignations();
$aFormats = $oVino->lireFormats();
$aPays = $oVino->lirePays();
$aProduitsQc = $oVino->lireProduitsQc();
$aRegions = $oVino->lireRegions();
$aTauxDeSucre = $oVino->lireTauxDeSucre();
$aTypesVin = $oVino->lireTypesVin();

if (!isset($mode)) {
    $mode = "lecture";
}

$editable = ($mode == "lecture") ? "" : `contenteditable="true"`;
?>

<div class="col-md-12 groupe-action">
    <div class="btn-confirmer" title="Confirmer" data-js-btn-confirmer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
        </svg>
    </div>

    <div class="btn-annuler" title="Annuler" data-js-btn-annuler>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z" />
        </svg>
    </div>
</div>

<div class="col-md-12 groupe-modifier hide">
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
        <tbody id="detail-body">
            <tr>
                <td>bouteille SAQ</td>
                <td>
                    <select name="bouteille_saq" id="bouteille_saq">
                        <option value="-1">Choisir une bouteille pour faire afficher ses informations</option>

                        <?php
                        $id_bouteille = (isset($body) && isset($body->id_bouteille)) ? $body->id_bouteille : "";
                        $trouve = false;

                        foreach ($aBouteilles as $uneBouteille) {
                        ?>
                            <option value="<?= $uneBouteille['id_bouteille']; ?>" <?php if ($id_bouteille == $uneBouteille['id_bouteille']) {
                                                                                        echo ' selected="selected"';
                                                                                        $trouve = true;
                                                                                    } ?>>
                                <?= $uneBouteille['nom_bouteille'] ?> </option>
                            <?php
                        }

                        if (isset($body) && isset($body->id_bouteille)) {
                            if ($trouve == false) {
                                $nom_bouteille = (isset($body) && isset($body->nom_bouteille)) ? "** " . $body->nom_bouteille . " **" : "** Valeur non définie **";
                            ?>
                                <option value="-1" selected="selected"><?= $nom_bouteille ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Id bouteille</td>
                <td class="non-modifiable"><?php echo (isset($body) && isset($body->id_bouteille)) ? $body->id_bouteille : "** valeur auto-générée **"; ?></td>
            </tr>
            <tr>
                <td>Id cellier</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->id_cellier)) echo $body->id_cellier; ?></td>
            </tr>
            <tr>
                <td>Nom de la bouteille</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->nom_bouteille)) echo $body->nom_bouteille; ?></td>
            </tr>
            <tr>
                <td>Quantité</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->quantite_bouteille)) echo $body->quantite_bouteille; ?></td>
            </tr>
            <tr>
                <td>Prix</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->prix_bouteille)) echo $body->prix_bouteille; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->description_bouteille)) echo $body->description_bouteille; ?></td>
            </tr>
            <tr>
                <td>Date d'achat</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->date_achat)) echo $body->date_achat; ?></td>
            </tr>
            <tr>
                <td>Gardé jusqu'à</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->garde_jusqua)) echo $body->garde_jusqua; ?></td>
            </tr>
            <tr>
                <td>Note</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->note)) echo $body->note; ?></td>
            </tr>
            <tr>
                <td>Commentaires</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->commentaires)) echo $body->commentaires; ?></td>
            </tr>
            <tr>
                <td>Millesime</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->millesime)) echo $body->millesime; ?></td>
            </tr>
            <tr>
                <td>Favori</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->favori_bouteille)) echo $body->favori_bouteille; ?></td>
            </tr>
            <tr>
                <td>À essayer</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->essayer_bouteille)) echo $body->essayer_bouteille; ?></td>
            </tr>
            <tr>
                <td>Code saq</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->code_saq)) echo $body->code_saq; ?></td>
            </tr>
            <tr>
                <td>Code cup</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->code_cup)) echo $body->code_cup; ?></td>
            </tr>
            <tr>
                <td>Pays</td>
                <td>
                    <select name="pays_nom" id="pays_nom">
                        <option value="-1">Aucun pays</option>

                        <?php
                        $pays_nom = (isset($body) && isset($body->pays_nom)) ? $body->pays_nom : "";

                        foreach ($aPays as $unPays) {
                        ?>
                            <option value="<?= $unPays['id']; ?>" <?php if ($pays_nom == $unPays['nom']) {
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
                <td>Région</td>
                <td>
                    <select name="region_nom" id="region_nom">
                        <option value="-1">Aucune région</option>

                        <?php
                        $region_nom = (isset($body) && isset($body->region_nom)) ? $body->region_nom : "";

                        foreach ($aRegions as $uneRegion) {
                        ?>
                            <option value="<?= $uneRegion['id']; ?>" <?php if ($region_nom == $uneRegion['nom']) {
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
                <td>Type de vin</td>
                <td>
                    <select name="type_de_vin_nom" id="type_de_vin_nom">
                        <option value="-1">Aucun type de vin</option>

                        <?php
                        $type_nom = (isset($body) && isset($body->type_de_vin_nom)) ? $body->type_de_vin_nom : "";

                        foreach ($aTypesVin as $unType) {
                        ?>
                            <option value="<?= $unType['id']; ?>" <?php if ($type_nom == $unType['nom']) {
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
                <td>Producteur</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->producteur)) echo $body->producteur; ?></td>
            </tr>
            <tr>
                <td>Url SAQ</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->url_saq)) echo $body->url_saq; ?></td>
            </tr>
            <tr>
                <td>Url de l'image</td>
                <td <?= $editable ?>><?php if (isset($body) && isset($body->url_img)) echo $body->url_img; ?></td>
            </tr>
            <tr>
                <td>Format</td>
                <td>
                    <select name="format_nom" id="format_nom">
                        <option value="-1">Aucun format</option>

                        <?php
                        $format_nom = (isset($body) && isset($body->format_nom)) ? $body->format_nom : "";

                        foreach ($aFormats as $unFormat) {
                        ?>
                            <option value="<?= $unFormat['id']; ?>" <?php if ($format_nom == $unFormat['nom']) {
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
                <td>Appellation</td>
                <td>
                    <select name="appellation_nom" id="appellation_nom">
                        <option value="-1">Aucune appellation</option>

                        <?php
                        $appellation_nom = (isset($body) && isset($body->appellation_nom)) ? $body->appellation_nom : "";

                        foreach ($aAppellations as $uneAppellation) {
                        ?>
                            <option value="<?= $uneAppellation['id']; ?>" <?php if ($appellation_nom == $uneAppellation['nom']) {
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
                <td>Designation</td>
                <td>
                    <select name="designation_nom" id="designation_nom">
                        <option value="-1">Aucune designation</option>

                        <?php
                        $designation_nom = (isset($body) && isset($body->designation_nom)) ? $body->designation_nom : "";

                        foreach ($aDesignations as $uneDesignation) {
                        ?>
                            <option value="<?= $uneDesignation['id']; ?>" <?php if ($designation_nom == $uneDesignation['nom']) {
                                                                                echo ' selected="selected"';
                                                                            } ?>>
                                <?= $uneDesignation['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td <?= $editable ?>>
            </tr>
            <tr>
                <td>Classification</td>
                <td>
                    <select name="classification_nom" id="classification_nom">
                        <option value="-1">Aucune classification</option>

                        <?php
                        $classification_nom = (isset($body) && isset($body->classification_nom)) ? $body->classification_nom : "";

                        foreach ($aClassifications as $uneClassification) {
                        ?>
                            <option value="<?= $uneClassification['id']; ?>" <?php if ($classification_nom == $uneClassification['nom']) {
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
                <td>Cépage</td>
                <td>
                    <select name="cepage_nom" id="cepage_nom">
                        <option value="-1">Aucun cepage</option>

                        <?php
                        $cepage_nom = (isset($body) && isset($body->cepage_nom)) ? $body->cepage_nom : "";

                        foreach ($aCepages as $unCepage) {
                        ?>
                            <option value="<?= $unCepage['id']; ?>" <?php if ($cepage_nom == $unCepage['nom']) {
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
                <td>Taux de sucre</td>
                <td>
                    <select name="taux_de_sucre_nom" id="taux_de_sucre_nom">
                        <option value="-1">Aucun taux de sucre</option>

                        <?php
                        $taux_de_sucre_nom = (isset($body) && isset($body->taux_de_sucre_nom)) ? $body->taux_de_sucre_nom : "";

                        foreach ($aTauxDeSucre as $unTauxDeSucre) {
                        ?>
                            <option value="<?= $unTauxDeSucre['id']; ?>" <?php if ($taux_de_sucre_nom == $unTauxDeSucre['nom']) {
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
                <td>Degré d'alcool</td>
                <td>
                    <select name="degre_alcool_nom" id="degre_alcool_nom">
                        <option value="-1">Aucun degré d'alcool</option>

                        <?php
                        $degre_alcool_nom = (isset($body) && isset($body->degre_alcool_nom)) ? $body->degre_alcool_nom : "";

                        foreach ($aDegresAlcool as $unDegreAlcool) {
                        ?>
                            <option value="<?= $unDegreAlcool['id']; ?>" <?php if ($degre_alcool_nom == $unDegreAlcool['nom']) {
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
                <td>Produit du Québec</td>
                <td>
                    <select name="produit_du_quebec_nom" id="produit_du_quebec_nom">
                        <option value="-1">Aucun produit du Québec</option>

                        <?php
                        $produit_du_quebec_nom = (isset($body) && isset($body->produit_du_quebec_nom)) ? $body->produit_du_quebec_nom : "";

                        foreach ($aProduitsQc as $unProduitQc) {
                        ?>
                            <option value="<?= $unProduitQc['id']; ?>" <?php if ($produit_du_quebec_nom == $unProduitQc['nom']) {
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
                <td>Biodynamique</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="biodynamique" id="biodynamique" <?php if (isset($body) && isset($body->biodynamique)) echo "value=" . $body->biodynamique; ?>>
                </td>
            </tr>
            <tr>
                <td>Casher</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="casher" id="casher" <?php if (isset($body) && isset($body->casher)) echo "value=" . $body->casher; ?>>
                </td>
            </tr>
            <tr>
                <td>Désalcoolisé</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="desalcoolise" id="desalcoolise" <?php if (isset($body) && isset($body->desalcoolise)) echo "value=" . $body->desalcoolise; ?>>
                </td>
            </tr>
            <tr>
                <td>Équitable</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="equitable" id="equitable" <?php if (isset($body) && isset($body->equitable)) echo "value=" . $body->equitable; ?>>
                </td>
            </tr>
            <tr>
                <td>Faible taux d'alcool</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="faible_taux_alcool" id="faible_taux_alcool" <?php if (isset($body) && isset($body->faible_taux_alcool)) echo "value=" . $body->faible_taux_alcool; ?>>
                </td>
            </tr>
            <tr>
                <td>Produit bio</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="produit_bio" id="produit_bio" <?php if (isset($body) && isset($body->produit_bio)) echo "value=" . $body->produit_bio; ?>>
                </td>
            </tr>
            <tr>
                <td>Vin nature</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="vin_nature" id="vin_nature" <?php if (isset($body) && isset($body->vin_nature)) echo "value=" . $body->vin_nature; ?>>
                </td>
            </tr>
            <tr>
                <td>Vin orange</td>
                <td>
                    <input type="checkbox" class="plus-gros" name="vin_orange" id="vin_orange" <?php if (isset($body) && isset($body->vin_orange)) echo "value=" . $body->vin_orange; ?>>
                </td>
            </tr>
        </tbody>
    </table>
</div>