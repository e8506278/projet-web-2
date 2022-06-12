<?php

//require_once ('./Modele.class.php');

if (!class_exists('MonSQL')) {
    require_once ('../lib/MonSQL.class.php');
}
/**
 * Class Bouteille
 * Cette classe possède les fonctions de gestion des bouteilles dans le cellier et des bouteilles dans le catalogue complet.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Lists
{
    public function getList($param)
    {
        $table = null;
        $condition = null;
        switch ($param){
            case 'pays': {
                $table = 'vino__pays';
                break;
            }
            case 'bouteille': {
                $table = 'vino__bouteille';
                break;
            }
            case 'cellier': {
                $table = 'vino__cellier';
                break;
            }
            case 'usager_cellier': {
                $table = 'usager__cellier';
                $condition = 'WHERE id_usager='.$_SESSION['utilisateur']['id'];
                break;
            }
            case 'region': {
                $table = 'vino__region';
                break;
            }
            case 'type': {
                $table = 'vino__type';
                break;
            }
            case 'format': {
                $table = 'vino__format';
                break;
            }
            case 'appellation': {
                $table = 'vino__appellation';
                break;
            }
            case 'designation': {
                $table = 'vino__designation';
                break;
            }
            case 'classifications': {
                $table = 'vino__classification';
                break;
            }
            case 'cepages': {
                $table = 'vino__cepages';
                break;
            }
            case 'taux_de_sucre': {
                $table = 'vino__taux_de_sucre';
                break;
            }
            case 'degre_alcool': {
                $table = 'vino__degre_alcool';
                break;
            }
            case 'produit_du_quebec': {
                $table = 'vino__produit_du_quebec';
                break;
            }
            default :{
                $table = null;
            }
        }

        if(!$table){
            return [];
        }

        $rows = array();
        $query_string = 'Select * from ' . $table;
        if($condition){
            $query_string = $query_string.' '. $condition;
        }
        $res = MonSQL::getInstance()->query($query_string);
        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    public function findElementByName($entite, $nom){
        $table = null;
        $condition = null;
        switch ($entite){
            case 'pays': {
                $table = 'vino__pays';
                break;
            }
            case 'bouteille': {
                $table = 'vino__bouteille';
                break;
            }
            case 'cellier': {
                $table = 'vino__cellier';
                break;
            }
            case 'usager_cellier': {
                $table = 'usager__cellier';
                $condition = ' AND id_usager='.$_SESSION['utilisateur']['id'];
                break;
            }
            case 'region': {
                $table = 'vino__region';
                break;
            }
            case 'type': {
                $table = 'vino__type';
                break;
            }
            case 'format': {
                $table = 'vino__format';
                break;
            }
            case 'appellation': {
                $table = 'vino__appellation';
                break;
            }
            case 'designation': {
                $table = 'vino__designation';
                break;
            }
            case 'classifications': {
                $table = 'vino__classification';
                break;
            }
            case 'cepages': {
                $table = 'vino__cepages';
                break;
            }
            case 'taux_de_sucre': {
                $table = 'vino__taux_de_sucre';
                break;
            }
            case 'degre_alcool': {
                $table = 'vino__degre_alcool';
                break;
            }
            case 'produit_du_quebec': {
                $table = 'vino__produit_du_quebec';
                break;
            }
            default :{
                $table = null;
            }
        }
        if(!$table){
            return null;
        }
        $query_string = 'Select * from ' . $table;
        $query_string = $query_string." WHERE nom = '".$nom."' ";
        if($condition){
            $query_string = $query_string. $condition;
        }

        $res = MonSQL::getInstance()->query($query_string);

        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    public function creerNouveauElement($entite, $value){
        $table = null;
        $condition = null;
        if(!$value || !(strlen($value)>0)){
            return null;
        }
        switch ($entite){
            case 'pays': {
                $table = 'vino__pays';
                break;
            }
            case 'bouteille': {
                $table = 'vino__bouteille';
                break;
            }
            case 'cellier': {
                $table = 'vino__cellier';
                break;
            }
            case 'usager_cellier': {
                $table = 'usager__cellier';
                $condition = 'WHERE id_usager='.$_SESSION['utilisateur']['id'];
                break;
            }
            case 'region': {
                $table = 'vino__region';
                break;
            }
            case 'type': {
                $table = 'vino__type';
                break;
            }
            case 'format': {
                $table = 'vino__format';
                break;
            }
            case 'appellation': {
                $table = 'vino__appellation';
                break;
            }
            case 'designation': {
                $table = 'vino__designation';
                break;
            }
            case 'classifications': {
                $table = 'vino__classification';
                break;
            }
            case 'cepages': {
                $table = 'vino__cepages';
                break;
            }
            case 'taux_de_sucre': {
                $table = 'vino__taux_de_sucre';
                break;
            }
            case 'degre_alcool': {
                $table = 'vino__degre_alcool';
                break;
            }
            case 'produit_du_quebec': {
                $table = 'vino__produit_du_quebec';
                break;
            }
            default :{
                $table = null;
            }
        }

        if(!$table){
            return [];
        }
        $rows = array();
        $query_string = '';
        $query_string = $query_string. "INSERT INTO ".$table."(nom) VALUES('".$value."') ";

        if (MonSQL::getInstance()->query($query_string) === TRUE) {
            $last_id = MonSQL::getInstance()->insert_id;
        } else {
            $last_id  = null;
        }
        return $last_id;
    }
}
