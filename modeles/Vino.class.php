<?php

/**
 * On retrouve toutes les tables dont le nom commencent par Vino.
 * Comme la majorité sont des tables très simples, on les regroupe ici.
 */

class Vino extends Modele
{
    public function lireAppellations()
    {
        $requete = "SELECT id, nom FROM vino__appellation ORDER BY id";

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


    public function lireUneAppellation($id)
    {
        $requete = "SELECT id, nom FROM vino__appellation WHERE id = " . $id;

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


    public function lireBouteilles()
    {
        $requete = "SELECT id_bouteille, nom_bouteille, T2.nom AS type_vin, url_saq 
                    FROM vino__bouteille AS T1 LEFT JOIN vino__type AS T2
                    ON T1.type_id = T2.id
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


    public function lireUneBouteille($id)
    {
        $requete = "SELECT id_bouteille, nom_bouteille, image_bouteille, code_saq, code_cup, pays_id, region_id, type_id, description_bouteille, producteur, prix_bouteille,
                            url_saq, url_img, format_id, appellation_id, designation_id, classification_id, cepages_id, taux_de_sucre_id, degre_alcool_id, 
                            produit_du_quebec_id, biodynamique, casher, desalcoolise, equitable, faible_taux_alcool, produit_bio, vin_nature, vin_orange
                    FROM vino__bouteille
                    WHERE id_bouteille = " . $id;

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


    public function lireCepages()
    {
        $requete = "SELECT id, nom FROM vino__cepage ORDER BY id";

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


    public function lireUnCepage($id)
    {
        $requete = "SELECT id, nom FROM vino__cepage WHERE id = " . $id;

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


    public function lireClassifications()
    {
        $requete = "SELECT id, nom FROM vino__classification ORDER BY id";

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


    public function lireUneClassification($id)
    {
        $requete = "SELECT id, nom FROM vino__classification WHERE id = " . $id;

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


    public function lireDegresAlcool()
    {
        $requete = "SELECT id, nom, valeur FROM vino__degre_alcool ORDER BY id";

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


    public function lireUnDegreAlcool($id)
    {
        $requete = "SELECT id, nom, valeur FROM vino__degre_alcool WHERE id = " . $id;

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


    public function lireDesignations()
    {
        $requete = "SELECT id, nom FROM vino__designation ORDER BY id";

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


    public function lireUneDesignation($id)
    {
        $requete = "SELECT id, nom FROM vino__designation WHERE id = " . $id;

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


    public function lireFormats()
    {
        $requete = "SELECT id, nom, valeur_ml, valeur_litre FROM vino__format ORDER BY id";

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


    public function lireUnFormat($id)
    {
        $requete = "SELECT id, nom, valeur_ml, valeur_litre FROM vino__format WHERE id = " . $id;

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


    public function lirePays()
    {
        $requete = "SELECT id, nom, producteur FROM generique__pays ORDER BY id";

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


    public function lireUnPays($id)
    {
        $requete = "SELECT id, nom, producteur FROM generique__pays WHERE id = " . $id;

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


    public function lireProduitsQc()
    {
        $requete = "SELECT id, nom FROM vino__produit_du_quebec ORDER BY id";

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


    public function lireUnProduitQc($id)
    {
        $requete = "SELECT id, nom FROM vino__produit_du_quebec WHERE id = " . $id;

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


    public function lireRegions()
    {
        $requete = "SELECT id, nom FROM vino__region ORDER BY id";

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


    public function lireUneRegion($id)
    {
        $requete = "SELECT id, nom FROM vino__region WHERE id = " . $id;

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


    public function lireTable($nomTable, $id = null)
    {
        $donnees = [];

        switch ($nomTable) {
            case "vino__appellation":
                if (isset($id)) {
                    $donnees = $this->lireUneAppellation($id);
                } else {
                    $donnees = $this->lireAppellations();
                }

                break;

            case "vino__bouteille":
                if (isset($id)) {
                    $donnees = $this->lireUneBouteille($id);
                } else {
                    $donnees = $this->lireBouteilles();
                }

                break;

            case "vino__cepage":
                if (isset($id)) {
                    $donnees = $this->lireUnCepage($id);
                } else {
                    $donnees = $this->lireCepages();
                }

                break;

            case "vino__classification":
                if (isset($id)) {
                    $donnees = $this->lireUneClassification($id);
                } else {
                    $donnees = $this->lireClassifications();
                }

                break;

            case "vino__degre_alcool":
                if (isset($id)) {
                    $donnees = $this->lireUnDegreAlcool($id);
                } else {
                    $donnees = $this->lireDegresAlcool();
                }

                break;

            case "vino__designation":
                if (isset($id)) {
                    $donnees = $this->lireUneDesignation($id);
                } else {
                    $donnees = $this->lireDesignations();
                }

                break;

            case "vino__format":
                if (isset($id)) {
                    $donnees = $this->lireUnFormat($id);
                } else {
                    $donnees = $this->lireFormats();
                }

                break;

            case "generique__pays":
                if (isset($id)) {
                    $donnees = $this->lireUnPays($id);
                } else {
                    $donnees = $this->lirePays();
                }

                break;

            case "vino__produit_du_quebec":
                if (isset($id)) {
                    $donnees = $this->lireUnProduitQc($id);
                } else {
                    $donnees = $this->lireProduitsQc();
                }

                break;

            case "vino__region":
                if (isset($id)) {
                    $donnees = $this->lireUneRegion($id);
                } else {
                    $donnees = $this->lireRegions();
                }

                break;

            case "vino__taux_de_sucre":
                if (isset($id)) {
                    $donnees = $this->lireUnTauxDeSucre($id);
                } else {
                    $donnees = $this->lireTauxDeSucre();
                }

                break;

            case "vino__type_cellier":
                if (isset($id)) {
                    $donnees = $this->lireUnTypeCellier($id);
                } else {
                    $donnees = $this->lireTypesCellier();
                }

                break;

            case "vino__type":
                if (isset($id)) {
                    $donnees = $this->lireUnTypeVin($id);
                } else {
                    $donnees = $this->lireTypesVin();
                }

                break;
        }

        return $donnees;
    }


    public function lireTauxDeSucre()
    {
        $requete = "SELECT id, nom, valeur FROM vino__taux_de_sucre ORDER BY id";

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


    public function lireUnTauxDeSucre($id)
    {
        $requete = "SELECT id, nom, valeur FROM vino__taux_de_sucre WHERE id = " . $id;

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


    public function lireTypesVin()
    {
        $requete = "SELECT id, nom FROM vino__type ORDER BY id";

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


    public function lireUnTypeVin($id)
    {
        $requete = "SELECT id, nom FROM vino__type WHERE id = " . $id;

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


    public function lireTypesCellier()
    {
        $requete = "SELECT id_type_cellier, nom_type_cellier, nom_commun_type_cellier 
                    FROM vino__type_cellier 
                    ORDER BY id_type_cellier";

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


    public function lireUnTypeCellier($id)
    {
        $requete = "SELECT id_type_cellier, nom_type_cellier, nom_commun_type_cellier 
                    FROM vino__type_cellier 
                    WHERE id_type_cellier = " . $id;

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
