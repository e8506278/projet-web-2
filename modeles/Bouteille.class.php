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

    public function getListeBouteille()
    {

        $rows = array();
        $res = $this->_db->query('Select * from ' . self::TABLE);
        if ($res->num_rows) {
            while ($row = $res->fetch_assoc()) {
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
             
                    WHERE usager__bouteille.id_cellier = '$id_cellier'";

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    $row['nom_bouteille'] = trim(utf8_encode($row['nom_bouteille']));
                    $row['description_bouteille'] = trim(utf8_encode($row['description_bouteille']));
                    $rows[] = $row;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);

        }
        return $rows;
    }


    public function getOneBouteille($id)
    {
        $rows = array();
        $requete = "SELECT 
						c.id as id_cellier,
						c.id_bouteille, 
						c.date_achat, 
						c.garde_jusqua, 
						c.notes, 
						c.prix, 
						c.quantite,
						c.millesime, 
       
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
                        LEFT JOIN vino__cellier c ON c.id_bouteille = b.id_bouteille
                    
                        LEFT JOIN usager__cellier uc ON uc.id_cellier = c.id
						LEFT JOIN vino__format format ON format.id = b.format_id
                        LEFT JOIN vino__pays pays ON pays.id = b.pays_id
                        LEFT JOIN vino__region region ON region.id = b.region_id
                        LEFT JOIN vino__type typ ON typ.id = b.type_id
                        LEFT JOIN vino__cepages cepages ON cepages.id = b.cepages_id
                        LEFT JOIN vino__appellation appel ON appel.id = b.appellation_id
                        LEFT JOIN vino__designation designation ON designation.id = b.designation_id
                        LEFT JOIN vino__taux_de_sucre ts ON ts.id = b.taux_de_sucre_id
                        LEFT JOIN vino__degre_alcool da ON da.id = b.degre_alcool_id
                        LEFT JOIN vino__produit_du_quebec pc ON pc.id = b.produit_du_quebec_id
                        LEFT JOIN vino__classification classif ON classif.id = b.classification_id
                       WHERE b.id_bouteille = '".$id."'" ;
        if (($res = $this->_db->query($requete)) ==     true) {

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
						c.id as id_cellier,
						c.id_bouteille, 
						c.date_achat, 
						c.garde_jusqua, 
						c.notes, 
						c.prix, 
						c.quantite,
						c.millesime, 
       
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
                        LEFT JOIN vino__cellier c ON c.id_bouteille = b.id_bouteille
                    
						LEFT JOIN usager__cellier uc ON uc.id_cellier = c.id
						LEFT JOIN vino__format format ON format.id = b.format_id
                        LEFT JOIN vino__pays pays ON pays.id = b.pays_id
                        LEFT JOIN vino__region region ON region.id = b.region_id
                        LEFT JOIN vino__type typ ON typ.id = b.type_id
                        LEFT JOIN vino__cepages cepages ON cepages.id = b.cepages_id
                        LEFT JOIN vino__appellation appel ON appel.id = b.appellation_id
                        LEFT JOIN vino__designation designation ON designation.id = b.designation_id
                        LEFT JOIN vino__taux_de_sucre ts ON ts.id = b.taux_de_sucre_id
                        LEFT JOIN vino__degre_alcool da ON da.id = b.degre_alcool_id  
                        LEFT JOIN vino__produit_du_quebec pc ON pc.id = b.produit_du_quebec_id
                        LEFT JOIN vino__classification classif ON classif.id = b.classification_id

                       WHERE b.nom_bouteille = '".$nom."'" ;
        if (($res = $this->_db->query($requete)) ==     true) {

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
     * @param int $id id de la bouteille
     * @param int $nombre Nombre de bouteille a ajouter ou retirer
     *
     * @return Boolean Succès ou échec de l'ajout.
     */
    public function modifierQuantiteBouteilleCellier($id, $nombre)
    {
        //TODO : Valider les données.


        $requete = "UPDATE vino__cellier SET quantite = GREATEST(quantite + " . $nombre . ", 0) WHERE id = " . $id;
        //echo $requete;
        $res = $this->_db->query($requete);

        return $res;
    }

}
