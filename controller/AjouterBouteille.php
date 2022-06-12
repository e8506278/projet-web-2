<?php
if (!class_exists('Lists')) {
    require_once ('../modeles/Lists.class.php');
}

//if($_POST){
//    print_r($_POST);
    echo $_POST['nom_pays'];
//}



$list = new Lists();


//$bouteille = Lists::findElementByName('bouteille', $_POST['nom_bouteille']);
//if(count($bouteille) > 0){ $bouteille  = $bouteille[0];}

$pays = $list->findElementByName('pays', $_POST['nom_pays']);
if(count($pays) > 0){ $pays  = $pays[0];} else { $pays =$list->creerNouveauElement('pays',  $_POST['nom_pays']);}


//print_r($pays);
//print_r($pays);
//$region = $list->findElementByName('region', $_POST['nom_region']);
//if(count($region) > 0){ $region = $region[0];}
//
//$type = $list->findElementByName('type', $_POST['nom_type']);
//if(count($type) > 0){ $type = $type[0];}
//
//$format = $list->findElementByName('format', $_POST['nom_format']);
//if(count($format) > 0){ $format = $format[0];}
//
//$appellation = $list->findElementByName('appellation', $_POST['nom_appellation']);
//if(count($appellation) > 0){ $appellation = $appellation[0];}
//
//$designation = $list->findElementByName('designation', $_POST['nom_designation']);
//if(count($designation) > 0){ $designation = $designation[0];}
//
//$cepage = $list->findElementByName('cepages', $_POST['nom_cepages']);
//if(count($cepage) > 0){ $cepage = $cepage[0];}
//
//$taux_de_sucre = $list->findElementByName('taux_de_sucre', $_POST['nom_taux_de_sucre']);
//if(count($taux_de_sucre) > 0){ $taux_de_sucre = $taux_de_sucre[0];}
//
//$degre_alcool = $list->findElementByName('degre_alcool', $_POST['nom_degre_alcool']);
//if(count($degre_alcool) > 0){ $degre_alcool = $degre_alcool[0];}
//
//$produit_du_quebec = $list->findElementByName('produit_du_quebec', $_POST['nom_produit_du_quebec']);
//if(count($produit_du_quebec) > 0){ $produit_du_quebec = $produit_du_quebec[0];}
//
//$classification = $list->findElementByName('classifications', $_POST['nom_classification']);
//if(count($classification) > 0){ $classification = $classification[0];}











