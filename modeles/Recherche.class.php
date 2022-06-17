<?php

class Recherche extends Modele
{
    public function lireAppellations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__appellation AS T1 
                INNER JOIN (SELECT T4.appellation_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.appellation_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
                ORDER BY id";

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
                AND nom_bouteille IS NOT NULL
                GROUP BY nom_bouteille";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__cepages AS T1 
                INNER JOIN (SELECT T4.cepages_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.cepages_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
                ORDER BY id";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__classification AS T1 
                INNER JOIN (SELECT T4.classification_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.classification_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
                ORDER BY id";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__degre_alcool AS T1 
                INNER JOIN (SELECT T4.degre_alcool_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.degre_alcool_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTauxSucre = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTauxSucre[] = $row;
        }

        return $aTauxSucre;
    }


    public function lireDesignations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__designation AS T1 
                INNER JOIN (SELECT T4.designation_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.designation_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__format AS T1 
                INNER JOIN (SELECT T4.format_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.format_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
                ORDER BY id";

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

        $sql = "SELECT garde_jusqua, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND garde_jusqua IS NOT NULL
                GROUP BY garde_jusqua";

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

        $sql = "SELECT millesime, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND millesime IS NOT NULL
                GROUP BY millesime";

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

        $sql = "SELECT note, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND note IS NOT NULL
                GROUP BY note";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM generique__pays AS T1 
                INNER JOIN (SELECT T4.pays_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.pays_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

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

        $sql = "SELECT prix_bouteille AS prix, count(*) AS nbTrouve 
                FROM usager__bouteille 
                WHERE id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE id_usager = 1)
                AND prix_bouteille IS NOT NULL
                GROUP BY prix_bouteille";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aPays = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aPays[] = $row;
        }

        return $aPays;
    }


    public function lireProduitsQc()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__produit_du_quebec AS T1 
                INNER JOIN (SELECT T4.produit_du_quebec_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.produit_du_quebec_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__region AS T1 
                INNER JOIN (SELECT T4.region_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.region_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

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

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__taux_de_sucre AS T1 
                INNER JOIN (SELECT T4.taux_de_sucre_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.taux_de_sucre_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
				ORDER BY id";

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $aTauxSucre = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['disponible' => 1];
            $aTauxSucre[] = $row;
        }

        return $aTauxSucre;
    }

    public function lireTypesVin()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT T1.id, T1.nom, T2.nbTrouve 
                FROM vino__type AS T1 
                INNER JOIN (SELECT T4.type_id AS id, COUNT(*) AS nbTrouve
                            FROM usager__bouteille AS T3 INNER JOIN vino__bouteille AS T4 
                            ON T3.id_vino__bouteille = T4.id_bouteille
                            WHERE T3.id_cellier IN (SELECT id_cellier 
                                                    FROM usager__cellier 
                                                    WHERE id_usager = 1)
                            AND T4.type_id IS NOT NULL
                            GROUP BY id) AS T2 
                ON T1.id = T2.id
                ORDER BY id";

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

    public function rechercherBouteilles($idTri, $aDonnees)
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id_bouteille, id_cellier, date_achat, garde_jusqua, note, commentaires, prix, quantite_bouteille, millesime, id_vino__bouteille, nom_bouteille, image_bouteille, pays_id, region_id, type_id, description_bouteille, prix_bouteille FROM usager__bouteille";
        $where = "";
        $id_usager = 1;

        // Cellier
        if ($aDonnees["cellier"]) {
            $where .= "(id_cellier IN (" . $aDonnees["cellier"] . ")) OR ";
        }

        // Types de cellier
        if ($aDonnees["type-cellier"]) {
            $where .= "(id_cellier IN (SELECT id_cellier FROM usager__cellier WHERE type_cellier_id IN (" . $aDonnees["type-cellier"] . "))) OR ";
        }

        // Bouteilles
        if ($aDonnees["bouteille"]) {
            $where .= "(nom_bouteille IN (" . $aDonnees["bouteille"] . ")) OR ";
        }

        // Type de vin
        if ($aDonnees["type-vin"]) {
            $where .= "(type_id IN (" . $aDonnees["type-vin"] . ")) OR ";
        }

        // Pays
        if ($aDonnees["pays"]) {
            $where .= "(pays_id IN (" . $aDonnees["pays"] . ")) OR ";
        }

        // Région
        if ($aDonnees["region"]) {
            $where .= "(region_id IN (" . $aDonnees["region"] . ")) OR ";
        }

        // Prix
        if ($aDonnees["prix"]) {
            $where .= "(prix_bouteille IN (" . $aDonnees["prix"] . ")) OR ";
        }

        // Format
        if ($aDonnees["format"]) {
            $where .= "(format_id IN (" . $aDonnees["format"] . ")) OR ";
        }

        // Millésime
        if ($aDonnees["millesime"]) {
            $where .= "(millesime IN (" . $aDonnees["millesime"] . ")) OR ";
        }

        // Note
        if ($aDonnees["note"]) {
            $where .= "(note IN (" . $aDonnees["note"] . ")) OR ";
        }

        // Garder jusqu'à
        if ($aDonnees["garde-jusqua"]) {
            $where .= "(garde_jusqua IN (" . $aDonnees["garde-jusqua"] . ")) OR ";
        }

        // Produit du Québec
        if ($aDonnees["produit-qc"]) {
            $where .= "(produit_qc_id IN (" . $aDonnees["produit-qc"] . ")) OR ";
        }

        // Appellation
        if ($aDonnees["appellation"]) {
            $where .= "(appellation_id IN (" . $aDonnees["appellation"] . ")) OR ";
        }

        // Cépage
        if ($aDonnees["cepage"]) {
            $where .= "(cepage_id IN (" . $aDonnees["cepage"] . ")) OR ";
        }

        // Classification
        if ($aDonnees["classification"]) {
            $where .= "(classification_id IN (" . $aDonnees["classification"] . ")) OR ";
        }

        // Désignation
        if ($aDonnees["designation"]) {
            $where .= "(designation_id IN (" . $aDonnees["designation"] . ")) OR ";
        }

        // Taux de sucre
        if ($aDonnees["taux-sucre"]) {
            $where .= "(taux_sucre_id IN (" . $aDonnees["taux-sucre"] . ")) OR ";
        }

        // Degré d'alcool
        if ($aDonnees["degre-alcool"]) {
            $where .= "(degre_alcool_id IN (" . $aDonnees["degre-alcool"] . ")) OR ";
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
}
