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


    public function lireBouteilles()
    {
        $requete = "SELECT id_bouteille, nom_bouteille, image_bouteille, code_saq, code_cup, pays_id, region_id, type_id, description_bouteille, producteur, prix_bouteille, 
                        url_saq, url_img, format_id, appellation_id, designation_id, classification_id, cepages_id, taux_de_sucre_id, degre_alcool_id, produit_du_quebec_id, 
                        biodynamique, casher, desalcoolise, equitable, faible_taux_alcool, produit_bio, vin_nature, vin_orange 
                    FROM vino__bouteille ORDER BY id_bouteille";

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


    public function lireDegreAlcool()
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

    public function lireTypesCellier()
    {
        $requete = "SELECT id_type_cellier, nom_type_cellier, nom_commun_type_cellier FROM vino__type_cellier ORDER BY id_type_cellier";

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
