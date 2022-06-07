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
    const TABLE = 'usager__cellier';

    /**
     * Cette méthode récupère la liste des celliers d'un usagé
     * 
     * @param int $id Id de session de l'usagé
     * 
     * @return Array Les données.
     */

    public function getListeCellier($id)
    {
        $rows = array();
        $requete = "SELECT usager__cellier.id_cellier, id_usager, nom_cellier, description_cellier, type_cellier_id, 
                    SUM(quantite_bouteille)as bouteille_total, 
                    SUM(prix)as prix_total, vino__type_cellier.nom_type_cellier, vino__type_cellier.nom_commun_type_cellier, vino__type_cellier.id_type_cellier 
                    FROM usager__cellier 
                    INNER JOIN vino__type_cellier on type_cellier_id = vino__type_cellier.id_type_cellier 
                    LEFT OUTER JOIN usager__bouteille on usager__cellier.id_cellier = usager__bouteille.id_cellier 
                    WHERE id_usager = '$id'
                    Group by usager__cellier.id_cellier";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $row['nom_cellier'] = trim(utf8_encode($row['nom_cellier']));
                    $row['description_cellier'] = trim(utf8_encode($row['description_cellier']));
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
            
        }
        return $rows;
    }

    /**
     * Cette méthode crée un nouveau cellier.
     * 
     * @param Array $data Tableau des données représentants le cellier.
     * 
     * @return Boolean Succès ou échec de l'ajout.
     */
    public function ajouterNouveauCellier($data){
        
        $requete = "INSERT INTO usager__cellier(id_usager,nom_cellier,description_cellier,type_cellier_id) VALUES (" .
            "'" . $data->id_usager . "'," .
            "'" . $data->nom_cellier . "'," .
            "'" . $data->description_cellier . "'," .
            "'" . $data->type_cellier_id . "')";

        $res = $this->_db->query($requete);

        return $res;

    }

    /**
     * Cette méthode modifie les informations d'un cellier
     * 
     * @param Array $data Tableau des informations à modifier
     * 
     * @return Boolean Succès ou échec de l'ajout.
     */
    public function modifierCellier($data)
    {
        $id = $data['id_cellier'];
        $requete = "UPDATE TABLE SET nom_cellier, description_cellier, type_cellier_id 
                    WHERE id_cellier = '$id'" ;

        $res = $this->_db->query($requete);

        return $res;
    }
    
}
