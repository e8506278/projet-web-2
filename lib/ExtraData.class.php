<?php

/**
 * Class ExtraData
 */
class ExtraData extends Modele
{
    private $stmt;

    public function __construct()
    {
        parent::__construct();
        if (!($this->stmt = $this->_db->prepare("INSERT INTO saq_data (link, pays, region, appellation, designation, classification, cepage, degre_alcool, taux_de_sucre, couleur, particularite, format, producteur, agent, code_saq, code_cup, produit_qc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"))) {
            echo "Echec de la préparation";
        }
    }

    public function lireFichier()
    {
        // fichier json
        $filenames = [
            "./files/run_results31.json"
        ];

        foreach ($filenames as $filename) {
            // Lire le fichier JSON dans du PHP
            $data = file_get_contents($filename);

            // Convert the JSON String into PHP Array
            $array = json_decode($data, true);
            $longData = sizeof($array["saq_urls"]);

            for ($i = 0; $i < $longData; $i++) {
                $myString = $array["saq_urls"][$i]["selection1"][0]['name'];
                $myArray = explode('{*}', $myString);

                $link = $array["saq_urls"][$i]["link"];
                $pays = "";
                $region = "";
                $appellation = "";
                $designation = "";
                $classification = "";
                $cepage = "";
                $degre_alcool = "";
                $taux_de_sucre = "";
                $couleur = "";
                $particularite = "";
                $format = "";
                $producteur = "";
                $agent = "";
                $code_saq = "";
                $code_cup = "";
                $produit_qc = "";

                $longSelection = sizeof($myArray);

                for ($j = 0; $j < $longSelection; $j++) {
                    $title = $myArray[$j];
                    if ($j < $longSelection - 1) $data = $myArray[$j + 1];

                    switch ($title) {
                        case "Pays":
                            $pays = $data;
                            break;

                        case "Région":
                            $region = $data;
                            break;

                        case "Appellation d'origine":
                            $appellation = $data;
                            break;

                        case "Désignation réglementée":
                            $designation = $data;
                            break;

                        case "Classification":
                            $classification = $data;
                            break;

                        case "Cépage":
                            $cepage = $data;
                            break;

                        case "Degré d'alcool":
                            $degre_alcool = $data;
                            break;

                        case "Taux de sucre":
                            $taux_de_sucre = $data;
                            break;

                        case "Couleur":
                            $couleur = $data;
                            break;

                        case "Particularité":
                            $particularite = $data;
                            break;

                        case "Format":
                            $format = $data;
                            break;

                        case "Producteur":
                            $producteur = $data;
                            break;

                        case "Agent promotionnel":
                            $agent = $data;
                            break;

                        case "Code SAQ":
                            $code_saq = $data;
                            break;

                        case "Code CUP":
                            $code_cup = $data;
                            break;

                        case "Produit du Québec":
                            $produit_qc = $data;
                            break;
                    }
                }

                $retour = false;

                $this->stmt->bind_param(
                    "sssssssssssssssss",
                    $link,
                    $pays,
                    $region,
                    $appellation,
                    $designation,
                    $classification,
                    $cepage,
                    $degre_alcool,
                    $taux_de_sucre,
                    $couleur,
                    $particularite,
                    $format,
                    $producteur,
                    $agent,
                    $code_saq,
                    $code_cup,
                    $produit_qc
                );

                $retour = $this->stmt->execute();
            }

            echo "Le fichier " . $filename . " a été traité.<br>";
        }

        echo "Tout est terminé !<br>";
        return true;
    }

    public function traiterDonnees()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $requete = 'SELECT id, url_SAQ from vino__bouteille ORDER BY id';
        $compteur = 0;
        $reussi = false;

        if (($res = $this->_db->query($requete)) == true) {
            if ($res->num_rows) {
                echo "Nombre de lignes totales: " . $res->num_rows . "<br>";

                while ($row = $res->fetch_assoc()) {
                    $url_SAQ = $row['url_SAQ'];

                    $reussi = $this->mettreAJourDonnees($url_SAQ);
                    if (!$reussi) break;
                    $compteur++;
                }
            }
        } else {
            throw new Exception("Erreur de requête sur la base de donnée", 1);
        }

        echo "Nombre de lignes traitées: " . $compteur . "<br>";
        return $reussi;
    }

    private function mettreAJourDonnees($url_SAQ)
    {
        $rows = $this->_db->query("SELECT * from saq_data WHERE link = '" . $url_SAQ . "'");
        $requete = 'UPDATE vino__bouteille SET region_id = ?, appellation = ?, designation = ?, classification = ?, cepage = ?, taux_sucre = ?, degre_alcool = ?, producteur = ?, code_cup = ?, biodynamique = ?, casher = ?, desalcoolise = ?, equitable = ?, faible_taux_alcool = ?, produit_bio = ?, vin_nature = ?, vin_orange = ?, produit_du_quebec = ? WHERE url_saq = ?';

        if ($rows->num_rows == 1) {
            $dataSaq = $rows->fetch_assoc();

            if (!($stmt = $this->_db->prepare($requete))) {
                echo ("mettreAJourDonnees: Echec de la préparation: " . $stmt->error . "<br>");
                return false;
            }

            $region = $dataSaq['region'];
            $appellation  = $dataSaq['appellation'];
            $designation = $dataSaq['designation'];
            $classification = $dataSaq['classification'];
            $cepage = $dataSaq['cepage'];
            $degre_alcool = $dataSaq['degre_alcool'];
            $taux_de_sucre = $dataSaq['taux_de_sucre'];
            $producteur = $dataSaq['producteur'];
            $code_cup = $dataSaq['code_cup'];
            $produit_qc = $dataSaq['produit_qc'];

            $particularite = $dataSaq['particularite'];
            $myArray = explode(',', $particularite);
            $nbParticularites = sizeof($myArray);

            $biodynamique = 0;
            $casher = 0;
            $desalcoolise = 0;
            $equitable = 0;
            $faible_taux_alcool = 0;
            $produit_bio = 0;
            $vin_nature = 0;
            $vin_orange = 0;

            for ($i = 0; $i < $nbParticularites; $i++) {
                $laChaine = $myArray[$i];

                if (str_contains($laChaine, "Biodynamique")) $biodynamique = 1;
                if (str_contains($laChaine, "Casher")) $casher = 1;
                if (str_contains($laChaine, "Désalcoolisé")) $desalcoolise = 1;
                if (str_contains($laChaine, "Équitable")) $equitable = 1;
                if (str_contains($laChaine, "Faible taux")) $faible_taux_alcool = 1;
                if (str_contains($laChaine, "Produit bio")) $produit_bio = 1;
                if (str_contains($laChaine, "Vin nature")) $vin_nature = 1;
                if (str_contains($laChaine, "Vin orange")) $vin_orange = 1;
            }

            $stmt->bind_param(
                "sssssssssiiiiiiiiss",
                $region,
                $appellation,
                $designation,
                $classification,
                $cepage,
                $taux_de_sucre,
                $degre_alcool,
                $producteur,
                $code_cup,
                $biodynamique,
                $casher,
                $desalcoolise,
                $equitable,
                $faible_taux_alcool,
                $produit_bio,
                $vin_nature,
                $vin_orange,
                $produit_qc,
                $url_SAQ
            );

            $retour = $stmt->execute();
            if (!$retour) return false;
        } else {
            return false;
        }

        return true;
    }
}
