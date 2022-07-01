<?php

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
class Bouteille extends Modele
{
    const TABLE = 'vino__bouteille';


    public function getAdminBouteilles()
    {
        $rows = array();

        $requete = "SELECT id_bouteille, id_cellier, nom_bouteille, url_saq
                    FROM usager__bouteille 
                    ORDER BY id_bouteille";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }

        return $rows;
    }


    public function getAdminRevisions()
    {
        $rows = array();

        $requete = "SELECT id_bouteille, id_cellier, nom_bouteille, url_saq
                    FROM usager__bouteille
                    WHERE  id_bouteille = 1000000
                    ORDER BY id_bouteille";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }

        return $rows;
    }


    public function getListeBouteille()
    {

        $rows = array();
        $res = $this->_db->query('Select * from ' . self::TABLE);
        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
                foreach($row as $cle =>$valeur){
                    $row[$cle] = trim(utf8_encode($row[$cle]));
                }
                $rows[] = $row;
            }
        }

        return $rows;
    }


    /**
     * Cette méthode récupère la liste des bouteilles d'un cellier d'un usager
     *
     * @param int $id_cellier l'id du cellier de l'usagé
     *
     * @throws Exception Erreur de requête sur la base de données
     *
     * @return Array Les données.
     */
    public function getListeBouteilleCellier($id_cellier)
    {
        $rows = array();

        $requete = "SELECT * FROM usager__bouteille 
                    WHERE usager__bouteille.id_cellier = '$id_cellier' 
                    AND usager__bouteille.quantite_bouteille > 0 
                    ORDER BY id_bouteille DESC ";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    foreach($row as $cle =>$valeur){
                        $row[$cle] = trim(utf8_encode($row[$cle]));
                    }
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }
        return $rows;
    }


    public function getOneBouteille($id_bouteille, $id_cellier)
    {
        $rows = array();
        
        $requete = "SELECT 
					    uc.nom_cellier as nom_cellier,
					    ub.id_cellier, 
						ub.date_achat, 
						ub.garde_jusqua, 
                          ub.id_bouteille,
                          ub.nom_bouteille,
                          ub.image_bouteille,
                          ub.code_saq,
                          ub.code_cup,
       
                          ub.pays_id,
                          ub.region_id,
                          ub.type_de_vin_id,
                          ub.description_bouteille,
                          ub.producteur,
                          ub.prix_bouteille,
                          ub.url_saq,
                          ub.url_img,
                          ub.format_id,
                          ub.appellation_id,
                          ub.designation_id,
                          ub.classification_id,
                          ub.cepage_id,
                          ub.taux_de_sucre_id,
                          ub.degre_alcool_id,
                          ub.produit_du_quebec_id,
       
       
                          ub.biodynamique,
                          ub.casher,
                          ub.desalcoolise,
                          ub.equitable,
                          ub.faible_taux_alcool,
                          ub.produit_bio,
                          ub.vin_nature,
                          ub.vin_orange,
                          ub.quantite_bouteille as quantite,
						 ub.millesime, 
                         ub.commentaires, 
                         ub.prix_bouteille, 
                          ub.note, 
              
                         ub.pays_nom,
                         ub.region_nom,
                         ub.type_de_vin_nom ,
                         ub.format_nom ,
                         ub.appellation_nom ,
                         ub.designation_nom,
                         ub.cepage_nom,
                         ub.taux_de_sucre_nom,
                         ub.degre_alcool_nom ,
                         ub.produit_du_quebec_nom,
                         ub.classification_nom

                        from vino__bouteille b
                        LEFT JOIN usager__bouteille ub ON ub.id_bouteille = b.id_bouteille
                    
						LEFT JOIN usager__cellier uc ON uc.id_cellier = ub.id_cellier
						LEFT JOIN vino__format format ON format.id = ub.format_id
                        LEFT JOIN generique__pays pays ON pays.id = ub.pays_id
                        LEFT JOIN vino__region region ON region.id = ub.region_id
                        LEFT JOIN vino__type typ ON typ.id = ub.type_de_vin_id
                        LEFT JOIN vino__cepage cepages ON cepages.id = ub.cepage_id
                        LEFT JOIN vino__appellation appel ON appel.id = ub.appellation_id
                        LEFT JOIN vino__designation designation ON designation.id = ub.designation_id
                        LEFT JOIN vino__taux_de_sucre ts ON ts.id = ub.taux_de_sucre_id
                        LEFT JOIN vino__degre_alcool da ON da.id = ub.degre_alcool_id
                        LEFT JOIN vino__produit_du_quebec pc ON pc.id = ub.produit_du_quebec_id
                        LEFT JOIN vino__classification classif ON classif.id = ub.classification_id
                       WHERE b.id_bouteille = '" . $id_bouteille . "'";
        if ($id_cellier) {
            $requete = $requete . " AND ub.id_cellier = '" . $id_cellier . "'";
        }
        $this->_db->set_charset('utf8');
      
        $res =  $this->_db->query($requete) or die(mysqli_error(MonSQL::getInstance()));
        if ($res) {

            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
            //$this->_db->error;
        }
        return $rows;
    }

    public function getOneBouteilleByName($nom)
    {
        $rows = array();
        $requete = "SELECT 
						ub.id_cellier, 
						ub.date_achat, 
						ub.garde_jusqua, 
						ub.note, 
						ub.quantite_bouteille as quantite,
						ub.quantite_bouteille,
						ub.millesime, 
						ub.commentaires, 
						ub.note, 
       
                        ub.pays_revision,
                        ub.region_revision,
                        ub.type_de_vin_revision,
                        ub.format_revision,
                        ub.appellation_revision,
                        ub.designation_revision,
                        ub.classification_revision,
                        ub.cepage_revision,
                        ub.taux_de_sucre_revision,
                        ub.degre_alcool_revision,
                        ub.produit_du_quebec_revision,
       
       
                         pays.nom AS pays_nom,
                         region.nom as region_nom,
                         typ.nom as type_de_vin_nom,
                         format.nom as format_nom,
                         appel.nom as appellation_nom,
                         designation.nom as designation_nom,
                         cepages.nom as cepage_nom,
                         ts.nom as taux_de_sucre_nom,
                         da.nom as degre_alcool_nom,
                         pc.nom as produit_du_quebec_nom,
                         classif.nom as classification_nom,
                        
                        
                         uc.nom_cellier as nom_cellier,
					
                          b.id_bouteille,
                          b.nom_bouteille,
                          b.image_bouteille,
                          b.code_saq,
                          b.code_cup,
                          b.pays_id,
                          b.region_id,
                          b.type_id,
                          b.description_bouteille,
                          b.producteur,
                          b.prix_bouteille,
                          b.url_saq,
                          b.url_img,
                          b.format_id,
                          b.appellation_id,
                          b.designation_id,
                          b.classification_id,
                          b.cepages_id,
                          b.taux_de_sucre_id,
                          b.degre_alcool_id,
                          b.produit_du_quebec_id,
                          b.biodynamique,
                          b.casher,
                          b.desalcoolise,
                          b.equitable,
                          b.faible_taux_alcool,
                          b.produit_bio,
                          b.vin_nature,
                          b.vin_orange,
              
                         pays.nom AS nom_pays,
                         region.nom as nom_region,
                         typ.nom as nom_type,
                         format.nom as nom_format,
                         appel.nom as nom_appellation,
                         designation.nom as nom_designation,
                         cepages.nom as nom_cepages,
                         ts.nom as nom_taux_de_sucre,
                         da.nom as nom_degre_alcool,
                         pc.nom as nom_produit_du_quebec,
                        classif.nom as nom_classification

                        from vino__bouteille b
                        LEFT JOIN usager__bouteille ub ON ub.id_bouteille = b.id_bouteille
                    
						LEFT JOIN usager__cellier uc ON uc.id_cellier = ub.id_cellier
						LEFT JOIN vino__format format ON format.id = b.format_id
                        LEFT JOIN generique__pays pays ON pays.id = b.pays_id
                        LEFT JOIN vino__region region ON region.id = b.region_id
                        LEFT JOIN vino__type typ ON typ.id = b.type_id
                        LEFT JOIN vino__cepage cepages ON cepages.id = b.cepages_id
                        LEFT JOIN vino__appellation appel ON appel.id = b.appellation_id
                        LEFT JOIN vino__designation designation ON designation.id = b.designation_id
                        LEFT JOIN vino__taux_de_sucre ts ON ts.id = b.taux_de_sucre_id
                        LEFT JOIN vino__degre_alcool da ON da.id = b.degre_alcool_id  
                        LEFT JOIN vino__produit_du_quebec pc ON pc.id = b.produit_du_quebec_id
                        LEFT JOIN vino__classification classif ON classif.id = b.classification_id

                       WHERE b.nom_bouteille = '" . $nom . "'";
        $this->_db->set_charset('utf8');
        $res =  $this->_db->query($requete) or die(mysqli_error(MonSQL::getInstance()));
        if ($res) {

            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
            //$this->_db->error;
        }
        return $rows;
    }

    /**
     * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
     *
     * @param string $nom La chaine de caractère à rechercher
     * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
     *
     * @throws Exception Erreur de requête sur la base de données
     *
     * @return array id et nom de la bouteille trouvée dans le catalogue
     */

    public function autocomplete($nom, $nb_resultat = 10)
    {

        $rows = array();
        $nom = $this->_db->real_escape_string($nom);
        $nom = preg_replace("/\*/", "%", $nom);

        //echo $nom;
        $requete = 'SELECT id, nom FROM vino__bouteille where LOWER(nom) like LOWER("%' . $nom . '%") LIMIT 0,' . $nb_resultat;
        //var_dump($requete);
        if (($res = $this->_db->query($requete)) ==     true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $row['nom'] = trim(utf8_encode($row['nom']));
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de données", 1);
        }


        //var_dump($rows);
        return $rows;
    }


    /**
     * Cette méthode ajoute une ou des bouteilles au cellier
     *
     * @param Array $data Tableau des données représentants la bouteille.
     *
     * @return Boolean Succès ou échec de l'ajout.
     */
    public function ajouterBouteilleCellier($data)
    {
        //TODO : Valider les données.
        //var_dump($data);

        $requete = "INSERT INTO vino__cellier(id_bouteille,date_achat,garde_jusqua,notes,prix,quantite,millesime) VALUES (" .
            "'" . $data->id_bouteille . "'," .
            "'" . $data->date_achat . "'," .
            "'" . $data->garde_jusqua . "'," .
            "'" . $data->notes . "'," .
            "'" . $data->prix . "'," .
            "'" . $data->quantite . "'," .
            "'" . $data->millesime . "')";

        $res = $this->_db->query($requete);

        return $res;
    }

    

    /**
     * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
     *
     * @param int $id_usager , id de session de l'usager
     * @param int $id id de la bouteille
     * 
     * @param int $nombre Nombre de bouteille a ajouter ou retirer
     * 
     * @return String Si les id et nombre ne sont pas des caractères numériques
     *
     */
    public function modifierQuantiteBouteilleCellier($id_usager,$id, $nombre, $action)
    {
            if (is_numeric($id_usager) && is_numeric($id) && is_numeric($nombre)) {
                $requete = $this->_db->query("INSERT INTO bouteille_action SET id_usager = '$id_usager', id_bouteille = '$id', quantite_bouteille =  '$nombre', action = '$action'");
                if($action == "a"){
                    $nombre = 1;
                }else{
                    $nombre = -1;
                }
               
                $modele = new Modele();
                $res = $modele->ajusterQuantiteBouteille($id);
            }   
    }


    public function deleteUsageBouteille($id_bouteille, $id_cellier)
    {
        $query_string = "DELETE from usager__bouteille WHERE id_bouteille = " . $id_bouteille . " AND id_cellier = " . $id_cellier;

        $res = $this->_db->query($query_string);

        return $res;
    }


    public function rechercherBouteillesCellier($id_cellier, $filtres)
    {
        $rows = [];
        $requete = "SELECT id_bouteille, id_cellier, description_bouteille, prix_bouteille, date_achat, garde_jusqua, note, commentaires, quantite_bouteille, millesime, id_vino__bouteille, nom_bouteille, image_bouteille, pays_nom, region_nom, type_de_vin_nom ";
        $requete .= "FROM usager__bouteille ";
        $requete .= "WHERE id_cellier = " . $id_cellier;

        if ($filtres) {
            $aTermes = explode(",", $filtres);
            $lesTermes = "";

            foreach ($aTermes as $terme) {
                $lesTermes .= "*" . $terme . "* ";
            }

            if ($lesTermes) {
                $lesTermes = substr($lesTermes, 0, -1);
                $requete .= " AND MATCH( nom_bouteille, millesime, pays_nom, region_nom, type_de_vin_nom, format_nom, cepage_nom ) AGAINST('" . $lesTermes . "' IN BOOLEAN MODE)";
            }
        }

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }

        return $rows;
    }

    public function getBouteilleCUP($cup){
        $rows = array();
        $requete = "SELECT id_bouteille
                    FROM vino__bouteille 
                    WHERE code_cup = '$cup'";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                  
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }

      
        return $rows;
    }
}
