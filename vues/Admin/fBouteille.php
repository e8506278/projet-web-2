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
?>

<tr>
    <td>bouteille SAQ</td>
    <td contenteditable="true">
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
    <td>id_bouteille</td>
    <td><?php echo (isset($body) && isset($body->id_bouteille)) ? $body->id_bouteille . " ** non modifiable **" : "** valeur auto-générée **"; ?></td>
</tr>
<tr>
    <td>id_cellier</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->id_cellier)) echo $body->id_cellier; ?></td>
</tr>
<tr>
    <td>nom_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->nom_bouteille)) echo $body->nom_bouteille; ?></td>
</tr>
<tr>
    <td>quantite_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->quantite_bouteille)) echo $body->quantite_bouteille; ?></td>
</tr>
<tr>
    <td>prix_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->prix_bouteille)) echo $body->prix_bouteille; ?></td>
</tr>
<tr>
    <td>description_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->description_bouteille)) echo $body->description_bouteille; ?></td>
</tr>
<tr>
    <td>date_achat</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->date_achat)) echo $body->date_achat; ?></td>
</tr>
<tr>
    <td>garde_jusqua</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->garde_jusqua)) echo $body->garde_jusqua; ?></td>
</tr>
<tr>
    <td>note</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->note)) echo $body->note; ?></td>
</tr>
<tr>
    <td>commentaires</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->commentaires)) echo $body->commentaires; ?></td>
</tr>
<tr>
    <td>millesime</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->millesime)) echo $body->millesime; ?></td>
</tr>
<tr>
    <td>favori_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->favori_bouteille)) echo $body->favori_bouteille; ?></td>
</tr>
<tr>
    <td>essayer_bouteille</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->essayer_bouteille)) echo $body->essayer_bouteille; ?></td>
</tr>
<tr>
    <td>code_saq</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->code_saq)) echo $body->code_saq; ?></td>
</tr>
<tr>
    <td>code_cup</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->code_cup)) echo $body->code_cup; ?></td>
</tr>
<tr>
    <td>pays_nom</td>
    <td contenteditable="true">
        <select name="pays_nom" id="pays_nom">
            <option value="-1">Choisir un pays</option>

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
    <td>region_nom</td>
    <td contenteditable="true">
        <select name="region_nom" id="region_nom">
            <option value="-1">Choisir une région</option>

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
    <td>type_de_vin_nom</td>
    <td contenteditable="true">
        <select name="type_de_vin_nom" id="type_de_vin_nom">
            <option value="-1">Choisir un type de vin</option>

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
    <td>producteur</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->producteur)) echo $body->producteur; ?></td>
</tr>
<tr>
    <td>url_saq</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->url_saq)) echo $body->url_saq; ?></td>
</tr>
<tr>
    <td>url_img</td>
    <td contenteditable="true"><?php if (isset($body) && isset($body->url_img)) echo $body->url_img; ?></td>
</tr>
<tr>
    <td>format_nom</td>
    <td contenteditable="true">
        <select name="format_nom" id="format_nom">
            <option value="-1">Choisir un format</option>

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
    <td>appellation_nom</td>
    <td contenteditable="true">
        <select name="appellation_nom" id="appellation_nom">
            <option value="-1">Choisir une appellation</option>

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
    <td>designation_nom</td>
    <td contenteditable="true">
        <select name="designation_nom" id="designation_nom">
            <option value="-1">Choisir une designation</option>

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
    </td contenteditable="true">
</tr>
<tr>
    <td>classification_nom</td>
    <td contenteditable="true">
        <select name="classification_nom" id="classification_nom">
            <option value="-1">Choisir une classification</option>

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
    <td>cepage_nom</td>
    <td contenteditable="true">
        <select name="cepage_nom" id="cepage_nom">
            <option value="-1">Choisir un cepage</option>

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
    <td>taux_de_sucre_nom</td>
    <td contenteditable="true">
        <select name="taux_de_sucre_nom" id="taux_de_sucre_nom">
            <option value="-1">Choisir un taux de sucre</option>

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
    <td>degre_alcool_nom</td>
    <td contenteditable="true">
        <select name="degre_alcool_nom" id="degre_alcool_nom">
            <option value="-1">Choisir un degré d'alcool</option>

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
    <td>produit_du_quebec_nom</td>
    <td contenteditable="true">
        <select name="produit_du_quebec_nom" id="produit_du_quebec_nom">
            <option value="-1">Choisir un produit du Québec</option>

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
    <td>biodynamique</td>
    <td contenteditable="true">
        <input type="checkbox" name="biodynamique" id="biodynamique" <?php if (isset($body) && isset($body->biodynamique)) echo "value=" . $body->biodynamique; ?>>
    </td>
</tr>
<tr>
    <td>casher</td>
    <td contenteditable="true">
        <input type="checkbox" name="casher" id="casher" <?php if (isset($body) && isset($body->casher)) echo "value=" . $body->casher; ?>>
    </td>
</tr>
<tr>
    <td>desalcoolise</td>
    <td contenteditable="true">
        <input type="checkbox" name="desalcoolise" id="desalcoolise" <?php if (isset($body) && isset($body->desalcoolise)) echo "value=" . $body->desalcoolise; ?>>
    </td>
</tr>
<tr>
    <td>equitable</td>
    <td contenteditable="true">
        <input type="checkbox" name="equitable" id="equitable" <?php if (isset($body) && isset($body->equitable)) echo "value=" . $body->equitable; ?>>
    </td>
</tr>
<tr>
    <td>faible_taux_alcool</td>
    <td contenteditable="true">
        <input type="checkbox" name="faible_taux_alcool" id="faible_taux_alcool" <?php if (isset($body) && isset($body->faible_taux_alcool)) echo "value=" . $body->faible_taux_alcool; ?>>
    </td>
</tr>
<tr>
    <td>produit_bio</td>
    <td contenteditable="true">
        <input type="checkbox" name="produit_bio" id="produit_bio" <?php if (isset($body) && isset($body->produit_bio)) echo "value=" . $body->produit_bio; ?>>
    </td>
</tr>
<tr>
    <td>vin_nature</td>
    <td contenteditable="true">
        <input type="checkbox" name="vin_nature" id="vin_nature" <?php if (isset($body) && isset($body->vin_nature)) echo "value=" . $body->vin_nature; ?>>
    </td>
</tr>
<tr>
    <td>vin_orange</td>
    <td contenteditable="true">
        <input type="checkbox" name="vin_orange" id="vin_orange" <?php if (isset($body) && isset($body->vin_orange)) echo "value=" . $body->vin_orange; ?>>
    </td>
</tr>