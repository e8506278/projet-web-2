<?php

use PHPUnit\phpDocumentor\Reflection\Element;

class Recherche extends Modele
{
    public function lireAppellations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT appellation_nom AS nom, COUNT(*) AS nbTrouve
                FROM usager__bouteille
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND appellation_nom IS NOT NULL AND appellation_nom <> ''
                GROUP BY appellation_nom
                ORDER BY appellation_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aAppellations = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aAppellations[] = $row;
        }

        return $aAppellations;
    }


    public function lireBouteilles()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT nom_bouteille AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND nom_bouteille IS NOT NULL AND nom_bouteille <> ''
                GROUP BY nom_bouteille
                ORDER BY nom_bouteille";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aBouteilles = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aBouteilles[] = $row;
        }

        return $aBouteilles;
    }


    public function lireCelliers()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id_cellier AS id, nom_cellier AS nom, description_cellier AS description 
                FROM usager__cellier 
                WHERE id_usager = 1
                ORDER BY id_cellier";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aCelliers = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aCelliers[] = $row;
        }

        return $aCelliers;
    }


    public function lireCepages()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT cepage_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND cepage_nom IS NOT NULL AND cepage_nom <> ''
                GROUP BY cepage_nom
                ORDER BY cepage_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aCepages = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aCepages[] = $row;
        }

        return $aCepages;
    }


    public function lireClassifications()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT classification_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND classification_nom IS NOT NULL AND classification_nom <> ''
                GROUP BY classification_nom
                ORDER BY classification_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aClassifications = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aClassifications[] = $row;
        }

        return $aClassifications;
    }


    public function lireDegreAlcool()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT degre_alcool_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND degre_alcool_nom IS NOT NULL AND degre_alcool_nom <> ''
                GROUP BY degre_alcool_nom
                ORDER BY degre_alcool_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTauxDeSucre = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTauxDeSucre[] = $row;
        }

        return $aTauxDeSucre;
    }


    public function lireDesignations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT designation_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND designation_nom IS NOT NULL AND designation_nom <> ''
                GROUP BY designation_nom
                ORDER BY designation_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aDesignations = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aDesignations[] = $row;
        }

        return $aDesignations;
    }


    public function lireFormats()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT format_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND format_nom IS NOT NULL AND format_nom <> ''
                GROUP BY format_nom
                ORDER BY format_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aFormats = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aFormats[] = $row;
        }

        return $aFormats;
    }


    public function lireGardeJusqua()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT garde_jusqua AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND garde_jusqua IS NOT NULL AND garde_jusqua <> ''
                GROUP BY garde_jusqua
                ORDER BY garde_jusqua";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aGardeJusqua = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aGardeJusqua[] = $row;
        }

        return $aGardeJusqua;
    }


    public function lireMillesimes()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT millesime AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND millesime IS NOT NULL AND millesime <> ''
                GROUP BY millesime
                ORDER BY millesime";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aMillesimes = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aMillesimes[] = $row;
        }

        return $aMillesimes;
    }


    public function lireNotes()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT note AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND note IS NOT NULL AND note <> ''
                GROUP BY note
                ORDER BY note";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aNotes = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aNotes[] = $row;
        }

        return $aNotes;
    }


    public function lirePays()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT pays_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND pays_nom IS NOT NULL AND pays_nom <> ''
                GROUP BY pays_nom
                ORDER BY pays_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aPays = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aPays[] = $row;
        }

        return $aPays;
    }


    public function lirePrix()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT prix_bouteille AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND prix_bouteille IS NOT NULL AND prix_bouteille <> ''
                GROUP BY prix_bouteille
                ORDER BY prix_bouteille";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aPrix = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aPrix[] = $row;
        }

        return $aPrix;
    }


    public function lireProduitsQc()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT produit_du_quebec_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND produit_du_quebec_nom IS NOT NULL AND produit_du_quebec_nom <> ''
                GROUP BY produit_du_quebec_nom
                ORDER BY produit_du_quebec_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aProduitsQc = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aProduitsQc[] = $row;
        }

        return $aProduitsQc;
    }


    public function lireOrdresTri()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom, champ, ordre FROM generique_ordre_tri ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aOrdresTri = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $aOrdresTri[] = $row;
        }

        return $aOrdresTri;
    }


    public function lireRegions()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT region_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND region_nom IS NOT NULL AND region_nom <> ''
                GROUP BY region_nom
                ORDER BY region_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aRegions = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aRegions[] = $row;
        }

        return $aRegions;
    }


    public function lireTauxDeSucre()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT taux_de_sucre_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND taux_de_sucre_nom IS NOT NULL AND taux_de_sucre_nom <> ''
                GROUP BY taux_de_sucre_nom
                ORDER BY taux_de_sucre_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTauxDeSucre = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTauxDeSucre[] = $row;
        }

        return $aTauxDeSucre;
    }

    public function lireTypesVin()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT type_de_vin_nom AS nom, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND type_de_vin_nom IS NOT NULL AND type_de_vin_nom <> ''
                GROUP BY type_de_vin_nom
                ORDER BY type_de_vin_nom";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTypesVin = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTypesVin[] = $row;
        }

        return $aTypesVin;
    }

    public function lireTypesCellier()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT T1.id_type_cellier AS id, T1.nom_type_cellier AS nom, T2.nbTrouve 
                FROM vino__type_cellier AS T1 
                INNER JOIN (SELECT type_cellier_id AS id, COUNT(*) AS nbTrouve 
                            FROM usager__cellier 
                            WHERE id_usager = 1 
                            GROUP BY id) AS T2
                ON T1.id_type_cellier = t2.id
				ORDER BY id";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTypesCellier = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTypesCellier[] = $row;
        }

        return $aTypesCellier;
    }

    public function rechercherBouteilles($tri, $filtres)
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id_bouteille, id_cellier, description_bouteille, prix_bouteille, date_achat, garde_jusqua, note, commentaires, quantite_bouteille, millesime, id_vino__bouteille, nom_bouteille, image_bouteille, pays_nom, region_nom, type_de_vin_nom FROM usager__bouteille";
        $where = "";
        $id_usager = $_SESSION['utilisateur']['id'];

        // Cellier
        if (!$this->estVide($filtres, "id_cellier")) {
            $where .= "(id_cellier IN (" . $filtres["id_cellier"] . ")) OR ";
        }

        // Types de cellier
        if (!$this->estVide($filtres, "type_cellier")) {
            $where .= "(id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE type_cellier_id IN (" . $filtres["type_cellier"] . "))) OR ";
        }

        // Bouteilles
        if (!$this->estVide($filtres, "bouteille")) {
            $where .= "(nom_bouteille IN (" . $filtres["bouteille"] . ")) OR ";
        }

        // Type de vin
        if (!$this->estVide($filtres, "type_de_vin_nom")) {
            $where .= "(type_de_vin IN (" . $filtres["type_de_vin_nom"] . ")) OR ";
        }

        // Pays
        if (!$this->estVide($filtres, "pays_nom")) {
            $where .= "(pays_nom IN (" . $filtres["pays_nom"] . ")) OR ";
        }

        // Région
        if (!$this->estVide($filtres, "region_nom")) {
            $where .= "(region_nom IN (" . $filtres["region_nom"] . ")) OR ";
        }

        // Prix
        if (!$this->estVide($filtres, "prix_bouteille")) {
            $where .= "(prix_bouteille IN (" . $filtres["prix_bouteille"] . ")) OR ";
        }

        // Format
        if (!$this->estVide($filtres, "format_nom")) {
            $where .= "(format_nom IN (" . $filtres["format_nom"] . ")) OR ";
        }

        // Millésime
        if (!$this->estVide($filtres, "millesime")) {
            $where .= "(millesime_nom IN (" . $filtres["millesime"] . ")) OR ";
        }

        // Note
        if (!$this->estVide($filtres, "note")) {
            $where .= "(note IN (" . $filtres["note"] . ")) OR ";
        }

        // Garder jusqu'à
        if (!$this->estVide($filtres, "garde_jusqua")) {
            $where .= "(garde_jusqua IN (" . $filtres["garde_jusqua"] . ")) OR ";
        }

        // Produit du Québec
        if (!$this->estVide($filtres, "produit_du_quebec_nom")) {
            $where .= "(produit_du_quebec_nom IN (" . $filtres["produit_du_quebec_nom"] . ")) OR ";
        }

        // Appellation
        if (!$this->estVide($filtres, "appellation_nom")) {
            $where .= "(appellation_nom IN (" . $filtres["appellation_nom"] . ")) OR ";
        }

        // Cépage
        if (!$this->estVide($filtres, "cepage_nom")) {
            $where .= "(cepage_nom IN (" . $filtres["cepage_nom"] . ")) OR ";
        }

        // Classification
        if (!$this->estVide($filtres, "classification_nom")) {
            $where .= "(classification_nom IN (" . $filtres["classification_nom"] . ")) OR ";
        }

        // Désignation
        if (!$this->estVide($filtres, "designation_nom")) {
            $where .= "(designation_nom IN (" . $filtres["designation_nom"] . ")) OR ";
        }

        // Taux de sucre
        if (!$this->estVide($filtres, "taux_de_sucre_nom")) {
            $where .= "(taux_de_sucre_nom IN (" . $filtres["taux_de_sucre_nom"] . ")) OR ";
        }

        // Degré d'alcool
        if (!$this->estVide($filtres, "degre_alcool_nom")) {
            $where .= "(degre_alcool_nom IN (" . $filtres["degre_alcool_nom"] . ")) OR ";
        }

        // On enlève le OR de trop à la fin et on ajoute le WHERE
        if ($where) {
            $sql .= " WHERE " . substr($where, 0, -4) . " AND ";
        } else {
            $sql .= " WHERE ";
        }

        // Par défaut, on doit absolument choisir uniquement les bouteilles qui se retrouvent dans les celliers de l'utilisateur.
        $sql .= "(id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = " . $id_usager . "))";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesBouteilles = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $lesBouteilles[] = $row;
        }

        return $lesBouteilles;
    }


    /**
     * Vérifie si le tableau contient la clé, et si celle-ci contient des valeurs.
     * Est utilisée pour vérifier les données reçues pour la recherche, 
     * car on reçoit juste des clés qui ont des valeurs
     */
    private function estVide($tableau, $cle)
    {
        $estVide = false;

        if (array_key_exists($cle, $tableau)) {
            $estVide = empty($tableau[$cle]);
        } else {
            $estVide = true;
        }

        return $estVide;
    }
}
