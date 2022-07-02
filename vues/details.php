<!--Page d'accueil non connecté-->
<?php
//    foreach ($product as $key => $value){
//        echo $key . " => ". $value."     -------      \n";
//    }
//    echo "Non". $product['prix'];

if (!isset($pays)) $pays = [];
if (!isset($bouteilles)) $bouteilles = [];
if (!isset($celliers)) $celliers = [];
if (!isset($usager_bouteille)) $usager_bouteille = [];
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
    'url_saq' => null,

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
    'quantite' => null,
    'millesime' => null,
    'commentaires' => null,
    'note' => null,

    'celliers' => [
        'nom_cellier' => null,
        'quantite' => null
    ]
];

$erreur = "";



if (isset($bouteille) && isset($bouteille['id_bouteille']) && $bouteille != null && $bouteille['id_bouteille'] && strlen($bouteille['nom_bouteille'])) {
    $form_values = $bouteille;
  
} else {
    $bouteille = null;
}

foreach ($celliers as &$cellier_dans_le_compte) {

    foreach ($usager_bouteille as $ub) {
        $nom_cellier = $cellier_dans_le_compte['nom_cellier'];
        if ($cellier_dans_le_compte['id_cellier'] == $ub['id_cellier']) {
            $cellier_dans_le_compte['quantite'] = $bouteille ? $ub['quantite_bouteille'] : 0;
        }
    }
}



//echo $_SESSION['utilisateur']['id'];
//print_r($celliers);

?>

