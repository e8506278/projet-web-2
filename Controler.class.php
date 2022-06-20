<?php
include('./controller/Connexion.php');
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler
{
    /**
     * Traite la requête
     * @return void
     */
    public function gerer()
    {
        switch ($_GET['requete']) {
            case 'mesCelliers':
                $this->listeCelliers();
                break;
            case 'celliers':
                $this->liste();
                break;
            case 'ajouterNouveauCellier':
                $this->ajouterNouveauCellier();
                break;
            case 'modifierCellier':
                $this->modifierCellier();
                break;
            case 'supprimerCellier':
                $this->supprimerCellier();
                break;
            case 'deplacerSupprimer':
                $this->deplacerSupprimer();
                break;
            case 'listeBouteilleCellier':
                $this->listeBouteilleCellier();
                break;
            case 'ajouterQteBouteille':
                $this->ajouterQteBouteille();
                break;
            case 'reduireQteBouteille':
                $this->reduireQteBouteille();
                break;
            case 'autocompleteBouteille':
                $this->autocompleteBouteille();
                break;
            case 'ajouterNouvelleBouteilleCellier':
                $this->ajouterNouvelleBouteilleCellier();
                break;
            case 'bouteille':
                $this->ficheBouteille();
                break;
            case 'ajouterBouteilleCellier':
                $this->ajouterBouteilleCellier();
                break;
            case 'detruireBouteille': //detruire une bouteille from cellier
                return $this->detruireBouteille();
                break;
            case 'boireBouteilleCellier':
                $this->boireBouteilleCellier();
                break;
            case 'getBouteille':
                $this->getBouteille();
                break;
            case 'enregistrer':
                $this->enregistrerUtilisateur();
                break;
            case 'connecter':
                $this->connecterUtilisateur();
                break;
            case 'deconnecter':
                $this->deconnecterUtilisateur();
                break;
            case 'rechercher':
                $this->rechercher();
                break;
            case 'rechercherBouteilles':
                $this->rechercherBouteilles();
                break;
            case 'accueil':
                $this->accueil();
                break;
            default:
                $this->connecterUtilisateur();
                break;
        }
    }

    private function rechercher()
    {
        if (isset($_SESSION) && isset($_SESSION['utilisateur'])) {
            include("vues/entete.php");
            include("vues/recherche.php");
            include("vues/pied.php");
        } else {
            include("vues/entete.php");
            include("vues/connexion.php");
            include("vues/pied.php");
        }
    }


    private function rechercherBouteilles()
    {
        if (isset($_SESSION) && isset($_SESSION['utilisateur'])) {
            $aDonnees = json_decode(file_get_contents('php://input'), true);

            $tri = $aDonnees['tri'];
            $filtres = $aDonnees['filtres'];

            $recherche = new Recherche();
            $listeBouteille = $recherche->rechercherBouteilles($tri, $filtres);

            $resultats = array("liste" => $listeBouteille);
            echo json_encode($resultats);
        } else {
            include("vues/entete.php");
            include("vues/connexion.php");
            include("vues/pied.php");
        }
    }

    private function liste()
    {
        $id = $_SESSION['utilisateur']['id'];

        $celliers = new Cellier();

        $data = $celliers->getListeCellier($id);


        echo json_encode($data);
    }

    private function enregistrerUtilisateur()
    {
        include("vues/entete.php");
        include("vues/enregistrement.php");
        include("vues/pied.php");
    }

    private function connecterUtilisateur()
    {
        include("vues/entete.php");
        include("vues/connexion.php");
        include("vues/pied.php");
    }

    private function deconnecterUtilisateur()
    {
        unset($_SESSION['utilisateur']);
        include("vues/entete.php");
        include("vues/connexion.php");
        include("vues/pied.php");
    }

    private function accueil()
    {
        include("vues/entete.php");
        include("vues/index.php");
        include("vues/pied.php");
    }

    private function listeBouteille()
    {
        $bte = new Bouteille();

        $data = $bte->getListeBouteille();

        // echo json_encode($data);
        include("vues/entete.php");

        include("vues/pied.php");
    }


    private function autocompleteBouteille()
    {
        $bte = new Bouteille();
        //var_dump(file_get_contents('php://input'));
        $body = json_decode(file_get_contents('php://input'));
        //var_dump($body);
        $listeBouteille = $bte->autocomplete($body->nom);

        // echo json_encode($listeBouteille);
    }


    private function ajouterNouvelleBouteilleCellier()
    {
        $id_cellier = $_GET['id_cellier'];

        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {
            $bte = new Bouteille();
            //var_dump($_POST['data']);

            //var_dump($data);
            $resultat = $bte->ajouterBouteilleCellier($body);
            // echo json_encode($resultat);
        } else {
            include("vues/entete.php");
            include("vues/ajouter.php");
            include("vues/pied.php");
        }
    }




    private function boireBouteilleCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
    }

    private function ajouterBouteilleCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
    }

    private function detruireBouteille()
    {
        $body = json_decode(file_get_contents('php://input'));

        $bte = new Bouteille();
        $resultat = $bte->deleteUsageBouteille($body->id_bouteille, $body->id_cellier);

        if ($resultat) {
            return $this->returnJsonHttpResponse(true, ['id_bouteille' => $body->id_bouteille, 'id_cellier' => $body->id_cellier, 'resultat' => $resultat]);
        }
        return $this->returnJsonHttpResponse(false, []);
        // echo json_encode($resultat);
    }


    /*CELLIERS*/

    /**
     * Cette méthode récupère la liste des celliers d'un usager ainsi que le nombre de cellier par usager
     * avec l'id session de l'usager
     */
    private function listeCelliers()
    {

        $id = $_SESSION['utilisateur']['id'];

        $celliers = new Cellier();

        $data = $celliers->getListeCellier($id);
        $nombre_cellier = $celliers->nombreCellierUsager($id);

        // Si le nombre de cellier est égal à 10
        if ($nombre_cellier == '10') {

            $erreur = "Vous avez atteint le maximum de celliers disponibles (10).";
        } else {
            $erreur = "";
        }


        include("vues/entete.php");
        include("vues/Celliers/celliers.php");
        include("vues/pied.php");
    }

    /**
     * Cette méthode appelle la fonction pour ajouter un nouveau cellier 
     * selon les information rentrée par l'usagé ($body).
     *  
     */
    private function ajouterNouveauCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {
            $cellier = new Cellier();
            $resultat = $cellier->ajouterNouveauCellier($body);
        } else {
            include("vues/entete.php");
            include("vues/Celliers/celliers.php");
            include("vues/pied.php");
        }
    }

    /**
     * Cette méthode appelle la fonction pour récupérer les informations d'un cellier
     *  selon l'id_cellier envoyé dans l'url
     *  
     */
    private function modifierCellier()
    {
        $body = json_decode(file_get_contents('php://input'));
        if (!empty($body)) {
            $cellier = new Cellier();
            $resultat = $cellier->modifierCellier($body);
        } else {
            include("vues/entete.php");
            include("vues/Cellliers/celliers.php");
            include("vues/pied.php");
        }
    }

    private function deplacerSupprimer()
    {

        $body = json_decode(file_get_contents('php://input'));
        $id = $body->id_cellierSupprime;
        if (!empty($body)) {

            $bte = new Bouteille();
            $bouteilles = $bte->getListeBouteilleCellier($body->id_cellierSupprime);
            if ($bouteilles) {

                $cellier = new Cellier();
                $resultat = $cellier->deplacerBouteillesCellier($body->id_cellierChoisi, $bouteilles);
                if ($resultat) {
                    $resultat =   $cellier->supprimerCellier($id);
                }
            }
        }
    }

    private function supprimerCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {

            $cellier = new Cellier();
            $cellier->supprimerCellier($body->id);
        }
    }

    /**
     * Cette méthode appelle la fonction pour récupérer la liste des bouteilles dans un cellier
     *  selon l'id_cellier envoyé dans l'url, ou la quantité_bouteille est plus grande que 0, trié DESC selon l'id_bouteille 
     *  
     */
    private function listeBouteilleCellier()
    {
        $id_cellier = $_GET['id_cellier'];
        $nom_cellier = $_GET['nom_cellier'];

        $bte = new Bouteille();

        $data = $bte->getListeBouteilleCellier($id_cellier);


        include("vues/entete.php");
        include("vues/Celliers/bouteilles.php");
        include("vues/pied.php");
    }

    /**
     * Cette méthode appelle la fonction pour récupérer la liste des bouteilles dans un cellier
     *  selon l'id_cellier envoyé dans l'url 
     *  
     */
    private function ajouterQteBouteille()
    {
        $body = json_decode(file_get_contents('php://input'));
        var_dump($body);
        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
    }
    private function reduireQteBouteille()
    {
        $body = json_decode(file_get_contents('php://input'));
        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
    }

    /* FIN CELLIER */

    private function ficheBouteille()
    {
        if (!$_SESSION['utilisateur']['id']) {
            $this->deconnecterUtilisateur();
            return;
        }
        $id_cellier = $_GET['id_cellier'];
        $id_bouteille = $_GET['id_bouteille'];
        $message = $_GET['message'];


        if ($id_bouteille) {
            $bouteille = (new Bouteille());
            $bouteille = $bouteille->getOneBouteille($id_bouteille, $id_cellier);
            if (is_array($bouteille) && count($bouteille) > 0) {
                $bouteille = $bouteille[0];
            }
        }


        $body = json_decode(file_get_contents('php://input'));

        $list = new Lists();
        $bouteilles = $list->getList('bouteille');
        $usager_celliers = $list->getList('usager_cellier');
        $usager_bouteille = $list->getList('usager_bouteille');

        $pays = $list->getList('pays');
        $regions = $list->getList('region');
        $types = $list->getList('type');
        $formats = $list->getList('format');
        $appellations = $list->getList('appellation');
        $designations = $list->getList('designation');
        $cepages = $list->getList('cepages');
        $taux_de_sucres = $list->getList('taux_de_sucre');
        $degre_alcools = $list->getList('degre_alcool');
        $produit_du_quebecs = $list->getList('produit_du_quebec');
        $classifications = $list->getList('classifications');


        $celliers = $usager_celliers;
        if (!is_array($celliers) || !(count($celliers) > 0)) {
            $bouteille['celliers'] = [
                'id_cellier' => null,
                'nom_cellier' => '',
                'quantite' => 0
            ];
        } else {
            $bouteille['celliers'] = $celliers;
        }


        $bouteille['id_cellier'] = $id_cellier;

        include("vues/entete.php");
        include("vues/details.php");
        include("vues/pied.php");
    }

    public function getBouteille()
    {
        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {
            $bouteille = new Bouteille();

            $resultat = $bouteille->getOneBouteilleByName($body->nom);
            if (count($resultat) > 0) {
                return $this->returnJsonHttpResponse(true, $resultat[0]);
            }
        }
        return $this->returnJsonHttpResponse(false, null);
    }


    private function productDetails()
    {

        //        $bte = new Bouteille();
        //        $result = $bte->getOneBouteille($_GET['id_bouteille']);
        //        if (count($result) > 0) {
        //            $product = $result[0];
        //        }


        include("vues/entete.php");
        include("vues/details.php");
        include("vues/pied.php");
    }

    function returnJsonHttpResponse($success, $data)
    {
        // remove any string that could create an invalid JSON
        // such as PHP Notice, Warning, logs...
        ob_clean();

        // this will clean up any previously added headers, to start clean
        header_remove();

        // Set the content type to JSON and charset
        // (charset can be set to something else)
        header("Content-type: application/json; charset=utf-8");

        // Set your HTTP response code, 2xx = SUCCESS,
        // anything else will be error, refer to HTTP documentation
        if ($success) {
            http_response_code(200);
        } else {
            http_response_code(500);
        }

        // encode your PHP Object or Array into a JSON string.
        // stdClass or array
        echo json_encode($data);

        // making sure nothing is added
        exit();
    }
}
