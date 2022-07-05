

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
    'url_saq'=> null,

    'biodynamique' => false,
    'casher' => false,
    'desalcoolise' => false,
    'equitable' => false,
    'faible_taux_alcool'  => false,
    'produit_bio' => false,
    'vin_nature'  => false,
    'vin_orange'  => false,

    'pays_nom' => null,
    'region_nom' => null,
    'type_de_vin_nom' => null,
    'format_nom' => null,
    'appellation_nom'  => null,
    'designation_nom' => null,
    'cepage_nom' => null,
    'taux_de_sucre_nom'  => null,
    'degre_alcool_nom' => null,
    'produit_du_quebec_nom'  => null,
    'classification_nom'  => null,

    'pays_revision' => null,
    'region_revision' => null,
    'type_de_vin_revision' => null,
    'format_revision' => null,
    'appellation_revision' => null,
    'designation_revision' => null,
    'classification_revision' => null,
    'cepage_revision' => null,
    'taux_de_sucre_revision' => null,
    'degre_alcool_revision' => null,
    'produit_du_quebec_revision' => null,

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



if(isset($bouteille) && isset($bouteille['id_bouteille']) && $bouteille != null && $bouteille['id_bouteille'] && strlen($bouteille['nom_bouteille'])){
    $form_values = $bouteille;
}else{
    $bouteille = null;
}

foreach ($celliers as & $cellier_dans_le_compte){
   
    foreach ($usager_bouteille as $ub){
        $nom_cellier = $cellier_dans_le_compte['nom_cellier'];
        if($cellier_dans_le_compte['id_cellier'] == $ub['id_cellier']){
            $cellier_dans_le_compte['quantite'] = $bouteille ? $ub['quantite_bouteille']: 0;
            $cellier_dans_le_compte['id_bouteille'] = $bouteille ? $ub['id_bouteille']: 0;
        }
    }
}

if(isset($form_values['image_bouteille']) && $form_values['image_bouteille'] != null){

    if(strpos($form_values['image_bouteille'], 'photos') !== false &&
        (substr($form_values['image_bouteille'], 0, 7) != "http://") &&
        (substr($form_values['image_bouteille'], 0, 8) != "https://")
    ){
        // Le cas d'une image local chargé depuis la gallerie
        $form_values['image_bouteille'] = home_base_url().$form_values['image_bouteille'];
    }
}
/*
// fonction pour récupérer l'url absolu
function home_base_url(){
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

    $tmpURL = dirname(__FILE__);

    $tmpURL = str_replace(chr(92),'/',$tmpURL);
    $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
    $tmpURL = ltrim($tmpURL,'/');
    $tmpURL = rtrim($tmpURL, '/');
    if (strpos($tmpURL,'/')){
        $tmpURL = explode('/',$tmpURL);
        $tmpURL = $tmpURL[0];
    }
    if ($tmpURL !== $_SERVER['HTTP_HOST'])
        $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
    else
        $base_url .= $tmpURL.'/';
    return $base_url;
}


*/
?>