<script src="./js/bouteille.js"  type="text/javascript"></script>
<script src="./js/autocomplete.js"  type="text/javascript"></script>
<section class="section-wrapper">
    <h2>Informations</h2>

    <?php if (isset($id_bouteille)) { ?>
        <?php if (!$bouteille) { ?>
            <!--  Le cas d'un id de bouteille inntrouvable dans la base de données-->
            <div class="warrning-message">
                Cette bouteille est introuvable
                <?php if (isset($id_cellier)) { ?>
                    dans ce cellier
                <?php } ?>
            </div>
        <?php } else { ?>
            <!--  Le cas normal-->
            <!--        On ajout un champ hidden pour montrer qu'on veut la modification-->
            <div class="boite-double">
                <div class="boite-double__contenant-form">
                    <div class="product-photo">
                        <img src="<?php echo $form_values['image_bouteille'] ?>" id="image_bouteille" onerror="document.getElementById('image_bouteille').src = './assets/img/default_bouteille.png'; this.onerror=null;" alt="degustation2">
                    </div>

                </div>
                <form class="formulaire info-details" action="./controller/AjouterBouteille.php" method="POST">
                    <input type="hidden" name="nom_cellier" value="<?php echo $nom_cellier ?>" />
                    <input type="hidden" name="id_bouteille" value="<?php echo $form_values['id_bouteille'] ?>" />
                    <input type="hidden" name="id_cellier" value="<?php echo $form_values['id_cellier'] ?>" />
                    <div class="form-block">
                        <h6>Informations sur la bouteille</h6>
                        <div class="row">
                            <div class="col info-unit">
                                <input type="hidden" value="<?php echo $form_values['id_bouteille'] ?>" name="id_bouteille" />
                                <div class="label">Nom de la bouteille(*)</div>
                                <div class="value label-state" style="<?php if (!isset($id_bouteille)) echo 'display: unset' ?>">
                                    <?php echo ($form_values['nom_bouteille'] ?: 'Non défini') ?>
                                </div>
                                <div class="value input-state">
                                    <input list="bouteilles" required value="<?php echo $form_values['nom_bouteille'] ?>" placeholder="Sélectionner ici" data-js-bouteille-select class="input select formulaire__champs boite-double__champs" name="nom_bouteille" id="id_bouteille">

                                    <datalist id="bouteilles">
                                        <?php foreach ($bouteilles as $element) { ?>
                                            <option id="<?= $element['id_bouteille'] ?>" value="<?php echo $element['nom_bouteille'] ?>">
                                            <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Url de l'image de la bouteille</div>
                                <div class="value label-state">
                                    <?php echo $form_values['image_bouteille']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="image_bouteille" value="<?php echo $form_values['image_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Description</div>
                                <div class="value label-state">
                                    <?php echo $form_values['description_bouteille']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="description_bouteille" value="<?php echo $form_values['description_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Code saq</div>
                                <div class="value label-state">
                                    <?php echo $form_values['code_saq']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state"><input type="text" name="code_saq" value="<?php echo $form_values['code_saq'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Code cup</div>
                                <div class="value label-state">
                                    <?php echo $form_values['code_cup']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="code_cup" value="<?php echo $form_values['code_cup'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Prix(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['prix_bouteille']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="prix_bouteille" required value="<?php echo $form_values['prix_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Producteur</div>
                                <div class="value label-state">
                                    <?php echo $form_values['producteur']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="producteur" value="<?php echo $form_values['producteur'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Url saq</div>
                                <div class="value label-state">
                                    <?php echo $form_values['url_saq']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" name="url_saq" value="<?php echo $form_values['url_saq'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Biodynamique</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['biodynamique']) && $form_values['biodynamique'] != null ? ($form_values['biodynamique'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="biodynamique" value="<?php echo $form_values['biodynamique'] ?>" <?php if ($form_values['biodynamique']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Casher</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['casher']) && $form_values['casher'] != null ? ($form_values['casher'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="casher" value="<?php echo $form_values['casher'] ?>" <?php if ($form_values['casher']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Desalcoolise</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['desalcoolise']) && $form_values['desalcoolise'] != null ? ($form_values['desalcoolise'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="desalcoolise" value="<?php echo $form_values['desalcoolise'] ?>" <?php if ($form_values['desalcoolise']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Equitable</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['equitable']) && $form_values['equitable'] != null ? ($form_values['equitable'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="equitable" value="<?php echo $form_values['equitable'] ?>" <?php if ($form_values['equitable']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Faible taux alcool</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['faible_taux_alcool']) && $form_values['faible_taux_alcool'] != null ? ($form_values['faible_taux_alcool'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state"><input type="checkbox" name="faible_taux_alcool" value="<?php echo $form_values['faible_taux_alcool'] ?>" <?php if ($form_values['faible_taux_alcool']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici"></div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Produit bio</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['produit_bio']) && $form_values['produit_bio'] != null ? ($form_values['produit_bio'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="produit_bio" value="<?php echo $form_values['produit_bio'] ?>" <?php if ($form_values['produit_bio']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Vin nature</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['vin_nature']) && $form_values['vin_nature'] != null ? ($form_values['vin_nature'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="vin_nature" value="<?php echo $form_values['vin_nature'] ?>" <?php if ($form_values['vin_nature']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Vin orange</div>
                                <div class="value label-state">
                                    <?php echo isset($form_values['vin_orange']) && $form_values['vin_orange'] != null ? ($form_values['vin_orange'] ? 'Oui' : 'Non')  : 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="checkbox" name="vin_orange" value="<?php echo $form_values['vin_orange'] ?>" <?php if ($form_values['vin_orange']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Pays(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_pays']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="pays" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_pays'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_pays" id="nom_pays">

                                    <datalist id="pays">
                                        <?php foreach ($pays as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Region(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_region']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="regions" required value="<?php echo $form_values['nom_region'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_region" id="nom_region">

                                    <datalist id="regions">
                                        <?php foreach ($regions as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Type(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_type']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="types" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_type'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_type" id="nom_type">

                                    <datalist id="types">
                                        <?php foreach ($types as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Format(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_format']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="formats" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_format'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_format" id="nom_format">

                                    <datalist id="formats">
                                        <?php foreach ($formats as $element) { ?>
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
                                    <?php echo $form_values['nom_appellation']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="appellations" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_appellation'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_appellation" id="nom_appellation">

                                    <datalist id="appellations">
                                        <?php foreach ($appellations as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Designation</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_designation']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="designations" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_designation'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_designation" id="nom_designation">

                                    <datalist id="designations">
                                        <?php foreach ($designations as $element) { ?>
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
                                    <?php echo $form_values['nom_cepages']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="cepages" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_cepages'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_cepages" id="nom_cepages">

                                    <datalist id="cepages">
                                        <?php foreach ($cepages as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Taux de sucre(*)</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_taux_de_sucre']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="taux_de_sucres" placeholder="Sélectionner ici" required value="<?php echo $form_values['nom_taux_de_sucre'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_taux_de_sucre" id="nom_taux_de_sucre" />

                                    <datalist id="taux_de_sucres">
                                        <?php foreach ($taux_de_sucres as $element) { ?>
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
                                    <?php echo $form_values['nom_degre_alcool']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="degre_alcools" value="<?php echo $form_values['nom_degre_alcool'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_degre_alcool" id="nom_degre_alcool" />

                                    <datalist id="degre_alcools">
                                        <?php foreach ($degre_alcools as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Produit du quebec</div>
                                <div class="value label-state">
                                    <?php echo $form_values['nom_produit_du_quebec']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="produit_du_quebecs" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_produit_du_quebec'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_produit_du_quebec" id="nom_produit_du_quebec" />

                                    <datalist id="produit_du_quebecs">
                                        <?php foreach ($produit_du_quebecs as $element) { ?>
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
                                    <?php echo $form_values['nom_classification']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input list="classifications" value="<?php echo $form_values['nom_classification'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_classification" id="nom_classification" />

                                    <datalist id="classifications">
                                        <?php foreach ($classifications as $element) { ?>
                                            <option><?php echo $element['nom'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($id_cellier) && $id_cellier != null) { ?>
                            <input type="hidden" name="celliers[0][nom_cellier]" value="<?php echo $form_values['nom_cellier'] ?>" />
                            <input type="hidden" name="celliers[0][id_cellier]" value="<?php echo $form_values['id_cellier'] ?>" />
                        <?php } ?>

                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Date d'achat</div>
                                <div class="value label-state">
                                    <?php echo $form_values['date_achat']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="date" value="<?php echo $form_values['date_achat'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="date_achat" id="date_achat" />
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Garder jusqu'à</div>
                                <div class="value label-state">
                                    <?php echo $form_values['garde_jusqua']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="date" value="<?php echo $form_values['garde_jusqua'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="garde_jusqua" id="garde_jusqua" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Millisime</div>
                                <div class="value label-state">
                                    <?php echo $form_values['millesime']  ?: 'Non défini' ?>
                                </div>
                                <div class="value input-state">
                                    <input type="text" value="<?php echo $form_values['millesime'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="millesime" id="millesime" />
                                </div>
                            </div>
                            <?php if (isset($id_cellier) && $id_cellier != null) { ?>
                                <div class="col-6 info-unit">
                                    <div class="label">Quantité(*)</div>
                                    <div class="value label-state">
                                        <?php echo $form_values['quantite']  ?: 'Non défini' ?>
                                    </div>
                                    <div class="value input-state">
                                        <input type="hidden" name="celliers[0][id_cellier]" value="<?php echo $id_cellier ?>" />
                                        <input type="number" required min="0" value="<?php echo $form_values['quantite'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="celliers[0][quantite]" id="quantite" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--            Information liées au cellier-->
                    <?php if (!isset($id_cellier) || !$id_cellier) { ?>
                        <div class="form-block" id="cellier-block">
                            <h6>Mes celliers</h6>

                            <?php $key = 0;
                            foreach ($celliers as $cellier) { ?>
                                <div class="row">
                                    <div class="col-6 info-unit">
                                        <div class="label">Cellier</div>
                                        <div class="value">
                                            <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>" name="celliers<?php echo "[" . $key . "]" ?>[id_cellier]" />
                                            <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>" name="celliers<?php echo "[" . $key . "]" ?>[id_cellier]" />
                                            <?php echo $cellier['nom_cellier']  ?: 'Non défini' ?>
                                        </div>
                                    </div>
                                    <div class="col-6 info-unit">
                                        <div class="label">Quantité(*)</div>
                                        <div class="value label-state">
                                            <?php echo $cellier['quantite']  ?: 'Non défini' ?>
                                        </div>
                                        <div class="value input-state">
                                            <input type="number" required min="0" name="celliers<?php echo "[" . $key . "]" ?>[quantite]" value="<?php echo (isset($cellier['quantite']) ? $cellier['quantite'] : 0) ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                        </div>
                                    </div>
                                </div>
                            <?php $key++;
                            } ?>

                            <!--                        <div class="row">-->
                            <!--                            <div class="col-6 info-unit">-->
                            <!--                                <div class="label">Date d'achat</div>-->
                            <!--                                <div class="value label-state">-->
                            <!--                                    --><?php //echo $form_values['date_achat']  ?: 'Non défini' 
                                                                        ?>
                            <!--                                </div>-->
                            <!--                                <div class="value input-state"><input type="date" name="date_achat"-->
                            <!--                                                                      value="--><?php //echo $form_values['date_achat']
                                                                                                                ?>
                            <!--"-->
                            <!--                                                                      class="input formulaire__champs boite-double__champs"-->
                            <!--                                                                      placeholder="Saisir ici"></div>-->
                            <!--                            </div>-->
                            <!--                            <div class="col-6 info-unit">-->
                            <!--                                <div class="label">Garde jusqu'à</div>-->
                            <!--                                <div class="value label-state">-->
                            <!--                                    --><?php //echo $form_values['garde_jusqua']  ?: 'Non défini'
                                                                        ?>
                            <!--                                </div>-->
                            <!--                                <div class="value input-state"><input type="date" name="garde_jusqua"-->
                            <!--                                                                      value="--><?php //echo $form_values['garde_jusqua']
                                                                                                                ?>
                            <!--"-->
                            <!--                                                                      class="input formulaire__champs boite-double__champs"-->
                            <!--                                                                      placeholder="Saisir ici"></div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                        <div class="row">-->
                            <!--                            <div class="col-6 info-unit">-->
                            <!--                                <div class="label">Notes</div>-->
                            <!--                                <div class="value label-state">-->
                            <!--                                    --><?php //echo $form_values['notes']  ?: 'Non défini'
                                                                        ?>
                            <!--                                </div>-->
                            <!--                                <div class="value input-state">-->
                            <!--                                    <input type="number" name="notes"-->
                            <!--                                           value="--><?php //echo $form_values['notes']
                                                                                        ?>
                            <!--"-->
                            <!--                                           class="input formulaire__champs boite-double__champs"-->
                            <!--                                           placeholder="Saisir ici">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="col-6 info-unit">-->
                            <!--                                <div class="label">Millesime</div>-->
                            <!--                                <div class="value label-state">-->
                            <!--                                    --><?php //echo $form_values['millesime']  ?: 'Non défini'
                                                                        ?>
                            <!--                                </div>-->
                            <!--                                <div class="value input-state">-->
                            <!--                                    <input type="text" name="millesime"-->
                            <!--                                           value="--><?php //echo $form_values['millesime']
                                                                                        ?>
                            <!--"-->
                            <!--                                           class="input formulaire__champs boite-double__champs"-->
                            <!--                                           placeholder="Saisir ici">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    <?php } ?>
                    <!--        fin    Information liées au cellier-->
                    <div class="row submit-bloc">
                        <div class="col-6 info-unit">
                            <button class="bouton-danger" type="button" id="askDeleteBtn" <?php if (!$form_values['id_cellier'] || !$form_values['id_bouteille']) {
                                                                                                echo "disabled";
                                                                                            } ?>>Détruire</button>
                            <?php //if(isset($id_bouteille) && $id_bouteille != null) {echo "disabled";}
                            ?>
                            <button class="bouton-secondaire" type="button" id="ouvrirFormulaire">Modifier</button>
                        </div>
                        <div class="col-6 info-unit">

                            <div id="submit_btns">
                                <button class="bouton-primaire" type="button" id="fermerFormulaire">Annuler</button>
                                <button class="bouton-secondaire" id="enregistrerFormulaire">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    <?php } else { ?>
        <!--            Le cas d'ajout d'une nouvelle bouteille-->
        <div class="boite-double">
            <!--LOGIN-->
            <div class="boite-double__contenant-form">
                <div class="product-photo">
                    <img src="<?php echo $form_values['image_bouteille'] ?>" id="image_bouteille" onerror="document.getElementById('image_bouteille').src ='./assets/img/default_bouteille.png'; this.onerror=null;" alt="degustation2">
                </div>

            </div>
            <form class="formulaire info-details" action="./controller/AjouterBouteille.php" accept-charset="UTF-8" method="POST">

                <input type="hidden" name="id_cellier" value="<?php echo $form_values['id_cellier'] ?>" />
                <div class="form-block">
                    <h6>Informations sur la bouteille</h6>
                    <div class="row">
                        <div class="col info-unit">
                            <div class="label">Nom de la bouteille(*)</div>
                            <div class="value">
                                <input list="bouteilles" value="<?php echo $form_values['nom_bouteille'] ?>" placeholder="Sélectionner ici" required data-js-bouteille-select class="input select formulaire__champs boite-double__champs" name="nom_bouteille" id="id_bouteille">

                                <datalist id="bouteilles">
                                    <?php foreach ($bouteilles as $element) { ?>
                                        <option data-js-id-bouteille="<?= $element['id_bouteille'] ?>" value="<?php echo $element['nom_bouteille'] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Url de l'image de la bouteille</div>
                            <div class="value">
                                <input type="text" name="image_bouteille" value="<?php echo $form_values['image_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Description</div>
                            <div class="value">
                                <input type="text" name="description_bouteille" value="<?php echo $form_values['description_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Code saq</div>
                            <div class="value ">
                                <input type="text" name="code_saq" value="<?php echo $form_values['code_saq'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Code cup</div>
                            <div class="value">
                                <input type="text" name="code_cup" value="<?php echo $form_values['code_cup'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Prix(*)</div>
                            <div class="value">
                                <input type="text" name="prix_bouteille" required value="<?php echo $form_values['prix_bouteille'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Producteur</div>
                            <div class="value">
                                <input type="text" name="producteur" value="<?php echo $form_values['producteur'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Url saq</div>
                            <div class="value">
                                <input type="text" name="url_saq" value="<?php echo $form_values['url_saq'] ?>" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Biodynamique</div>
                            <div class="value">
                                <input type="checkbox" name="biodynamique" value="<?php echo $form_values['biodynamique'] ?>" <?php if ($form_values['biodynamique']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Casher</div>
                            <div class="value">
                                <input type="checkbox" name="casher" value="<?php echo $form_values['casher'] ?>" <?php if ($form_values['casher']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Desalcoolise</div>
                            <div class="value">
                                <input type="checkbox" name="desalcoolise" value="<?php echo $form_values['desalcoolise'] ?>" <?php if ($form_values['desalcoolise']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Equitable</div>
                            <div class="value">
                                <input type="checkbox" name="equitable" value="<?php echo $form_values['equitable'] ?>" <?php if ($form_values['equitable']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Faible taux alcool</div>
                            <div class="value"><input type="checkbox" name="faible_taux_alcool" value="<?php echo $form_values['faible_taux_alcool'] ?>" <?php if ($form_values['faible_taux_alcool']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici"></div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Produit bio</div>
                            <div class="value">
                                <input type="checkbox" name="produit_bio" value="<?php echo $form_values['produit_bio'] ?>" <?php if ($form_values['produit_bio']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Vin nature</div>
                            <div class="value">
                                <input type="checkbox" name="vin_nature" value="<?php echo $form_values['vin_nature'] ?>" <?php if ($form_values['vin_nature']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Vin orange</div>
                            <div class="value">
                                <input type="checkbox" name="vin_orange" value="<?php echo $form_values['vin_orange'] ?>" <?php if ($form_values['vin_orange']) echo "checked='checked'"; ?> class="checkbox" placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Pays(*)</div>
                            <div class="value">
                                <input list="pays" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_pays'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_pays" id="nom_pays">

                                <datalist id="pays">
                                    <?php foreach ($pays as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Region(*)</div>
                            <div class="value">
                                <input list="regions" required value="<?php echo $form_values['nom_region'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_region" id="nom_region">

                                <datalist id="regions">
                                    <?php foreach ($regions as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Type(*)</div>
                            <div class="value">
                                <input list="types" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_type'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_type" id="nom_type">

                                <datalist id="types">
                                    <?php foreach ($types as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Format(*)</div>
                            <div class="value">
                                <input list="formats" required placeholder="Sélectionner ici" value="<?php echo $form_values['nom_format'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_format" id="nom_format">

                                <datalist id="formats">
                                    <?php foreach ($formats as $element) { ?>
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
                                <input list="appellations" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_appellation'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_appellation" id="nom_appellation">

                                <datalist id="appellations">
                                    <?php foreach ($appellations as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Designation</div>
                            <div class="value">
                                <input list="designations" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_designation'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_designation" id="nom_designation">

                                <datalist id="designations">
                                    <?php foreach ($designations as $element) { ?>
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
                                <input list="cepages" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_cepages'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_cepages" id="nom_cepages">

                                <datalist id="cepages">
                                    <?php foreach ($cepages as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Taux de sucre(*)</div>
                            <div class="value">
                                <input list="taux_de_sucres" placeholder="Sélectionner ici" required value="<?php echo $form_values['nom_taux_de_sucre'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_taux_de_sucre" id="nom_taux_de_sucre" />

                                <datalist id="taux_de_sucres">
                                    <?php foreach ($taux_de_sucres as $element) { ?>
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
                                <input list="degre_alcools" value="<?php echo $form_values['nom_degre_alcool'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_degre_alcool" id="nom_degre_alcool" />

                                <datalist id="degre_alcools">
                                    <?php foreach ($degre_alcools as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Produit du quebec</div>
                            <div class="value">
                                <input list="produit_du_quebecs" placeholder="Sélectionner ici" value="<?php echo $form_values['nom_produit_du_quebec'] ?>" class="input select formulaire__champs boite-double__champs" name="nom_produit_du_quebec" id="nom_produit_du_quebec" />

                                <datalist id="produit_du_quebecs">
                                    <?php foreach ($produit_du_quebecs as $element) { ?>
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
                                <input list="classifications" value="<?php echo $form_values['nom_classification'] ?>" placeholder="Sélectionner ici" class="input select formulaire__champs boite-double__champs" name="nom_classification" id="nom_classification" />

                                <datalist id="classifications">
                                    <?php foreach ($classifications as $element) { ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Date d'achat</div>
                            <div class="value">
                                <input type="date" value="<?php echo $form_values['date_achat'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="date_achat" id="date_achat" />
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Garder jusqu'à</div>
                            <div class="value">
                                <input type="date" value="<?php echo $form_values['garde_jusqua'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="garde_jusqua" id="garde_jusqua" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Millisime</div>
                            <div class="value">
                                <input type="text" value="<?php echo $form_values['millesime'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="millesime" id="millesime" />
                            </div>
                        </div>
                        <?php if (isset($id_cellier) && $id_cellier != null) { ?>
                            <div class="col-6 info-unit">
                                <div class="label">Quantité(*)</div>
                                <div class="value">
                                    <input type="hidden" name="celliers[0][id_cellier]" value="<?php echo $id_cellier ?>" />
                                    <input type="number" required min="0" value="<?php echo $form_values['quantite'] ?>" placeholder="Sélectionner ici" class="input formulaire__champs boite-double__champs" name="celliers[0][quantite]" id="quantite" />
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <?php if (!isset($id_cellier) || !$id_cellier) { ?>
                    <div class="form-block" id="cellier-block">
                        <h6>Mes celliers</h6>
                        <?php $key = 0;
                        foreach ($celliers as $cellier) { ?>
                            <div class="row">
                                <div class="col-6 info-unit">
                                    <div class="label">Cellier</div>
                                    <div class="value ">
                                        <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>" name="celliers<?php echo "[" . $key . "]" ?>[id_cellier]" />
                                        <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>" name="celliers<?php echo "[" . $key . "]" ?>[id_cellier]" />
                                        <?php echo $cellier['nom_cellier']  ?: 'Non défini' ?>
                                    </div>
                                </div>
                                <div class="col-6 info-unit">
                                    <div class="label">Quantité(*)</div>
                                    <div class="value">
                                        <input type="number" required min="0" name="celliers<?php echo "[" . $key . "]" ?>[quantite]" value="0" class="input formulaire__champs boite-double__champs" placeholder="Saisir ici">
                                    </div>
                                </div>
                            </div>
                        <?php $key++;
                        } ?>
                    </div>
                <?php } ?>

                <div class="row submit-bloc">
                    <div class="col-6 info-unit">
                    </div>
                    <div class="col-6 info-unit">
                        <!--                        <div >-->
                        <button class="bouton-primaire" type="button" id="fermerFormulaire">Annuler</button>
                        <button class="bouton-secondaire">Enregistrer</button>
                        <!--                        </div>-->
                    </div>
                </div>

                <!--            Information liées au cellier-->
                <!--                <div class="form-block">-->
                <!--                    <h6>Informations liés au cellier</h6>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Cellier</div>-->
                <!--                            <div class="value">-->
                <!--                                <input list="usager_celliers"-->
                <!--                                       value="--><?php //echo $form_values['nom_cellier']
                                                                        ?>
                <!--"-->
                <!--                                       placeholder="Sélectionner ici"-->
                <!--                                       class="input select formulaire__champs boite-double__champs"-->
                <!--                                       name="nom_cellier" id="nom_cellier" >-->
                <!---->
                <!--                                <datalist id="usager_celliers">-->
                <!--                                    --><?php //foreach ($usager_celliers as $element){ 
                                                            ?>
                <!--                                        <option>--><?php //echo $element['nom_cellier'] 
                                                                        ?>
                <!--</option>-->
                <!--                                    --><?php //} 
                                                            ?>
                <!--                                </datalist>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Quantité</div>-->
                <!--                            <div class="value ">-->
                <!--                                <input type="number" name="quantite"-->
                <!--                                  value="--><?php //echo $form_values['quantite']
                                                                ?>
                <!--"-->
                <!--                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Date d'achat</div>-->
                <!--                            <div class="value"><input type="date" name="date_achat"-->
                <!--                                                                  value="--><?php //echo $form_values['date_achat']
                                                                                                ?>
                <!--"-->
                <!--                                                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Garde jusqu'à</div>-->
                <!--                            <div class="value"><input type="date" name="garde_jusqua"-->
                <!--                                                                  value="--><?php //echo $form_values['garde_jusqua']
                                                                                                ?>
                <!--"-->
                <!--                                                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Notes</div>-->
                <!--                            <div class="value">-->
                <!--                                <input type="number" name="notes"-->
                <!--                                       value="--><?php //echo $form_values['notes']
                                                                        ?>
                <!--"-->
                <!--                                       class="input formulaire__champs boite-double__champs"-->
                <!--                                       placeholder="Saisir ici">-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Millesime</div>-->
                <!--                            <div class="value">-->
                <!--                                <input type="text" name="millesime"-->
                <!--                                       value="--><?php //echo $form_values['millesime']
                                                                        ?>
                <!--"-->
                <!--                                       class="input formulaire__champs boite-double__champs"-->
                <!--                                       placeholder="Saisir ici">-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--        fin    Information liées au cellier-->
            </form>
        </div>
    <?php } ?>
</section>
<!--  note sur une bouteille-->
<section class="section-wrapper texte-photo w-100">
    <div class="boite-double info-details w-100" style="max-width: unset">

        <form class="form-block formulaire w-100" action="./controller/AjouterBouteille.php" method="POST">
            <input type="hidden" name="estCommentaire" value="1" />
            <div class='comments'>
                <div class="comment">
                    <div class="comment-body">
                        <div class="comment-header">
                            <div class="d-flex">
                                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                <h5>Ajouter une note</h5>
                            </div>
                        </div>
                        <div class="comment-text new-comment">
                            <!--                            <p class="rating">-->
                            <!--                                <span class="fa fa-star checked"></span>-->
                            <!--                                <span class="fa fa-star checked"></span>-->
                            <!--                                <span class="fa fa-star checked"></span>-->
                            <!--                                <span class="fa fa-star"></span>-->
                            <!--                                <span class="fa fa-star"></span>-->
                            <!--                            </p>-->
                            <!--                            <div class="d-flex ">-->
                            <input type="number" name="note" value="<?php echo $form_values['note'] ?>" class="input formulaire__champs boite-double__champs" min="0" max="10" placeholder="Ajouter une note ici entre 0 et 10" />
                            <!--                            </div>-->
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
                        <textarea placeholder='Ajouter un nouveau commentaire' rows="4" name="commentaires" class="input formulaire__champs boite-double__champs"><?php echo $form_values['commentaires'] ?></textarea>
                    </div>
                    <input type="hidden" name="id_bouteille" id="id_bouteille" value="<?php echo $form_values['id_bouteille'] ?>" />
                    <input type="hidden" name="id_cellier" id="id_cellier" value="<?php echo $form_values['id_cellier'] ?>" />
                    <div class="comment-text submit-bloc">
                        <button class="btn bouton-secondaire" <?php if (!isset($bouteille) || !$bouteille) {
                                                                    echo "disabled";
                                                                } ?>>Soumettre</button>
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
        </form>
    </div>
</section>
<!--<section class="section-wrapper">-->
<!--    <div class="boite-double flex-column">-->
<!--        <div class="boite-double__contenant-form">-->
<!--            <h2>À Découvrir</h2>-->
<!--        </div>-->
<!--        <div class="product-cards row">-->
<!--            <div class="card col">-->
<!--                <div class="image">-->
<!--                    <img src="https://www.saq.com/media/catalog/product/1/1/11097101-1_1580612720.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">-->
<!--                </div>-->
<!--                <div class="title">-->
<!--                    Cusumano Angimbé Sicilia 2021-->
<!--                </div>-->
<!--                <div class="title-2">-->
<!--                    Vin-blan-->
<!--                    <span class="divider">|</span>-->
<!--                    375 ml-->
<!--                </div>-->
<!--                <div class="rating">-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star"></span>-->
<!--                    <span class="fa fa-star"></span>&nbsp;&nbsp;-->
<!--                    <span class="small-text">(10)</span>-->
<!--                </div>-->
<!--                <h2>-->
<!--                    10,99 $-->
<!--                </h2>-->
<!--                <button class="bouton-secondaire w-100 submit-button">-->
<!--                    Voir le produit-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="card col">-->
<!--                <div class="image">-->
<!--                    <img src="https://www.saq.com/media/catalog/product/1/1/11254680-1_1591965010.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">-->
<!--                </div>-->
<!--                <div class="title">-->
<!--                    Kim Crawford Sauvignon Blanc Marlborough-->
<!--                </div>-->
<!--                <div class="title-2">-->
<!--                    Vin-blan-->
<!--                    <span class="divider">|</span>-->
<!--                    375 ml-->
<!--                </div>-->
<!--                <div class="rating">-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star"></span>-->
<!--                    <span class="fa fa-star"></span>&nbsp;&nbsp;-->
<!--                    <span class="small-text">(10)</span>-->
<!--                </div>-->
<!--                <h2>-->
<!--                    10,99 $-->
<!--                </h2>-->
<!--                <button class="bouton-secondaire w-100 submit-button">-->
<!--                    Voir le produit-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="card col">-->
<!--                <div class="image">-->
<!--                    <img src="https://www.saq.com/media/catalog/product/1/1/11133141-1_1580613312.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">-->
<!--                </div>-->
<!--                <div class="title">-->
<!--                    Folonari Pinot Grigio Delle Venezie-->
<!--                </div>-->
<!--                <div class="title-2">-->
<!--                    Vin-blan-->
<!--                    <span class="divider">|</span>-->
<!--                    375 ml-->
<!--                </div>-->
<!--                <div class="rating">-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star"></span>-->
<!--                    <span class="fa fa-star"></span>&nbsp;&nbsp;-->
<!--                    <span class="small-text">(10)</span>-->
<!--                </div>-->
<!--                <h2>-->
<!--                    10,99 $-->
<!--                </h2>-->
<!--                <button class="bouton-secondaire w-100 submit-button">-->
<!--                    Voir le produit-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="card col">-->
<!--                <div class="image">-->
<!--                    <img src="https://www.saq.com/media/catalog/product/1/1/11072851-1_1588244410.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">-->
<!--                </div>-->
<!--                <div class="title">-->
<!--                    Le Grand Ballon Val de Loire Chardonnay-->
<!--                </div>-->
<!--                <div class="title-2">-->
<!--                    Vin-blan-->
<!--                    <span class="divider">|</span>-->
<!--                    375 ml-->
<!--                </div>-->
<!--                <div class="rating">-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star checked"></span>-->
<!--                    <span class="fa fa-star"></span>-->
<!--                    <span class="fa fa-star"></span>&nbsp;&nbsp;-->
<!--                    <span class="small-text">(10)</span>-->
<!--                </div>-->
<!--                <h2>-->
<!--                    10,99 $-->
<!--                </h2>-->
<!--                <button class="bouton-secondaire w-100 submit-button">-->
<!--                    Voir le produit-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--MODAL-->
<div class="modal modal--ferme" modal-confirmation-delete>
    <?php if ($erreur !== "") { ?>
        <div class="modal__contenu">
            <p><?php echo $erreur ?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php } else { ?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id']; ?>">
            <h4 class="text-center">Voulez vous vraiment supprimer cette bouteille?</h4>

            <div class="submit-bloc">
                <input type="hidden" name="id_bouteille_input" id="id_bouteille_input" value="<?php echo $form_values['id_bouteille'] ?>" />
                <input type="hidden" name="id_cellier_input" id="id_cellier_input" value="<?php echo $form_values['id_cellier'] ?>" />
                <button data-js-boutonFerme class="bouton-secondaire" id="annulerDetruirebtn">Annuler</button>
                <button class="bouton-danger" id="detruirebtn">
                    Oui, supprimer
                </button>
            </div>
        </div>
    <?php } ?>
</div>

<div modal-modification-statut class="modal--ferme modal">
    <?php if ($erreur !== "") { ?>
        <div class="modal__contenu">
            <p><?php echo $erreur ?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php } else { ?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id']; ?>">
            <h4 class="text-center"><?php echo (isset($message) && $message != null ? $message : ''); ?></h4>

            <div class="submit-bloc">
                <button type="button" value="<?php echo ($form_values['id_cellier'] ?: -1); ?>" class="bouton-secondaire" id="gobackbtn" data-js-boutonAjouterCellier>Retour sur la page précédente</button>
                <button data-js-boutonFerme class="bouton-secondaire" id="annulerDetruirebtn2">Fermer</button>
            </div>

        </div>
    <?php } ?>
</div>

<div modal-annulation class="modal--ferme modal">
    <?php if ($erreur !== "") { ?>
        <div class="modal__contenu">
            <p><?php echo $erreur ?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php } else { ?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id']; ?>">
            <h4 class="text-center">Annulation réussie, Voulez-vous rester sur catte page?</h4>

            <div class="submit-bloc">
                <button onclick="history.back()" type="button" class="bouton-secondaire">Retour sur la page précédente</button>
                <button data-js-boutonFerme class="bouton-secondaire" id="fermerModalAnnulation">Oui, rester</button>
            </div>

        </div>
    <?php } ?>
</div>


<input type="hidden" name="modifStatus" id="modifStatus" value='<?php echo isset($message) && $message != null && strlen($message) > 0 ? $message : null ?>' />
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
					<figcaption class="vignette__titre">Ma 
                        
                    d'achat</figcaption>
				</figure>
			</div>

		</section>
-->