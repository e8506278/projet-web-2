<?php

/**
 * Class Statistique
 * Cette classe possède les fonctions de statistiques des celliers et bouteilles des utilisateurs.
 * 
 * @author Genevieve Mainville
 * @version 1.0
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Statistique extends Modele
{

    /**
     * Cette méthode récupère le nombre de chaque type de vin d'un usager
     * 
     * @param int $id Id de session de l'usager
     * 
     * @throws Exception Erreur de requête sur la base de données 
     * 
     * @return Array Les données.
     */
    public function statistiqueTypeVinUsager($id){

        $rows = array();
        
    }
}