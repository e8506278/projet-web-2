<!--Page d'accueil non connecté-->
<?php
print_r($product);
//    foreach ($product as $key => $value){
//        echo $key . " => ". $value."     -------      \n";
//    }
//    echo "Non". $product['prix'];

if (!isset($pays)) $pays = [];
if (!isset($bouteilles)) $bouteilles = [];
if (!isset($celliers)) $celliers = [];
if (!isset($usager_celliers)) $usager_celliers = [];
if (!isset($regions)) $regions = [];
if (!isset($types)) $types = [];
if (!isset($formats)) $formats = [];
if (!isset($appellations)) $appellations = [];
if (!isset($designations)) $designations = [];
if (!isset($cepages)) $cepages = [];
if (!isset($taux_de_sucres)) $taux_de_sucres = [];
if (!isset($degre_alcools)) $degre_alcools = [];
if (!isset($produit_du_quebecs)) $produit_du_quebecs = [];
if (!isset($classifications)) $classifications = [];


$items = [
    'bouteilles' => $bouteilles,
    'celliers' => $celliers,
    'usager_celliers' => $usager_celliers,
    'pays' => $pays,
    'regions' => $regions,
    'types' => $types,
    'formats' => $formats,
    'appellations' => $appellations,
    'designations' => $designations,
    'cepages' => $cepages,
    'taux_de_sucres' => $taux_de_sucres,
    'degre_alcools' => $degre_alcools,
    'produit_du_quebecs' => $produit_du_quebecs,
    'classifications' => $classifications,
];


$form_values = [
    'id_bouteille'  => null,
    'id_cellier' => null,

    'nom_cellier' => null,
    'nom_bouteille' => null,
    'image_bouteille' => null,
    'description_bouteille' => null,
    'code_saq' => null,
    'code_cup' => null,
    'prix_bouteille' => null,
    'producteur' => null,
    'url_saq'=> null,

    'biodynamique' => false,
    'casher' => false,
    'desalcoolise' => false,
    'equitable' => false,
    'faible_taux_alcool'  => false,
    'produit_bio' => false,
    'vin_nature'  => false,
    'vin_orange'  => false,

    'nom_pays' => null,
    'nom_region' => null,
    'nom_type' => null,
    'nom_format' => null,
    'nom_appellation'  => null,
    'nom_designation' => null,
    'nom_cepages' => null,
    'nom_taux_de_sucre'  => null,
    'nom_degre_alcool' => null,
    'nom_produit_du_quebec'  => null,
    'nom_classification'  => null,

    'date_achat' => null,
    'garde_jusqua' => null,
    'note' => null,
    'quantite' => null,
    'millesime' => null
];

if(isset($bouteille) && $bouteille != null){
    $form_values = $bouteille;
}

if(isset($id_bouteille)){
    echo "isset true";
}

if(isset($id_bouteille) && $id_bouteille != null){
    echo "id bouteille not null";
}

//print_r($form_values['casher']);

?>

<!-- fiche produit -->

