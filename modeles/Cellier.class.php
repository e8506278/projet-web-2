<?php

/**
 * Class Cellier
 * Cette classe possède les fonctions de gestion des celliers de l'utilisateur.
 * 
 * @author Genevieve Mainville
 * @version 1.0
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Cellier extends Modele
{
    const TABLE = 'vino__cellier';

    public function getListeCellier($id)
    {
        $rows = array();
        $requete = "SELECT * FROM usager__cellier INNER JOIN vino__type_cellier on type_cellier_id = vino__type_cellier.id WHERE id_usager = '$id'";
        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $row['nom'] = trim(utf8_encode($row['nom']));
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
            //$this->_db->error;
        }



        return $rows;
    }


    
}
