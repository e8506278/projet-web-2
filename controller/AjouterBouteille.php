<?php include('./Controler.class.php'); ?>

<?php
ob_start();
if (!class_exists('Lists')) {
    require_once ('../modeles/Lists.class.php');
}
$debug = true;
$message = null;

$returnpage = home_base_url()."?requete=bouteille";
$id_cellier  = $_POST['id_cellier'];
$nom_cellier = $_POST['nom_cellier'];
$bouteille_id = isset($_POST['id_bouteille'])?$_POST['id_bouteille']: null;

if(isset( $_POST['id_cellier']) &&  $_POST['id_cellier'] != null){
    $returnpage = $returnpage.'&id_cellier='.$id_cellier;
}
if(isset($bouteille_id) && $bouteille_id != null){
    $returnpage = $returnpage.'&id_bouteille='.$bouteille_id;
}

if(isset($_POST['estCommentaire'])){
    $query_string = "UPDATE  usager__bouteille SET
                            commentaires = '".$_POST['commentaires']."',
                            note = '".$_POST['note']."'
                            WHERE id_bouteille=".$_POST['id_bouteille'];//
    $message = "Le commentaire a bien été ajouté";
    if($debug){
        echo "<br>";
        echo $query_string;
         echo "<br>";
    }
    $res = MonSQL::getInstance()->query($query_string) or die(mysqli_error(MonSQL::getInstance()));

}else{

    $list = new Lists();

    $pays = $list->findElementByName('pays', $_POST['nom_pays']);
    if(count($pays) > 0){ $pays_id  = $pays[0]['id'];} else { $pays_id = $list->creerNouveauElement('pays',  $_POST['nom_pays']);}

    $region = $list->findElementByName('region', $_POST['nom_region']);
    if(count($region) > 0){ $region_id = $region[0]['id'];} else { $region_id = $list->creerNouveauElement('region',  $_POST['nom_region']);}


    $type = $list->findElementByName('type', $_POST['nom_type']);
    if(count($type) > 0){ $type_id = $type[0]['id'];} else { $type_id = $list->creerNouveauElement('type',  $_POST['nom_type']);}

    $format = $list->findElementByName('format', $_POST['nom_format']);
    if(count($format) > 0){ $format_id = $format[0]['id'];} else { $format_id = $list->creerNouveauElement('format',  $_POST['nom_format']);}

    $appellation = $list->findElementByName('appellation', $_POST['nom_appellation']);
    if(count($appellation) > 0){ $appellation_id = $appellation[0]['id'];} else { $appellation_id = $list->creerNouveauElement('appellation',  $_POST['nom_appellation']);}

    $designation = $list->findElementByName('designation', $_POST['nom_designation']);
    if(count($designation) > 0){ $designation_id = $designation[0]['id'];} else { $designation_id = $list->creerNouveauElement('designation',  $_POST['nom_designation']);}

    $cepage = $list->findElementByName('cepages', $_POST['nom_cepages']);

    if(count($cepage) > 0){ $cepages_id = $cepage[0]['id'];}  else { $cepages_id = $list->creerNouveauElement('cepages',  $_POST['nom_cepages']);}

    $taux_de_sucre = $list->findElementByName('taux_de_sucre', $_POST['nom_taux_de_sucre']);
    if(count($taux_de_sucre) > 0){ $taux_de_sucre_id = $taux_de_sucre[0]['id'];}  else { $taux_de_sucre_id = $list->creerNouveauElement('taux_de_sucre',  $_POST['nom_taux_de_sucre']);}

    $degre_alcool = $list->findElementByName('degre_alcool', $_POST['nom_degre_alcool']);
    if(count($degre_alcool) > 0){ $degre_alcool_id = $degre_alcool[0]['id'];} else { $degre_alcool_id = $list->creerNouveauElement('degre_alcool',  $_POST['nom_degre_alcool']);}

    $produit_du_quebec = $list->findElementByName('produit_du_quebec', $_POST['nom_produit_du_quebec']);
    if(count($produit_du_quebec) > 0){ $produit_du_quebec_id = $produit_du_quebec[0]['id'];} else { $produit_du_quebec_id = $list->creerNouveauElement('produit_du_quebec',  $_POST['nom_produit_du_quebec']);}

    $classification = $list->findElementByName('classifications', $_POST['nom_classification']);
    if(count($classification) > 0){ $classification_id = $classification[0]['id'];} else { $classification_id = $list->creerNouveauElement('classifications',  $_POST['nom_classification']);}





    /*
     * Le code si dessous est testé et marche
     * Le code si dessous concerne les cas suivants
     * Si on essaie d'ajouter une nouvelle bouteille avec une list de celliers chacune avec une quantité définie
     * Si cette bouteille à ajouter existe dans la table vino__table ou pas
     * */

    /*
     * Ajouter une nouvelle bouteille
     * */


    $message = "Opération réussie";
   
//    echo $bouteille_id;; die();
    foreach ( $_POST['celliers'] as  $key => $cellier){
        $ub = null;
        if($bouteille_id)
            $ub = $list->getUsagerBouteille( $bouteille_id, $cellier['id_cellier']);

        if($debug){
             echo "<br><br>";
            print_r($ub);
            echo "<br><br>";
        }
            if(!$ub){
                if(!isset($cellier['quantite']) || !$cellier['quantite']){
                    continue;
                }
                if($cellier['quantite'] < 0){
                    $cellier['quantite'] = 0;
                }
                $query_string = "INSERT INTO usager__bouteille(
                            id_cellier ,
                            nom_bouteille,
                            image_bouteille ,
                            description_bouteille ,
                            code_saq ,
                            code_cup ,
                            prix_bouteille ,
                            url_saq,
                            producteur ,
                            biodynamique,
                            casher,
                            desalcoolise,
                            equitable,
                            faible_taux_alcool,
                            produit_bio,
                            vin_nature,
                            vin_orange,
                            pays_id,
                            region_id,
                            type_de_vin_id,
                            format_id,
                            appellation_id,
                            designation_id,
                            cepage_id,
                            taux_de_sucre_id,
                            degre_alcool_id,
                            produit_du_quebec_id,
                            classification_id, 
                            quantite_bouteille ,
                            date_achat ,
                            garde_jusqua ,
                            millesime
                              
                    ) VALUES (
                          ".$cellier['id_cellier'].",
                           '".$_POST['nom_bouteille']."', 
                          '".$_POST['image_bouteille']."',
                          '".$_POST['description_bouteille']."',
                          ".($_POST['code_saq'] ?: 'NULL').",
                          ".($_POST['code_cup'] ?: 'NULL').",
                          '".$_POST['prix_bouteille']."',
                          '".$_POST['url_saq']."',
                          '".$_POST['producteur']."',
                          ".(isset($_POST['biodynamique'])? 1: 0).",
                          ".(isset($_POST['casher'])? 1: 0).",
                          ".(isset($_POST['desalcoolise'])? 1: 0).",
                          ".(isset($_POST['equitable'])? 1: 0).",
                          ".(isset($_POST['faible_taux_alcool'])? 1: 0).",
                          ".(isset($_POST['produit_bio'])? 1: 0).",
                          ".(isset($_POST['vin_nature'])? 1: 0).",
                          ".(isset($_POST['vin_orange'])? 1: 0).",
                          ".($pays_id ?: 'NULL').",
                          ".($region_id?: 'NULL').",
                          ".($type_id ?: 'NULL').",
                          ".($format_id ?: 'NULL').",
                          ".($appellation_id ?: 'NULL').",
                          ".($designation_id ?: 'NULL').",
                          ".($cepages_id ?: 'NULL').",
                          ".($taux_de_sucre_id ?: 'NULL').",
                          ".($degre_alcool_id ?: 'NULL').",
                          ".($produit_du_quebec_id ?: 'NULL').",
                          ".($classification_id ?: 'NULL').",
                          '".($cellier['quantite'] ?: 0)."',
                          ".($_POST['date_achat'] ? "'".$_POST['date_achat']."'":  'NULL' ).",
                          ".($_POST['garde_jusqua'] ? "'".$_POST['garde_jusqua']."'"  : 'NULL' ).",
                         '".($_POST['millesime'])."'
                    )";
            }else{
                $query_string = "UPDATE  usager__bouteille SET 
                            nom_bouteille =  '".$_POST['nom_bouteille']."',
                            image_bouteille =  '".$_POST['image_bouteille']."',
                            description_bouteille  = '".$_POST['description_bouteille']."',
                            code_saq  =  ".($_POST['code_saq'] ?: 'NULL').",
                            code_cup =  ".($_POST['code_cup']?: 'NULL').",
                            prix_bouteille =  '".$_POST['prix_bouteille']."',
                            url_saq =  '".$_POST['url_saq']."',
                            producteur =  '".$_POST['producteur']."',
                            biodynamique  =  ".(isset($_POST['biodynamique']) ? 1: 0).",
                            casher  =  ".(isset($_POST['casher']) ? 1: 0).",
                            desalcoolise =  ".(isset($_POST['desalcoolise']) ? 1: 0).",
                            equitable =  ".(isset($_POST['equitable']) ? 1: 0).",
                            faible_taux_alcool=  ".(isset($_POST['faible_taux_alcool']) ? 1: 0).",
                            produit_bio=  ".(isset($_POST['produit_bio']) ? 1: 0).",
                            vin_nature=  ".(isset($_POST['vin_nature']) ? 1: 0).",
                            vin_orange=  ".(isset($_POST['vin_orange']) ? 1: 0).",
                            pays_id=  ".($pays_id?: 'NULL').",
                            region_id=  ".($region_id ?: 'NULL').",
                            type_de_vin_id=  ".($type_id ?: 'NULL').",
                            format_id=  ".($format_id ?: 'NULL').",
                            appellation_id=  ".($appellation_id ?: 'NULL').",
                            designation_id=  ".($designation_id ?: 'NULL').",
                            cepage_id=  ".($cepages_id ?: 'NULL').",
                            taux_de_sucre_id=  ".($taux_de_sucre_id ?: 'NULL').",
                            degre_alcool_id=  ".($degre_alcool_id ?: 'NULL').",
                            produit_du_quebec_id=  ".($produit_du_quebec_id ?: 'NULL').",
                            classification_id  =  ".($classification_id ?: 'NULL').",
                            quantite_bouteille = '".($cellier['quantite'] ?: 0)."',
                            date_achat = ".($_POST['date_achat'] ? "'".$_POST['date_achat']."'":  'NULL' ).",
                            garde_jusqua = ".($_POST['garde_jusqua'] ? "'".$_POST['garde_jusqua']."'"  : 'NULL' ).",
                            millesime = '".($_POST['millesime'])."'
                            WHERE id_cellier=".$cellier['id_cellier']." AND id_bouteille=".$bouteille_id;
            }

            if(isset($cellier['id_cellier']) && $cellier['id_cellier'] != null){

                if($debug){
                  echo "<br>";
                  echo $query_string;
                 echo "<br>";
                }
                $res = MonSQL::getInstance()->query($query_string) or die(mysqli_error(MonSQL::getInstance()));

            }
        }



}


echo "Traitement terminé avec succès !<br><br>";
ECHO "Redirection ...";



if(isset($message) && $message != null){
    $returnpage = $returnpage.'&message='.$message;
}
// exit(header("Location:".$returnpage));
if (headers_sent()) {
    die("Un issue avec la redirection, svp cliquer ici pour retourner à la page précédente: <a href='../index.php?requete=listeBouteilleCellier&id_cellier=$id_cellier&nom_cellier=$nom_cellier'>Page précédente</a>");
}
else{
    exit(header("Location:../index.php?requete=listeBouteilleCellier&id_cellier=$id_cellier&nom_cellier=$nom_cellier"));
    
}
/*
 *
 * Une fonction util pour avoir le base url
 *
 * */
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
ob_end_flush();
?>