<!--<section class="section-wrapper texte-photo">-->
<!---->
<!--    <article class="texte-photo__contenu d-flex">-->
<!---->
<!--        <div class="product-photo">-->
<!--            <img src="https://www.saq.com/media/catalog/product/1/1/11097101-1_1580612720.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2"-->
<!--                 alt="degustation2">-->
<!--        </div>-->
<!---->
<!--        <div class="top-info">-->
<!--            <h1 class="texte-photo__titre">19 Crimes Hard Chard</h1>-->
<!--            <h3 class="under-texte-photo__texte">-->
<!--                Vin blanc | 750 ml | Australie South Eastern Australia-->
<!--            </h3>-->
<!--            <div class="info-details" style="max-width: unset">-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Pays</div>-->
<!--                        <div class="value">France</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Catégorie</div>-->
<!--                        <div class="value">Vin blan</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Région</div>-->
<!--                        <div class="value">South Eastern Australia **HC**</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Format</div>-->
<!--                        <div class="value">700ml</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Désignation réglementée</div>-->
<!--                        <div class="value">Vin de table (VDT) **HC**</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Vin de table (VDT)</div>-->
<!--                        <div class="value">19 Crimes **HC**</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Cépage</div>-->
<!--                        <div class="value">Chardonnay 100 % **HC**</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Agent promotionnel</div>-->
<!--                        <div class="value">Mark Anthony Brands Ltd **HC**</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Degré d'alcool</div>-->
<!--                        <div class="value">16 % **HC**</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Code SAQ</div>-->
<!--                        <div class="value">311313342</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Taux de sucre</div>-->
<!--                        <div class="value">10 g/L **HC**</div>-->
<!--                    </div>-->
<!--                    <div class="col-6 info-unit">-->
<!--                        <div class="label">Code CUP</div>-->
<!--                        <div class="value">00012354001947 **HC**</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row submit-bloc">-->
<!--                    <button class="bouton-primaire">Signaler une erreur</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--    </article>-->
<!---->
<!--</section>-->
<script src="./js/bouteille.js"  type="text/javascript"></script>
<section class="section-wrapper">
    <h2>Informations</h2>

    <?php if(isset($id_bouteille)) {?>
        <?php if(!$bouteille) {?>
            <!--  Le cas d'un id de bouteille inntrouvable dans la base de données-->
            <div class="warrning-message">
                Cette bouteille est introuvable
            </div>
        <?php }else{ ?>
            <!--  Le cas normal-->
            <div class="boite-double">
                <!--LOGIN-->
                <div class="boite-double__contenant-form">
                    <div class="product-photo">
                        <img src="<?php echo $form_values['image_bouteille']?>"
                             id="image_bouteille"
                             onerror="document.getElementById('image_bouteille').src = $baseUrl_without_parameters+'assets/img/default_bouteille.png'; this.onerror=null;"
                             alt="degustation2">
                    </div>

                </div>
                <form class="formulaire info-details"  action="./controller/AjouterBouteille.php" method="POST">
                    <div class="row">
                        <div class="col info-unit">
                            <div class="label">Nom de la bouteille</div>
                            <div class="value label-state" style="<?php if(!isset($id_bouteille)) echo 'display: unset'?>">
                                <?php echo ($form_values['nom_bouteille'] ?: 'Non défini') ?>
                            </div>
                            <div class="value input-state">
                                <input list="bouteilles"
                                       value="<?php echo $form_values['nom_bouteille']?>"
                                       placeholder="Sélectionner ici"
                                       data-js-bouteille-select
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_bouteille" id="id_bouteille" >

                                <datalist id="bouteilles">
                                    <?php foreach ($bouteilles as $element){ ?>
                                    <option value="<?php echo $element['nom_bouteille'] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <!--            Information liées au cellier-->
                    <div class="form-block">
                        <h6>Informations liés au cellier</h6>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Cellier</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_cellier']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="usager_celliers"
                                           value="<?php echo $form_values['nom_cellier']?>"
                                           placeholder="Sélectionner ici"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="id_cellier" id="id_cellier" >

                                    <datalist id="usager_celliers">
                                        <?php foreach ($usager_celliers as $element){ ?>
                                            <option><?php echo $element['nom_cellier'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Quantité</div>
                                <div class="value label-state">
                                    <?php echo $form_values['quantite_bouteille']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="number" name="quantite_bouteille"
                                                                      value="<?php echo $form_values['quantite_bouteille']?>"
                                                                      class="input formulaire__champs boite-double__champs"
                                                                      placeholder="Saisir ici"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Date d'achat</div>
                                <div class="value label-state">
                                    <?php echo $form_values['date_achat']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state"><input type="date" name="date_achat"
                                                                      value="<?php echo $form_values['date_achat']?>"
                                                                      class="input formulaire__champs boite-double__champs"
                                                                      placeholder="Saisir ici"></div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Garde jusqu'à</div>
                                <div class="value label-state">
                                    <?php echo $form_values['garde_jusqua']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="date" name="garde_jusqua"
                                                                      value="<?php echo $form_values['garde_jusqua']?>"
                                                                      class="input formulaire__champs boite-double__champs"
                                                                      placeholder="Saisir ici"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Note</div>
                                <div class="value label-state">
                                    <?php echo $form_values['note']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="number" name="note"
                                           value="<?php echo $form_values['note']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Millesime</div>
                                <div class="value label-state">
                                    <?php echo $form_values['millesime']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="millesime"
                                           value="<?php echo $form_values['millesime']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--        fin    Information liées au cellier-->

                    <div class="form-block">
                        <h6>Informations sur la bouteille</h6>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Url de l'image de la bouteille</div>
                                <div class="value label-state">
                                    <?php echo $form_values['image_bouteille']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="image_bouteille"
                                           value="<?php echo $form_values['image_bouteille']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Description</div>
                                <div class="value label-state">
                                    <?php echo $form_values['description_bouteille']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="description_bouteille"
                                           value="<?php echo $form_values['description_bouteille']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Code saq</div>
                                <div class="value label-state">
                                    <?php echo $form_values['code_saq']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="text" name="code_saq"
                                                                      value="<?php echo $form_values['code_saq']?>"
                                                                      class="input formulaire__champs boite-double__champs"
                                                                      placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Code cup</div>
                                <div class="value label-state">
                                    <?php echo $form_values['code_cup']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="code_cup"
                                           value="<?php echo $form_values['code_cup']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Prix</div>
                                <div class="value label-state">
                                    <?php echo $form_values['prix_bouteille']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="number" name="prix_bouteille"
                                           value="<?php echo $form_values['prix_bouteille']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Producteur</div>
                                <div class="value label-state">
                                    <?php echo $form_values['producteur']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="producteur"
                                           value="<?php echo $form_values['producteur']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Url saq</div>
                                <div class="value label-state">
                                    <?php echo $form_values['url_saq']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="url_saq"
                                           value="<?php echo $form_values['url_saq']?>"
                                           class="input formulaire__champs boite-double__champs"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Biodynamique</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['biodynamique']) && $form_values['biodynamique'] != null? ($form_values['biodynamique'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="biodynamique"
                                                                      value="<?php echo $form_values['biodynamique']?>"
                                        <?php if ($form_values['biodynamique']) echo "checked='checked'"; ?>
                                                                      class="checkbox"
                                                                      placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Casher</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['casher']) && $form_values['casher'] != null? ($form_values['casher'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="casher"
                                                                      value="<?php echo $form_values['casher']?>"
                                        <?php if ($form_values['casher']) echo "checked='checked'"; ?>
                                                                      class="checkbox"
                                                                      placeholder="Saisir ici">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Desalcoolise</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['desalcoolise']) && $form_values['desalcoolise'] != null? ($form_values['desalcoolise'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="desalcoolise"
                                           value="<?php echo $form_values['desalcoolise']?>"
                                        <?php if ($form_values['desalcoolise']) echo "checked='checked'"; ?>
                                           class="checkbox"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Equitable</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['equitable']) && $form_values['equitable'] != null? ($form_values['equitable'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="equitable"
                                           value="<?php echo $form_values['equitable']?>"
                                        <?php if ($form_values['equitable']) echo "checked='checked'"; ?>
                                           class="checkbox"  placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Faible taux alcool</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['faible_taux_alcool']) && $form_values['faible_taux_alcool'] != null? ($form_values['faible_taux_alcool'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="faible_taux_alcool"
                                                                      value="<?php echo $form_values['faible_taux_alcool']?>"
                                        <?php if ($form_values['faible_taux_alcool']) echo "checked='checked'"; ?>
                                                                      class="checkbox"
                                                                      placeholder="Saisir ici"></div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Produit bio</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['produit_bio']) && $form_values['produit_bio'] != null? ($form_values['produit_bio'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="produit_bio"
                                           value="<?php echo $form_values['produit_bio']?>"
                                        <?php if ($form_values['produit_bio']) echo "checked='checked'"; ?>
                                           class="checkbox"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Vin nature</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['vin_nature']) && $form_values['vin_nature'] != null? ($form_values['vin_nature'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="vin_nature"
                                           value="<?php echo $form_values['vin_nature']?>"
                                        <?php if ($form_values['vin_nature']) echo "checked='checked'"; ?>
                                           class="checkbox"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Vin orange</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['vin_orange']) && $form_values['vin_orange'] != null? ($form_values['vin_orange'] ? 'Oui': 'Non')  : 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="vin_orange"
                                           value="<?php echo $form_values['vin_orange']?>"
                                        <?php if ($form_values['vin_orange']) echo "checked='checked'"; ?>
                                           class="checkbox"
                                           placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Pays</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_pays']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="pays"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_pays']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_pays" id="nom_pays">

                                    <datalist id="pays">
                                        <?php foreach ($pays as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Region</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_region']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="regions"
                                           value="<?php echo $form_values['nom_region']?>"
                                           placeholder="Sélectionner ici"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_region" id="nom_region" >

                                    <datalist id="regions">
                                        <?php foreach ($regions as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Type</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_type']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="types"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_type']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_type" id="nom_type" >

                                    <datalist id="types">
                                        <?php foreach ($types as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Format</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_format']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="formats"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_format']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_format" id="nom_format" >

                                    <datalist id="formats">
                                        <?php foreach ($formats as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Appellation</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_appellation']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="appellations"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_appellation']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_appellation" id="nom_appellation" >

                                    <datalist id="appellations">
                                        <?php foreach ($appellations as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Designation</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_designation']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="designations"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_designation']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_designation" id="nom_designation" >

                                    <datalist id="designations">
                                        <?php foreach ($designations as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Cepages</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_cepages']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="cepages"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_cepages']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_cepages" id="nom_cepages" >

                                    <datalist id="cepages">
                                        <?php foreach ($cepages as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Taux de sucre</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_taux_de_sucre']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="taux_de_sucres"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_taux_de_sucre']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_taux_de_sucre" id="nom_taux_de_sucre" />

                                    <datalist id="taux_de_sucres">
                                        <?php foreach ($taux_de_sucres as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Degre d'alcool</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_degre_alcool']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="degre_alcools"
                                           value="<?php echo $form_values['nom_degre_alcool']?>"
                                           placeholder="Sélectionner ici"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_degre_alcool" id="nom_degre_alcool" />

                                    <datalist id="degre_alcools">
                                        <?php foreach ($degre_alcools as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Produit du quebec</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_produit_du_quebec']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="produit_du_quebecs"
                                           placeholder="Sélectionner ici"
                                           value="<?php echo $form_values['nom_produit_du_quebec']?>"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_produit_du_quebec" id="nom_produit_du_quebec" />

                                    <datalist id="produit_du_quebecs">
                                        <?php foreach ($produit_du_quebecs as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Classification</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_classification']  ?: 'Non défini'?>
                                </div>
                                <div class="value input-state">
                                    <input list="classifications"
                                           value="<?php echo $form_values['nom_classification']?>"
                                           placeholder="Sélectionner ici"
                                           class="input select formulaire__champs boite-double__champs"
                                           name="nom_classification" id="nom_classification" />

                                    <datalist id="classifications">
                                        <?php foreach ($classifications as $element){ ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row submit-bloc">
                        <div class="col-6 info-unit">
                            <button class="bouton-danger" type="button">Détruire</button>
                            <button class="bouton-secondaire" type="button" id="ouvrirFormulaire">Modifier</button>
                        </div>
                        <div class="col-6 info-unit" >

                            <div id="submit_btns">
                                <button class="bouton-primaire" type="button" id="fermerFormulaire" >Annuler</button>
                                <?php if(isset($id_bouteille) && $id_bouteille != null) {?>
                                    <button class="bouton-secondaire">Enregistrer</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    <?php }else{ ?>
<!--            Le cas d'ajout d'une nouvelle bouteille-->
        <div class="boite-double">
            <!--LOGIN-->
            <div class="boite-double__contenant-form">
                <div class="product-photo">
                    <img src="<?php echo $form_values['image_bouteille']?>"
                         id="image_bouteille"
                         onerror="document.getElementById('image_bouteille').src = $baseUrl_without_parameters+'assets/img/default_bouteille.png'; this.onerror=null;"
                         alt="degustation2">
                </div>

            </div>
            <form class="formulaire info-details"  action="./controller/AjouterBouteille.php" method="POST">
                <div class="row">
                    <div class="col info-unit">
                        <div class="label">Nom de la bouteille</div>
                        <div class="value">
                            <input list="bouteilles"
                                   value="<?php echo $form_values['nom_bouteille']?>"
                                   placeholder="Sélectionner ici"
                                   data-js-bouteille-select
                                   class="input select formulaire__champs boite-double__champs"
                                   name="nom_bouteille" id="id_bouteille" >

                            <datalist id="bouteilles">
                                <?php foreach ($bouteilles as $element){ ?>
                                <option value="<?php echo $element['nom_bouteille'] ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                    </div>
                </div>

                <!--            Information liées au cellier-->
                <div class="form-block">
                    <h6>Informations liés au cellier</h6>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Cellier</div>
                            <div class="value">
                                <input list="usager_celliers"
                                       value="<?php echo $form_values['nom_cellier']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="id_cellier" id="id_cellier" >

                                <datalist id="usager_celliers">
                                    <?php foreach ($usager_celliers as $element){ ?>
                                        <option><?php echo $element['nom_cellier'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Quantité</div>
                            <div class="value ">
                                <input type="number" name="quantite_bouteille"
                                  value="<?php echo $form_values['quantite_bouteille']?>"
                                  class="input formulaire__champs boite-double__champs"
                                  placeholder="Saisir ici"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Date d'achat</div>
                            <div class="value"><input type="date" name="date_achat"
                                                                  value="<?php echo $form_values['date_achat']?>"
                                                                  class="input formulaire__champs boite-double__champs"
                                                                  placeholder="Saisir ici"></div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Garde jusqu'à</div>
                            <div class="value"><input type="date" name="garde_jusqua"
                                                                  value="<?php echo $form_values['garde_jusqua']?>"
                                                                  class="input formulaire__champs boite-double__champs"
                                                                  placeholder="Saisir ici"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Note</div>
                            <div class="value">
                                <input type="number" name="note"
                                       value="<?php echo $form_values['note']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Millesime</div>
                            <div class="value">
                                <input type="text" name="millesime"
                                       value="<?php echo $form_values['millesime']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                </div>
                <!--        fin    Information liées au cellier-->

                <div class="form-block">
                    <h6>Informations sur la bouteille</h6>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Url de l'image de la bouteille</div>
                            <div class="value">
                                <input type="text" name="image_bouteille"
                                       value="<?php echo $form_values['image_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Description</div>
                            <div class="value">
                                <input type="text" name="description_bouteille"
                                       value="<?php echo $form_values['description_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Code saq</div>
                            <div class="value ">
                                <input type="text" name="code_saq"
                                  value="<?php echo $form_values['code_saq']?>"
                                  class="input formulaire__champs boite-double__champs"
                                  placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Code cup</div>
                            <div class="value">
                                <input type="text" name="code_cup"
                                       value="<?php echo $form_values['code_cup']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Prix</div>
                            <div class="value">
                                <input type="number" name="prix_bouteille"
                                       value="<?php echo $form_values['prix_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Producteur</div>
                            <div class="value">
                                <input type="text" name="producteur"
                                       value="<?php echo $form_values['producteur']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Url saq</div>
                            <div class="value">
                                <input type="text" name="url_saq"
                                       value="<?php echo $form_values['url_saq']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Biodynamique</div>
                            <div class="value">
                                <input type="checkbox" name="biodynamique"
                                       value="<?php echo $form_values['biodynamique']?>"
                                    <?php if ($form_values['biodynamique']) echo "checked='checked'"; ?>
                                                                  class="checkbox"
                                                                  placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Casher</div>
                            <div class="value">
                                <input type="checkbox" name="casher"
                                       value="<?php echo $form_values['casher']?>"
                                    <?php if ($form_values['casher']) echo "checked='checked'"; ?>
                                                                  class="checkbox"
                                                                  placeholder="Saisir ici">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Desalcoolise</div>
                            <div class="value">
                                <input type="checkbox" name="desalcoolise"
                                       value="<?php echo $form_values['desalcoolise']?>"
                                    <?php if ($form_values['desalcoolise']) echo "checked='checked'"; ?>
                                       class="checkbox"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Equitable</div>
                            <div class="value">
                                <input type="checkbox" name="equitable"
                                       value="<?php echo $form_values['equitable']?>"
                                    <?php if ($form_values['equitable']) echo "checked='checked'"; ?>
                                       class="checkbox"  placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Faible taux alcool</div>
                            <div class="value"><input type="checkbox" name="faible_taux_alcool"
                                                                  value="<?php echo $form_values['faible_taux_alcool']?>"
                                    <?php if ($form_values['faible_taux_alcool']) echo "checked='checked'"; ?>
                                                                  class="checkbox"
                                                                  placeholder="Saisir ici"></div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Produit bio</div>
                            <div class="value">
                                <input type="checkbox" name="produit_bio"
                                       value="<?php echo $form_values['produit_bio']?>"
                                    <?php if ($form_values['produit_bio']) echo "checked='checked'"; ?>
                                       class="checkbox"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Vin nature</div>
                            <div class="value">
                                <input type="checkbox" name="vin_nature"
                                       value="<?php echo $form_values['vin_nature']?>"
                                    <?php if ($form_values['vin_nature']) echo "checked='checked'"; ?>
                                       class="checkbox"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Vin orange</div>
                            <div class="value">
                                <input type="checkbox" name="vin_orange"
                                       value="<?php echo $form_values['vin_orange']?>"
                                    <?php if ($form_values['vin_orange']) echo "checked='checked'"; ?>
                                       class="checkbox"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Pays</div>
                            <div class="value">
                                <input list="pays"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_pays']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_pays" id="nom_pays">

                                <datalist id="pays">
                                    <?php foreach ($pays as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Region</div>
                            <div class="value">
                                <input list="regions"
                                       value="<?php echo $form_values['nom_region']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_region" id="nom_region" >

                                <datalist id="regions">
                                    <?php foreach ($regions as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Type</div>
                            <div class="value">
                                <input list="types"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_type']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_type" id="nom_type" >

                                <datalist id="types">
                                    <?php foreach ($types as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Format</div>
                            <div class="value">
                                <input list="formats"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_format']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_format" id="nom_format" >

                                <datalist id="formats">
                                    <?php foreach ($formats as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Appellation</div>
                            <div class="value">
                                <input list="appellations"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_appellation']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_appellation" id="nom_appellation" >

                                <datalist id="appellations">
                                    <?php foreach ($appellations as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Designation</div>
                            <div class="value">
                                <input list="designations"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_designation']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_designation" id="nom_designation" >

                                <datalist id="designations">
                                    <?php foreach ($designations as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Cepages</div>
                            <div class="value">
                                <input list="cepages"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_cepages']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_cepages" id="nom_cepages" >

                                <datalist id="cepages">
                                    <?php foreach ($cepages as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Taux de sucre</div>
                            <div class="value">
                                <input list="taux_de_sucres"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_taux_de_sucre']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_taux_de_sucre" id="nom_taux_de_sucre" />

                                <datalist id="taux_de_sucres">
                                    <?php foreach ($taux_de_sucres as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Degre d'alcool</div>
                            <div class="value">
                                <input list="degre_alcools"
                                       value="<?php echo $form_values['nom_degre_alcool']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_degre_alcool" id="nom_degre_alcool" />

                                <datalist id="degre_alcools">
                                    <?php foreach ($degre_alcools as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Produit du quebec</div>
                            <div class="value">
                                <input list="produit_du_quebecs"
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['nom_produit_du_quebec']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_produit_du_quebec" id="nom_produit_du_quebec" />

                                <datalist id="produit_du_quebecs">
                                    <?php foreach ($produit_du_quebecs as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Classification</div>
                            <div class="value">
                                <input list="classifications"
                                       value="<?php echo $form_values['nom_classification']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="nom_classification" id="nom_classification" />

                                <datalist id="classifications">
                                    <?php foreach ($classifications as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row submit-bloc">
                    <div class="col-6 info-unit">
                    </div>
                    <div class="col-6 info-unit" >
<!--                        <div >-->
                            <button class="bouton-primaire" type="button" id="fermerFormulaire" >Annuler</button>
                            <button class="bouton-secondaire">Enregistrer</button>
<!--                        </div>-->
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</section>
<!--  note sur une bouteille-->
<section class="section-wrapper texte-photo">
    <div class="boite-double">
        <!--LOGIN-->
        <!--        <div class="boite-double__contenant-form header-with-sub">-->
        <!--            <h2>Avis</h2>-->
        <!--            <div class="sub-header">-->
        <!--                <p class="rating bigger-rating">-->
        <!--                    <span class="fa fa-star checked"></span>-->
        <!--                    <span class="fa fa-star checked"></span>-->
        <!--                    <span class="fa fa-star checked"></span>-->
        <!--                    <span class="fa fa-star"></span>-->
        <!--                    <span class="fa fa-star"></span>-->
        <!--                </p> <p class="small-text">| 65 avis</p>-->
        <!--            </div>-->
        <!--            <div class="sub-header">-->
        <!--                <h2>3,7</h2>&nbsp;&nbsp;sur 5-->
        <!--            </div>-->
        <!--            <div class="sub-header">-->
        <!--                <div class="note">-->
        <!--                    Les avis que vous soumettez doivent respecter notre politique de modération.-->
        <!--                    <p class="action">Voir la politique de modération de la SAQ.</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <div class="info-details">
            <div class='comments'>
                <!--                this is for a nnew comment-->
                <div class="comment">
                    <div class="comment-body">
                        <div class="comment-header">
                            <div class="d-flex">
                                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                <h5>Ajouter une note</h5>
                            </div>
                        </div>
                        <div class="comment-text new-comment">
                            <p class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </p>
                        </div>
                        <!--                        <div class='light-text orange'>Veillez vous connecter pour pouvoir soumettre un commentaire</div>-->
                    </div>
                    <div class="hidden-separator"></div>
                    <div class="comment-body">
                        <div class="comment-header">
                            <div class="d-flex">
                                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                <h5>
                                    Ajouter un nouveau commentaire</h5>
                            </div>
                        </div>
                    </div>
                    <div class="comment-text new-comment">
                            <textarea placeholder='Ajouter un nouveau commentaire'
                                      rows="4"
                                      class="input formulaire__champs boite-double__champs"></textarea>
                    </div>
                    <div class="comment-text submit-bloc">
                        <button class="btn bouton-secondaire">Soumettre</button>
                    </div>
                </div>
                <!--                we should do listing here-->
                <!--                <div class="comment" >-->
                <!--                    <div class="comment-body">-->
                <!--                        <div class="comment-header">-->
                <!--                            <p class="rating">-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                        <div class="comment-header">-->
                <!--                            <b>Miam</b>-->
                <!--                            <span class="light-text">Par Sabrina E.le 22 janvier 2022</span>-->
                <!--                        </div>-->
                <!--                        <div class="comment-text">-->
                <!--                            Le 16% fait son charme (ça soule), mais il manque de carrure.-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="comment" >-->
                <!--                    <div class="comment-body">-->
                <!--                        <div class="comment-header">-->
                <!--                            <p class="rating">-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                        <div class="comment-header">-->
                <!--                            <b>Très déçu</b>-->
                <!--                            <span class="light-text">Par Dominic G.le 14 avril 2022</span>-->
                <!--                        </div>-->
                <!--                        <div class="comment-text">-->
                <!--                            Trop sucré, le rouge est bien meilleur-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="comment" >-->
                <!--                    <div class="comment-body">-->
                <!--                        <div class="comment-header">-->
                <!--                            <p class="rating">-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                        <div class="comment-header">-->
                <!--                            <b>Bof</b>-->
                <!--                            <span class="light-text">Par Frederic F.le 4 novembre 2021</span>-->
                <!--                        </div>-->
                <!--                        <div class="comment-text">-->
                <!--                            Ben ordinaire beaucoup trop sucré !!!-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="comment" >-->
                <!--                    <div class="comment-body">-->
                <!--                        <div class="comment-header">-->
                <!--                            <p class="rating">-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                        <div class="comment-header">-->
                <!--                            <b>Très bon vin</b>-->
                <!--                            <span class="light-text">Par Lyse B.le 20 octobre 2021</span>-->
                <!--                        </div>-->
                <!--                        <div class="comment-text">-->
                <!--                            J'ai adoré ce vin très goûteux doux en bouche.-->
                <!--                            Malheureusement non disponible dans toutes les succursale.-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="comment" >-->
                <!--                    <div class="comment-body">-->
                <!--                        <div class="comment-header">-->
                <!--                            <p class="rating">-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star checked"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                                <span class="fa fa-star"></span>-->
                <!--                            </p>-->
                <!--                        </div>-->
                <!--                        <div class="comment-header">-->
                <!--                            <b>19 Crimes Hard Chard</b>-->
                <!--                            <span class="light-text">Par Lucie Hudon A.le 19 octobre 2021</span>-->
                <!--                        </div>-->
                <!--                        <div class="comment-text">-->
                <!--                            Je le voyais souvent dans le vin rouge et je l'offrais en cadeau et puis je l'ai trouvé dans le vin blanc et je l'adore. Je suis plus vin blanc et je le recommande.-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="pagination">-->
                <!--                   <i class="fa fa-arrow-left" aria-hidden="true"></i>-->
                <!--                    <span class="current_page item">1</span>-->
                <!--                    <span class="item">2</span>-->
                <!--                    <span class="item">3</span>-->
                <!--                    &nbsp;&nbsp;-->
                <!--                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>-->
                <!--                </div>-->
                <!--   end loop comments-->
            </div>

        </div>
    </div>
</section>
<section class="section-wrapper">
    <div class="boite-double flex-column">
        <div class="boite-double__contenant-form">
            <h2>À Découvrir</h2>
        </div>
        <div class="product-cards row">
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11097101-1_1580612720.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Cusumano Angimbé Sicilia 2021
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11254680-1_1591965010.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Kim Crawford Sauvignon Blanc Marlborough
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11133141-1_1580613312.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Folonari Pinot Grigio Delle Venezie
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11072851-1_1588244410.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Le Grand Ballon Val de Loire Chardonnay
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
        </div>
    </div>
</section>


<!--
<section class="section-wrapper banderole">
			<div class="grille grille--3 ">
				<div class="banderole__contenant">
					<div>Celliers</div>
					<div>2</div>
				</div>
				<div class="banderole__contenant">
					<div>Bouteilles</div>
					<div>50</div>
				</div>
				<div class="banderole__contenant">
					<div>À boire</div>
					<div>2</div>
				</div>
			
			</div>
		</section>
		<section  class="section-wrapper vignette">
		

			<h4 class="vignette__entete">Gérer mes collections</h4>
			<br>

			<div class="grille grille--4">
				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/cellier2.jpg" alt="cellier">
					<figcaption class="vignette__titre">Mes celliers</figcaption>
				</figure>

				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/bouteilles1.jpg" alt="bouteille">
					<figcaption class="vignette__titre">Mes bouteilles</figcaption>
				</figure>
	
				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/bouchonblanc.jpg" alt="bouteilles">
					<figcaption class="vignette__titre">Ajouter une bouteille</figcaption>
				</figure>

				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/etagere.jpg" alt="bouteilles">
					<figcaption class="vignette__titre">Ma liste d'achat</figcaption>
				</figure>
			</div>
			
		</section>
-->