<script src="./js/bouteille.js"  type="text/javascript"></script>
<script src="./js/autocomplete.js"  type="text/javascript"></script>
<!--<script src="./js/Celliers/celliers.js"  type="text/javascript"></script>-->
<!--<script src="./js/Celliers/NouveauCellier.js"  type="text/javascript"></script>-->
<!--<script type="module" src="./js/Celliers/celliers.js" defer></script>-->
<section class="section-wrapper">
    <h2>Informations</h2>

    <?php if(isset($id_bouteille)  || isset($vino_id) ) {?>
        <?php if(!$bouteille) {?>
            <!--  Le cas d'un id de bouteille inntrouvable dans la base de données-->
            <div class="warrning-message">
                Cette bouteille est introuvable
                <?php if(isset($id_cellier)) {?>
                    dans ce cellier
                <?php } ?>
            </div>
        <?php }else{ ?>
            <!--  Le cas normal-->
            <!--   Le cas de la modification-->
            <div class="boite-double">
                <div class="boite-double__contenant-form">
                    <div class="product-photo">
                        <img src="<?php echo $form_values['image_bouteille']?>"
                             id="image_bouteille"
                             onerror="document.getElementById('image_bouteille').src = './assets/img/default_bouteille.png'; this.onerror=null;"
                             alt="degustation2">
                    </div>

                </div>
                <form class="formulaire info-details"  action="./controller/AjouterBouteille.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden"
                               name="nom_cellier"
                               value="<?php echo $nom_cellier?>"
                        />
                        <input type="hidden"
                               name="id_bouteille"
                               value="<?php echo $form_values['id_bouteille']?>"
                        />
                        <input type="hidden"
                               name="id_cellier"
                               value="<?php echo $form_values['id_cellier']?>"
                        />
                        <!--   block favoris-->

                        <div class="form-block label-state">
                               <div class="row">
                                   <div class="col-4 info-unit icon-btn
                                    <?php echo isset($form_values['favori_bouteille']) && $form_values['favori_bouteille']
                                       ? "active-icon-btn": ""; ?>"
                                        onclick="modifierFavoris(<?php echo isset($form_values['favori_bouteille']) && $form_values['favori_bouteille'] ? 0: 1; ?>,
                                        <?php echo isset($id_bouteille) ? $id_bouteille: 0; ?>,
                                        <?php echo isset($form_values['id_cellier']) ? $form_values['id_cellier']: 0; ?>,
                                        <?php echo isset($vino_id) ? $vino_id: 0; ?>)"
                                   >
                                       <i class="fa fa-heart" aria-hidden="true"></i>&nbsp;
                                       <?php echo isset($form_values['favori_bouteille']) && $form_values['favori_bouteille']
                                           ? "Favoris": "Ajouter au favoris"; ?>
                                   </div>
                                   <div class="col-4 info-unit icon-btn
                                    <?php echo isset($form_values['essayer_bouteille']) && $form_values['essayer_bouteille']
                                       ? "active-icon-btn": ""; ?>"
                                        onclick="modifierAEssayer( <?php echo isset($form_values['essayer_bouteille']) && $form_values['essayer_bouteille'] ? 0: 1; ?>,
                                        <?php echo isset($id_bouteille) ? $id_bouteille: 0; ?>,
                                        <?php echo isset($form_values['id_cellier']) ? $form_values['id_cellier']: 0; ?>,
                                        <?php echo isset($vino_id) ? $vino_id: 0; ?>)"
                                   >
                                       <i class="fa fa-beer" aria-hidden="true"></i>&nbsp;
                                       <?php echo isset($form_values['essayer_bouteille']) && $form_values['essayer_bouteille']
                                           ? "A déguster": "A déguster"; ?>
                                   </div>
                                   <div class="col-4 info-unit icon-btn
                                    <?php echo isset($form_values['achat_bouteille']) && $form_values['achat_bouteille']
                                       ? "active-icon-btn": ""; ?>"
                                        onclick="modifierAAcheter(<?php echo isset($form_values['achat_bouteille']) && $form_values['achat_bouteille'] ? 0: 1; ?>,
                                        <?php echo isset($id_bouteille) ? $id_bouteille: 0; ?>,
                                        <?php echo isset($form_values['id_cellier']) ? $form_values['id_cellier']: 0; ?>,
                                        <?php echo isset($vino_id) ? $vino_id: 0; ?>)"
                                   >
                                       <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                                       <?php echo isset($form_values['achat_bouteille']) && $form_values['achat_bouteille']
                                           ? "A acheter": "Ajouter à la liste d'achat"; ?>
                                   </div>
                               </div>
                           </div>

                        <!-- Information sur la bouteille     -->
                        <div class="form-block">
                            <h6>Informations sur la bouteille</h6>
                            <?php if($form_values['id_cellier']) { ?>
                                <div class="row">
                                    <div class="col-6 info-unit">
                                        <div class="label">Cellier</div>
                                        <div class="value">
                                            <?php echo $form_values['nom_cellier']  ?: 'Non défini'?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!--INFOS-->
                            <div>
                                                        <div class="row">
                                                            <div class="col info-unit">
                                                                <input type="hidden" value="<?php echo $form_values['id_bouteille']?>" name="id_bouteille"/>
                                                                <div class="label">Nom de la bouteille(*)</div>
                                                                <div class="value label-state" style="<?php if(!isset($id_bouteille)) echo 'display: unset'?>">
                                                                    <?php echo ($form_values['nom_bouteille'] ?: 'Non défini') ?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="bouteilles"
                                                                        required
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
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Type(*)</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['type_de_vin_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="types"
                                                                        required
                                                                        placeholder="Sélectionner ici"
                                                                        value="<?php echo $form_values['type_de_vin_nom']?>"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="type_de_vin_nom" id="type_de_vin_nom" >

                                                                    <datalist id="types">
                                                                        <?php foreach ($types as $element){ ?>
                                                                            <option><?php echo $element['nom'] ?></option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Pays(*)</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['pays_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="pays"
                                                                        required
                                                                        placeholder="Sélectionner ici"
                                                                        value="<?php echo $form_values['pays_nom']?>"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="pays_nom" id="pays_nom">

                                                                    <datalist id="pays">
                                                                        <?php foreach ($pays as $element){ ?>
                                                                            <option><?php echo $element['nom'] ?></option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Region(*)</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['region_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="regions"
                                                                        required
                                                                        value="<?php echo $form_values['region_nom']?>"
                                                                        placeholder="Sélectionner ici"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="region_nom" id="region_nom" >

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
                                                                <div class="label">Cepages</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['cepage_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="cepages"
                                                                        placeholder="Sélectionner ici"
                                                                        value="<?php echo $form_values['cepage_nom']?>"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="cepage_nom" id="cepage_nom" >

                                                                    <datalist id="cepages">
                                                                        <?php foreach ($cepages as $element){ ?>
                                                                            <option><?php echo $element['nom'] ?></option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Millésime</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['millesime']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input type="text"
                                                                        value="<?php echo $form_values['millesime']?>"
                                                                        placeholder="Sélectionner ici"
                                                                        class="input formulaire__champs boite-double__champs"
                                                                        name="millesime"
                                                                        id="millesime" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Format(*)</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['format_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="formats"
                                                                        required
                                                                        placeholder="Sélectionner ici"
                                                                        value="<?php echo $form_values['format_nom']?>"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="format_nom" id="format_nom" >

                                                                    <datalist id="formats">
                                                                        <?php foreach ($formats as $element){ ?>
                                                                            <option><?php echo $element['nom'] ?></option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Degre d'alcool</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['degre_alcool_nom']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input list="degre_alcools"
                                                                        value="<?php echo $form_values['degre_alcool_nom']?>"
                                                                        placeholder="Sélectionner ici"
                                                                        class="input select formulaire__champs boite-double__champs"
                                                                        name="degre_alcool_nom" id="degre_alcool_nom" />

                                                                    <datalist id="degre_alcools">
                                                                        <?php foreach ($degre_alcools as $element){ ?>
                                                                            <option><?php echo $element['nom'] ?></option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Date d'achat</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['date_achat']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input type="date"
                                                                        value="<?php echo $form_values['date_achat']?>"
                                                                        placeholder="Sélectionner ici"
                                                                        class="input formulaire__champs boite-double__champs"
                                                                        name="date_achat"
                                                                        id="date_achat" />
                                                                </div>
                                                            </div>
                                                            <div class="col-6 info-unit">
                                                                <div class="label">Garder jusqu'à</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['garde_jusqua']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input type="date"
                                                                        value="<?php echo $form_values['garde_jusqua']?>"
                                                                        placeholder="Sélectionner ici"
                                                                        class="input formulaire__champs boite-double__champs"
                                                                        name="garde_jusqua"
                                                                        id="garde_jusqua" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 info-unit">
                                                                <div class="label">Prix(*)</div>
                                                                <div class="value label-state">
                                                                    <?php echo $form_values['prix_bouteille']  ?: 'Non défini'?>
                                                                </div>
                                                                <div class="value input-state">
                                                                    <input type="text" name="prix_bouteille"
                                                                        required
                                                                        value="<?php echo $form_values['prix_bouteille']?>"
                                                                        class="input formulaire__champs boite-double__champs"
                                                                        placeholder="Saisir ici">
                                                                </div>
                                                            </div>
                                                        </div>

                            </div>
                            <!--Général-->
                            <div>
                                <h4>INFORMATIONS GÉNÉRALES</h4>
                                <div class="row">
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
                                    <div class="col-6 info-unit">
                                        <div class="label">Appellation</div>
                                        <div class="value label-state">
                                            <?php echo $form_values['appellation_nom']  ?: 'Non défini'?>
                                        </div>
                                        <div class="value input-state">
                                            <input list="appellations"
                                                    placeholder="Sélectionner ici"
                                                    value="<?php echo $form_values['appellation_nom']?>"
                                                    class="input select formulaire__champs boite-double__champs"
                                                    name="appellation_nom" id="appellation_nom" >

                                            <datalist id="appellations">
                                                <?php foreach ($appellations as $element){ ?>
                                                    <option><?php echo $element['nom'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 info-unit">
                                        <div class="label">Designation</div>
                                        <div class="value label-state">
                                            <?php echo $form_values['designation_nom']  ?: 'Non défini'?>
                                        </div>
                                        <div class="value input-state">
                                            <input list="designations"
                                                    placeholder="Sélectionner ici"
                                                    value="<?php echo $form_values['designation_nom']?>"
                                                    class="input select formulaire__champs boite-double__champs"
                                                    name="designation_nom" id="designation_nom" >

                                            <datalist id="designations">
                                                <?php foreach ($designations as $element){ ?>
                                                    <option><?php echo $element['nom'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-6 info-unit">
                                        <div class="label">Classification</div>
                                        <div class="value label-state">
                                            <?php echo $form_values['classification_nom']  ?: 'Non défini'?>
                                        </div>
                                        <div class="value input-state">
                                            <input list="classifications"
                                                    value="<?php echo $form_values['classification_nom']?>"
                                                    placeholder="Sélectionner ici"
                                                    class="input select formulaire__champs boite-double__champs"
                                                    name="classification_nom" id="classification_nom" />

                                            <datalist id="classifications">
                                                <?php foreach ($classifications as $element){ ?>
                                                    <option><?php echo $element['nom'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 info-unit">
                                        <div class="label">Taux de sucre(*)</div>
                                        <div class="value label-state">
                                            <?php echo $form_values['taux_de_sucre_nom']  ?: 'Non défini'?>
                                        </div>
                                        <div class="value input-state">
                                            <input list="taux_de_sucres"
                                                placeholder="Sélectionner ici"
                                                required
                                                value="<?php echo $form_values['taux_de_sucre_nom']?>"
                                                class="input select formulaire__champs boite-double__champs"
                                                name="taux_de_sucre_nom" id="taux_de_sucre_nom" />

                                            <datalist id="taux_de_sucres">
                                                <?php foreach ($taux_de_sucres as $element){ ?>
                                                    <option><?php echo $element['nom'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-6 info-unit">
                                        <div class="label">Produit du quebec</div>
                                        <div class="value label-state">
                                            <?php echo $form_values['produit_du_quebec_nom']  ?: 'Non défini'?>
                                        </div>
                                        <div class="value input-state">
                                            <input list="produit_du_quebecs"
                                                    placeholder="Sélectionner ici"
                                                    value="<?php echo $form_values['produit_du_quebec_nom']?>"
                                                    class="input select formulaire__champs boite-double__champs"
                                                    name="produit_du_quebec_nom" id="produit_du_quebec_nom" />

                                            <datalist id="produit_du_quebecs">
                                                <?php foreach ($produit_du_quebecs as $element){ ?>
                                                    <option><?php echo $element['nom'] ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--IMAGE ET CUP-->
                            <div>
                                <h4>IMAGE ET CUP</h4>
                                <div class="row">
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
                                        <div class="value input-state" style="margin-top: 10px;">
                                            <input type="file" name="photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Particularité-->
                            <div>
                                <h4>PARTICULARITÉS</h4>
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
                            </div>
                            <!--INFORMATION SAQ-->
                            <div>
                                <h4>INFORMATIONS SAQ</h4>
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
                                        <div class="label">Url saq</div>
                                        <div class="value label-state">
                                            <?php if($form_values['url_saq'] )  { ?>
                                                <a href="<?php echo $form_values['url_saq']  ?>" target="_blank"><?php echo $form_values['url_saq']; ?></a>
                                            <?php } else { echo 'Non défini' ;}?>
                                        </div>
                                        <div class="value input-state">
                                            <input type="text" name="url_saq"
                                                    value="<?php echo $form_values['url_saq']?>"
                                                    class="input formulaire__champs boite-double__champs"
                                                    placeholder="Saisir ici">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!--            Information liées au cellier-->
                        <div >
                            <h6>Gérer les quantité de la bouteille dans mes celliers</h6>
                            <?php if($celliers && is_array($celliers) && count($celliers)>0) {?>
                                <?php $key = 0; foreach ($celliers as $cellier) {?>
                                    <div class="row">
                                        <div class="col-6 info-unit">
                                            <div class="label">Cellier</div>
                                            <div class="value">
                                                <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>"
                                                       name="celliers<?php echo "[".$key."]"?>[id_cellier]"/>
                                                <input type="hidden" value="<?php echo $cellier['id_bouteille'] ?>"
                                                       name="celliers<?php echo "[".$key."]"?>[id_bouteille]"/>
                                                <?php echo $cellier['nom_cellier']  ?: 'Non défini'?>
                                                <?php echo  $cellier['nom_cellier'] && $cellier['id_cellier'] === $id_cellier ? '(Cellier actuel)': ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-6 info-unit">
                                            <div class="label">Quantité(*)</div>
                                            <div class="value label-state">
                                                <?php echo isset($cellier['quantite'])  ? $cellier['quantite'] : '0'?>
                                            </div>
                                            <div class="value input-state">
                                                <input type="number"
                                                       required
                                                       min="0"
                                                       name="celliers<?php echo "[".$key."]"?>[quantite]"
                                                       value="<?php echo(isset($cellier['quantite']) ? $cellier['quantite'] : 0) ?>"
                                                       class="input formulaire__champs boite-double__champs"
                                                       placeholder="Saisir ici"></div>
                                        </div>
                                    </div>
                                    <?php $key++; } ?>
                            <?php } else { ?>
                                <div  class="empty-state-message">Il semble que vous n'avez aucun cellier pour le moment</div>
                                <div  class="empty-state-message">
                                    clicquer ici pour ajouter un nouveau cellier
                                </div>
                                <div class="empty-state-message">
                                    <i class="carte--aligne-centre" >
                                        <svg data-js-nouveaucellier class="carte__lien-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg>
                                    </i>
                                </div>
                            <?php } ?>
                            <?php if(isset($id_cellier) && $id_cellier!=null) {?>
                                <input type="hidden"
                                       name="celliers[0][nom_cellier]"
                                       value="<?php echo $form_values['nom_cellier']?>"
                                />
                                <input type="hidden"
                                       name="celliers[0][id_cellier]"
                                       value="<?php echo $form_values['id_cellier']?>"
                                />
                            <?php } ?>

                            
                            </div>
                            
                        </div>

                        </div>
                        <div class="row submit-bloc">
                            <div class="col-12 info-unit">
                                <?php if(isset($id_bouteille) && $id_bouteille != null) {  ?>
                                    <div id="submit_btns" class="submit_btns">
                                        <button class="bouton-secondaire bouton-danger" type="button" id="askDeleteBtn"
                                                style="display:  <?php if(!$form_values['id_cellier'] || !$form_values['id_bouteille']) {echo "none";}?>"
                                            >Détruire</button>
                                        <button class="bouton-secondaire" type="button" id="ouvrirFormulaire"
                                        >Modifier</button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-12 info-unit" >

                                <div  class="submit_btns">
                                    <button class="bouton-primaire" type="button" id="fermerFormulaire"
                                    >Annuler</button>
                                    <button class="bouton-secondaire" id="enregistrerFormulaire">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-block label-state">
                            <h6>Partager sur les réseaux sociaux</h6>
                            <div id="button_share">

                                <div class="row">
                                    <div class="col-6 info-unit icon-btn">
                                        <!-- Facebook  -->
                                        <a id="shareFacebook" href="http://www.facebook.com/sharer.php?u=" target="_blank">
                                            <svg class="share-social-media" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                        </a>&nbsp;&nbsp;
                                        <!-- Twitter -->
                                        <a id="shareTwitter" href="" target="_blank">
                                            <svg class="share-social-media" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                </form>

            </div>
        <?php } ?>
    <?php }else{ ?>
<!--    Le cas d'ajout d'une nouvelle bouteille-->
        <div class="boite-double">
            <div class="boite-double__contenant-form">
                <div class="product-photo">
                    <img src="<?php echo $form_values['image_bouteille']?>"
                         id="image_bouteille"
                         onerror="document.getElementById('image_bouteille').src ='./assets/img/default_bouteille.png'; this.onerror=null;"
                         alt="degustation2">
                </div>
            </div>
            <form class="formulaire info-details"  action="./controller/AjouterBouteille.php" method="POST" enctype="multipart/form-data">

                <input type="hidden"
                       name="id_cellier"
                       value="<?php echo $form_values['id_cellier']?>"
                />
                <div class="form-block">
                    <h6>Informations sur la bouteille</h6>
                    <div class="row">
                        <div class="col info-unit">
                            <div class="label">Nom de la bouteille(*)</div>
                            <div class="value">
                                <input list="bouteilles"
                                       value="<?php echo $form_values['nom_bouteille']?>"
                                       placeholder="Sélectionner ici"
                                       required
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
                        <div class="col-6 info-unit">
                            <div class="label">Url de l'image de la bouteille</div>
                            <div class="value">
                                <input type="text" name="image_bouteille"
                                       value="<?php echo $form_values['image_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                            <div class="value" style="margin-top: 10px;">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Description</div>
                            <div class="value">
                                <input type="text" name="description_bouteille"
                                       value="<?php echo $form_values['description_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Code saq</div>
                            <div class="value ">
                                <input type="text" name="code_saq"
                                  value="<?php echo $form_values['code_saq']?>"
                                  class="input formulaire__champs boite-double__champs"
                                  placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Code cup</div>
                            <div class="value">
                                <input type="text" name="code_cup"
                                       value="<?php echo $form_values['code_cup']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Prix(*)</div>
                            <div class="value">
                                <input type="text"
                                       name="prix_bouteille"
                                       required
                                       value="<?php echo $form_values['prix_bouteille']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 info-unit">
                            <div class="label">Producteur</div>
                            <div class="value">
                                <input type="text" name="producteur"
                                       value="<?php echo $form_values['producteur']?>"
                                       class="input formulaire__champs boite-double__champs"
                                       placeholder="Saisir ici">
                            </div>
                        </div>
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
                            <div class="label">Pays(*)</div>
                            <div class="value">
                                <input list="pays"
                                       required
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['pays_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="pays_nom" id="pays_nom">

                                <datalist id="pays">
                                    <?php foreach ($pays as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Region(*)</div>
                            <div class="value">
                                <input list="regions"
                                       required
                                       value="<?php echo $form_values['region_nom']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="region_nom" id="region_nom" >

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
                            <div class="label">Type(*)</div>
                            <div class="value">
                                <input list="types"
                                       required
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['type_de_vin_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="type_de_vin_nom" id="type_de_vin_nom" >

                                <datalist id="types">
                                    <?php foreach ($types as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Format(*)</div>
                            <div class="value">
                                <input list="formats"
                                       required
                                       placeholder="Sélectionner ici"
                                       value="<?php echo $form_values['format_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="format_nom" id="format_nom" >

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
                                       value="<?php echo $form_values['appellation_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="appellation_nom" id="appellation_nom" >

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
                                       value="<?php echo $form_values['designation_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="designation_nom" id="designation_nom" >

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
                                       value="<?php echo $form_values['cepage_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="cepage_nom" id="cepage_nom" >

                                <datalist id="cepages">
                                    <?php foreach ($cepages as $element){ ?>
                                        <option><?php echo $element['nom'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6 info-unit">
                            <div class="label">Taux de sucre(*)</div>
                            <div class="value">
                                <input list="taux_de_sucres"
                                       placeholder="Sélectionner ici"
                                       required
                                       value="<?php echo $form_values['taux_de_sucre_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="taux_de_sucre_nom" id="taux_de_sucre_nom" />

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
                                       value="<?php echo $form_values['degre_alcool_nom']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="degre_alcool_nom" id="degre_alcool_nom" />

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
                                       value="<?php echo $form_values['produit_du_quebec_nom']?>"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="produit_du_quebec_nom" id="produit_du_quebec_nom" />

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
                                       value="<?php echo $form_values['classification_nom']?>"
                                       placeholder="Sélectionner ici"
                                       class="input select formulaire__champs boite-double__champs"
                                       name="classification_nom" id="classification_nom" />

                                <datalist id="classifications">
                                    <?php foreach ($classifications as $element){ ?>
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
                                    <input type="date"
                                           value="<?php echo $form_values['date_achat']?>"
                                           placeholder="Sélectionner ici"
                                           class="input formulaire__champs boite-double__champs"
                                           name="date_achat" id="date_achat" />
                                </div>
                            </div>
                            <div class="col-6 info-unit">
                                <div class="label">Garder jusqu'à</div>
                                <div class="value">
                                    <input type="date"
                                           value="<?php echo $form_values['garde_jusqua']?>"
                                           placeholder="Sélectionner ici"
                                           class="input formulaire__champs boite-double__champs"
                                           name="garde_jusqua" id="garde_jusqua" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 info-unit">
                                <div class="label">Millisime</div>
                                <div class="value">
                                    <input type="text"
                                           value="<?php echo $form_values['millesime']?>"
                                           placeholder="Sélectionner ici"
                                           class="input formulaire__champs boite-double__champs"
                                           name="millesime" id="millesime" />
                                </div>
                            </div>
                            <?php if(isset($id_cellier) && $id_cellier!=null) {?>
                                <div class="col-6 info-unit">
                                    <div class="label">Quantité(*)</div>
                                    <div class="value">
                                        <input type="hidden" name="celliers[0][id_cellier]"
                                               value="<?php echo $id_cellier?>"
                                        />
                                        <input type="number"
                                               required
                                               min="0"
                                               value="<?php echo $form_values['quantite']?>"
                                               placeholder="Sélectionner ici"
                                               class="input formulaire__champs boite-double__champs"
                                               name="celliers[0][quantite]"
                                               id="quantite" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                </div>

                <?php if(!isset($id_cellier) || !$id_cellier) {?>
                    <div class="form-block" >
                        <h6>Mes celliers</h6>
                        <?php if($celliers && is_array($celliers) && count($celliers)>0) {?>
                            <?php $key = 0; foreach ($celliers as $cellier) {?>
                                <div class="row">
                                    <div class="col-6 info-unit">
                                        <div class="label">Cellier</div>
                                        <div class="value ">
                                            <input type="hidden" value="<?php echo $cellier['id_cellier'] ?>"
                                                   name="celliers<?php echo "[".$key."]"?>[id_cellier]"
                                            />
                                            <input type="hidden" value="<?php echo $cellier['id_bouteille'] ?>"
                                                   name="celliers<?php echo "[".$key."]"?>[id_bouteille]"/>
                                            <?php echo $cellier['nom_cellier']  ?: 'Non défini'?>
                                        </div>
                                    </div>
                                    <div class="col-6 info-unit">
                                        <div class="label">Quantité(*)</div>
                                        <div class="value">
                                            <input type="number"
                                                   required
                                                   min="0"
                                                   name="celliers<?php echo "[".$key."]"?>[quantite]"
                                                   value="0"
                                                   class="input formulaire__champs boite-double__champs"
                                                   placeholder="Saisir ici"></div>
                                    </div>
                                </div>
                                <?php $key++; } ?>
                        <?php } else { ?>
                            <div class="empty-state-message">Il semble que vous n'avez aucun cellier pour le moment</div>
                            <div  class="empty-state-message">
                                clicquer ici pour ajouter un nouveau cellier
                            </div>
                            <div class="empty-state-message">
                                <i class="carte--aligne-centre" >
                                    <svg data-js-nouveaucellier class="carte__lien-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg>
                                </i>
                            </div>
                        <?php } ?>
                    </div>
                <?php }?>

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

                <!--            Information liées au cellier-->
                <!--                <div class="form-block">-->
                <!--                    <h6>Informations liés au cellier</h6>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Cellier</div>-->
                <!--                            <div class="value">-->
                <!--                                <input list="usager_celliers"-->
                <!--                                       value="--><?php //echo $form_values['nom_cellier']?><!--"-->
                <!--                                       placeholder="Sélectionner ici"-->
                <!--                                       class="input select formulaire__champs boite-double__champs"-->
                <!--                                       name="nom_cellier" id="nom_cellier" >-->
                <!---->
                <!--                                <datalist id="usager_celliers">-->
                <!--                                    --><?php //foreach ($usager_celliers as $element){ ?>
                <!--                                        <option>--><?php //echo $element['nom_cellier'] ?><!--</option>-->
                <!--                                    --><?php //} ?>
                <!--                                </datalist>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Quantité</div>-->
                <!--                            <div class="value ">-->
                <!--                                <input type="number" name="quantite"-->
                <!--                                  value="--><?php //echo $form_values['quantite']?><!--"-->
                <!--                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Date d'achat</div>-->
                <!--                            <div class="value"><input type="date" name="date_achat"-->
                <!--                                                                  value="--><?php //echo $form_values['date_achat']?><!--"-->
                <!--                                                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Garde jusqu'à</div>-->
                <!--                            <div class="value"><input type="date" name="garde_jusqua"-->
                <!--                                                                  value="--><?php //echo $form_values['garde_jusqua']?><!--"-->
                <!--                                                                  class="input formulaire__champs boite-double__champs"-->
                <!--                                                                  placeholder="Saisir ici"></div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Notes</div>-->
                <!--                            <div class="value">-->
                <!--                                <input type="number" name="notes"-->
                <!--                                       value="--><?php //echo $form_values['notes']?><!--"-->
                <!--                                       class="input formulaire__champs boite-double__champs"-->
                <!--                                       placeholder="Saisir ici">-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="col-6 info-unit">-->
                <!--                            <div class="label">Millesime</div>-->
                <!--                            <div class="value">-->
                <!--                                <input type="text" name="millesime"-->
                <!--                                       value="--><?php //echo $form_values['millesime']?><!--"-->
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
<?php if($bouteille){ ?>
<section class="section-wrapper texte-photo w-100">
    <div class="boite-double info-details w-100" style="max-width: unset">

        <form class="form-block formulaire w-100"  action="./controller/AjouterBouteille.php" method="POST">
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
                                <div class="star-container">
                                    <?php
                                    $note = $form_values['note'];
                                    for($i = 1; $i <= 5; $i++) {
                                        if($i <= $note) { ?>
                                            <span class="star_rated note-input"
                                                  onclick="ratestar(<?php echo $i; ?>, <?php echo $form_values['id_bouteille']?>, <?php echo $form_values['id_cellier']?>)">
                                                &#x2605;
                                            </span>
                                        <?php } else {  ?>
                                            <span
                                                  onclick="ratestar(<?php echo $i; ?>, <?php echo $form_values['id_bouteille']?>, <?php echo $form_values['id_cellier']?>)"
                                                  class="note-input">
                                                &#x2605;
                                            </span>
                                        <?php  }
                                    }
                                    echo '('.$note.'/5)'; ?>
                                </div>

<!--                                <input type="number" name="note"-->
<!--                                       value="--><?php //echo $form_values['note']?><!--"-->
<!--                                       class="input formulaire__champs boite-double__champs"-->
<!--                                       min="0"-->
<!--                                       max="10"-->
<!--                                       placeholder="Ajouter une note ici entre 0 et 10"/>-->
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
                            <textarea placeholder='Ajouter un nouveau commentaire'
                                      rows="4"
                                      name="commentaires"
                                      class="input formulaire__champs boite-double__champs"><?php echo $form_values['commentaires']?></textarea>
                    </div>
                    <input type="hidden"
                           name="id_bouteille"
                           id="id_bouteille"
                           value="<?php echo $form_values['id_bouteille']?>" />
                    <input type="hidden"
                           name="id_cellier"
                           id="id_cellier"
                           value="<?php echo $form_values['id_cellier']?>" />
                    <div class="comment-text submit-bloc">
                        <button class="btn bouton-secondaire"
                            <?php if(!isset($bouteille) || !$bouteille) {echo "disabled";}?>
                        >Soumettre</button>
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
<?php } ?>
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
    <?php if($erreur !== ""){?>
        <div class="modal__contenu">
            <p><?php echo $erreur?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php }else{?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id'];?>" >
            <h4 class="text-center">Voulez vous vraiment supprimer cette bouteille?</h4>

            <div class="submit-bloc">
                <input type="hidden"
                       name="id_bouteille_input"
                       id="id_bouteille_input"
                       value="<?php echo $form_values['id_bouteille']?>" />
                <input type="hidden"
                       name="id_cellier_input"
                       id="id_cellier_input"
                       value="<?php echo $form_values['id_cellier']?>" />
                <button data-js-boutonFerme class="bouton-secondaire" id="annulerDetruirebtn">Annuler</button>
                <button  class="bouton-danger" id="detruirebtn">
                    Oui, supprimer
                </button>
            </div>
        </div>
    <?php }?>
</div>

<div   modal-modification-statut class="modal--ferme modal">
    <?php if($erreur !== ""){?>
        <div class="modal__contenu">
            <p><?php echo $erreur?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php }else{?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id'];?>">
            <h4 class="text-center"><?php echo (isset($message) && $message != null ? $message: ''); ?></h4>

            <div class="submit-bloc">
                <button type="button" value="<?php echo ($form_values['id_cellier'] ?: -1) ;?>"  class="bouton-secondaire" id="gobackbtn" data-js-boutonAjouterCellier>Retour sur la page précédente</button>
                <button data-js-boutonFerme class="bouton-secondaire" id="annulerDetruirebtn2">Fermer</button>
            </div>

        </div>
    <?php }?>
</div>

<div   modal-annulation class="modal--ferme modal">
    <?php if($erreur !== ""){?>
        <div class="modal__contenu">
            <p><?php echo $erreur?></p>
            <div class="formulaire__champs">
                <button data-js-boutonFerme class="bouton-secondaire">Annuler</button>
            </div>
        </div>
    <?php }else{?>
        <div class="modal__contenu" data-js-usager="<?php echo $_SESSION['utilisateur']['id'];?>">
            <h4 class="text-center">Annulation réussie, Voulez-vous rester sur catte page?</h4>

            <div class="submit-bloc">
                <button onclick="history.back()" type="button" class="bouton-secondaire">Retour sur la page précédente</button>
                <button data-js-boutonFerme class="bouton-secondaire" id="fermerModalAnnulation">Oui, rester</button>
            </div>

        </div>
    <?php }?>
</div>


<!--MODAL créer cellier-->
<div class="modal modal--ferme" data-js-modal>
    <div class="modal__contenu" data-js-modalcontenu data-js-usager="<?php echo $_SESSION['utilisateur']['id'];?>">
        <!--TITRE-->
        <h4 data-js-titremodal></h4>
        <!--CHAMPS-->
        <!--Nom cellier-->
        <div class="formulaire__champs">
            <label>Nom du cellier:</label>
            <input type="text" name="nom_cellier" class="modal__input" required>
            <small class="carte__erreur" data-js-erreurnom></small>
        </div>
        <div class="formulaire__champs">
            <!--Type cellier-->
            <label class="radio"> Cellier
                <input type="radio" class="carte__radio-btn" class="modal__input" name="type_cellier_id" value="1">
                <i class="carte--aligne-centre"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M336.6 156.5C327.3 148.1 322.6 136.5 327.1 125.3L357.6 49.18C362.7 36.27 377.8 30.36 389.7 37.63C410.9 50.63 430 66.62 446.5 85.02C455.7 95.21 452.9 110.9 441.5 118.5L373.9 163.5C363.6 170.4 349.8 168.1 340.5 159.9C339.2 158.7 337.9 157.6 336.6 156.5H336.6zM297.7 112.6C293.2 123.1 280.9 129.8 268.7 128.6C264.6 128.2 260.3 128 256 128C251.7 128 247.4 128.2 243.3 128.6C231.1 129.8 218.8 123.1 214.3 112.6L183.1 36.82C178.8 24.02 185.5 9.433 198.1 6.374C217.3 2.203 236.4 0 256 0C275.6 0 294.7 2.203 313 6.374C326.5 9.433 333.2 24.02 328 36.82L297.7 112.6zM122.3 37.63C134.2 30.36 149.3 36.27 154.4 49.18L184.9 125.3C189.4 136.5 184.7 148.1 175.4 156.5C174.1 157.6 172.8 158.7 171.5 159.9C162.2 168.1 148.4 170.4 138.1 163.5L70.52 118.5C59.13 110.9 56.32 95.21 65.46 85.02C81.99 66.62 101.1 50.63 122.3 37.63H122.3zM379.5 222.1C376.3 210.7 379.7 198.1 389.5 191.6L458.1 145.8C469.7 138.1 485.6 141.9 491.2 154.7C501.6 178.8 508.4 204.8 510.9 232C512.1 245.2 501.3 255.1 488 255.1H408C394.7 255.1 384.2 245.2 381.8 232.1C381.1 228.7 380.4 225.4 379.5 222.1V222.1zM122.5 191.6C132.3 198.1 135.7 210.7 132.5 222.1C131.6 225.4 130.9 228.7 130.2 232.1C127.8 245.2 117.3 256 104 256H24C10.75 256-.1184 245.2 1.107 232C3.636 204.8 10.43 178.8 20.82 154.7C26.36 141.9 42.26 138.1 53.91 145.8L122.5 191.6zM104 288C117.3 288 128 298.7 128 312V360C128 373.3 117.3 384 104 384H24C10.75 384 0 373.3 0 360V312C0 298.7 10.75 288 24 288H104zM488 288C501.3 288 512 298.7 512 312V360C512 373.3 501.3 384 488 384H408C394.7 384 384 373.3 384 360V312C384 298.7 394.7 288 408 288H488zM104 416C117.3 416 128 426.7 128 440V488C128 501.3 117.3 512 104 512H24C10.75 512 0 501.3 0 488V440C0 426.7 10.75 416 24 416H104zM488 416C501.3 416 512 426.7 512 440V488C512 501.3 501.3 512 488 512H408C394.7 512 384 501.3 384 488V440C384 426.7 394.7 416 408 416H488zM272 464C272 472.8 264.8 480 256 480C247.2 480 240 472.8 240 464V192C240 183.2 247.2 176 256 176C264.8 176 272 183.2 272 192V464zM208 464C208 472.8 200.8 480 192 480C183.2 480 176 472.8 176 464V224C176 215.2 183.2 208 192 208C200.8 208 208 215.2 208 224V464zM336 464C336 472.8 328.8 480 320 480C311.2 480 304 472.8 304 464V224C304 215.2 311.2 208 320 208C328.8 208 336 215.2 336 224V464z"/></svg></i>
            </label>
            <label class="radio"> Réfrigérateur
                <input type="radio" class="carte__radio-btn" class="modal__input" name="type_cellier_id" value="2">
                <i class="carte--aligne-centre"><span  class="material-symbols-outlined carte__vertical-icon">kitchen</span></i>
            </label>
            <small class="carte__erreur"data-js-erreurradio></small>
        </div>
        <!--Description cellier-->
        <div class="formulaire__champs">
            <label>Description:</label>
            <input type="text" name="description_cellier" class="modal__input" value="">
        </div>
        <!--BOUTON-->
        <div class="formulaire__champs" data-js-boutonmodal>
            <button data-js-annulercellier class="bouton-secondaire">Annuler</button>
        </div>
    </div>
</div>

<input type="hidden" name="modifStatus" id="modifStatus" value='<?php echo isset($message) && $message != null && strlen($message) > 0 ? $message: null ?>'  />
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